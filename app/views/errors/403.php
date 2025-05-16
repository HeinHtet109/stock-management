<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/../partials/head.php'; ?>

<body>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 403</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Forbidden.</h3>

                <p>
                    Access to this resource on the server is denied!
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