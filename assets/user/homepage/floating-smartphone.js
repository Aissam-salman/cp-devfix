window.onmousemove = function (e) {
    let moveX = (e.clientX - window.innerWidth / 2) / (window.innerWidth / 2) * 10; // 10 représente l'intensité de l'effet
    let moveY = (e.clientY - window.innerHeight / 2) / (window.innerHeight / 2) * 10;

    const parallax = document.querySelector(".parallax");
    if (parallax) {
        parallax.style.transform = `translate(${moveX}%, ${moveY}%)`;
    }
};

