/*********************************************************
Fichier JS gérant le tunnel d'achat multi-étapes "Offrir"
Gère la sélection des offres, aventures et la personnalisation
Supporte la multi-sélection d'aventures selon le pack choisi :
  - Découverte : 1 aventure
  - Aventurier : 2 aventures
  - Explorateur : 4 aventures
*********************************************************/

document.addEventListener('DOMContentLoaded', function () {

    // === STATE ===
    // initialisation de l'etat du formulaire et de la selection utilisateur
    var etapeCourante = 1;
    var selection = {
        idOffre: null,
        nomOffre: null,
        prixOffre: null,
        nbAventuresMax: 1,
        aventures: [],       // tableau d'objets { id, nom }
        emailDest: '',
        messagePerso: ''
    };

    // === ÉLÉMENTS ===
    // recuperation de tous les elements necessaires au dom
    var etapes = document.querySelectorAll('.offrir-etape-contenu');
    var progressSteps = document.querySelectorAll('.offrir-progress-step');
    var progressBars = document.querySelectorAll('.offrir-progress-fill');
    var formuleCards = document.querySelectorAll('.offrir-formule-card');
    var aventureCards = document.querySelectorAll('.offrir-aventure-card');
    var btnEtape2 = document.getElementById('btn-etape2');
    var btnEtape3 = document.getElementById('btn-etape3');
    var emailInput = document.getElementById('email_dest');
    var messageInput = document.getElementById('message_perso');
    var charCount = document.getElementById('char-count');

    // elements du compteur d'aventures
    var nbSelectedEl = document.getElementById('nb-selected');
    var nbMaxEl = document.getElementById('nb-max');
    var nbSelectedEnEl = document.getElementById('nb-selected-en');
    var nbMaxEnEl = document.getElementById('nb-max-en');

    // === NAVIGATION ENTRE ÉTAPES ===
    // fonction principale pour basculer d'une etape a l'autre
    function allerAEtape(num) {
        // cacher toutes les etapes
        etapes.forEach(function (e) { e.classList.remove('actif'); });
        // afficher l'etape cible
        var cible = document.getElementById('etape-' + num);
        if (cible) cible.classList.add('actif');

        // mise a jour visuelle de la barre de progression en haut
        progressSteps.forEach(function (s, i) {
            var stepNum = i + 1;
            s.classList.remove('actif', 'done');
            if (stepNum < num) s.classList.add('done');
            if (stepNum === num) s.classList.add('actif');
        });

        // remplissage des segments entre les cercles de progression
        progressBars.forEach(function (bar, i) {
            bar.style.width = (i < num - 1) ? '100%' : '0%';
        });

        etapeCourante = num;

        // reinitialiser la selection d'aventures quand on revient a l'etape 2
        if (num === 2) {
            mettreAJourCompteur();
        }

        // generation du contenu final si on arrive au recapitulatif
        if (num === 4) remplirRecap();

        // repositionnement automatique de la vue sur le debut du flux
        var flowSection = document.getElementById('offrir-flow');
        if (flowSection) {
            flowSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // === MISE A JOUR DU COMPTEUR D'AVENTURES ===
    function mettreAJourCompteur() {
        var nb = selection.aventures.length;
        var max = selection.nbAventuresMax;

        if (nbSelectedEl) nbSelectedEl.textContent = nb;
        if (nbMaxEl) nbMaxEl.textContent = max;
        if (nbSelectedEnEl) nbSelectedEnEl.textContent = nb;
        if (nbMaxEnEl) nbMaxEnEl.textContent = max;

        // activer le bouton suivant uniquement si on a atteint le nombre requis
        if (btnEtape2) btnEtape2.disabled = (nb < max);
    }

    // === ÉTAPE 1 : CHOIX FORMULE ===
    // gestion de la selection de la carte d'offre (prix/type)
    formuleCards.forEach(function (card) {
        card.addEventListener('click', function () {
            // deselectionner toutes les cartes du groupe
            formuleCards.forEach(function (c) { c.classList.remove('selected'); });
            // mettre en avant la carte choisie
            card.classList.add('selected');

            selection.idOffre = card.getAttribute('data-id');
            selection.nomOffre = card.getAttribute('data-nom');
            selection.prixOffre = card.getAttribute('data-prix');
            selection.nbAventuresMax = parseInt(card.getAttribute('data-nb-aventures')) || 1;

            // reinitialiser les aventures selectionnees car le pack a change
            selection.aventures = [];
            aventureCards.forEach(function (c) { c.classList.remove('selected'); });

            // redirection automatique vers l'etape suivante apres selection
            setTimeout(function () {
                allerAEtape(2);
            }, 400);
        });
    });

    // === ÉTAPE 2 : CHOIX AVENTURE(S) ===
    // selection des aventures selon le nombre autorise par le pack
    aventureCards.forEach(function (card) {
        card.addEventListener('click', function () {
            var id = card.getAttribute('data-id');
            var nom = card.getAttribute('data-nom');
            var max = selection.nbAventuresMax;

            // verifier si cette aventure est deja selectionnee
            var dejaIndex = -1;
            for (var i = 0; i < selection.aventures.length; i++) {
                if (selection.aventures[i].id === id) {
                    dejaIndex = i;
                    break;
                }
            }

            if (dejaIndex !== -1) {
                // deselection de l'aventure
                selection.aventures.splice(dejaIndex, 1);
                card.classList.remove('selected');
            } else {
                if (max === 1) {
                    // pack avec 1 seule aventure : remplacer la selection
                    selection.aventures = [{ id: id, nom: nom }];
                    aventureCards.forEach(function (c) { c.classList.remove('selected'); });
                    card.classList.add('selected');
                } else {
                    // pack multi-aventures : ajouter si pas encore au max
                    if (selection.aventures.length < max) {
                        selection.aventures.push({ id: id, nom: nom });
                        card.classList.add('selected');
                    }
                    // si deja au max, ne rien faire (l'utilisateur doit deselectionner d'abord)
                }
            }

            mettreAJourCompteur();
        });
    });

    if (btnEtape2) {
        btnEtape2.addEventListener('click', function () {
            if (selection.aventures.length >= selection.nbAventuresMax) allerAEtape(3);
        });
    }

    // === ÉTAPE 3 : PERSONNALISATION ===
    // verification de la validite des champs de personnalisation
    function verifierEtape3() {
        var emailValide = emailInput && emailInput.value.trim() !== '' && emailInput.validity.valid;
        var messageValide = messageInput && messageInput.value.trim().length > 0;
        btnEtape3.disabled = !(emailValide && messageValide);
    }

    if (emailInput) emailInput.addEventListener('input', verifierEtape3);
    if (messageInput) {
        messageInput.setAttribute('maxlength', '500');
        messageInput.addEventListener('input', function () {
            // gestion du compteur de caracteres dynamique
            if (charCount) charCount.textContent = messageInput.value.length;
            verifierEtape3();
        });
    }

    if (btnEtape3) {
        btnEtape3.addEventListener('click', function () {
            selection.emailDest = emailInput.value.trim();
            selection.messagePerso = messageInput.value.trim();
            allerAEtape(4);
        });
    }

    // === ÉTAPE 4 : RÉCAPITULATIF ===
    // transfert des donnees de l'objet selection vers l'affichage final
    function remplirRecap() {
        var recapFormule = document.getElementById('recap-formule');
        var recapPrix = document.getElementById('recap-prix');
        var recapAventure = document.getElementById('recap-aventure');
        var recapEmail = document.getElementById('recap-email');
        var recapMessage = document.getElementById('recap-message');

        if (recapFormule) recapFormule.textContent = selection.nomOffre || '—';
        if (recapPrix) recapPrix.textContent = selection.prixOffre ? selection.prixOffre + ' €' : '—';

        // afficher la liste des aventures selectionnees
        if (recapAventure) {
            var noms = selection.aventures.map(function (a) { return a.nom; });
            recapAventure.textContent = noms.length > 0 ? noms.join(', ') : '—';
        }

        if (recapEmail) recapEmail.textContent = selection.emailDest || '—';
        if (recapMessage) recapMessage.textContent = selection.messagePerso || '—';

        // remplissage des inputs hidden pour l'envoi du formulaire php
        document.getElementById('input-id-offre').value = selection.idOffre || '';
        document.getElementById('input-email-dest').value = selection.emailDest || '';
        document.getElementById('input-message-perso').value = selection.messagePerso || '';

        // injecter les hidden pour chaque aventure selectionnee
        var container = document.getElementById('hidden-aventures-container');
        if (container) {
            container.innerHTML = '';
            selection.aventures.forEach(function (av) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id_aventure[]';
                input.value = av.id;
                container.appendChild(input);
            });
        }
    }

    // === BOUTONS RETOUR ===
    // gestion de la navigation arriere pour corriger une selection
    document.querySelectorAll('.offrir-btn-retour').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = parseInt(btn.getAttribute('data-target'));
            if (target) allerAEtape(target);
        });
    });

});