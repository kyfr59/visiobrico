import './bootstrap';

const toggleBricoleur = document.getElementById('toggle-bricoleur');
const togglePrestataire = document.getElementById('toggle-prestataire');

toggleBricoleur.addEventListener('click', () => {
    document.documentElement.classList.remove('prestataire');
});
togglePrestataire.addEventListener('click', () => {
    document.documentElement.classList.add('prestataire');
});

// Gestion de l'affiche du menu sur mobile
const mobileMenuButton = document.getElementById('mobile-menu-button');
const menu = document.getElementById('menu');

mobileMenuButton.addEventListener('click', () => {
  const open = mobileMenuButton.classList.toggle('open');
  mobileMenuButton.toggleAttribute('aria-expanded', open);
  if (menu.style.maxHeight) {
    // Fermeture
    menu.style.maxHeight = '0px';
    // Enlever shadow après la fermeture
    menu.addEventListener('transitionend', function hideShadow() {
      if (menu.style.maxHeight === '0px') {
        menu.classList.add('hidden');
        menu.style.maxHeight = null;
      }
      menu.removeEventListener('transitionend', hideShadow);
    });
  } else {
    // Ouverture
    menu.classList.remove('hidden');
    menu.style.maxHeight = menu.scrollHeight + 'px';
  }
});