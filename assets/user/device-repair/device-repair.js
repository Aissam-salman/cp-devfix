const nextButton = document.getElementById('get-price-btn');
const checkboxes = document.querySelectorAll('.radio_select_buttons input[type="checkbox"]');

const updateButtonState = () => {
    const isAnyCheckboxChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

    toggleButtonState(isAnyCheckboxChecked);
};

const toggleButtonState = (enabled) => {
    if (enabled) {
        nextButton.classList.remove('disabled');
    } else {
        nextButton.classList.add('disabled');
    }
};

toggleButtonState(false);

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        updateButtonState();

        const parentLabel = checkbox.closest('label');
        if (checkbox.checked) {
            parentLabel.classList.add('selected');
        } else {
            parentLabel.classList.remove('selected');
        }
    });
});

nextButton.addEventListener('click', (event) => {
    if (nextButton.classList.contains('disabled')) {
        event.preventDefault();
    }
});