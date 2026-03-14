/*********************************************************
Fichier JS gérant l'intégration de l'API de paiement Stripe
Sécurise la saisie bancaire et génère un token pour le serveur
*********************************************************/

// initialisation de stripe avec la cle publique de test
var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

// creation de l'instance elements pour gerer les champs de saisie
var elements = stripe.elements();

// style personnalise pour coller a la charte graphique kodex
var style = {
    base: {
        color: '#F7F8F9', // couleur du texte (var(--texte))
        fontFamily: '"Montserrat", sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '15px',
        '::placeholder': {
            color: 'rgba(247, 248, 249, 0.5)' // placeholder semi-transparent
        }
    },
    invalid: {
        color: '#fa755a', // couleur d'erreur en cas de saisie incorrecte
        iconColor: '#fa755a'
    }
};

// creation du champ de carte bancaire avec le style defini
var card = elements.create('card', { style: style });

// injection du champ stripe dans le conteneur html specifique
card.mount('#card-element');

// surveillance des erreurs de saisie en temps reel
card.addEventListener('change', function (event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// interception de la soumission pour generer le token de paiement
var form = document.getElementById('payment-form');
form.addEventListener('submit', function (event) {
    event.preventDefault(); // blocage de l'envoi classique pour valider via stripe

    stripe.createToken(card).then(function (result) {
        if (result.error) {
            // affichage du message d'erreur de la banque ou de stripe
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // envoi du jeton de securite au script de traitement php
            stripeTokenHandler(result.token);
        }
    });
});

// ajout du token genere au formulaire avant l'envoi final
function stripeTokenHandler(token) {
    var form = document.getElementById('payment-form');

    // creation d'un champ invisible pour transmettre l'id du jeton
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // soumission finale du formulaire vers le controleur php
    form.submit();
}