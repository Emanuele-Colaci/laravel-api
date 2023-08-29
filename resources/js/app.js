import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//RECUPERO TUTTI I PULSANTI DI CANCELLAZIONE DELLA TABELLA DEI PROGGETTI
const deleteButton = document.querySelectorAll('.delete-post-form button[type="submit"]');

//CICLO TUTTI I PULSANTI
deleteButton.forEach((button) => {

    //AD OGNI PULSANTE GLI DICO DI RIMANERE IN ATTESA DI UN EVENTO CLICK. IMPORTANTISSIMO
    button.addEventListener('click', (event) =>{
        event.preventDefault();

        //RECUPER L'HTML DELLA MODALE
        const modal = document.getElementById('confirmdelete');

        //RECUPERO IL DATA ATTRIBUTE CHE HO DEFINITO NEL PULSANTE
        const projectTitle = button.getAttribute('data-project-title');

        //CREO L'ISTANZA DELLA CLASSE MODAL DI BOOTSTRAP A PARTIRE DELL'HTML CHE HO RECUPERATO NEL PASSAGGIO PRECEDENTE
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        //RECUPERO LO SAPN DEFINITO NELLA MODALE CHE DEVE CONTENERE IL TITOLO
        const titleProject = modal.querySelector('#modal-project-title');

        //ORA CHE HO RECUPERATO IL TITOLO DEL PROGGETTO VADO A METTERE IL TITOLO
        titleProject.textContent = projectTitle

        //RECUPERO IL PULSANTE DI CANCELLAZIONE PRESENTE NELLA MODALE
        const buttonDelete = document.querySelector('.confirm-delete-button');

        //DEVO FAR SI CHE QUESTO NUOVO PULSANTE RESTI IN ATTESA DI UN NUOVO EVENTO
        buttonDelete.addEventListener('click', () => {
            //DAL PULSANTE RECUPERO L'ANTENATO E SOTTOMETTO LA FORM
            button.parentElement.submit();
        })
    })
});