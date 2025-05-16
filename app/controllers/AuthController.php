<?php

require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller
{
    public function login()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'admin') {
                header("Location: " . base_url() . "admin/dashboard");
            } else {
                header("Location: " . base_url() . "dashboard");
            }
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isValid = true;

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!$email) {
                $error = "Email is required!";
                $isValid = false;
            }

            if (!$password) {
                $error = "Password is required!";
                $isValid = false;
            }

            if ($isValid) {
                $userModel = $this->model('User');
                $user = $userModel->findByEmail($email);

                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'name' => $user['name'],
                            'role' => $user['role']
                        ];

                        if ($user['role'] == 'admin') {
                            header("Location: " . base_url() . "admin/dashboard");
                        } else {
                            header("Location: " . base_url() . "dashboard");
                        }
                        exit;
                    } else {
                        $error = "Incorrect Password!";
                    }
                } else {
                    $error = "Account doesn't exist!";
                }
            }
        }

        $this->view('auth/login', ['error' => $error ?? null]);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['user'])) {
                session_destroy();
            }
            
            $isValid = true;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirmation = $_POST['password-confirmation'];

            if (!$name) {
                $error = "Username is required!";
                $isValid = false;
            }

            if (!$email) {
                $error = "Email is required!";
                $isValid = false;
            }

            if (!$password) {
                $error = "Password is required!";
                $isValid = false;
            }

            if (!$passwordConfirmation) {
                $error = "Confirm password is required!";
                $isValid = false;
            }

            if ($password != $passwordConfirmation) {
                $error = "Confirm password do not match!";
                $isValid = false;
            }

            if($isValid) {
                $userModel = $this->model('User');
                $checkuser = $userModel->findByEmail($email);
    
                if ($checkuser) {
                    $error = "Account already existed!";
                } else {
                    $data = [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'role' => 'user'
                    ];

                    $userModel->create($data);
                    $user = $userModel->findByEmail($email);

                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'role' => $user['role']
                    ];

                    header("Location: " . base_url() . "dashboard");                    
                }
            }
        }
        $this->view('auth/register', ['error' => $error ?? null]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . base_url() . "");
    }
}
