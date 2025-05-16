<?php require_once __DIR__ . '/../../helpers/url_helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../partials/head.php'; ?>

<body>
    <main class="login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <h3>Stock Management Portal</h3>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to your account.</p>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('/login'); ?>" method="post" id="loginForm" novalidate>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                <span class="input-group-text" id="basic-addon1">
                                    <span class="fas fa-envelope"></span>
                                </span>
                            </div>
                            <div class="text-danger small" id="emailError"></div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                                <div class="input-group-text" id="basic-addon2">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div class="text-danger small" id="passwordError"></div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </form>
                    
                    <p class="mb-0 mt-3 d-flex justify-content-center">
                        <a href="<?= base_url('register') ?>" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </main>

    <?php require_once __DIR__ . '/../partials/script.php'; ?>
    <script src="<?= base_url('assets/js/auth-script.js') ?>"></script>
</body>

</html>