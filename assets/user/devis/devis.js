const logIn = document.getElementById('log-in-btn');
const signInForm = document.querySelector('.sign-in-form');
const signIn = document.getElementById('sign-in-btn');
const logInForm = document.querySelector('.log-in-form');

logIn.addEventListener('click', () => {
    signInForm.classList.add('hide-form');
    logInForm.classList.remove('hide-form');
});

signIn.addEventListener('click', () => {
    logInForm.classList.add('hide-form');
    signInForm.classList.remove('hide-form');
});



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








// SIGN IN
const conditionSignInCheckBox = document.querySelector('.sign-in-checkbox');
const submitSignInButton = document.querySelector('#confirmation-sign-in-btn');

submitSignInButton.disabled = !conditionSignInCheckBox.checked;

conditionSignInCheckBox.addEventListener('change', () => {
    submitSignInButton.disabled = !conditionSignInCheckBox.checked;
});



// LOG IN
const conditionLogInCheckBox = document.querySelector('.log-in-checkbox');
const submitLogInButton = document.querySelector('#confirmation-log-in-btn');

submitLogInButton.disabled = !conditionLogInCheckBox.checked;

conditionLogInCheckBox.addEventListener('change', () => {
    submitLogInButton.disabled = !conditionLogInCheckBox.checked;
});