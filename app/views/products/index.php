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
                                <li class="breadcrumb-item active">Product Management</li>
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
                                        <h3 class="card-title">Product List</h3>
                                        <a class="btn btn-primary" href="<?= base_url('admin/products/create') ?>">
                                            <i class="fas fa-plus mr-2"></i>Add New
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="dataTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Available Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $key => $product): ?>
                                                <tr>
                                                    <td><?= $key+1 ?></td>
                                                    <td><?= htmlspecialchars($product['name']) ?></td>
                                                    <td><?= number_format($product['price'], 2) ?></td>
                                                    <td><?= $product['quantity_available'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/products/detail') . "?id=" . $product['id'] ?>" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i></a>
                                                        <a href="<?= base_url('admin/products/edit') . "?id=" . $product['id'] ?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('admin/products/delete') . "?id=" . $product['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
    <script>
        $('#dataTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
</body>

</html>