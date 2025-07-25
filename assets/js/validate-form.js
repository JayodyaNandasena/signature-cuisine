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