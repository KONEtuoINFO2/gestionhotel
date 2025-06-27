
  document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('menuToggleBtn');
    const navLinks = document.getElementById('navLinks');

    // Toggle menu quand on clique sur le bouton hamburger
    toggleButton.addEventListener('click', function () {
      navLinks.classList.toggle('show');
      toggleButton.classList.toggle('active');
    });

    // Fermer le menu quand on clique sur un lien (en mobile)
    document.querySelectorAll('#navLinks a').forEach(link => {
      link.addEventListener('click', function () {
        if (window.innerWidth <= 768) {
          navLinks.classList.remove('show');
          toggleButton.classList.remove('active');
        }
      });
    });

    // Fermer le menu automatiquement si la fenêtre est redimensionnée en grand écran
    window.addEventListener('resize', function () {
      if (window.innerWidth > 768) {
        navLinks.classList.remove('show');
        toggleButton.classList.remove('active');
      }
    });
  });
