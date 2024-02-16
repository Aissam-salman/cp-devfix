const logInBtn = document.querySelector('.log-in-icon-container');
const logInIcon = document.querySelector('.log-in-icon');
const closeIcon = document.querySelector('.log-in-close-icon');
const logInContainer = document.querySelector('.log-in-container');
const contentWindow = document.querySelector('.window');


logInBtn.addEventListener('click', () => {
    if (logInIcon.classList.contains('show-icon')) {
        logInBtn.classList.add('close-show-icon-container');
        logInIcon.classList.remove('show-icon');
        closeIcon.classList.add('close-show-icon');
        logInContainer.classList.add('active');
        contentWindow.classList.add('hide-window');
    } else {
        logInBtn.classList.remove('close-show-icon-container');
        closeIcon.classList.remove('close-show-icon');
        logInIcon.classList.add('show-icon');
        logInContainer.classList.remove('active');
        contentWindow.classList.remove('hide-window');
    }
});