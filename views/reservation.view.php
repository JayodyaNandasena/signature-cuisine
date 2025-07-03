<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Restaurant Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/animate/animate.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">
    <link href="../assets/css/partials/nav.css" rel="stylesheet">
    <link href="../assets/css/partials/footer.css" rel="stylesheet">
    <link href="../assets/css/reservation.css" rel="stylesheet">
</head>
<body>
<section class="reservation-section py-5">
    <div class="floating-elements"></div>
    <div class="container">
        <!-- Enhanced Section Header -->
        <div class="section-header">
            <h2>Reserve Your Table</h2>
        </div>

        <!-- Reservation Card -->
        <div class="mx-auto reservation-card" style="max-width: 900px;">
            <form action="" id="reservationForm" method="post">
                <!-- Reservation Details -->
                <div class="form-section">
                    <div class="category-header">
                        <i class="fas fa-utensils"></i>
                        <h5>Reservation Details</h5>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label" for="restaurant">
                                <i class="fas fa-map-marker-alt me-2"></i>Restaurant Location
                            </label>
                            <select class="form-select" id="restaurant" name="restaurant" required>
                                <option selected value="Peradeniya">Peradeniya Branch</option>
                                <option value="Kandy">Kandy Branch</option>
                                <option value="Colombo">Colombo Branch</option>
                                <option value="Kurunegala">Kurunegala Branch</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="guests">
                                <i class="fas fa-users me-2"></i>Party Size
                            </label>
                            <select class="form-select" id="guests" name="guests" required>
                                <option value="1">1 Guest</option>
                                <option selected value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                                <option value="6">6 Guests</option>
                                <option value="7">7 Guests</option>
                                <option value="8">8+ Guests</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="date">
                                <i class="fas fa-calendar-alt me-2"></i>Preferred Date
                            </label>
                            <input class="form-control" id="date" name="date" required type="date">
                        </div>
                    </div>
                </div>

                <!-- Time Selection -->
                <div class="form-section">
                    <div class="category-header">
                        <i class="fas fa-clock"></i>
                        <h5>Select Your Time</h5>
                    </div>
                    <div class="time-slots">
                        <div class="time-slot">
                            <input id="slot1" name="start_time" required type="radio" value="19:30">
                            <label for="slot1">7:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot2" name="start_time" type="radio" value="20:00">
                            <label for="slot2">8:00 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot3" name="start_time" type="radio" value="20:30">
                            <label for="slot3">8:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot4" name="start_time" type="radio" value="21:00">
                            <label for="slot4">9:00 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot5" name="start_time" type="radio" value="21:30">
                            <label for="slot5">9:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot6" name="start_time" type="radio" value="22:00">
                            <label for="slot6">10:00 PM</label>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="form-section">
                    <div class="category-header">
                        <i class="fas fa-user"></i>
                        <h5>Your Information</h5>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="fname">
                                <i class="fas fa-user me-2"></i>First Name
                            </label>
                            <input class="form-control" id="fname" name="first_name" required type="text">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="lname">
                                <i class="fas fa-user me-2"></i>Last Name
                            </label>
                            <input class="form-control" id="lname" name="last_name" required type="text">
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label" for="email">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input class="form-control" id="email" name="email" required type="email">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone">
                                <i class="fas fa-phone me-2"></i>Phone Number
                            </label>
                            <input class="form-control" id="phone" name="phone" required type="tel">
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div class="form-section">
                    <div class="category-header">
                        <i class="fas fa-heart"></i>
                        <h5>Special Requests</h5>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="requests">
                            <i class="fas fa-comment me-2"></i>Additional Notes
                        </label>
                        <textarea class="form-control" id="requests" name="special_requests" placeholder="Anniversary celebration, dietary restrictions, preferred seating, etc."
                                  rows="4"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button class="submit-btn" type="submit">
                        <i class="fas fa-check me-2"></i>Confirm Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Set minimum date to today
    document.getElementById('date').min = new Date().toISOString().split('T')[0];

    // Add smooth animations to form fields
    document.querySelectorAll('.form-control, .form-select').forEach(field => {
        field.addEventListener('focus', function () {
            this.style.transform = 'translateY(-2px)';
        });

        field.addEventListener('blur', function () {
            this.style.transform = 'translateY(0)';
        });
    });

    // Form validation
    function validateForm() {
        const requiredFields = document.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#dc3545';
                field.focus();
                isValid = false;

                setTimeout(() => {
                    field.style.borderColor = '';
                }, 3000);
            } else {
                field.style.borderColor = '#28a745';
                setTimeout(() => {
                    field.style.borderColor = '';
                }, 2000);
            }
        });

        return isValid;
    }

    // Form submission
    document.getElementById('reservationForm').addEventListener('submit', function (e) {
        e.preventDefault();

        if (!validateForm()) {
            return;
        }

        // Show loading state
        const submitBtn = document.querySelector('.submit-btn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
        submitBtn.disabled = true;

        // Simulate form submission (replace with actual form submission logic)
        setTimeout(() => {
            // Success animation
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Reservation Confirmed!';
            submitBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';

            setTimeout(() => {
                alert('Reservation submitted successfully! You will receive a confirmation email shortly.');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
            }, 1000);
        }, 2000);
    });

    // Real-time validation feedback
    document.querySelectorAll('[required]').forEach(field => {
        field.addEventListener('blur', function () {
            if (this.value.trim()) {
                this.style.borderColor = '#28a745';
                setTimeout(() => {
                    this.style.borderColor = '';
                }, 2000);
            }
        });
    });
</script>
</body>
</html>