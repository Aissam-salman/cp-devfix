const conditionPopUpButton = document.querySelectorAll('.condition-pop-up-button');
const conditionPopUp = document.querySelector('.condition-pop-up-container');

conditionPopUpButton.forEach(button => {
    button.addEventListener('click', () => {
        conditionPopUp.classList.remove('hide-pop-up');
    });
});

const closeConditionPopUp = document.querySelector('.close-icon-container');

closeConditionPopUp.addEventListener('click', () => {
    conditionPopUp.classList.add('hide-pop-up');
});


const conditionLogInCheckBox = document.querySelector('.logged-in-checkbox');
const submitLogInButton = document.querySelector('#confirmation-btn');

submitLogInButton.disabled = !conditionLogInCheckBox.checked;

conditionLogInCheckBox.addEventListener('change', () => {
    submitLogInButton.disabled = !conditionLogInCheckBox.checked;
});