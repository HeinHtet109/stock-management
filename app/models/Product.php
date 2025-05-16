<?php
require_once __DIR__ . '/../core/Model.php';

class Product extends Model
{
    public function getAll()
    {
        return $this->query("SELECT * FROM products");
    }

    public function getCount() {
        $stmt = $this->query("SELECT COUNT(*) AS total FROM products");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM products WHERE id = ?", [$id])->fetch();
    }

    public function create($data)
    {
        $sql = "INSERT INTO products (name, price, quantity_available) VALUES (?, ?, ?)";
        return $this->query($sql, [$data['name'], $data['price'], $data['quantity']]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE products SET name = ?, price = ?, quantity_available = ? WHERE id = ?";
        return $this->query($sql, [$data['name'], $data['price'], $data['quantity'], $id]);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM products WHERE id = ?", [$id]);
    }
}
