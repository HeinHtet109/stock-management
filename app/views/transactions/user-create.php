<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../partials/head.php'; ?>

<body>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('assets/img/stock-logo.jpg'); ?>" alt="StockLogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php require_once __DIR__ . '/../partials/nav.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('/product-list') ?>">Product List</a></li>
                                <li class="breadcrumb-item active">Purchase</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Purchase Product</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('transactions/store'); ?>" method="POST" id="purchaseForm" novalidate>
                                        <div class="card-body">
                                            <?php if (isset($_SESSION['error'])): ?>
                                                <div class="alert alert-danger"><?= $_SESSION['error'];
                                                                                unset($_SESSION['error']); ?></div>
                                            <?php endif; ?>
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                            <div class="form-group">
                                                <label for="productNameInput">Product Name</label>
                                                <input type="text" value="<?= $product['name'] ?>" disabled class="form-control" id="productNameInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="priceInput">Price</label>
                                                <input type="hidden" value="<?= $product['price'] ?>" id="productPrice">
                                                <input type="number" step="0.01" value="<?= $product['price'] ?>" disabled class="form-control" id="priceInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="avaliableQty">Avaliable Quantity</label>
                                                <input type="text" value="<?= $product['quantity_available'] ?>" disabled class="form-control" id="avaliableQty">
                                            </div>
                                            <div class="form-group">
                                                <label for="qtyInput">Quantity</label>
                                                <input type="number" name="quantity" value="1" min="1" class="form-control" id="qtyInput" placeholder="Enter quantity">
                                                <div class="text-danger small" id="qtyError"></div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary">Purchase</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

    <?php require_once __DIR__ . '/../partials/script.php'; ?>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>