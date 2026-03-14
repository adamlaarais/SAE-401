/*********************************************************
Fichier JS gérant le menu de navigation principal (burger)
Gère l'affichage du menu mobile, le texte et l'animation des barres
*********************************************************/

const burgerMenu = document.querySelector('#menu-toggle');
const fond = document.querySelector('.fond');

// ajout des ecouteurs d'evenements pour declencher l'action au clic
if (burgerMenu) burgerMenu.addEventListener("click", menuToggle);
if (fond) fond.addEventListener("click", menuToggle);

function menuToggle() {
    // selection des elements du menu et de l'animation burger
    const menuNav = document.querySelector('#menu-nav');
    const menuText = document.querySelector('#menu-text');
    const burger1 = document.querySelector('.burger1');
    const burger2 = document.querySelector('.burger2');
    const burger3 = document.querySelector('.burger3');
    const fond = document.querySelector('.fond');

    // bascule de la visibilite du menu de navigation
    if (menuNav) menuNav.classList.toggle('menuNav-active');

    // mise a jour du libelle du bouton selon l'etat du menu
    if (menuNav.classList.contains('menuNav-active'))
        menuText.textContent = "Fermer";
    else
        menuText.textContent = "Menu";

    // declenchement des animations css pour les barres du burger
    if (burger1) burger1.classList.toggle('burger1-active');
    if (burger2) burger2.classList.toggle('burger2-active');
    if (burger3) burger3.classList.toggle('burger3-active');

    // activation de l'overlay d'arriere plan
    if (fond) fond.classList.toggle('fond-active');
};