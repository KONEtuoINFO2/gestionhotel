// Ouverture du formulaire de reservation
document.addEventListener('DOMContentLoaded', () => {
 
document.getElementById('Ouvertform').addEventListener('click', function() {
    document.getElementById('reservations').style.display = 'block';
    document.getElementById('reservations').style.display = 'none';
});

/* Fermeture du formulaire
document.getElementById('closeform').addEventListener('click', function() {
    document.getElementById('reservation').style.display = 'none';
    document.getElementById('reservation').style.display = 'none';
});*/
})