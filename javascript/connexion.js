// Ouverture du popup de connexion
document.getElementById('openLoginPopup').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'block';
     document.getElementById('signupPopup').style.display = 'none';
    
});

// Fermeture du popup de connexion
document.getElementById('closeLoginPopup').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
   
});
document.getElementById('closeLoginPopupf').addEventListener('click', function() {
    document.getElementById('loginPopup').style.display = 'none';
    
});

// Affichage du popup d'inscription
document.getElementById('openSignupPopup').addEventListener('click', function() {
    
    document.getElementById('signupPopup').style.display = 'block';
});

// Fermeture du popup d'inscription
document.getElementById('closeSignupPopup').addEventListener('click', function() {
    document.getElementById('signupPopup').style.display = 'none';
    document.getElementById('loginPopup').style.display = 'none';
});
//mot de passe oublier
document.getElementById('mdpfalse').addEventListener('click', function() {
    window.location.href = "index.html";
});


