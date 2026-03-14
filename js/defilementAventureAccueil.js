/*********************************************************
Fichier JS gérant le slider interactif des aventures
Gère le défilement, la barre de progression et les compteurs
*********************************************************/

document.addEventListener("DOMContentLoaded", () => {
    // selection des elements du slider et des controles
    const track = document.querySelector('.container-plus-aventures');
    const btnDroite = document.getElementById('btn-droite');
    const btnGauche = document.getElementById('btn-gauche');
    const barre = document.getElementById('barre-remplissage');
    const compteur = document.getElementById('compteur-aventures');
    const cards = Array.from(track.querySelectorAll('.enfant-container-plus-aventures'));

    if (!cards.length) return;

    let activeIndex = 0;

    // calcul de la distance de scroll incluant la largeur et l'espace entre cartes
    function getScrollStep() {
        const parentStyle = getComputedStyle(track);
        let gap = parseFloat(parentStyle.columnGap || parentStyle.gap) || 0;
        if (!gap && cards.length > 1) {
            const r1 = cards[0].getBoundingClientRect();
            const r2 = cards[1].getBoundingClientRect();
            gap = Math.max(0, Math.round(r2.left - (r1.left + r1.width)));
        }
        return Math.round(cards[0].getBoundingClientRect().width) + gap;
    }

    // mise a jour de la position du track et des indicateurs visuels
    function mettreAJour() {
        const scrollStep = getScrollStep();

        track.scrollTo({ left: activeIndex * scrollStep, behavior: 'smooth' });

        cards.forEach((c, i) => c.classList.toggle('actif', i === activeIndex));

        // actualisation du texte du compteur
        if (compteur) compteur.textContent = (activeIndex + 1) + ' / ' + cards.length;

        // calcul du remplissage de la barre de progression
        barre.style.width = cards.length > 1
            ? Math.max(20, (activeIndex / (cards.length - 1)) * 100) + '%'
            : '100%';
    }

    // gestion du clic pour passer a l'aventure suivante
    btnDroite.addEventListener('click', () => {
        activeIndex = (activeIndex + 1) % cards.length;
        mettreAJour();
    });

    // gestion du clic pour revenir a l'aventure precedente
    btnGauche.addEventListener('click', () => {
        activeIndex = (activeIndex - 1 + cards.length) % cards.length;
        mettreAJour();
    });

    // permet de cliquer directement sur une carte pour centrer l'aventure
    cards.forEach((card, i) => {
        card.addEventListener('click', () => {
            if (i === activeIndex) return;
            activeIndex = i;
            mettreAJour();
        });
    });

    // initialisation de l'affichage au chargement de la page
    requestAnimationFrame(mettreAJour);
});