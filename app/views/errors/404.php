<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/../partials/head.php'; ?>

<body>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="<?= base_url('/') ?>">return to home page.</a> 
                </p>                
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>

    <?php require_once __DIR__ . '/../partials/script.php'; ?>
</body>

</html>