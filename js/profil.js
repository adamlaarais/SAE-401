/*********************************************************
Fichier JS gérant l'affichage des notifications flash
Gère l'apparition et la disparition automatique des messages
*********************************************************/

document.addEventListener("DOMContentLoaded", function () {
    // selection de l'element de notification dans le dom
    const notification = document.getElementById('notification-succes');

    if (notification) {
        // ajout d'un delai pour laisser le temps au navigateur de charger le css
        setTimeout(function () {
            notification.classList.add('show');
        }, 100);

        // retrait automatique de la classe apres 4 secondes pour cacher l'alerte
        setTimeout(function () {
            notification.classList.remove('show');
        }, 4000);
    }
});