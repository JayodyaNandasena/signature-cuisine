<?php
$page_css = 'details';
require(__DIR__ . '\..\partials\head.php');
require(__DIR__ . '\..\partials\nav.php')
?>

<div class="container py-5 details-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="accent">Our Menu</h2>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#reservationModal">
            <i class="fas fa-plus me-2"></i>New Item
        </button>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs mb-4" id="menuTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                    role="tab">All
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="mains-tab" data-bs-toggle="tab" data-bs-target="#mains" type="button"
                    role="tab">Mains
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="desserts-tab" data-bs-toggle="tab" data-bs-target="#desserts" type="button"
                    role="tab">Desserts
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="beverages-tab" data-bs-toggle="tab" data-bs-target="#beverages" type="button"
                    role="tab">Beverages
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="menuTabsContent">
        <!-- All Items Tab -->
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            <div class="table-responsive">
                <?php if (!empty($all)): ?>
                    <table class="table table-dark table-hover text-center">
                        <thead class="text-light">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price (LKR)</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($all as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['category']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td><i class="fas fa-trash-alt text-white" role="button" title="Delete"
                                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"></i></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No menu items found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mains Tab -->
        <div class="tab-pane fade" id="mains" role="tabpanel">
            <div class="table-responsive">
                <?php if (!empty($mains)): ?>
                    <table class="table table-dark table-hover text-center">
                        <thead class="text-light">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price (LKR)</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($mains as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td><i class="fas fa-trash-alt text-white" role="button" title="Delete"
                                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"></i></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No main courses found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Desserts Tab -->
        <div class="tab-pane fade" id="desserts" role="tabpanel">
            <div class="table-responsive">
                <?php if (!empty($desserts)): ?>
                    <table class="table table-dark table-hover text-center">
                        <thead class="text-light">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price (LKR)</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($desserts as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td><i class="fas fa-trash-alt text-white" role="button" title="Delete"
                                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"></i></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No desserts found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Beverages Tab -->
        <div class="tab-pane fade" id="beverages" role="tabpanel">
            <div class="table-responsive">
                <?php if (!empty($beverages)): ?>
                    <table class="table table-dark table-hover text-center">
                        <thead class="text-light">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price (LKR)</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($beverages as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['id']) ?></td>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td><?= htmlspecialchars($item['price']) ?></td>
                                <td><i class="fas fa-trash-alt text-white" role="button" title="Delete"
                                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"></i></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No Beverages found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h3 class="modal-title text-danger" id="confirmDeleteLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this menu item?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Item Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header px-4">
                <h3 class="modal-title accent" id="reservationModalLabel">
                    <i class="fas fa-receipt me-2"></i>Add New Menu Item
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pt-4 pb-2">
                <form id="reservationForm" action="" method="post">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label for="itemName" class="form-label">
                                <i class="fas fa-utensils me-2"></i>Name
                            </label>
                            <input type="text" class="form-control" id="itemName" name="item_name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="category" class="form-label">
                                <i class="fas fa-tags me-2"></i>Category
                            </label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="main" selected>Main Course</option>
                                <option value="dessert">Dessert</option>
                                <option value="beverage">Beverage</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="price" class="form-label">
                                <i class="fas fa-money-bill-wave me-2"></i>Price (LKR)
                            </label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-check me-2"></i>Confirm
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 px-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<script src="/signature-cuisine/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/signature-cuisine/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="/signature-cuisine/assets/js/wow/wow.min.js"></script>
<script src="/signature-cuisine/assets/js/main.js"></script>
</body>
</html>
