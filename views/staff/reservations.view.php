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
                        <tr
                            data-bs-toggle="modal"
                            data-bs-target="#reservationModal"
                            onclick="loadReservationDetails(this)"
                            data-id="<?= $reservation['id'] ?>"
                        >
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
        <div class="modal-content rounded-4 shadow-lg border-0" style="background-color: #2c2c2c; color: #fff;">
            <!-- Header -->
            <div class="modal-header border-bottom border-accent px-4 py-3">
                <h3 class="modal-title accent fw-semibold mb-0" id="reservationModalLabel">
                    <i class="fas fa-receipt me-2"></i>Reservation Overview
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body px-4 pt-4 pb-3">
                <!-- Reservation Details -->
                <div class="mb-4 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-3">Reservation Details</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">ID:</div>
                                <div><span id="r-id"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Restaurant:</div>
                                <div><span id="r-restaurant"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Date:</div>
                                <div><span id="r-date"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Time:</div>
                                <div><span id="r-time"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Party Size:</div>
                                <div><span id="r-guests"></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="mb-4 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-3">Customer Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">First Name:</div>
                                <div><span id="r-fname"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Last Name:</div>
                                <div><span id="r-lname"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Email:</div>
                                <div><span id="r-email"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 90px;">Phone:</div>
                                <div><span id="r-phone"></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div class="mb-3 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-2">Special Requests</h5>
                    <p id="r-requests" class="mb-0"></p>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-top border-accent py-3">
                <button type="button" class="btn btn-accent px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>


<script>
function loadReservationDetails(row) {
    const reservationId = row.getAttribute('data-id');

    fetch(`/signature-cuisine/controllers/api/getReservationDetails.php?id=${reservationId}`)
        .then(response => response.json())
        .then(data => {
            // Populate modal with the reservation data
            document.getElementById("r-id").innerText = data.id;
            document.getElementById("r-restaurant").innerText = data.branchName;
            document.getElementById("r-guests").innerText = data.guestCount;
            document.getElementById("r-date").innerText = data.date;
            document.getElementById("r-time").innerText = data.time;
            document.getElementById("r-fname").innerText = data.firstName;
            document.getElementById("r-lname").innerText = data.lastName;
            document.getElementById("r-email").innerText = data.email;
            document.getElementById("r-phone").innerText = data.phone;
            document.getElementById("r-requests").innerText = data.notes || "-";
        })
        .catch(error => {
            console.error("Failed to load reservation details:", error);
        });
}
</script>

<script src="/signature-cuisine/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/signature-cuisine/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="/signature-cuisine/assets/js/wow/wow.min.js"></script>
<script src="/signature-cuisine/assets/js/main.js"></script>
</body>
</html>
