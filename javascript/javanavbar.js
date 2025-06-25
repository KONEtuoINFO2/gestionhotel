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
    const toggleBtn = document.getElementById("menuToggleBtn");

    navLinks.classList.toggle("show");

    // Change icon
    if (navLinks.classList.contains("show")) {
      toggleBtn.textContent = "✖";
    } else {
      toggleBtn.textContent = "☰";
    }
  }







