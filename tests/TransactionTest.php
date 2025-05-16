<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Model.php';
require_once __DIR__ . '/../app/models/Transaction.php';
require_once __DIR__ . '/../app/models/Product.php'; // If you are dealing with products as well

class TransactionTest extends TestCase
{
    private $transaction;
    private $product;
    private $testTransactionId;

    protected function setUp(): void
    {
        $this->transaction = new Transaction();
        $this->product = new Product(); // For product interaction (if needed)
    }

    protected function tearDown(): void
    {
        // Delete the test transaction and associated products (if created for testing)
        if ($this->testTransactionId) {
            $this->transaction->query("DELETE FROM transactions WHERE id = ?", [$this->testTransactionId]);
        }
    }

    public function testCreateTransaction()
    {
        // Create a product to link with the transaction (you can add a Product for testing)
        $name = 'Test Product ' . uniqid();
        $price = 9.99;
        $quantity = 10;
        
        $this->product->create([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ]);
        
        // Get the product ID (assuming products table exists)
        $productStmt = $this->product->query("SELECT id FROM products WHERE name = ?", [$name]);
        $product = $productStmt->fetch(PDO::FETCH_ASSOC);
        $productId = $product['id'] ?? null;

        $userId = 1;  // Assume the user ID of the logged-in user is 1

        $this->assertNotNull($productId, 'Product should exist in the database');

        // Create the transaction
        $this->transaction->create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 2,
            'total_price' => 19.98 // 2 products of 9.99 each
        ]);

        // Fetch transaction and assert
        $stmt = $this->transaction->query("SELECT * FROM transactions WHERE user_id = ? AND product_id = ?", [$userId, $productId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->testTransactionId = $row['id'] ?? null;

        $this->assertNotEmpty($row, 'Transaction should be created');
        $this->assertEquals($userId, $row['user_id']);
        $this->assertEquals($productId, $row['product_id']);
        $this->assertEquals(2, $row['quantity']);
        $this->assertEquals(19.98, $row['total_price']);
    }

    public function testGetTransactionCount()
    {
        // Count number of transactions
        $count = $this->transaction->getCount();
        $this->assertIsInt($count, 'Transaction count should be an integer');
        $this->assertGreaterThanOrEqual(0, $count, 'Transaction count should not be negative');
    }

    public function testGetAllTransactions()
    {
        // Fetch all transactions
        $transactions = $this->transaction->getAll();
        $this->assertIsObject($transactions, 'Should return an object of transactions');
        $this->assertNotEmpty($transactions, 'There should be at least one transaction');
    }

    public function testGetUserTransactions()
    {
        // Create a new user transaction
        $userId = 5;  // Test for user with ID = 1
        $transactions = $this->transaction->getAllByUser($userId);

        $this->assertIsArray($transactions, 'Transactions should be an array');
        $this->assertNotEmpty($transactions, 'User should have transactions');
    }
}