<?php
$sql = file_get_contents('public/db.sql');

$pdo = new PDO("mysql:host=localhost", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Creating Database and Table in mysql
    $pdo->exec($sql);
    echo "Database and tables created successfully.";

    // Creating Default Admin User
    $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
    $pdo->exec("INSERT INTO users (name, email, password, role)
            VALUES ('Admin', 'admin@admin.com', '$hashedPassword', 'admin')");

    echo "\n Default admin user is created!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
