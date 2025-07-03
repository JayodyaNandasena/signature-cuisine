<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="accent">
            Our Menu
        </h2>
        <button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#reservationModal">
            <i class="fas fa-plus me-2"></i>New Item
        </button>
    </div>

    <div class="table-responsive">
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
            <tbody id="reservationTable">
            <tr>
                <td>F12345</td>
                <td>Seafood Fried Rice</td>
                <td>Main</td>
                <td>1350</td>
                <td>
                    <i class="fas fa-trash-alt text-white"
                       role="button"
                       title="Delete"
                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    </i>
                </td>
            </tr>
            <tr>
                <td>F12346</td>
                <td>Brownies</td>
                <td>Dessert</td>
                <td>1150</td>
                <td>
                    <i class="fas fa-trash-alt text-white"
                       role="button"
                       title="Delete"
                       data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    </i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title text-danger" id="confirmDeleteLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-header">
                <h5 class="modal-title accent" id="reservationModalLabel">
                    <i class="fas fa-receipt me-2"></i>Add New Menu Item
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-accent px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>
