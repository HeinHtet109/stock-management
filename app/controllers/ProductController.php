<?php

require_once __DIR__ . '/../core/Controller.php';

class ProductController extends Controller
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
        $products = $productModel->getAll();
        $this->view('products/index', ['products' => $products]);
    }

    public function create()
    {
        $this->view('products/create');
    }

    public function store()
    {        
        $isValid = true;

        if(!$_POST['name']) {
            $error = "Product Name is required.";
            $isValid = false;
        }

        if(!$_POST['price']) {
            $error = "Product price is required.";
            $isValid = false;
        }

        if($_POST['price'] <= 0) {
            $error = "Product price is invalid.";
            $isValid = false;
        }

        if(!$_POST['quantity']) {
            $error = "Product quantity is required.";
            $isValid = false;
        }

        if($_POST['quantity'] <= 0) {
            $error = "Product quantity is invalid.";
            $isValid = false;
        }

        if($isValid) {
            $productModel = $this->model('Product');

            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];
    
            $productModel->create($data);
            header('Location: ' . base_url('admin/products'));
        }else {
            $this->view('products/create', ['error' => $error ?? null]);
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            return header("Location: /products");
        }

        $productModel = $this->model('Product');
        $product = $productModel->find($id);
        $this->view('products/edit', ['product' => $product]);
    }

    public function update()
    {
        $isValid = true;

        if(!$_POST['name']) {
            $error = "Product Name is required.";
            $isValid = false;
        }

        if(!$_POST['price']) {
            $error = "Product price is required.";
            $isValid = false;
        }

        if($_POST['price'] <= 0) {
            $error = "Product price is invalid.";
            $isValid = false;
        }

        if(!$_POST['quantity']) {
            $error = "Product quantity is required.";
            $isValid = false;
        }

        if($_POST['quantity'] <= 0) {
            $error = "Product quantity is invalid.";
            $isValid = false;
        }

        if($isValid) {
            $id = $_POST['id'];        
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];
    
            $productModel = $this->model('Product');
            $productModel->update($id, $data);
            header('Location: ' . base_url('admin/products'));
        }else{
            $this->view('products/edit', ['error' => $error ?? null]);
        }
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        
        if($id) {
            $productModel = $this->model('Product');
            $product = $productModel->find($id);
            $this->view('products/view', ['product' => $product]);
        }else{
            require_once __DIR__ . '/../controllers/ErrorController.php';
            $err = new ErrorController();
            $err->error404();
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = $this->model('Product');
            $productModel->delete($id);
        }
        header('Location: ' . base_url('admin/products'));
    }
}
