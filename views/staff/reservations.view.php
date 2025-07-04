<?php
$page_css = 'details';
require(__DIR__ .'\..\partials\head.php');
require(__DIR__ .'\..\partials\nav.php')
?>

<div class="container py-5 details-section">
    <h2 class="mb-4 accent">Manage Reservations</h2>

    <div class="table-responsive">
        <?php if (!empty($reservations)): ?>
            <table class="table table-dark table-hover text-center">
                <thead class="table-dark text-dark">
                    <tr>
                        <th scope="col">Reservation ID</th>
                        <th scope="col">Party Size</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Special Requests</th>
                    </tr>
                </thead>
                <tbody id="reservationTable">
                    <?php foreach ($reservations as $reservation): ?>
                        <tr data-bs-toggle="modal" data-bs-target="#reservationModal" onclick="loadReservationDetails(this)">
                            <td><?= $reservation['id'] ?></td>
                            <td><?= $reservation['guestCount'] ?></td>
                            <td><?= $reservation['date'] ?></td>
                            <td><?= date("g:i A", strtotime($reservation['time'])) ?></td>
                            <td>
                                <?php if (!empty($reservation['note'])): ?>
                                    <?= $reservation['note'] ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <!-- Hidden data for modal -->
                            <td hidden class="full-data">
                                {
                                "id": "R12345",
                                "restaurant": "Kandy Branch",
                                "guests": "2",
                                "date": "2025-06-20",
                                "time": "8:00 PM",
                                "firstName": "John",
                                "lastName": "Doe",
                                "email": "john@example.com",
                                "phone": "0771234567",
                                "requests": "Anniversary dinner"
                                }
                            </td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reservations found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg" style="background-color: #2c2c2c; color: #fff;">
            <div class="modal-header border-bottom border-accent">
                <h3 class="modal-title accent" id="reservationModalLabel">
                    <i class="fas fa-receipt me-2"></i>Reservation Overview
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pt-4 pb-2">

                <!-- Reservation Info Card -->
                <div class="mb-4 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-3">
                        Reservation Details
                    </h6>
                    <div class="row">
                        <div class="col-md-6"><p class="mb-1"><strong>ID:</strong> <span id="r-id"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Restaurant:</strong> <span
                                id="r-restaurant"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Date:</strong> <span id="r-date"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Time:</strong> <span id="r-time"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Party Size:</strong> <span id="r-guests"></span>
                        </p></div>
                    </div>
                </div>

                <!-- Customer Info Card -->
                <div class="mb-4 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-3">
                        Customer Information
                    </h6>
                    <div class="row">
                        <div class="col-md-6"><p class="mb-1"><strong>First Name:</strong> <span id="r-fname"></span>
                        </p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Last Name:</strong> <span id="r-lname"></span></p>
                        </div>
                        <div class="col-md-6"><p class="mb-1"><strong>Email:</strong> <span id="r-email"></span></p>
                        </div>
                        <div class="col-md-6"><p class="mb-1"><strong>Phone:</strong> <span id="r-phone"></span></p>
                        </div>
                    </div>
                </div>

                <!-- Special Requests Card -->
                <div class="mb-3 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-2">
                        Special Requests
                    </h6>
                    <p id="r-requests" class=""></p>
                </div>

            </div>
            <div class="modal-footer border-top border-accent">
                <button type="button" class="btn btn-accent px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function loadReservationDetails(row) {
        const data = JSON.parse(row.querySelector(".full-data").innerText);
        document.getElementById("r-id").innerText = data.id;
        document.getElementById("r-restaurant").innerText = data.restaurant;
        document.getElementById("r-guests").innerText = data.guests;
        document.getElementById("r-date").innerText = data.date;
        document.getElementById("r-time").innerText = data.time;
        document.getElementById("r-fname").innerText = data.firstName;
        document.getElementById("r-lname").innerText = data.lastName;
        document.getElementById("r-email").innerText = data.email;
        document.getElementById("r-phone").innerText = data.phone;
        document.getElementById("r-requests").innerText = data.requests;
    }
</script>

<script src="/signature-cuisine/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/signature-cuisine/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="/signature-cuisine/assets/js/wow/wow.min.js"></script>
<script src="/signature-cuisine/assets/js/main.js"></script>
</body>
</html>
