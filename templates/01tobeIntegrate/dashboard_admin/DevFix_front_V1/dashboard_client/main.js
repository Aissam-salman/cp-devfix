document.querySelectorAll('.container-nav-link').addEventListener('click', handleNav);

function handleNav() {
    let current = document.querySelectorAll('.active-link');

     // If there's no active class
     if (current.length > 0) {
        current[0].className = current[0].className.replace(" active-link", "");
      }

      // Add the active class to the current/clicked button
      this.className += " active-link";
}