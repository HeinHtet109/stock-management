<?php

class TransactionController extends Controller
{
    public function index()
    {
        $user = $_SESSION['user'];
        $transactionModel = $this->model('Transaction');
        $transactions = $transactionModel->getAllByUser($user['id']);
        $this->view('transactions/user-index', ['transactions' => $transactions]);
    }

    public function create()
    {
        $user_id = $_SESSION['user']['id'];
        $product_id = $_GET['p_id'] ?? null;
        $productModel = $this->model('Product');
        $product = $productModel->find($product_id);
        $this->view('transactions/user-create', ['product' => $product, 'user_id' => $user_id]);
    }

    public function store()
    {
        $productId = $_POST['product_id'];
        $quantity = (int) $_POST['quantity'];
        $userId = $_SESSION['user']['id'] ?? null;

        if(!$quantity || $quantity <= 0) {
            $_SESSION['error'] = "Invalid purchase: please check your quantity.";
            header('Location: '. base_url('/transactions/create') . '?p_id=' . $productId);
            exit;
        }

        $productModel = $this->model('Product');
        $product = $productModel->find($productId);

        if(!$product) {
            $_SESSION['error'] = "Invalid purchase: product not found.";
            header('Location: '. base_url('/transactions/create') . '?p_id=' . $productId);
            exit;
        }

        if ($product['quantity_available'] < $quantity) {
            $_SESSION['error'] = "Invalid purchase: insufficient stock.";
            header('Location: '. base_url('/transactions/create') . '?p_id=' . $productId);
            exit;
        }

        // Calculate total price
        $total = $product['price'] * $quantity;

        // Create transaction
        $transactionModel = $this->model('Transaction');
        $transactionModel->create([
            'user_id'     => $userId,
            'product_id'  => $productId,
            'quantity'    => $quantity,
            'total_price' => $total
        ]);

        // Update product stock
        $newQuantity = $product['quantity_available'] - $quantity;
        $productModel->update($productId,[            
            'name'     => $product['name'],
            'price'    => $product['price'],
            'quantity' => $newQuantity
        ]);

        header('Location: '. base_url('/transactions'));
    }
}
