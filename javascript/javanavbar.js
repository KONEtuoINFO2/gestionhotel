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
    const nav = document.getElementById('navLinks');
    const btn = document.getElementById('menuToggleBtn');
    nav.classList.toggle('show');
    btn.classList.toggle('active');
  }


  





