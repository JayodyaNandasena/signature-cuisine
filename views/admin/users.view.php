<?php
$page_css = 'details';
require(__DIR__ .'\..\partials\head.php');
require(__DIR__ .'\..\partials\nav.php')
?>

<div class="container py-5 details-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="accent">
            User Management
        </h2>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#reservationModal">
            <i class="fas fa-plus me-2"></i>New User
        </button>
    </div>

    <div class="table-responsive">
        <?php if (!empty($users)): ?>
            <table class="table table-dark table-hover text-center">
                <thead class="text-light">
                <tr>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Branch</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody id="reservationTable">
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['firstName']. ' ' . $user['lastName']?></td>
                            <td><?= $user['mobile'] ?></td>
                            <td><?= $user['branchName'] ?></td>
                            <td>
                                <i class="fas fa-trash-alt text-white"
                                   role="button"
                                   title="Delete"
                                   data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                </i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
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
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Add New User Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header px-4">
                <h3 class="modal-title accent" id="reservationModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 pt-4 pb-2">
                <form id="reservationForm" action="" method="post">
                    <!-- Staff Details -->
                    <div class="form-section mb-4">
                        <h5 class="mb-3">Staff Details</h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="fName" class="form-label">
                                    <i class="fas fa-user me-2"></i>First Name
                                </label>
                                <input type="text" class="form-control" id="fName" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lName" class="form-label">
                                    <i class="fas fa-user me-2"></i>Last Name
                                </label>
                                <input type="text" class="form-control" id="lName" name="last_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="branch" class="form-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>Branch
                                </label>
                                <select class="form-select" id="branch" name="branch" required>
                                    <option value="peradeniya" selected>Peradeniya</option>
                                    <option value="kandy">Kandy</option>
                                    <option value="colombo">Colombo</option>
                                    <option value="kurunegala">Kurunegala</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone me-2"></i>Phone Number
                                </label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                    </div>

                    <!-- Account Details -->
                    <div class="form-section">
                        <h5 class="mb-3">Account Details</h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="submit-btn btn btn-accent px-4">
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
