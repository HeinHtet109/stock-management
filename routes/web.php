<?php

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/TransactionController.php';

// Authentication Routes
$router->get('/', function () {
    (new AuthController())->login();
});
$router->post('/login', function () {
    (new AuthController())->login();
});
$router->get('/logout', function () {
    (new AuthController())->logout();
});
$router->get('/register', function () {
    (new AuthController())->register();
});
$router->post('/register', function () {
    (new AuthController())->register();
});

// Admin Dashboard Route
$router->get('/admin/dashboard', function () {
    (new AdminController())->index();
});

// Admin Product Routes
$router->get('/admin/products', function() {
    (new ProductController())->index();
});

$router->get('/admin/products/create', function() {
    (new ProductController())->create();
});

$router->post('/admin/products/store', function() {
    (new ProductController())->store();
});

$router->get('/admin/products/edit', function() {
    (new ProductController())->edit();
});

$router->post('/admin/products/update', function() {
    (new ProductController())->update();
});

$router->get('/admin/products/detail', function() {
    (new ProductController())->detail();
});

$router->get('/admin/products/delete', function() {
    (new ProductController())->delete();
});

// Admin user routes
$router->get('/admin/users', function() {
    (new AdminController())->users();
});

// Admin transaction routes
$router->get('/admin/transactions', function() {
    (new AdminController())->transactions();
});

// User Routes
$router->get('/dashboard', function() {
    (new UserController())->index();
});
$router->get('/product-list', function() {
    (new UserController())->productList();
});

// User purchases
$router->get('/transactions', function() {
    (new TransactionController())->index();
});
$router->get('/transactions/create', function() {
    (new TransactionController())->create();
});
$router->post('/transactions/store', function() {
    (new TransactionController())->store();
});