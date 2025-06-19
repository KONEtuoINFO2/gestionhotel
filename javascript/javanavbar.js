
  const menuBtn = document.querySelector('.menu-toggle');
  const navbar = document.querySelector('nav');

  menuBtn.addEventListener('click', () => {
    navbar.classList.toggle('show');
  });
