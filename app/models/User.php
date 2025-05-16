<?php

require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    public function getAll()
    {
        return $this->query("SELECT * FROM users");
    }

    public function getCount() {
        $stmt = $this->query("SELECT COUNT(*) AS total FROM users");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM users WHERE id = ?", [$id])->fetch();
    }

    public function findByEmail($email)
    {
        $stmt = $this->query("SELECT * FROM users WHERE email = :email", [
            ':email' => $email,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        return $this->query($sql, [$data['name'], $data['email'], $hashedPassword, $data['role'] ?? 'user']);        
    }
}
