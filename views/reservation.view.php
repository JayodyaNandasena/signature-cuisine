<?php
$page_css = 'form';
require('partials/layout.php')
?>

<section class="form-page-section reservation-form-section py-5">
    <div class="floating-elements"></div>
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <h2>Reserve Your Table</h2>
        </div>

        <!-- Reservation Card -->
        <div class="mx-auto form-card" style="max-width: 900px;">
            <form id="reservationForm" method="POST">
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
                            <select class="form-select" id="restaurant" name="restaurant">
                                <option selected value="1">Peradeniya Branch</option>
                                <option value="2">Kandy Branch</option>
                                <option value="3">Colombo Branch</option>
                                <option value="4">Kurunegala Branch</option>
                            </select>
                            <div class="invalid-feedback d-block text-danger" id="restaurantError"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="guestCount">
                                <i class="fas fa-users me-2"></i>Party Size
                            </label>
                            <select class="form-select" id="guestCount" name="guestCount" >
                                <option value="1">1 Guest</option>
                                <option selected value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                                <option value="6">6 Guests</option>
                                <option value="7">7 Guests</option>
                                <option value="8">8+ Guests</option>
                            </select>
                            <div class="invalid-feedback d-block text-danger" id="guestCountError"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="date">
                                <i class="fas fa-calendar-alt me-2"></i>Preferred Date
                            </label>
                            <div class="date-input-wrapper">
                                <input class="form-control" id="date" name="date" type="date" required/>
                                <i class="fas fa-calendar-alt date-icon"></i>
                            </div>
                            <div class="invalid-feedback d-block text-danger" id="dateError"></div>
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
                            <input id="slot1" name="time" type="radio" value="19:30" checked>
                            <label for="slot1">7:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot2" name="time" type="radio" value="20:00">
                            <label for="slot2">8:00 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot3" name="time" type="radio" value="20:30">
                            <label for="slot3">8:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot4" name="time" type="radio" value="21:00">
                            <label for="slot4">9:00 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot5" name="time" type="radio" value="21:30">
                            <label for="slot5">9:30 PM</label>
                        </div>
                        <div class="time-slot">
                            <input id="slot6" name="time" type="radio" value="22:00">
                            <label for="slot6">10:00 PM</label>
                        </div>
                    </div>
                    <div class="invalid-feedback d-block text-danger" id="timeError"></div>
                </div>

                <!-- Contact Information -->
                <div class="form-section">
                    <div class="category-header">
                        <i class="fas fa-user"></i>
                        <h5>Your Information</h5>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="firstName">
                                <i class="fas fa-user me-2"></i>First Name
                            </label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required/>
                            <div class="invalid-feedback d-block text-danger" id="firstNameError"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="lastName">
                                <i class="fas fa-user me-2"></i>Last Name
                            </label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required/>
                            <div class="invalid-feedback d-block text-danger" id="lastNameError"></div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label" for="email">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required/>
                            <div class="invalid-feedback d-block text-danger" id="emailError"></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone">
                                <i class="fas fa-phone me-2"></i>Phone Number
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" required/>
                            <div class="invalid-feedback d-block text-danger" id="phoneError"></div>
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
                        <label class="form-label" for="notes">
                            <i class="fas fa-comment me-2"></i>Additional Notes
                        </label>
                        <textarea class="form-control" id="notes" name="notes" placeholder="Anniversary celebration, dietary restrictions, preferred seating, etc."
                                  rows="4"></textarea>
                        <div class="invalid-feedback d-block text-danger" id="notesError"></div>
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

    <div id="reservationAlert" class="position-fixed bottom-0 end-0 px-4 mx-5 alert"></div>

</section>

<?php
$page_js = 'reservation';
require('partials/footer.php')
?>
