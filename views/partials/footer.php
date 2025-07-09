<section id="footer_widget" class="footer_widget">
    <div class="container">
        <div class="row footer_widget_content text-center">
            <div class="col-md-4">
                <div class="single_widget">
                    <h3>Take it easy with location</h3>

                    <div class="single_widget_info">
                        <p>
                            <span>Peradeniya</span>
                            <span>Kandy</span>
                            <span>Colombo</span>
                            <span>Kurunegala</span>
                            <span class="phone_email">Phone: +94 0 000 000</span>
                            <span>Email: support@signaturecuisine.com</span>
                        </p>
                    </div>

                    <div class="footer_socail_icon">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-google-plus"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="single_widget">
                    <h3>Opening Hours</h3>

                    <div class="single_widget_info">
                        <p><span class="date_day">Monday To Friday</span>
                            <span>8:00am to 10:00pm(Breakfast)</span>
                            <span>11:00am to 10:00pm(Lunch/Diner)</span>

                            <span class="date_day">Saturday & Sunday</span>
                            <span>10:00am to 11:00pm(Brunch)</span>
                            <span>11:00am to 12:00pm(Lunch/Dinner)</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="contact">
                <div class="single_widget">
                    <h3 class="mb-2">Contact Us</h3>

                    <div class="single_widget_form text-start">
                        <form method="POST" id="contactForm">
                            <div class="mb-2">
                                <input type="text" class="form-control" name="senderName" id="senderName"
                                       placeholder="Your name" required>
                                <div class="invalid-feedback d-block text-danger" id="senderNameError"></div>
                            </div>

                            <div class="mb-2">
                                <input type="email" name="email" class="form-control" id="email"
                                       placeholder="Your Email" required>
                                <div class="invalid-feedback d-block text-danger" id="emailError"></div>
                            </div>

                            <div class="mb-2">
                                <input type="text" name="subject" class="form-control" id="subject"
                                       placeholder="Subject" required>
                                <div class="invalid-feedback d-block text-danger" id="subjectError"></div>
                            </div>

                            <div class="mb-3">
                                <textarea name="message" class="form-control" id="message" rows="3"
                                          placeholder="Message" required></textarea>
                                <div class="invalid-feedback d-block text-danger" id="messageError"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="contactAlert" class="position-fixed bottom-0 end-0 px-4 mx-5"></div> <!-- alert for contact form -->
    </div>
</section>

<div class="scrollup">
    <a href="#" aria-label="Scroll to top"><i class="fas fa-chevron-up"></i></a>
</div>

<script src="/signature-cuisine/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/signature-cuisine/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="/signature-cuisine/assets/js/wow/wow.min.js"></script>
<script src="/signature-cuisine/assets/js/main.js"></script>

<script>
    document.getElementById('contactForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        // Clear previous errors
        ['senderName', 'email', 'subject', 'message'].forEach(id => {
            document.getElementById(id + 'Error').textContent = '';
            document.getElementById(id).classList.remove('is-invalid');
        });
        document.getElementById('contactAlert').innerHTML = '';

        try {
            const response = await fetch('/signature-cuisine/controllers/api/createQuery.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();

            if (result.success) {
                document.getElementById('contactAlert').innerHTML = `
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    ${result.message ?? 'Message sent successfully.'}
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
            document.getElementById('contactAlert').innerHTML = `
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
