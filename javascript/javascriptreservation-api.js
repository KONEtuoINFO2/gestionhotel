const formulaire=document.getElementById('form');
const contact=document.getElementById('contact');
const operateurs={
    orange: '07',
    mtn: '05',
    moove: '01'
};
formulaire.addEventListener('submit',(e)=>{
    e.preventDefault();
    const operateurSelectionne=document.querySelector('input[name="operateur"]:checked');
    const numero=contact.value.trim();
    if(!operateurSelectionne){
        if(!numero){
            alert('Veullez renseigner votre numéro de telephone')
            return;
        }
        const operateur=operateurSelectionne.value;
        const prefixe=operateurs[operateur];
        if(!numero.startsWith(prefixe)){
            alert("L'indice téléphonique n'est pas correct. Il doit commencer par ${prefixe}");
            return;
        }else if(numero){
            alert('Veuillez choisir un opérateur mobile money ou système de paiement');
            return;
        }else{
            alert('Votre réservation a été acceptée et vous allez regler les frais dès votre arrivée a la reception');
            formulaire.onsubmit();
            }
    }
});
