import './bootstrap';


/* Gère le basculement d'un espace à un autre */

const toggleBricoleur = document.getElementById('toggle-bricoleur');
const togglePrestataire = document.getElementById('toggle-prestataire');

toggleBricoleur.addEventListener('click', () => {
    document.documentElement.classList.remove('prestataire');
});
togglePrestataire.addEventListener('click', () => {
    document.documentElement.classList.add('prestataire');
});


/* Gestion de l'affiche du menu sur mobile */

const mobileMenuButton = document.getElementById('mobile-menu-button');
const menu = document.getElementById('menu');

mobileMenuButton.addEventListener('click', () => {
  const isOpen = menu.style.maxHeight && menu.style.maxHeight !== '0px';

  if (isOpen) {
    // Fermeture
    menu.style.maxHeight = '0px';
    menu.addEventListener('transitionend', function handleClose() {
      if (menu.style.maxHeight === '0px') {
        menu.classList.add('hidden');
        mobileMenuButton.classList.remove('open'); // Retirer la croix
        menu.style.maxHeight = null;
      }
      menu.removeEventListener('transitionend', handleClose);
    });
  } else {
    // Ouverture
    menu.classList.remove('hidden');
    menu.style.maxHeight = menu.scrollHeight + 'px';
    menu.addEventListener('transitionend', function handleOpen() {
      mobileMenuButton.classList.add('open');
      menu.removeEventListener('transitionend', handleOpen);
    });
  }
});


/* Positionne le switcher après le menu */

const menuDiv = document.getElementById('menu');
const switcherDiv = document.getElementById('switcher');
const navDiv = document.getElementById('nav');
const mdQuery = window.matchMedia('(min-width: 1024px)');

function updateSwitcherPosition() {
  const mdQuery = window.matchMedia('(min-width: 1024px)');
  if (mdQuery.matches) {
    menuDiv.insertAdjacentElement('afterend', switcher);
  } else {
    // Reset la position si < md
    navDiv.insertAdjacentElement('afterend', switcher);
  }
}

// Appelle au chargement
updateSwitcherPosition();

// Appelle à chaque resize
mdQuery.addEventListener('change', updateSwitcherPosition);
window.addEventListener('resize', updateSwitcherPosition);
