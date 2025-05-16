<?php

require_once __DIR__ . '/../core/Controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
            require_once __DIR__ . '/../controllers/ErrorController.php';
            $err = new ErrorController();
            $err->error403();
            exit;
        }
    }

    public function index()
    {
        $productModel = $this->model('Product');
        $transactionModel = $this->model('Transaction');
        $productCount = $productModel->getCount();
        $transactionCount = $transactionModel->getCountbyUser($_SESSION['user']['id']);
        $this->view('layouts/user_layout', ['productCount' => $productCount, 'transactionCount' => $transactionCount]);
    }

    public function productList() {
        $productModel = $this->model('Product');
        $products = $productModel->getAll();
        $this->view('products/user-product-list', ['products' => $products]);
    }
}
