<?php
$page_css = 'form';
require('partials/head.php');
require('partials/nav.php')
?>

<section class="form-page-section py-5">
    <div class="floating-elements"></div>
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Staff Login</h2>
        </div>

        <!-- Login Card -->
        <div class="mx-auto form-card" style="max-width: 600px;">
            <form id="loginForm" action="/signature-cuisine/controllers/login.php" method="POST">
                <div class="row g-4 mb-3">
                    <div class="col-12">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input type="email" class="form-control<?= isset($errors['email']) ? ' is-invalid' : '' ?>" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" />
                        <?php if (isset($errors['email'])) : ?>
                            <p class="invalid-feedback d-block"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <input type="password" class="form-control<?= isset($errors['password']) ? ' is-invalid' : '' ?>" id="password" name="password" />
                        <?php if (isset($errors['password'])) : ?>
                            <p class="invalid-feedback d-block"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </div>
            </form>
        </div>

        <!-- Login error alert -->
        <?php if (isset($errors['failed'])) : ?>
            <div class="position-fixed bottom-0 end-0 px-4" style="z-index: 1050;">
                <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                    <strong class="px-4"><?= $errors['failed'] ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require('partials/footer.php') ?>
