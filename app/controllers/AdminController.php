<?php

require_once __DIR__ . '/../core/Controller.php';

class AdminController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            require_once __DIR__ . '/../controllers/ErrorController.php';
            $err = new ErrorController();
            $err->error403();
            exit;
        }
    }

    public function index()
    {
        $productModel = $this->model('Product');
        $userModel = $this->model('User');
        $transactionModel = $this->model('Transaction');
        $productCount = $productModel->getCount();
        $userCount = $userModel->getCount();
        $transactionCount = $transactionModel->getCount();
        $this->view('layouts/admin_layout', ['productCount' => $productCount, 'userCount' => $userCount, 'transactionCount' => $transactionCount]);
    }

    public function users()
    {
        $userModel = $this->model('User');
        $users = $userModel->getAll();
        $this->view('users/index', ['users' => $users]);
    }

    public function transactions()
    {
        $transactionModel = $this->model('Transaction');
        $transactions = $transactionModel->getAll();
        $this->view('transactions/index', ['transactions' => $transactions]);
    }
}
