function toggleMenu() {
  const nav = document.getElementById('navLinks');
  const btn = document.getElementById('menuToggleBtn');

  nav.classList.toggle('show');
  btn.classList.toggle('active');

  // Ajoute l'écoute une seule fois (évite les doublons)
  const links = nav.querySelectorAll('a');

  links.forEach(link => {
    link.onclick = function () {
      if (window.innerWidth <= 768) {
        nav.classList.remove('show');
        btn.classList.remove('active');
      }
    };
  });
}

function scrollNav(direction) {
  const container = document.getElementById('navScroll');
  const scrollAmount = 100;
  container.scrollBy({
    left: direction * scrollAmount,
    behavior: 'smooth'
  });
}


  
