<?php require_once __DIR__ . '/../../helpers/url_helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../partials/head.php'; ?>

<body>
    <main class="register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <h3>Stock Management Portal</h3>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('register'); ?>" method="post" id="registerForm" novalidate>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small" id="nameError"></div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small" id="emailError"></div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small" id="passwordError"></div>
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <div class="input-group">
                                <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger small" id="passwordConfirmError"></div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>

                    <p class="mb-0 mt-3 d-flex justify-content-center">
                        <a href="<?= base_url('/') ?>" class="text-center">I already have a membership</a>
                    </p>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->
    </main>

    <?php require_once __DIR__ . '/../partials/script.php'; ?>
    <script src="<?= base_url('assets/js/auth-script.js') ?>"></script>
</body>

</html>