<?php 
$page_css = 'reservation';
include 'head.php'; 
?>

<section class="reservation-section py-5">
    <div class="floating-elements"></div>
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Staff Login</h2>
        </div>

        <!-- Login Card -->
        <div class="mx-auto reservation-card" style="max-width: 600px;">
            <form id="loginForm" action="" method="post">
                <div class="row g-4 mb-3">
                    <div class="col-12">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" required/>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required/>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
