const questionContainers = document.querySelectorAll('.question-container');
const reponseContainers = document.querySelectorAll('.reponse-container');
const arrows = document.querySelectorAll('.arrow-down');


function setHeight(element, height) {
    element.style.height = height;
}

function toggleReponse(container, index) {
    // Fermer toutes les réponses ouvertes
    reponseContainers.forEach((reponse, idx) => {
        if (idx !== index && reponse.classList.contains('open-reponse')) {
            setHeight(reponse, '0px');
            reponse.classList.remove('open-reponse');
            arrows[idx].classList.remove('rotate'); // Fermer également la flèche
        }
    });

    // Ouvrir ou fermer la réponse sélectionnée
    if (container.classList.contains('open-reponse')) {
        setHeight(container, '0px');
        container.classList.remove('open-reponse');
        arrows[index].classList.remove('rotate');
    } else {
        const currentHeight = container.scrollHeight + 'px';
        setHeight(container, currentHeight);
        container.classList.add('open-reponse');
        arrows[index].classList.add('rotate');
    }
}

questionContainers.forEach((questionContainer, index) => {
    questionContainer.addEventListener('click', () => {
        toggleReponse(reponseContainers[index], index);
    });
});
