// Afficher / masquer la navbar sur mobile
document.addEventListener('DOMContentLoaded', function () {
  const toggleButton = document.querySelector('.menu-toggle');
  const navbar = document.querySelector('.navbar');

  toggleButton.addEventListener('click', function () {
    navbar.classList.toggle('active');
  });
});
