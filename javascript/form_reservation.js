// Ouverture du formulaire de reservation
document.addEventListener('DOMContentLoaded', () => {
document.getElementById('openForm').addEventListener('click', function() {
    document.getElementById('Form').style.display = 'block';

});
document.getElementById('openFormlaire').addEventListener('click', function() {
    document.getElementById('Form').style.display = 'block';

});
// Fermeture du formulaire
document.getElementById('closeform').addEventListener('click', function() {
    document.getElementById('Form').style.display = 'none';
});

})