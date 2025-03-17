function toggleChangePseudoForm() {
    const form = document.getElementById('changePseudoForm');
    const changePseudoButton = document.getElementById('changePseudoButton');

    if (form.style.display === 'none') {
        form.style.display = 'block';
        changePseudoButton.textContent = 'Annuler';
    } else {
        form.style.display = 'none';
        changePseudoButton.textContent = 'Changer de pseudo';
    }
}

function toggleChangePasswordForm() {
    const form = document.getElementById('changePasswordForm');
    const changePasswordButton = document.getElementById('changePasswordButton');

    if (form.style.display === 'none') {
        form.style.display = 'block';
        changePasswordButton.textContent = 'Annuler';
    } else {
        form.style.display = 'none';
        changePasswordButton.textContent = 'Changer de mot de passe';
    }
}

function activateChangePseudoOrPasswordForm() {
    const changePseudoButton = document.getElementById('changePseudoButton');
    const changePasswordButton = document.getElementById('changePasswordButton');

    if (changePseudoButton) {
        changePseudoButton.addEventListener('click', toggleChangePseudoForm);
    }

    if (changePasswordButton) {
        changePasswordButton.addEventListener('click', toggleChangePasswordForm);
    }
}

activateChangePseudoOrPasswordForm();

