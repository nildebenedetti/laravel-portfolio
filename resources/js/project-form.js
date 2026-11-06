
// aggiungo event listener al caricamento del DOM
document.addEventListener('DOMContentLoaded', function () {
    
    // identifico la  select
    const stackSelect = document.getElementById('stack_type');
    // se non siamo su create/edit, non eseguo nulla
    if (!stackSelect) return;

    // riferimenti ai gruppi dei link per manipolazione visibility
    const groupGithub = document.getElementById('group_github_link');
    const groupFront = document.getElementById('group_front_end_github_link');
    const groupBack = document.getElementById('group_back_end_github_link')

    // riferimenti a input interni per abilitare/disabilitare
    const inputGithub = document.getElementById('github_link');
    const inputFront = document.getElementById('front_end_github_link');
    const inputBack = document.getElementById('back_end_github_link');

    // funzione per aggiornare disabled e visibility campi in funzione dell'onCHange di stackSelect.value
    function updateFieldsVisibility () {
        const value = stackSelect.value;
        // console.log('sono nella update, e value è ', value);

        const allGroups = [
            groupGithub,
            groupFront,
            groupBack

        ];

        const allInputs = [
            inputGithub,
            inputFront,
            inputBack

        ];

        // reset d-none e disabled
        allGroups.forEach(el => {
            if (el) el.classList.add('d-none');
        });

        allInputs.forEach( input => {
            if (input) input.disabled = true;
        });

        // conditions

        if ( value === 'full_stack' ) {
            if ( groupFront && groupBack ) {
                groupFront.classList.remove('d-none');
                groupBack.classList.remove('d-none');
            }

            if ( inputFront && inputBack ) {
                inputFront.disabled = false;
                inputBack.disabled = false;

            }

        } else if ( value === 'front_end' ) {

            if ( groupGithub ) {
                groupGithub.classList.remove('d-none');
            }

            if ( inputGithub) {
                inputGithub.disabled = false;
            }

        } else if ( value === 'back_end' ) {

            if ( groupGithub ) {
                groupGithub.classList.remove('d-none');
            }

            if ( inputBack ) {
                inputGithub.disabled = false;
            }
        }

    }

    // ascolto change di value

    stackSelect.addEventListener('change', updateFieldsVisibility);

    // eseguo all'avvio per check pagina edit e in caso errori validation
    updateFieldsVisibility();


});

