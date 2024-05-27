import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);


// Modale eliminazione fumetto
const allDeleteButton = document.querySelectorAll('.js-delete-btn');

allDeleteButton.forEach((deleteButton) =>{
    deleteButton.addEventListener('click', function(event) {
        // Blocco il comportamento di default
        event.preventDefault();
        // Prendo l'elemento HTML della modale
        const deleteModal = document.getElementById('deleteConfirmModal');
        // Prendendo il titolo tramite dataset, popolo il body della modale
        const comicTitle = this.dataset.comicTitle;
        deleteModal.querySelector('.modal-body').innerHTML = `Sei sicuro di voler elminiare il fumetto: ${comicTitle}?`;

        const bsDeleteModal = new bootstrap.Modal(deleteModal);
        bsDeleteModal.show();

        // Prendo il button di eliminazione
        const modalDeleteConfirmButton = document.getElementById('modal-confirm');
        // Aggiungo al click l'evento
        modalDeleteConfirmButton.addEventListener('click', function() {
            // Prendo il genitore dell'elemento e lo invio
            deleteButton.parentElement.submit();
        });
    })
});