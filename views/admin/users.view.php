<?php
$page_css = 'details';
require(__DIR__ . '\..\partials\head.php');
require(__DIR__ . '\..\partials\nav.php');
?>

<div class="container py-5 details-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="accent">
            User Management
        </h2>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#staffModal">
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
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) ?></td>
                        <td><?= htmlspecialchars($user['mobile']) ?></td>
                        <td><?= htmlspecialchars($user['branchName']) ?></td>
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
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header px-4">
                <h3 class="modal-title accent" id="staffModalLabel">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body px-4 pt-4 pb-2">
                <form id="staffForm" method="POST">
                    <!-- Staff Details -->
                    <div class="form-section mb-4">
                        <h5 class="mb-3">Staff Details</h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">
                                    <i class="fas fa-user me-2"></i>First Name
                                </label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                                <div class="invalid-feedback d-block text-danger" id="firstNameError"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">
                                    <i class="fas fa-user me-2"></i>Last Name
                                </label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                                <div class="invalid-feedback d-block text-danger" id="lastNameError"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="branch" class="form-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>Branch
                                </label>
                                <select class="form-select" id="branch" name="branch">
                                    <option value="1" selected>Peradeniya</option>
                                    <option value="2">Kandy</option>
                                    <option value="3">Colombo</option>
                                    <option value="4">Kurunegala</option>
                                </select>
                                <div class="invalid-feedback d-block text-danger" id="branchError"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="mobile" class="form-label">
                                    <i class="fas fa-phone me-2"></i>Mobile Number
                                </label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" required>
                                <div class="invalid-feedback d-block text-danger" id="mobileError"></div>
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
                                <div class="invalid-feedback d-block text-danger" id="emailError"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback d-block text-danger" id="passwordError"></div>
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

<div id="newStaffAlert" class="position-fixed bottom-0 end-0 px-4 mx-5 alert"></div>

<script src="/signature-cuisine/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/signature-cuisine/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="/signature-cuisine/assets/js/wow/wow.min.js"></script>
<script src="/signature-cuisine/assets/js/main.js"></script>

<script>
    document.getElementById('staffForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        // Clear previous errors
        ['firstName', 'lastName', 'mobile', 'branch', 'email', 'password'].forEach(id => {
            document.getElementById(id + 'Error').textContent = '';
            document.getElementById(id).classList.remove('is-invalid');
        });
        document.getElementById('newStaffAlert').innerHTML = '';

        try {
            const response = await fetch('/signature-cuisine/controllers/api/createStaff.php', {
                method: 'POST',
                body: formData
            });

            if (response.status === 409) {
                // Handle conflict
                document.getElementById('email').classList.add('is-invalid');
                document.getElementById('emailError').textContent = 'Email is already used';
                return;
            }

            // Status OK
            const result = await response.json();

            if (result.success) {
                document.getElementById('newStaffAlert').innerHTML = `
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    ${result.message ?? 'New user item added successfully.'}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                form.reset(); // Clear the form
            } else if (result.errors) {
                for (const key in result.errors) {
                    const input = document.getElementById(key);
                    const errorDiv = document.getElementById(key + 'Error');
                    if (input && errorDiv) {
                        input.classList.add('is-invalid');
                        errorDiv.textContent = result.errors[key];
                    }
                }
            } else {
                throw new Error('Unexpected error');
            }
        } catch (err) {
            document.getElementById('newStaffAlert').innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                Something went wrong. Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;

            console.error(err);
        }
    });
</script>

</body>
</html>
