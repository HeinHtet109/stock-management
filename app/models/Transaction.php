<?php

require_once __DIR__ . '/../core/Model.php';

class Transaction extends Model
{
    public function getAll()
    {
        return $this->query("SELECT t.*, p.name AS product_name, u.name AS user_name
                                    FROM transactions t
                                    JOIN products p ON t.product_id = p.id
                                    JOIN users u ON t.user_id = u.id");
    }

    public function getCount()
    {
        $stmt = $this->query("SELECT COUNT(*) AS total FROM transactions");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function getCountbyUser($user_id)
    {
        $stmt = $this->query("SELECT COUNT(*) AS total FROM transactions WHERE user_id = ?", [$user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM transactions WHERE id = ?", [$id])->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO transactions (user_id, product_id, quantity, total_price)
            VALUES (?, ?, ?, ?)";
        return $this->query($sql, [
            $data['user_id'],
            $data['product_id'],
            $data['quantity'],
            $data['total_price']
        ]);
    }

    public function getAllByUser($user_id)
    {
        $stmt = $this->query("
            SELECT t.*, p.name as product_name
            FROM transactions t
            JOIN products p ON t.product_id = p.id
            WHERE t.user_id = ?
            ORDER BY t.transaction_date DESC
        ", [$user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
