import './bootstrap';

const toggleBricoleur = document.getElementById('toggle-bricoleur');
const togglePrestataire = document.getElementById('toggle-prestataire');

toggleBricoleur.addEventListener('click', () => {
    document.documentElement.classList.remove('prestataire');
});
togglePrestataire.addEventListener('click', () => {
    document.documentElement.classList.add('prestataire');
});
