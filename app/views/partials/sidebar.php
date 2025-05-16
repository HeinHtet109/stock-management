<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link">
        <img src="<?= base_url('assets/img/stock-logo.jpg'); ?>" alt="Stock Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Stock Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="javascript:void(0)" class="d-block"><?= $_SESSION['user']['name'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                    <li class="nav-item">
                        <a href="<?= base_url("admin/dashboard") ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("admin/products") ?>" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Product Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("admin/users") ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("admin/transactions") ?>" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Transactions
                            </p>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= base_url("dashboard") ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("product-list") ?>" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Product List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url("transactions") ?>" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                My Transactions
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>