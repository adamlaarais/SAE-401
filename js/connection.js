/*********************************************************
Fichier JS gérant les interactions du menu utilisateur
Permet l'ouverture/fermeture et les animations du volet compte
*********************************************************/

// selection des elements du dom pour l'ouverture du menu
const menuConnexion = document.querySelector('.compte');
const cross = document.querySelector('.cross');
const fondUser = document.querySelector('.fond-user');

// ecouteurs d'evenements pour declencher le toggle sur les differentes zones
if (menuConnexion) menuConnexion.addEventListener("click", menuToggle);
if (cross) cross.addEventListener("click", menuToggle);
if (fondUser) fondUser.addEventListener("click", menuToggle);

function menuToggle() {
    // recuperation des elements a animer dans le menu
    const connecterMenu = document.querySelector('.menu-user-toggle');
    const cross = document.querySelector('.cross');
    const stick = document.querySelector('.stick');
    const stick2 = document.querySelector('.stick2');
    const fond = document.querySelector('.fond-user');

    // bascule des classes css pour l'affichage et les animations
    if (connecterMenu) connecterMenu.classList.toggle('ConnecterMenu-active');
    if (cross) cross.classList.toggle('cross-active');
    if (stick) stick.classList.toggle('stick-active');
    if (stick2) stick2.classList.toggle('stick2-active');
    if (fond) fond.classList.toggle('fondUser-active');

    // gestion specifique de l'etat des icones
    const icons = document.querySelector('.icons');
    if (icons) icons.classList.toggle('icons-active');
};