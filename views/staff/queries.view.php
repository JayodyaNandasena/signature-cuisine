<div class="container py-5">
    <h2 class="mb-4 accent"><i class="fas fa-tasks me-2"></i>Manage Queries</h2>

    <div class="table-responsive">
        <table class="table table-dark table-hover text-center">
            <thead class="table-dark text-dark">
            <tr>
                <th scope="col">Query ID</th>
                <th scope="col">Date</th>
                <th scope="col">Sender</th>
                <th scope="col">Subject</th>
            </tr>
            </thead>
            <tbody id="reservationTable">
            <!-- Sample row -->
            <tr data-bs-toggle="modal" data-bs-target="#reservationModal" onclick="loadReservationDetails(this)">
                <td>Q12345</td>
                <td>2025-06-20</td>
                <td>John Doe</td>
                <td>Detailed Menu</td>
                <!-- Hidden data for modal -->
                <td hidden class="full-data">
                    {
                    "id": "Q12345",
                    "date": "2025-06-20",
                    "name": "John Doe",
                    "email": "john@example.com",
                    "heading": "Detailed Menu",
                    "message": "Detailed menu is needed with portion sizes"
                    }
                </td>
            </tr>
            <tr data-bs-toggle="modal" data-bs-target="#reservationModal" onclick="loadReservationDetails(this)">
                <td>Q12346</td>
                <td>2025-06-20</td>
                <td>John Doe</td>
                <td>Opening Hours</td>
                <!-- Hidden data for modal -->
                <td hidden class="full-data">
                    {
                    "id": "Q12345",
                    "date": "2025-06-21",
                    "name": "Jane Doe",
                    "email": "janeddoe@example.com",
                    "heading": "Opening Hours",
                    "message": "Detailed opening hour details is needed. Detailed opening hour details is needed. Detailed opening hour details is needed. Detailed opening hour details is needed. Detailed opening hour details is needed. Detailed opening hour details is needed."
                    }
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg" style="background-color: #2c2c2c; color: #fff;">
            <div class="modal-header border-bottom border-accent">
                <h5 class="modal-title accent" id="reservationModalLabel">
                    <i class="fas fa-receipt me-2"></i>Query Overview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pt-4 pb-2">

                <!-- Reservation Info Card -->
                <div class="mb-4 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-3">
                        Query Details
                    </h6>
                    <div class="row">
                        <div class="col-md-6"><p class="mb-1"><strong>ID:</strong> <span id="r-id"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Date:</strong> <span id="r-date"></span></p></div>
                    </div>
                </div>

                <!-- Sender Info Section -->
                <div class="mb-4 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-3">
                        Sender Information
                    </h6>
                    <div class="row">
                        <div class="col-md-6"><p class="mb-1"><strong>Name:</strong> <span id="r-name"></span></p></div>
                        <div class="col-md-6"><p class="mb-1"><strong>Email:</strong> <span id="r-email"></span></p>
                        </div>
                    </div>
                </div>

                <!-- Detailed Query Section -->
                <div class="mb-3 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-2">
                        Query
                    </h6>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-1"><strong>Subject:</strong></p>
                            <p id="r-heading"></p>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-1"><strong>Message:</strong></p>
                            <p id="r-message"></p>
                        </div>

                    </div>
                </div>

                <!-- Reply Section -->
                <div class="mb-3 p-3 rounded-3" style="background-color: #1f1f1f;">
                    <h6 class="accent mb-2">Your Reply</h6>
                    <div class="mb-3">
                        <textarea class="form-control" id="replyMessage" rows="4"
                                  placeholder="Type your reply here..."></textarea>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-accent px-4" onclick="sendReply()">
                            <i class="fas fa-paper-plane me-2"></i>Send Reply
                        </button>
                    </div>
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
        document.getElementById("r-date").innerText = data.date;
        document.getElementById("r-name").innerText = data.name;
        document.getElementById("r-email").innerText = data.email;
        document.getElementById("r-heading").innerText = data.heading;
        document.getElementById("r-message").innerText = data.message;
    }
</script>
</body>
</html>
