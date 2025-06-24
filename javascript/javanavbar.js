// Afficher / masquer la navbar sur mobile
document.addEventListener('DOMContentLoaded', function () {
  const toggleButton = document.querySelector('.menu-toggle');
  const navbar = document.querySelector('.navbar');

  toggleButton.addEventListener('click', function () {
    navbar.classList.toggle('active');
  });
  
});
//-- JavaScript pour le menu hamburger --//
  function toggleMenu() {
    const navLinks = document.getElementById("navLinks");
    const toggleBtn = document.querySelector(".toggle-btn");
    
    navLinks.classList.toggle("show");
    toggleBtn.classList.toggle("active"); // Ajout de l’état actif
  }





