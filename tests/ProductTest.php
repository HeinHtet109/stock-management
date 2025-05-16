<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Model.php';
require_once __DIR__ . '/../app/models/Product.php';

class ProductTest extends TestCase
{
    private $product;
    private $testProductId;

    protected function setUp(): void
    {
        $this->product = new Product();
    }

    protected function tearDown(): void
    {
        // Delete the test product after test
        if ($this->testProductId) {
            $this->product->query("DELETE FROM products WHERE id = ?", [$this->testProductId]);
        }
    }

    public function testCreateProduct()
    {
        $name = 'Test Product ' . uniqid();
        $price = 9.99;
        $quantity = 10;

        $this->product->create([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ]);

        // Fetch the product back
        $stmt = $this->product->query("SELECT * FROM products WHERE name = ?", [$name]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->testProductId = $row['id'] ?? null;

        $this->assertNotEmpty($row);
        $this->assertEquals($name, $row['name']);
        $this->assertEquals($price, $row['price']);
        $this->assertEquals($quantity, $row['quantity_available']);
    }

    public function testGetProductCount()
    {
        $count = $this->product->getCount();        
        $this->assertIsInt($count);
        $this->assertGreaterThanOrEqual(0, $count);
    }

    public function testGetAllReturnsArray()
    {
        $products = $this->product->getAll();        
        $this->assertIsObject($products);
    }
}
