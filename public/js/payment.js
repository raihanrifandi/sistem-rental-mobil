document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('agreementCheckbox');
    const payButton = document.getElementById('pay-button');

    function updateButtonState() {
        if (checkbox.checked) {
            payButton.disabled = false;
            payButton.classList.remove('button-disabled');
            payButton.classList.add('button-enabled');
        } else {
            payButton.disabled = true;
            payButton.classList.add('button-disabled');
            payButton.classList.remove('button-enabled');
        }
    }

    // Initial state
    updateButtonState();

    // Update state when checkbox changes
    checkbox.addEventListener('change', updateButtonState);
    
    
});