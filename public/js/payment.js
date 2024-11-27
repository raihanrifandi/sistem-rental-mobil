document.addEventListener('DOMContentLoaded', function() {
        
    const checkbox = document.getElementById('agreementCheckbox');
    const proceedButton = document.getElementById('paymentButton');

    function updateButtonState() {
        if (checkbox.checked) {
            proceedButton.disabled = false;
            proceedButton.classList.remove('button-disabled');
            proceedButton.classList.add('button-enabled');
        } else {
            proceedButton.disabled = true;
            proceedButton.classList.add('button-disabled');
            proceedButton.classList.remove('button-enabled');
        }
    }

    // Initial state
    updateButtonState();
    // Update state when checkbox changes
    checkbox.addEventListener('change', updateButtonState);
    
});

