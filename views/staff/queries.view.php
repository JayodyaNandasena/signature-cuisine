<?php
$page_css = 'details';
require('../partials/layout.php')
?>

<div class="container py-5 details-section">
    <h2 class="mb-4 accent">Manage Queries</h2>

    <div class="table-responsive">
        <?php if (!empty($queries)): ?>
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
                <?php foreach ($queries as $query): ?>
                    <tr
                            data-bs-toggle="modal"
                            data-bs-target="#queryModal"
                            onclick="loadQueryDetails(this)"
                            data-id="<?= htmlspecialchars($query['id']) ?>"
                    >
                        <td><?= htmlspecialchars($query['id']) ?></td>
                        <td><?= htmlspecialchars($query['date']) ?></td>
                        <td><?= htmlspecialchars($query['senderName']) ?></td>
                        <td><?= htmlspecialchars($query['subject']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No queries found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg border-0" style="background-color: #2c2c2c; color: #fff;">

            <!-- Header -->
            <div class="modal-header border-bottom border-accent px-4 py-3">
                <h3 class="modal-title accent fw-semibold mb-0" id="queryModalLabel">
                    <i class="fas fa-receipt me-2"></i>Query Overview
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body px-4 pt-4 pb-3">

                <!-- Query Details -->
                <div class="mb-4 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-3">Query Details</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 45px;">ID:</div>
                                <div><span id="r-id"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 45px;">Date:</div>
                                <div><span id="r-date"></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sender Information -->
                <div class="mb-4 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-3">Sender Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 45px;">Name:</div>
                                <div><span id="r-name"></span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="me-2 fw-semibold" style="min-width: 45px;">Email:</div>
                                <div><span id="r-email"></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Query Content -->
                <div class="mb-4 p-4 rounded-3" style="background-color: #1f1f1f;">
                    <h5 class="accent mb-3">Query</h5>
                    <div class="mb-3">
                        <div class="fw-semibold mb-1">Subject:</div>
                        <p class="mb-0" id="r-heading"></p>
                    </div>
                    <div>
                        <div class="fw-semibold mb-1">Message:</div>
                        <p class="mb-0" id="r-message"></p>
                    </div>
                </div>

                <!-- Reply Box -->
                <form action="/signature-cuisine/controllers/queries/reply.php" method="POST">
                    <div class="mb-3 p-4 rounded-3" style="background-color: #1f1f1f;">
                        <h5 class="accent mb-3">Your Reply</h5>
                        <input type="hidden" name="id" id="q-id-hidden">
                        <textarea
                                class="form-control mb-3"
                                name="reply"
                                id="replyMessage"
                                rows="4"
                                placeholder="Type your reply here..."
                                required></textarea>
                        <div class="text-end">
                            <button type="submit" class="btn btn-accent px-4">
                                <i class="fas fa-paper-plane me-2"></i>Send Reply
                            </button>
                        </div>
                    </div>
                </form>
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
    function loadQueryDetails(row) {
        const queryId = row.getAttribute('data-id');

        fetch(`/signature-cuisine/controllers/api/getQueryDetails.php?id=${queryId}`)
            .then(response => response.json())
            .then(data => {
                // Populate modal with the query data
                document.getElementById("r-id").innerText = data.id;
                document.getElementById("q-id-hidden").value = data.id;
                document.getElementById("r-date").innerText = data.date;
                document.getElementById("r-name").innerText = data.senderName;
                document.getElementById("r-email").innerText = data.email;
                document.getElementById("r-heading").innerText = data.subject;
                document.getElementById("r-message").innerText = data.message;
            })
            .catch(error => {
                console.error("Failed to load query details:", error);
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
