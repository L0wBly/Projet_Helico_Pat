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

function activateChangePseudoForm() {
    const changePseudoButton = document.getElementById('changePseudoButton');

    if (changePseudoButton) {
        changePseudoButton.addEventListener('click', toggleChangePseudoForm);
    }
}

activateChangePseudoForm();

