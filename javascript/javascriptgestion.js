// Ouverture du popup de l'esspace de authentification//
document.getElementById('openLoginPopup').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'block';
    document.getElementById('overlay').style.display = 'none';
});

// Fermeture du popup de connexion
document.getElementById('closeLoginPopup').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});