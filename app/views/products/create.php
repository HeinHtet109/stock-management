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
                            <h1>Product Management</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('/admin/products') ?>">Product List</a></li>
                                <li class="breadcrumb-item active">Create</li>
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
                                        <h3 class="card-title">Entry Form</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('admin/products/store'); ?>" method="POST" id="productForm" novalidate>
                                        <div class="card-body">
                                            <?php if (!empty($error)): ?>
                                                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                                            <?php endif; ?>
                                            
                                            <div class="form-group">
                                                <label for="productNameInput">Product Name</label>
                                                <input type="text" name="name" class="form-control" id="productNameInput" placeholder="Enter product name">
                                                <div class="text-danger small" id="nameError"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="priceInput">Price</label>
                                                <input type="number" name="price" step="0.01" min="0" class="form-control" id="priceInput" placeholder="Enter price">
                                                <div class="text-danger small" id="priceError"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="qtyInput">Quantity</label>
                                                <input type="number" name="quantity" min="0" class="form-control" id="qtyInput" placeholder="Enter quantity">
                                                <div class="text-danger small" id="qtyError"></div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary">Create Product</button>
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