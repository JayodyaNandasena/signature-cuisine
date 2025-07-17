<header id="home" class="navbar-fixed-top">
    <div class="main_menu_bg">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-custom">
                    <div class="container-fluid">
                        <!-- Toggler button for mobile -->
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Collapsible navbar content -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <!-- Public links -->
                                <li class="nav-item">
                                    <a class="nav-link" href="/signature-cuisine/controllers/home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#abouts">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#menu">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact Us</a>
                                </li>
                                <!-- Admin only -->
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/menu.php">Manage
                                            Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/users.php">Manage
                                            Users</a>
                                    </li>
                                <?php endif; ?>
                                <!-- Staff and Admin only -->
                                <?php if (isset($_SESSION['role'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/reservations.php">Manage
                                            Reservations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/queries.php">Manage
                                            Queries</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/logout.php">Logout</a>
                                    </li>
                                <?php endif; ?>
                                <!-- Guest only -->
                                <?php if (!isset($_SESSION['role'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/signature-cuisine/controllers/login.php">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link booking" href="/signature-cuisine/controllers/reservation.php">Reservations</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
