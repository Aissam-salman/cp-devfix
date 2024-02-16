const editBtn = document.getElementById('infos-edit-btn');
const cancelBtn = document.getElementById('cancel-edit-btn');
const saveBtn = document.getElementById('infos-save-btn');

const editForm = document.getElementById('edit-form');
const infosView = document.getElementById('view-mes-info');

const formInputs = editForm.querySelectorAll('input');

editBtn.addEventListener('click', () => {
    formInputs.forEach(input => {
        input.removeAttribute('disabled');
    });
    editForm.classList.remove('hide');
    infosView.classList.add('hide');
});


cancelBtn.addEventListener('click', () => {
    formInputs.forEach(input => {
        input.removeAttribute('disabled');
    });
    
    editForm.classList.add('hide');
    infosView.classList.remove('hide');
});