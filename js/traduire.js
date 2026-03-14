/*********************************************************
Fichier JS gérant la traduction dynamique du site (classes i18n)
Stocke les dictionnaires dans le json ci-dessous et bascule
Entre français et anglais
*********************************************************/
const trad = {
    // grande aide pour le nommage des classes, etc avec l'ia sinon ça aurait été 
    // beaucoup trop long à la main...
    // home
    ".i18n-hero-h1": {
        "fr": "La ville est votre terrain de jeu, <strong>Kodex</strong> est votre mission.",
        "en": "The city is your playground, <strong>Kodex</strong> is your mission."
    },
    ".i18n-hero-p": {
        "fr": "Résolvez des énigmes, découvrez des secrets cachés et vivez une expérience unique dans les rues de votre ville.",
        "en": "Solve puzzles, discover hidden secrets and live a unique experience in the streets of your city."
    },
    ".i18n-btn-discover": { "fr": "Découvrir", "en": "Discover" },
    ".i18n-btn-contact": { "fr": "Nous contacter", "en": "Contact us" },

    // aventures home
    ".i18n-pop-h1": {
        "fr": "Nos Aventures <strong>Populaires</strong>",
        "en": "Our <strong>Popular</strong> Adventures"
    },
    ".i18n-hours": { "fr": "heures", "en": "hours" },
    ".i18n-diff": { "fr": "Difficulté", "en": "Difficulty" },
    ".i18n-from": { "fr": "A partir de", "en": "Starting from" },
    ".i18n-btn-book": { "fr": "Réserver", "en": "Book now" },
    ".i18n-more-h1": {
        "fr": "Plus <strong>d'Aventures</strong>",
        "en": "More <strong>Adventures</strong>"
    },

    // faq
    ".i18n-see-all": { "fr": "Voir toutes les aventures", "en": "See all adventures" },
    ".i18n-faq-h1": {
        "fr": "Questions <strong>Fréquentes</strong>",
        "en": "Frequently Asked <strong>Questions</strong>"
    },

    ".i18n-faq-q1": { "fr": "Comment fonctionnent les aventures ?", "en": "How do the adventures work?" },
    ".i18n-faq-a1": { "fr": "Chaque aventure est une mission à résoudre en plein air dans votre ville. Vous recevez un point de départ, des énigmes et un objectif à accomplir à votre rythme, sans animateur sur place.", "en": "Each adventure is an outdoor mission to solve in your city. You receive a starting point, puzzles, and a goal to accomplish at your own pace, with no host on site." },
    ".i18n-faq-q2": { "fr": "Combien de joueurs peut-on être ?", "en": "How many players can there be?" },
    ".i18n-faq-a2": { "fr": "Nos aventures sont conçues pour des groupes de 2 à 10 joueurs selon l'aventure choisie. Idéal pour une sortie entre amis, en famille ou un team building original.", "en": "Our adventures are designed for groups of 2 to 10 players depending on the chosen adventure. Ideal for an outing with friends, family, or an original team building event." },
    ".i18n-faq-q3": { "fr": "Comment réserver une aventure ?", "en": "How do I book an adventure?" },
    ".i18n-faq-a3": { "fr": "Rendez-vous sur la page de l'aventure souhaitée et cliquez sur \"Réserver\". Choisissez votre date, le nombre de joueurs et validez votre réservation en quelques clics.", "en": "Go to the page of the desired adventure and click \"Book\". Choose your date, the number of players, and confirm your booking in a few clicks." },
    ".i18n-faq-q4": { "fr": "Faut-il un équipement particulier ?", "en": "Is any special equipment needed?" },
    ".i18n-faq-a4": { "fr": "Aucun équipement spécial n'est nécessaire. Un smartphone chargé et de bonnes chaussures suffisent. Tout le contenu de l'aventure est accessible depuis votre navigateur.", "en": "No special equipment is needed. A charged smartphone and comfortable shoes are enough. All adventure content is accessible from your browser." },
    ".i18n-faq-q5": { "fr": "Peut-on annuler ou modifier sa réservation ?", "en": "Can I cancel or modify my booking?" },
    ".i18n-faq-a5": { "fr": "Oui, vous pouvez annuler ou modifier votre réservation jusqu'à 48h avant la date prévue depuis votre espace compte, sans frais supplémentaires.", "en": "Yes, you can cancel or modify your booking up to 48 hours before the scheduled date from your account space, at no extra cost." },

    // avis
    ".i18n-reviews-h1": {
        "fr": "Ce que vous en <strong>Pensez</strong>",
        "en": "What you <strong>Think</strong> about it"
    },

    // avis
    ".i18n-based-on": { "fr": "basé sur", "en": "based on" },
    ".i18n-reviews-on": { "fr": "avis sur nos aventures", "en": "reviews of our adventures" },
    ".i18n-no-reviews": { "fr": "Aucun avis pour le moment", "en": "No reviews yet" },
    ".i18n-on-adventure": { "fr": "sur", "en": "on" },

    // menu gabarit
    ".i18n-menu-text": { "fr": "Menu", "en": "Menu" },
    ".i18n-greeting": { "fr": "Bonjour,", "en": "Hello," },
    ".i18n-account": { "fr": "COMPTE", "en": "ACCOUNT" },
    ".i18n-profile": { "fr": "Mon profil", "en": "My profile" },
    ".i18n-logout": { "fr": "Déconnexion", "en": "Logout" },

    // admin dashboard & stats
    ".i18n-admin-title": { "fr": "Tableau de bord", "en": "Dashboard" },
    ".i18n-admin-desc": { "fr": "Gérez les réservations et les messages clients", "en": "Manage reservations and customer messages" },
    ".i18n-stat-res": { "fr": "Total des réservations", "en": "Total Reservations" },
    ".i18n-stat-adv": { "fr": "Aventures actives", "en": "Active Adventures" },
    ".i18n-stat-users": { "fr": "Utilisateurs", "en": "Users" },
    ".i18n-stat-msg": { "fr": "Nouveaux Messages", "en": "New Messages" },

    // pages admin
    ".i18n-tab-res": { "fr": "Réservations", "en": "Reservations" },
    ".i18n-tab-adv": { "fr": "Aventures", "en": "Adventures" },
    ".i18n-tab-users": { "fr": "Utilisateurs", "en": "Users" },

    // réservations
    ".i18n-res-h2": { "fr": "Gestion des Réservations", "en": "Reservations Management" },
    ".i18n-res-p": { "fr": "Consultez et gérez toutes les réservations", "en": "View and manage all reservations" },
    ".i18n-th-client": { "fr": "Client", "en": "Customer" },
    ".i18n-th-game": { "fr": "Jeu", "en": "Game" },
    ".i18n-th-date": { "fr": "Date", "en": "Date" },
    ".i18n-th-time": { "fr": "Heure", "en": "Time" },
    ".i18n-th-players": { "fr": "Joueurs", "en": "Players" },
    ".i18n-th-items": { "fr": "Objets", "en": "Items" },
    ".i18n-th-status": { "fr": "Statut", "en": "Status" },
    ".i18n-th-actions": { "fr": "Actions", "en": "Actions" },
    ".i18n-val-classic": { "fr": "Classique", "en": "Classic" },
    ".i18n-val-none": { "fr": "Aucun", "en": "None" },
    ".i18n-status-pending": { "fr": "En attente", "en": "Pending" },
    ".i18n-status-confirmed": { "fr": "Confirmée", "en": "Confirmed" },
    ".i18n-btn-confirm": { "fr": "Confirmer", "en": "Confirm" },
    ".i18n-btn-cancel": { "fr": "Annuler", "en": "Cancel" },
    ".i18n-no-res": { "fr": "Aucune réservation trouvée.", "en": "No reservations found." },

    // admin aventures
    ".i18n-adv-add-h2": { "fr": "Ajouter une aventure", "en": "Add an adventure" },
    ".i18n-adv-add-p": { "fr": "Créez une nouvelle mission pour vos joueurs", "en": "Create a new mission for your players" },
    ".i18n-adv-btn-create": { "fr": "Créer l'aventure", "en": "Create adventure" },
    ".i18n-adv-cat-h2": { "fr": "Catalogue des Aventures", "en": "Adventures Catalog" },
    ".i18n-th-name": { "fr": "Nom", "en": "Name" },
    ".i18n-th-cat": { "fr": "Catégorie", "en": "Category" },
    ".i18n-th-price": { "fr": "Prix", "en": "Price" },
    ".i18n-btn-delete": { "fr": "Supprimer", "en": "Delete" },

    // admin utilisateurs
    ".i18n-users-h2": { "fr": "Utilisateurs Inscrits", "en": "Registered Users" },
    ".i18n-users-p": { "fr": "Gérez les comptes clients et administrateurs", "en": "Manage customer and administrator accounts" },
    ".i18n-th-fullname": { "fr": "Nom / Prénom", "en": "Last Name / First Name" },
    ".i18n-th-role": { "fr": "Rôle", "en": "Role" },
    ".i18n-role-admin": { "fr": "Admin", "en": "Admin" },
    ".i18n-role-client": { "fr": "Client", "en": "Customer" },

    // aventure détails
    ".i18n-back-catalog": { "fr": "Retour au catalogue", "en": "Back to catalog" },
    ".i18n-hours-cap": { "fr": "Heures", "en": "Hours" },
    ".i18n-players": { "fr": "joueurs", "en": "players" },
    ".i18n-per-player": { "fr": "/ joueurs", "en": "/ players" },
    ".i18n-how-it-works": { "fr": "Comment ça <span>marche</span> ?", "en": "How does it <span>work</span> ?" },

    // aventure tuto
    ".i18n-step1-h3": { "fr": "Briefing", "en": "Briefing" },
    ".i18n-step1-p": { "fr": "Recevez votre mission et les instructions de départ.", "en": "Receive your mission and starting instructions." },
    ".i18n-step2-h3": { "fr": "Exploration", "en": "Exploration" },
    ".i18n-step2-p": { "fr": "Parcourez la ville à la recherche d'indices.", "en": "Explore the city in search of clues." },
    ".i18n-step3-h3": { "fr": "Énigmes", "en": "Puzzles" },
    ".i18n-step3-p": { "fr": "Résolvez les puzzles pour avancer dans votre quête.", "en": "Solve puzzles to advance in your quest." },
    ".i18n-step4-h3": { "fr": "Dénouement", "en": "Conclusion" },
    ".i18n-step4-p": { "fr": "Assemblez les découvertes pour accomplir la mission.", "en": "Assemble your discoveries to complete the mission." },

    // aventures
    ".i18n-difficulty-label": { "fr": "Difficulté:", "en": "Difficulty:" },

    // cgv header
    ".i18n-cgv-title": { "fr": "Conditions Générales de Vente", "en": "Terms and Conditions of Sale" },
    ".i18n-cgv-subtitle": { "fr": "Conditions d'utilisation des services Kodex", "en": "Terms of use for Kodex services" },

    // cgv section 1
    ".i18n-cgv-s1-title": { "fr": "1. Objet", "en": "1. Purpose" },
    ".i18n-cgv-s1-p1": { "fr": "Les présentes Conditions Générales de Vente (CGV) régissent les relations contractuelles entre Kodex, organisateur d'escape games en extérieur, et toute personne (ci-après dénommée \"le Client\") souhaitant effectuer une réservation via le site internet <strong>www.kodex.fr</strong>.", "en": "These Terms and Conditions of Sale (TCS) govern the contractual relationship between Kodex, an outdoor escape game organizer, and any person (hereinafter referred to as \"the Customer\") wishing to make a reservation via the website <strong>www.kodex.fr</strong>." },
    ".i18n-cgv-s1-p2": { "fr": "Toute commande implique l'acceptation sans réserve des présentes CGV qui prévalent sur tout autre document.", "en": "Any order implies unconditional acceptance of these TCS, which prevail over any other document." },

    // cgv section 2
    ".i18n-cgv-s2-title": { "fr": "2. Prestations proposées", "en": "2. Services offered" },
    ".i18n-cgv-s2-p1": { "fr": "Kodex propose des aventures ludiques d'escape game en extérieur. Chaque aventure comprend :", "en": "Kodex offers fun outdoor escape game adventures. Each adventure includes:" },
    ".i18n-cgv-s2-l1": { "fr": "L'accès à un parcours scénarisé", "en": "Access to a scripted route" },
    ".i18n-cgv-s2-l2": { "fr": "Le matériel nécessaire à l'aventure", "en": "The equipment necessary for the adventure" },
    ".i18n-cgv-s2-l3": { "fr": "L'encadrement par un Game Master", "en": "Supervision by a Game Master" },
    ".i18n-cgv-s2-l4": { "fr": "Les assurances responsabilité civile", "en": "Civil liability insurance" },
    ".i18n-cgv-s2-p2": { "fr": "Les détails de chaque aventure (durée, difficulté, nombre de participants) sont précisés sur les fiches descriptives du site.", "en": "The details of each adventure (duration, difficulty, number of participants) are specified on the site's descriptive pages." },

    // cgv section 3
    ".i18n-cgv-s3-title": { "fr": "3. Réservations et confirmations", "en": "3. Reservations and confirmations" },
    ".i18n-cgv-s3-1-title": { "fr": "3.1 Processus de réservation", "en": "3.1 Reservation process" },
    ".i18n-cgv-s3-1-p1": { "fr": "Pour effectuer une réservation, le Client doit :", "en": "To make a reservation, the Customer must:" },
    ".i18n-cgv-s3-1-l1": { "fr": "Créer un compte sur le site Kodex", "en": "Create an account on the Kodex website" },
    ".i18n-cgv-s3-1-l2": { "fr": "Sélectionner l'aventure souhaitée", "en": "Select the desired adventure" },
    ".i18n-cgv-s3-1-l3": { "fr": "Choisir une date et un horaire disponibles", "en": "Choose an available date and time" },
    ".i18n-cgv-s3-1-l4": { "fr": "Renseigner le nombre de participants", "en": "Provide the number of participants" },
    ".i18n-cgv-s3-1-l5": { "fr": "Procéder au paiement sécurisé", "en": "Proceed to secure payment" },
    ".i18n-cgv-s3-2-title": { "fr": "3.2 Confirmation", "en": "3.2 Confirmation" },
    ".i18n-cgv-s3-2-p1": { "fr": "Une fois la réservation validée et le paiement effectué, une confirmation est envoyée par email au Client avec :", "en": "Once the reservation is validated and payment is made, a confirmation is sent by email to the Customer with:" },
    ".i18n-cgv-s3-2-l1": { "fr": "Le numéro de réservation", "en": "The reservation number" },
    ".i18n-cgv-s3-2-l2": { "fr": "La date et l'heure de l'aventure", "en": "The date and time of the adventure" },
    ".i18n-cgv-s3-2-l3": { "fr": "Le lieu de rendez-vous", "en": "The meeting place" },
    ".i18n-cgv-s3-2-l4": { "fr": "Les conditions particulières liées à l'aventure", "en": "Specific conditions related to the adventure" },

    // cgv section 4
    ".i18n-cgv-s4-title": { "fr": "4. Tarifs et paiement", "en": "4. Prices and payment" },
    ".i18n-cgv-s4-1-title": { "fr": "4.1 Prix", "en": "4.1 Price" },
    ".i18n-cgv-s4-1-p1": { "fr": "Les prix des aventures sont indiqués en euros, toutes taxes comprises (TTC). Kodex se réserve le droit de modifier ses tarifs à tout moment, mais les aventures sont facturées sur la base des tarifs en vigueur au moment de la réservation.", "en": "Adventure prices are indicated in euros, all taxes included (TTC). Kodex reserves the right to modify its prices at any time, but adventures are billed based on the rates in effect at the time of reservation." },
    ".i18n-cgv-s4-2-title": { "fr": "4.2 Modes de paiement", "en": "4.2 Payment methods" },
    ".i18n-cgv-s4-2-p1": { "fr": "Le paiement s'effectue en ligne par :", "en": "Payment is made online by:" },
    ".i18n-cgv-s4-2-l1": { "fr": "Virement bancaire (pour les réservations entreprise)", "en": "Bank transfer (for corporate reservations)" },
    ".i18n-cgv-s4-2-p2": { "fr": "Le paiement est sécurisé et crypté. Les coordonnées bancaires ne sont jamais conservées sur nos serveurs.", "en": "Payment is secure and encrypted. Bank details are never stored on our servers." },
    ".i18n-cgv-s4-3-title": { "fr": "4.3 Facturation", "en": "4.3 Billing" },
    ".i18n-cgv-s4-3-p1": { "fr": "Une facture est automatiquement générée et envoyée par email après validation du paiement.", "en": "An invoice is automatically generated and sent by email after payment validation." },

    // cgv section 5
    ".i18n-cgv-s5-title": { "fr": "5. Annulation et remboursement", "en": "5. Cancellation and refund" },
    ".i18n-cgv-s5-1-title": { "fr": "Conditions d'annulation par le Client :", "en": "Cancellation conditions by the Customer:" },
    ".i18n-cgv-s5-1-l1": { "fr": "<strong>Plus de 7 jours avant :</strong> Remboursement intégral", "en": "<strong>More than 7 days before:</strong> Full refund" },
    ".i18n-cgv-s5-1-l2": { "fr": "<strong>Entre 3 et 7 jours avant :</strong> Remboursement à 50%", "en": "<strong>Between 3 and 7 days before:</strong> 50% refund" },
    ".i18n-cgv-s5-1-l3": { "fr": "<strong>Moins de 3 jours avant :</strong> Aucun remboursement", "en": "<strong>Less than 3 days before:</strong> No refund" },
    ".i18n-cgv-s5-1-l4": { "fr": "<strong>Report possible :</strong> Une fois, sous réserve de disponibilité", "en": "<strong>Postponement possible:</strong> Once, subject to availability" },
    ".i18n-cgv-s5-2-title": { "fr": "5.2 Annulation par Kodex", "en": "5.2 Cancellation by Kodex" },
    ".i18n-cgv-s5-2-p1": { "fr": "Kodex se réserve le droit d'annuler une aventure en cas de :", "en": "Kodex reserves the right to cancel an adventure in case of:" },
    ".i18n-cgv-s5-2-l1": { "fr": "Conditions météorologiques dangereuses", "en": "Dangerous weather conditions" },
    ".i18n-cgv-s5-2-l2": { "fr": "Force majeure", "en": "Force majeure" },
    ".i18n-cgv-s5-2-l3": { "fr": "Nombre insuffisant de participants", "en": "Insufficient number of participants" },
    ".i18n-cgv-s5-2-l4": { "fr": "Problème technique majeur", "en": "Major technical problem" },
    ".i18n-cgv-s5-2-p2": { "fr": "Dans ce cas, le Client sera intégralement remboursé ou un report sera proposé sans frais supplémentaires.", "en": "In this case, the Customer will be fully refunded or a postponement will be offered at no additional cost." },

    // cgv section 6
    ".i18n-cgv-s6-title": { "fr": "6. Obligations du Client", "en": "6. Customer Obligations" },
    ".i18n-cgv-s6-p1": { "fr": "Le Client s'engage à :", "en": "The Customer agrees to:" },
    ".i18n-cgv-s6-l1": { "fr": "Se présenter à l'heure au point de rendez-vous", "en": "Arrive on time at the meeting point" },
    ".i18n-cgv-s6-l2": { "fr": "Respecter les consignes de sécurité", "en": "Respect safety instructions" },
    ".i18n-cgv-s6-l3": { "fr": "Adopter un comportement respectueux envers le personnel et les autres participants", "en": "Adopt respectful behavior towards staff and other participants" },
    ".i18n-cgv-s6-l4": { "fr": "Ne pas être sous l'emprise d'alcool ou de substances illicites", "en": "Not be under the influence of alcohol or illegal substances" },
    ".i18n-cgv-s6-l5": { "fr": "Avoir une condition physique adaptée à l'aventure choisie", "en": "Have a physical condition suited to the chosen adventure" },

    // cgv section 7
    ".i18n-cgv-s7-title": { "fr": "7. Responsabilités et assurances", "en": "7. Responsibilities and insurance" },
    ".i18n-cgv-s7-p1": { "fr": "Kodex souscrit une assurance responsabilité civile professionnelle couvrant les dommages corporels et matériels causés aux participants dans le cadre des aventures.", "en": "Kodex holds professional civil liability insurance covering bodily injury and property damage caused to participants during the adventures." },
    ".i18n-cgv-s7-p2": { "fr": "Le Client est responsable de ses effets personnels. Kodex ne pourra être tenu responsable des vols, pertes ou dégradations.", "en": "The Customer is responsible for their personal belongings. Kodex cannot be held responsible for theft, loss, or damage." },

    // cgv section 8
    ".i18n-cgv-s8-title": { "fr": "8. Données personnelles", "en": "8. Personal data" },
    ".i18n-cgv-s8-p1": { "fr": "Les données personnelles collectées sont utilisées uniquement pour la gestion des réservations et la communication avec les Clients. Elles sont traitées conformément au RGPD. Pour plus d'informations, consultez notre <a href=\"index.php?action=confidentialite\">Politique de Confidentialité</a>.", "en": "The personal data collected is used solely for the management of reservations and communication with Customers. It is processed in accordance with the GDPR. For more information, see our <a href=\"index.php?action=confidentialite\">Privacy Policy</a>." },

    // cgv section 9
    ".i18n-cgv-s9-title": { "fr": "9. Droit applicable et litiges", "en": "9. Applicable law and disputes" },
    ".i18n-cgv-s9-p1": { "fr": "Les présentes CGV sont soumises au droit français. En cas de litige, une solution amiable sera recherchée avant toute action judiciaire. À défaut, les tribunaux français seront seuls compétents.", "en": "These TCS are subject to French law. In the event of a dispute, an amicable solution will be sought before any legal action. Failing this, the French courts shall have exclusive jurisdiction." },

    // cgv section 10
    ".i18n-cgv-s10-title": { "fr": "10. Contact", "en": "10. Contact" },
    ".i18n-cgv-s10-p1": { "fr": "Pour toute question concernant les CGV, contactez-nous :", "en": "For any questions regarding the TCS, contact us:" },
    ".i18n-cgv-s10-l2": { "fr": "Téléphone : +33 1 22 33 44 55", "en": "Phone: +33 1 22 33 44 55" },
    ".i18n-cgv-s10-l3": { "fr": "Adresse : 61 Rue Albert Camus, 68200 Mulhouse", "en": "Address: 61 Rue Albert Camus, 68200 Mulhouse" },

    // cvg footer
    ".i18n-cgv-date": { "fr": "Dernière mise à jour : 8 mars 2026", "en": "Last updated: March 8, 2026" },

    // compte page login/register
    ".i18n-mode-reg": { "fr": "S'inscrire", "en": "Register" },
    ".i18n-mode-log": { "fr": "Connexion", "en": "Login" },
    ".i18n-title-reg": { "fr": "Créez Votre Compte <span>Kodex</span>", "en": "Create Your <span>Kodex</span> Account" },
    ".i18n-title-log": { "fr": "Accédez à votre <span>Espace</span>", "en": "Access your <span>Account</span>" },

    // compte formulaire label
    ".i18n-lbl-nom": { "fr": "Nom", "en": "Last Name" },
    ".i18n-lbl-prenom": { "fr": "Prénom", "en": "First Name" },
    ".i18n-lbl-dob": { "fr": "Date de naissance", "en": "Date of Birth" },
    ".i18n-lbl-email": { "fr": "Email", "en": "Email" },
    ".i18n-lbl-phone": { "fr": "Numéro de téléphone", "en": "Phone Number" },
    ".i18n-lbl-pwd": { "fr": "Mot de passe", "en": "Password" },
    ".i18n-lbl-address": { "fr": "Adresse", "en": "Address" },
    ".i18n-lbl-city": { "fr": "Ville", "en": "City" },
    ".i18n-lbl-zip": { "fr": "Code Postal", "en": "Zip Code" },
    ".i18n-lbl-country": { "fr": "Pays", "en": "Country" },
    ".i18n-lbl-email-log": { "fr": "E-Mail", "en": "E-Mail" },
    ".i18n-lbl-pwd-log": { "fr": "Mot de passe", "en": "Password" },

    // notifications erreur formulaire
    ".i18n-err-login": { "fr": "Email ou mot de passe incorrect.", "en": "Incorrect email or password." },
    ".i18n-err-register": { "fr": "L'inscription a échoué. L'adresse email est peut-être déjà utilisée.", "en": "Registration failed. The email address may already be in use." },
    ".i18n-err-generic": { "fr": "Une erreur est survenue, veuillez réessayer.", "en": "An error occurred, please try again." },

    // champ nouveau mot de passe (profil)
    ".i18n-lbl-new-pwd": { "fr": "Nouveau mot de passe (laisser vide pour ne pas changer)", "en": "New password (leave empty to keep current)" },

    // compte formulaire boutons
    "input[name='inscription'], button[name='inscription']": { "fr": "S'inscrire", "en": "Register" },
    "input[name='test'], button[name='test']": { "fr": "Se connecter", "en": "Log In" },

    // compte links
    ".i18n-already-acc": { "fr": "Vous avez déjà un compte ?", "en": "Already have an account?" },
    ".i18n-link-log": { "fr": "Connectez-vous", "en": "Log in" },
    ".i18n-no-acc": { "fr": "Pas encore de compte ?", "en": "Don't have an account yet?" },
    ".i18n-link-reg": { "fr": "S'inscrire", "en": "Register" },

    // confidentialité header
    ".i18n-priv-title": { "fr": "Politique de Confidentialité", "en": "Privacy Policy" },
    ".i18n-priv-subtitle": { "fr": "Protection et gestion de vos données personnelles", "en": "Protection and management of your personal data" },

    // confidentialité section 1
    ".i18n-priv-s1-title": { "fr": "1. Introduction", "en": "1. Introduction" },
    ".i18n-priv-s1-p1": { "fr": "Kodex accorde une grande importance à la protection de vos données personnelles et au respect de votre vie privée. Cette politique de confidentialité vous informe sur la manière dont nous collectons, utilisons, stockons et protégeons vos données dans le cadre de l'utilisation de notre site <strong>www.kodex.fr</strong>.", "en": "Kodex attaches great importance to the protection of your personal data and respect for your privacy. This privacy policy informs you about how we collect, use, store, and protect your data when using our website <strong>www.kodex.fr</strong>." },
    ".i18n-priv-s1-p2": { "fr": "Cette politique est conforme au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés.", "en": "This policy complies with the General Data Protection Regulation (GDPR) and the French Data Protection Act." },

    // confidentialité section 2
    ".i18n-priv-s2-title": { "fr": "2. Responsable du traitement", "en": "2. Data Controller" },
    ".i18n-priv-s2-p1": { "fr": "Le responsable du traitement de vos données personnelles est :", "en": "The data controller for your personal data is:" },
    ".i18n-priv-s2-l1": { "fr": "<strong>Société :</strong> Kodex SAS", "en": "<strong>Company:</strong> Kodex SAS" },
    ".i18n-priv-s2-l2": { "fr": "<strong>Adresse :</strong> 61 Rue Albert Camus, 68200 Mulhouse", "en": "<strong>Address:</strong> 61 Rue Albert Camus, 68200 Mulhouse" },
    ".i18n-priv-s2-l3": { "fr": "<strong>Email :</strong> <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>", "en": "<strong>Email:</strong> <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>" },
    ".i18n-priv-s2-l4": { "fr": "<strong>Téléphone :</strong> +33 1 22 33 44 55", "en": "<strong>Phone:</strong> +33 1 22 33 44 55" },

    // confidentialité section 3
    ".i18n-priv-s3-title": { "fr": "3. Données collectées", "en": "3. Collected Data" },
    ".i18n-priv-s3-1-title": { "fr": "3.1 Données d'identification", "en": "3.1 Identification Data" },
    ".i18n-priv-s3-1-l1": { "fr": "Nom et prénom", "en": "First and last name" },
    ".i18n-priv-s3-1-l2": { "fr": "Adresse email", "en": "Email address" },
    ".i18n-priv-s3-1-l3": { "fr": "Numéro de téléphone", "en": "Phone number" },
    ".i18n-priv-s3-1-l4": { "fr": "Date de naissance", "en": "Date of birth" },
    ".i18n-priv-s3-1-l5": { "fr": "Adresse postale", "en": "Postal address" },
    ".i18n-priv-s3-2-title": { "fr": "3.2 Données de réservation", "en": "3.2 Reservation Data" },
    ".i18n-priv-s3-2-l1": { "fr": "Nombre de participants", "en": "Number of participants" },
    ".i18n-priv-s3-2-l2": { "fr": "Date et heure des aventures réservées", "en": "Date and time of reserved adventures" },
    ".i18n-priv-s3-2-l3": { "fr": "Préférences d'aventure", "en": "Adventure preferences" },
    ".i18n-priv-s3-2-l4": { "fr": "Historique des réservations", "en": "Reservation history" },
    ".i18n-priv-s3-3-title": { "fr": "3.3 Données de paiement", "en": "3.3 Payment Data" },
    ".i18n-priv-s3-3-l1": { "fr": "Informations de facturation", "en": "Billing information" },
    ".i18n-priv-s3-3-l2": { "fr": "Coordonnées bancaires (cryptées et non stockées sur nos serveurs)", "en": "Bank details (encrypted and not stored on our servers)" },
    ".i18n-priv-s3-3-l3": { "fr": "Historique des transactions", "en": "Transaction history" },
    ".i18n-priv-s3-4-title": { "fr": "3.4 Données de navigation", "en": "3.4 Navigation Data" },
    ".i18n-priv-s3-4-l1": { "fr": "Adresse IP", "en": "IP address" },
    ".i18n-priv-s3-4-l2": { "fr": "Type de navigateur", "en": "Browser type" },
    ".i18n-priv-s3-4-l3": { "fr": "Pages visitées", "en": "Visited pages" },
    ".i18n-priv-s3-4-l4": { "fr": "Durée de la visite", "en": "Duration of visit" },
    ".i18n-priv-s3-4-l5": { "fr": "Cookies (voir notre <a href=\"index.php?action=cookies\">Politique de Cookies</a>)", "en": "Cookies (see our <a href=\"index.php?action=cookies\">Cookie Policy</a>)" },

    // confidentialité section 4
    ".i18n-priv-s4-title": { "fr": "4. Finalités du traitement", "en": "4. Purposes of Processing" },
    ".i18n-priv-s4-p1": { "fr": "Vos données personnelles sont collectées et traitées pour les finalités suivantes :", "en": "Your personal data is collected and processed for the following purposes:" },
    ".i18n-priv-s4-p2": { "fr": "Finalités principales :", "en": "Main purposes:" },
    ".i18n-priv-s4-l1": { "fr": "<strong>Gestion des réservations :</strong> traitement et confirmation de vos réservations", "en": "<strong>Reservation management:</strong> processing and confirming your reservations" },
    ".i18n-priv-s4-l2": { "fr": "<strong>Gestion de votre compte :</strong> création et administration de votre espace personnel", "en": "<strong>Account management:</strong> creation and administration of your personal space" },
    ".i18n-priv-s4-l3": { "fr": "<strong>Communication :</strong> envoi de confirmations, rappels et informations importantes", "en": "<strong>Communication:</strong> sending confirmations, reminders, and important information" },
    ".i18n-priv-s4-l4": { "fr": "<strong>Paiement :</strong> traitement sécurisé des transactions", "en": "<strong>Payment:</strong> secure transaction processing" },
    ".i18n-priv-s4-l5": { "fr": "<strong>Service client :</strong> réponse à vos demandes et réclamations", "en": "<strong>Customer service:</strong> responding to your requests and complaints" },
    ".i18n-priv-s4-l6": { "fr": "<strong>Amélioration du service :</strong> analyse statistique pour améliorer l'expérience utilisateur", "en": "<strong>Service improvement:</strong> statistical analysis to improve user experience" },
    ".i18n-priv-s4-l7": { "fr": "<strong>Newsletter :</strong> envoi d'actualités et offres promotionnelles (avec votre consentement)", "en": "<strong>Newsletter:</strong> sending news and promotional offers (with your consent)" },
    ".i18n-priv-s4-l8": { "fr": "<strong>Obligations légales :</strong> respect de nos obligations comptables et fiscales", "en": "<strong>Legal obligations:</strong> compliance with our accounting and tax obligations" },

    // confidentialité section 5
    ".i18n-priv-s5-title": { "fr": "5. Base légale du traitement", "en": "5. Legal Basis for Processing" },
    ".i18n-priv-s5-p1": { "fr": "Nous traitons vos données sur la base de :", "en": "We process your data based on:" },
    ".i18n-priv-s5-l1": { "fr": "<strong>Votre consentement :</strong> pour l'envoi de la newsletter et les cookies non essentiels", "en": "<strong>Your consent:</strong> for sending the newsletter and non-essential cookies" },
    ".i18n-priv-s5-l2": { "fr": "<strong>L'exécution du contrat :</strong> pour la gestion des réservations et du compte", "en": "<strong>Execution of the contract:</strong> for reservation and account management" },
    ".i18n-priv-s5-l3": { "fr": "<strong>L'intérêt légitime :</strong> pour l'amélioration de nos services", "en": "<strong>Legitimate interest:</strong> for improving our services" },
    ".i18n-priv-s5-l4": { "fr": "<strong>Les obligations légales :</strong> pour la conservation des données comptables", "en": "<strong>Legal obligations:</strong> for retaining accounting data" },

    // confidentialité section 6
    ".i18n-priv-s6-title": { "fr": "6. Destinataires des données", "en": "6. Data Recipients" },
    ".i18n-priv-s6-p1": { "fr": "Vos données personnelles peuvent être transmises aux destinataires suivants :", "en": "Your personal data may be transmitted to the following recipients:" },
    ".i18n-priv-s6-l1": { "fr": "<strong>Personnel autorisé de Kodex :</strong> dans le cadre de leurs fonctions", "en": "<strong>Authorized Kodex staff:</strong> in the context of their duties" },
    ".i18n-priv-s6-l2": { "fr": "<strong>Prestataires de paiement :</strong> Stripe, PayPal (pour le traitement sécurisé des paiements)", "en": "<strong>Payment providers:</strong> Stripe, PayPal (for secure payment processing)" },
    ".i18n-priv-s6-l3": { "fr": "<strong>Prestataires d'hébergement :</strong> OVH (pour l'hébergement du site)", "en": "<strong>Hosting providers:</strong> OVH (for website hosting)" },
    ".i18n-priv-s6-l4": { "fr": "<strong>Prestataires de services :</strong> outils d'emailing, d'analyse statistique", "en": "<strong>Service providers:</strong> emailing and statistical analysis tools" },
    ".i18n-priv-s6-l5": { "fr": "<strong>Autorités compétentes :</strong> sur réquisition judiciaire uniquement", "en": "<strong>Competent authorities:</strong> upon legal requisition only" },
    ".i18n-priv-s6-p2": { "fr": "Tous nos prestataires sont soumis à des obligations strictes de confidentialité et de sécurité.", "en": "All our providers are subject to strict confidentiality and security obligations." },

    // confidentialité section 7
    ".i18n-priv-s7-title": { "fr": "7. Durée de conservation", "en": "7. Retention Period" },
    ".i18n-priv-s7-p1": { "fr": "Vos données personnelles sont conservées pendant les durées suivantes :", "en": "Your personal data is kept for the following periods:" },
    ".i18n-priv-s7-l1": { "fr": "<strong>Compte client actif :</strong> pendant toute la durée d'utilisation + 3 ans après la dernière activité", "en": "<strong>Active customer account:</strong> for the duration of use + 3 years after the last activity" },
    ".i18n-priv-s7-l2": { "fr": "<strong>Données de réservation :</strong> 10 ans (obligation légale comptable)", "en": "<strong>Reservation data:</strong> 10 years (legal accounting obligation)" },
    ".i18n-priv-s7-l3": { "fr": "<strong>Données de paiement :</strong> le temps de la transaction (cryptées)", "en": "<strong>Payment data:</strong> the time of the transaction (encrypted)" },
    ".i18n-priv-s7-l4": { "fr": "<strong>Newsletter :</strong> jusqu'à désinscription ou 3 ans sans interaction", "en": "<strong>Newsletter:</strong> until unsubscription or 3 years without interaction" },
    ".i18n-priv-s7-l5": { "fr": "<strong>Cookies :</strong> 13 mois maximum", "en": "<strong>Cookies:</strong> 13 months maximum" },
    ".i18n-priv-s7-l6": { "fr": "<strong>Logs de connexion :</strong> 12 mois", "en": "<strong>Connection logs:</strong> 12 months" },
    ".i18n-priv-s7-p2": { "fr": "À l'issue de ces durées, vos données sont supprimées ou anonymisées.", "en": "At the end of these periods, your data is deleted or anonymized." },

    // confidentialité section 8
    ".i18n-priv-s8-title": { "fr": "8. Vos droits", "en": "8. Your Rights" },
    ".i18n-priv-s8-p1": { "fr": "Conformément au RGPD, vous disposez des droits suivants :", "en": "In accordance with the GDPR, you have the following rights:" },
    ".i18n-priv-s8-1-title": { "fr": "8.1 Droit d'accès", "en": "8.1 Right of access" },
    ".i18n-priv-s8-1-p1": { "fr": "Vous pouvez obtenir la confirmation que vos données sont traitées et accéder à vos données.", "en": "You can obtain confirmation as to whether or not your data is being processed and access your data." },
    ".i18n-priv-s8-2-title": { "fr": "8.2 Droit de rectification", "en": "8.2 Right to rectification" },
    ".i18n-priv-s8-2-p1": { "fr": "Vous pouvez demander la correction de données inexactes ou incomplètes.", "en": "You can request the correction of inaccurate or incomplete data." },
    ".i18n-priv-s8-3-title": { "fr": "8.3 Droit à l'effacement", "en": "8.3 Right to erasure" },
    ".i18n-priv-s8-3-p1": { "fr": "Vous pouvez demander la suppression de vos données dans certaines conditions.", "en": "You can request the deletion of your data under certain conditions." },
    ".i18n-priv-s8-4-title": { "fr": "8.4 Droit à la limitation", "en": "8.4 Right to restriction of processing" },
    ".i18n-priv-s8-4-p1": { "fr": "Vous pouvez demander la limitation du traitement de vos données.", "en": "You can request the restriction of the processing of your data." },
    ".i18n-priv-s8-5-title": { "fr": "8.5 Droit à la portabilité", "en": "8.5 Right to data portability" },
    ".i18n-priv-s8-5-p1": { "fr": "Vous pouvez recevoir vos données dans un format structuré et couramment utilisé.", "en": "You can receive your data in a structured, commonly used format." },
    ".i18n-priv-s8-6-title": { "fr": "8.6 Droit d'opposition", "en": "8.6 Right to object" },
    ".i18n-priv-s8-6-p1": { "fr": "Vous pouvez vous opposer au traitement de vos données pour des raisons tenant à votre situation particulière.", "en": "You can object to the processing of your data for reasons relating to your particular situation." },
    ".i18n-priv-s8-7-title": { "fr": "8.7 Droit de retirer votre consentement", "en": "8.7 Right to withdraw consent" },
    ".i18n-priv-s8-7-p1": { "fr": "Vous pouvez retirer votre consentement à tout moment pour la newsletter et les cookies non essentiels.", "en": "You can withdraw your consent at any time for the newsletter and non-essential cookies." },
    ".i18n-priv-s8-8-p1": { "fr": "<strong>Pour exercer vos droits :</strong> Contactez-nous à <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a> avec une copie de votre pièce d'identité. Nous répondrons dans un délai maximum d'1 mois.", "en": "<strong>To exercise your rights:</strong> Contact us at <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a> with a copy of your ID. We will respond within a maximum of 1 month." },

    // confidentialité section 9
    ".i18n-priv-s9-title": { "fr": "9. Sécurité des données", "en": "9. Data Security" },
    ".i18n-priv-s9-p1": { "fr": "Kodex met en œuvre toutes les mesures techniques et organisationnelles appropriées pour protéger vos données personnelles :", "en": "Kodex implements all appropriate technical and organizational measures to protect your personal data:" },
    ".i18n-priv-s9-l1": { "fr": "Cryptage SSL/TLS pour les transmissions de données", "en": "SSL/TLS encryption for data transmissions" },
    ".i18n-priv-s9-l2": { "fr": "Authentification sécurisée des comptes", "en": "Secure account authentication" },
    ".i18n-priv-s9-l3": { "fr": "Contrôle d'accès strict aux données", "en": "Strict data access control" },
    ".i18n-priv-s9-l4": { "fr": "Sauvegardes régulières et sécurisées", "en": "Regular and secure backups" },
    ".i18n-priv-s9-l5": { "fr": "Pare-feu et systèmes de détection d'intrusion", "en": "Firewalls and intrusion detection systems" },
    ".i18n-priv-s9-l6": { "fr": "Formation du personnel à la protection des données", "en": "Staff training on data protection" },

    // confidentialité section 10
    ".i18n-priv-s10-title": { "fr": "10. Transfert de données hors UE", "en": "10. Data Transfers Outside the EU" },
    ".i18n-priv-s10-p1": { "fr": "Vos données personnelles sont hébergées et traitées au sein de l'Union Européenne. En cas de transfert hors UE, nous nous assurons que le pays destinataire offre un niveau de protection adéquat ou que des garanties appropriées sont mises en place (clauses contractuelles types de la Commission Européenne).", "en": "Your personal data is hosted and processed within the European Union. In the event of a transfer outside the EU, we ensure that the destination country offers an adequate level of protection or that appropriate safeguards are put in place (standard contractual clauses of the European Commission)." },

    // confidentialité section 11
    ".i18n-priv-s11-title": { "fr": "11. Données des mineurs", "en": "11. Minors' Data" },
    ".i18n-priv-s11-p1": { "fr": "Les services de Kodex sont destinés aux personnes âgées de plus de 16 ans. Si vous avez moins de 16 ans, vous devez obtenir le consentement de vos parents ou tuteurs légaux avant de créer un compte ou de réserver une aventure.", "en": "Kodex services are intended for persons over 16 years old. If you are under 16, you must obtain the consent of your parents or legal guardians before creating an account or booking an adventure." },

    // confidentialité section 12
    ".i18n-priv-s12-title": { "fr": "12. Modifications de la politique", "en": "12. Policy Changes" },
    ".i18n-priv-s12-p1": { "fr": "Kodex se réserve le droit de modifier cette politique de confidentialité à tout moment. Toute modification substantielle vous sera notifiée par email ou via un bandeau d'information sur le site. La nouvelle version entrera en vigueur dès sa publication sur le site.", "en": "Kodex reserves the right to modify this privacy policy at any time. Any substantial changes will be notified to you by email or via an information banner on the site. The new version will come into effect upon its publication on the site." },

    // confidentialité section 13
    ".i18n-priv-s13-title": { "fr": "13. Réclamation", "en": "13. Complaints" },
    ".i18n-priv-s13-p1": { "fr": "Si vous estimez que nous ne respectons pas vos droits, vous pouvez introduire une réclamation auprès de la CNIL (Commission Nationale de l'Informatique et des Libertés) :", "en": "If you believe that we are not respecting your rights, you can lodge a complaint with the CNIL (French National Commission on Informatics and Liberty):" },
    ".i18n-priv-s13-l1": { "fr": "<strong>Site web :</strong> <a href=\"https://www.cnil.fr\" target=\"_blank\" rel=\"noopener\">www.cnil.fr</a>", "en": "<strong>Website:</strong> <a href=\"https://www.cnil.fr\" target=\"_blank\" rel=\"noopener\">www.cnil.fr</a>" },
    ".i18n-priv-s13-l2": { "fr": "<strong>Adresse :</strong> 3 Place de Fontenoy, TSA 80715, 75334 Paris Cedex 07", "en": "<strong>Address:</strong> 3 Place de Fontenoy, TSA 80715, 75334 Paris Cedex 07, France" },
    ".i18n-priv-s13-l3": { "fr": "<strong>Téléphone :</strong> +33 1 53 73 22 22", "en": "<strong>Phone:</strong> +33 1 53 73 22 22" },

    // confidentialité section 14
    ".i18n-priv-s14-title": { "fr": "14. Contact", "en": "14. Contact" },
    ".i18n-priv-s14-p1": { "fr": "Pour toute question concernant cette politique de confidentialité ou l'exercice de vos droits :", "en": "For any questions regarding this privacy policy or the exercise of your rights:" },
    ".i18n-priv-s14-l1": { "fr": "Email : <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>", "en": "Email: <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>" },
    ".i18n-priv-s14-l2": { "fr": "Courrier : Kodex SAS - Protection des Données, 61 Rue Albert Camus, 68200 Mulhouse", "en": "Mail: Kodex SAS - Data Protection, 61 Rue Albert Camus, 68200 Mulhouse, France" },
    ".i18n-priv-s14-l3": { "fr": "Téléphone : +33 1 22 33 44 55", "en": "Phone: +33 1 22 33 44 55" },

    // confidentialité date
    ".i18n-priv-date": { "fr": "Dernière mise à jour : 8 mars 2026", "en": "Last updated: March 8, 2026" },

    // contact headers
    ".i18n-contact-title": { "fr": "Nous Contacter", "en": "Contact Us" },
    ".i18n-contact-subtitle": { "fr": "Une question ? Une demande ? N'hésitez pas à nous écrire", "en": "A question? A request? Feel free to write to us" },
    ".i18n-contact-form-h2": { "fr": "Remplissez le formulaire et nous vous contacterons.", "en": "Fill out the form and we will contact you." },

    // contact formulaire labels
    ".i18n-contact-lbl-nom": { "fr": "Nom", "en": "Last Name" },
    ".i18n-contact-lbl-prenom": { "fr": "Prénom", "en": "First Name" },
    ".i18n-contact-lbl-email": { "fr": "Email", "en": "Email" },
    ".i18n-contact-lbl-phone": { "fr": "Numéro de téléphone", "en": "Phone Number" },
    ".i18n-contact-lbl-req": { "fr": "Votre demande", "en": "Your Request" },

    // contact formulaire placeholders
    ".i18n-ph-nom": { "fr": "Votre nom", "en": "Your last name" },
    ".i18n-ph-prenom": { "fr": "Votre prénom", "en": "Your first name" },
    ".i18n-ph-req": { "fr": "Décrivez votre demande ici...", "en": "Describe your request here..." },

    // contact formularie boutons
    ".i18n-contact-btn-send": { "fr": "Envoyer", "en": "Send" },

    // contact info
    ".i18n-contact-info-h2": { "fr": "Informations de contact", "en": "Contact Information" },
    ".i18n-contact-info-email": { "fr": "Email", "en": "Email" },
    ".i18n-contact-info-phone": { "fr": "Téléphone", "en": "Phone" },
    ".i18n-contact-info-hours": { "fr": "Horaires", "en": "Business Hours" },
    ".i18n-contact-hours-val": { "fr": "Lun - Ven: 9h00 - 20h00<br>Sam : 10h00 - 22h00", "en": "Mon - Fri: 9:00 AM - 8:00 PM<br>Sat: 10:00 AM - 10:00 PM" },
    ".i18n-contact-info-addr": { "fr": "Adresse", "en": "Address" },
    ".i18n-contact-disclaimer": { "fr": "Nous nous engageons à répondre à tous les messages dans un délai de 24 heures pendant les jours ouvrables.", "en": "We are committed to responding to all messages within 24 hours on business days." },

    // cookies header
    ".i18n-cookie-title": { "fr": "Politique de Cookies", "en": "Cookie Policy" },
    ".i18n-cookie-subtitle": { "fr": "Informations sur l'utilisation des cookies sur Kodex", "en": "Information on the use of cookies on Kodex" },

    // cookies section 1
    ".i18n-cookie-s1-title": { "fr": "1. Qu'est-ce qu'un cookie ?", "en": "1. What is a cookie?" },
    ".i18n-cookie-s1-p1": { "fr": "Un cookie est un petit fichier texte déposé sur votre terminal (ordinateur, tablette ou mobile) lors de la visite d'un site internet. Il permet au site de mémoriser des informations sur votre visite, comme votre langue préférée et d'autres paramètres, afin de faciliter votre prochaine visite et de rendre le site plus utile.", "en": "A cookie is a small text file placed on your device (computer, tablet, or mobile) when visiting a website. It allows the site to remember information about your visit, such as your preferred language and other settings, to facilitate your next visit and make the site more useful." },

    // cookies section 2
    ".i18n-cookie-s2-title": { "fr": "2. Quels cookies utilisons-nous ?", "en": "2. What cookies do we use?" },
    ".i18n-cookie-s2-1-title": { "fr": "2.1 Cookies essentiels", "en": "2.1 Essential Cookies" },
    ".i18n-cookie-s2-1-p1": { "fr": "Ces cookies sont nécessaires au fonctionnement du site et ne peuvent pas être désactivés dans nos systèmes. Ils comprennent :", "en": "These cookies are necessary for the website to function and cannot be switched off in our systems. They include:" },
    ".i18n-cookie-s2-1-l1": { "fr": "Les cookies de session pour maintenir votre connexion", "en": "Session cookies to maintain your login" },
    ".i18n-cookie-s2-1-l2": { "fr": "Les cookies de panier pour mémoriser vos réservations", "en": "Cart cookies to remember your reservations" },
    ".i18n-cookie-s2-1-l3": { "fr": "Les cookies de sécurité pour protéger vos données", "en": "Security cookies to protect your data" },
    ".i18n-cookie-s2-1-l4": { "fr": "Les cookies de préférence linguistique", "en": "Language preference cookies" },

    ".i18n-cookie-s2-2-title": { "fr": "2.2 Cookies de performance", "en": "2.2 Performance Cookies" },
    ".i18n-cookie-s2-2-p1": { "fr": "Ces cookies nous permettent de compter les visites et les sources de trafic afin de mesurer et d'améliorer les performances de notre site :", "en": "These cookies allow us to count visits and traffic sources so we can measure and improve the performance of our site:" },
    ".i18n-cookie-s2-2-l1": { "fr": "Analyse du comportement des visiteurs", "en": "Analysis of visitor behavior" },
    ".i18n-cookie-s2-2-l2": { "fr": "Identification des pages les plus consultées", "en": "Identification of the most visited pages" },
    ".i18n-cookie-s2-2-l3": { "fr": "Détection des problèmes de navigation", "en": "Detection of navigation issues" },

    ".i18n-cookie-s2-3-title": { "fr": "2.3 Cookies fonctionnels", "en": "2.3 Functional Cookies" },
    ".i18n-cookie-s2-3-p1": { "fr": "Ces cookies permettent d'améliorer les fonctionnalités et la personnalisation :", "en": "These cookies enable the website to provide enhanced functionality and personalization:" },
    ".i18n-cookie-s2-3-l1": { "fr": "Mémorisation de vos préférences d'affichage", "en": "Remembering your display preferences" },
    ".i18n-cookie-s2-3-l2": { "fr": "Personnalisation des contenus proposés", "en": "Personalization of suggested content" },
    ".i18n-cookie-s2-3-l3": { "fr": "Amélioration de l'expérience utilisateur", "en": "Improvement of the user experience" },

    // cookies section 3
    ".i18n-cookie-s3-title": { "fr": "3. Durée de conservation", "en": "3. Retention Period" },
    ".i18n-cookie-s3-p1": { "fr": "La durée de conservation des cookies varie selon leur nature :", "en": "The retention period of cookies varies depending on their nature:" },
    ".i18n-cookie-s3-l1": { "fr": "<strong>Cookies de session :</strong> supprimés à la fermeture du navigateur", "en": "<strong>Session cookies:</strong> deleted when the browser is closed" },
    ".i18n-cookie-s3-l2": { "fr": "<strong>Cookies persistants :</strong> conservés jusqu'à 13 mois maximum", "en": "<strong>Persistent cookies:</strong> kept for up to 13 months maximum" },
    ".i18n-cookie-s3-l3": { "fr": "<strong>Cookies de préférence :</strong> conservés jusqu'à 12 mois", "en": "<strong>Preference cookies:</strong> kept for up to 12 months" },

    // cookies section 4
    ".i18n-cookie-s4-title": { "fr": "4. Comment gérer vos cookies ?", "en": "4. How to manage your cookies?" },
    ".i18n-cookie-s4-p1": { "fr": "Vous pouvez à tout moment choisir de désactiver ces cookies. Votre navigateur peut également être paramétré pour vous signaler les cookies qui sont déposés dans votre terminal et vous demander de les accepter ou non.", "en": "You can choose to disable these cookies at any time. Your browser can also be set to notify you of the cookies that are stored on your device and ask you whether to accept them or not." },
    ".i18n-cookie-s4-p2": { "fr": "<strong>Important :</strong> Le refus de certains cookies peut empêcher l'utilisation de certaines fonctionnalités du site, notamment la réservation d'aventures et l'accès à votre compte.", "en": "<strong>Important:</strong> Refusing certain cookies may prevent the use of certain site features, particularly booking adventures and accessing your account." },
    ".i18n-cookie-s4-sub": { "fr": "Configuration par navigateur", "en": "Browser configuration" },
    ".i18n-cookie-s4-l1": { "fr": "<strong>Google Chrome :</strong> Menu > Paramètres > Confidentialité et sécurité > Cookies", "en": "<strong>Google Chrome:</strong> Menu > Settings > Privacy and security > Cookies" },
    ".i18n-cookie-s4-l2": { "fr": "<strong>Mozilla Firefox :</strong> Menu > Options > Vie privée et sécurité", "en": "<strong>Mozilla Firefox:</strong> Menu > Options > Privacy & Security" },
    ".i18n-cookie-s4-l3": { "fr": "<strong>Safari :</strong> Préférences > Confidentialité", "en": "<strong>Safari:</strong> Preferences > Privacy" },
    ".i18n-cookie-s4-l4": { "fr": "<strong>Microsoft Edge :</strong> Paramètres > Confidentialité > Cookies", "en": "<strong>Microsoft Edge:</strong> Settings > Privacy > Cookies" },

    // cookies section 5
    ".i18n-cookie-s5-title": { "fr": "5. Cookies tiers", "en": "5. Third-Party Cookies" },
    ".i18n-cookie-s5-p1": { "fr": "Nous pouvons autoriser des partenaires à déposer des cookies sur votre terminal lors de votre visite :", "en": "We may allow partners to place cookies on your device during your visit:" },
    ".i18n-cookie-s5-l1": { "fr": "Services de paiement sécurisé (Stripe, PayPal)", "en": "Secure payment services (Stripe, PayPal)" },
    ".i18n-cookie-s5-l2": { "fr": "Outils d'analyse d'audience", "en": "Audience analysis tools" },
    ".i18n-cookie-s5-l3": { "fr": "Réseaux sociaux (si vous partagez du contenu)", "en": "Social networks (if you share content)" },
    ".i18n-cookie-s5-p2": { "fr": "Ces cookies tiers sont soumis aux politiques de confidentialité de ces partenaires.", "en": "These third-party cookies are subject to the privacy policies of these partners." },

    // cookies section 6
    ".i18n-cookie-s6-title": { "fr": "6. Vos droits", "en": "6. Your Rights" },
    ".i18n-cookie-s6-p1": { "fr": "Conformément au RGPD, vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données vous concernant. Pour exercer ces droits, contactez-nous à l'adresse : <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>", "en": "In accordance with the GDPR, you have the right to access, modify, rectify, and delete data concerning you. To exercise these rights, contact us at: <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>" },

    // cookies section 7
    ".i18n-cookie-s7-title": { "fr": "7. Modification de la politique", "en": "7. Policy Modification" },
    ".i18n-cookie-s7-p1": { "fr": "Nous nous réservons le droit de modifier cette politique de cookies à tout moment. Toute modification sera publiée sur cette page avec une nouvelle date de mise à jour.", "en": "We reserve the right to modify this cookie policy at any time. Any modifications will be published on this page with a new update date." },

    // cookies date
    ".i18n-cookie-date": { "fr": "Dernière mise à jour : 8 mars 2026", "en": "Last updated: March 8, 2026" },

    // entreprise hero
    ".i18n-b2b-hero-title": { "fr": "Kodex pour votre <strong>Entreprise</strong>", "en": "Kodex for your <strong>Business</strong>" },
    ".i18n-b2b-hero-sub": { "fr": "Team building, séminaires, événements : vivez l'aventure avec vos <strong>équipes</strong>", "en": "Team building, seminars, events: live the adventure with your <strong>teams</strong>" },

    // entreprise intro
    ".i18n-b2b-intro-h2": { "fr": "Renforcez la <strong>Cohésion</strong>", "en": "Strengthen <strong>Cohesion</strong>" },
    ".i18n-b2b-intro-p1": { "fr": "Nos escape games en extérieur sont le cadre idéal pour du team building. Vos collaborateurs devront faire preuve de communication, de logique et de créativité pour résoudre les énigmes ensemble.", "en": "Our outdoor escape games are the ideal setting for team building. Your employees will have to use communication, logic, and creativity to solve puzzles together." },
    ".i18n-b2b-intro-p2": { "fr": "Chaque aventure est un véritable défi collectif qui met en lumière les forces de chaque membre de votre équipe. Découvrez une nouvelle facette de vos collègues tout en explorant votre ville.", "en": "Each adventure is a true collective challenge that highlights the strengths of each member of your team. Discover a new side of your colleagues while exploring your city." },

    // entreprise avantages
    ".i18n-b2b-adv-title": { "fr": "Les <strong>Avantages</strong> Kodex", "en": "The Kodex <strong>Advantages</strong>" },
    ".i18n-b2b-adv1-h3": { "fr": "Sur Mesure", "en": "Tailor-Made" },
    ".i18n-b2b-adv1-p": { "fr": "Nous adaptons nos aventures selon vos objectifs : intégration de nouveaux membres, renforcement d'équipe ou simplement un moment de détente.", "en": "We adapt our adventures to your goals: integrating new members, team strengthening, or simply a moment of relaxation." },
    ".i18n-b2b-adv2-h3": { "fr": "Clé en Main", "en": "Turnkey" },
    ".i18n-b2b-adv2-p": { "fr": "De l'organisation à l'animation, nous nous occupons de tout. Vous n'avez plus qu'à profiter de l'expérience avec vos collaborateurs.", "en": "From organization to animation, we take care of everything. You just have to enjoy the experience with your colleagues." },
    ".i18n-b2b-adv3-h3": { "fr": "Scalable", "en": "Scalable" },
    ".i18n-b2b-adv3-p": { "fr": "Que vous soyez 5 ou 100, nous ajustons le format. Plusieurs équipes peuvent jouer en même temps avec un classement final.", "en": "Whether you are 5 or 100, we adjust the format. Multiple teams can play at the same time with a final ranking." },
    ".i18n-b2b-adv4-h3": { "fr": "En Extérieur", "en": "Outdoors" },
    ".i18n-b2b-adv4-p": { "fr": "Sortez des murs du bureau ! Nos aventures se déroulent en plein air, dans le cadre unique des rues de votre ville.", "en": "Get out of the office walls! Our adventures take place outdoors, in the unique setting of your city's streets." },

    // entreprise offres
    ".i18n-b2b-off-title": { "fr": "Nos <strong>Offres</strong>", "en": "Our <strong>Offers</strong>" },
    ".i18n-b2b-off1-h3": { "fr": "Team Building", "en": "Team Building" },
    ".i18n-b2b-off1-p": { "fr": "Renforcez la cohésion de vos équipes avec nos aventures collaboratives en extérieur. idéal pour des groupes de 5 à 30 personnes.", "en": "Strengthen your teams' cohesion with our outdoor collaborative adventures. Ideal for groups of 5 to 30 people." },
    ".i18n-b2b-off1-d1": { "fr": "2h à 3h", "en": "2 to 3 hours" },
    ".i18n-b2b-off1-d2": { "fr": "5 à 30 pers.", "en": "5 to 30 people" },
    ".i18n-b2b-off2-h3": { "fr": "Séminaire", "en": "Seminar" },
    ".i18n-b2b-off2-p": { "fr": "Intégrez une aventure Kodex à votre séminaire d'entreprise pour un moment de partage unique et mémorable entre collègues.", "en": "Integrate a Kodex adventure into your corporate seminar for a unique and memorable moment of sharing between colleagues." },
    ".i18n-b2b-off2-d1": { "fr": "Demi-journée", "en": "Half-day" },
    ".i18n-b2b-off2-d2": { "fr": "10 à 100 pers.", "en": "10 to 100 people" },
    ".i18n-b2b-off3-h3": { "fr": "Événement Privé", "en": "Private Event" },
    ".i18n-b2b-off3-p": { "fr": "Anniversaire d'entreprise, lancement de produit, soirée client : nous créons une aventure sur mesure pour votre événement.", "en": "Company anniversary, product launch, client evening: we create a tailor-made adventure for your event." },
    ".i18n-b2b-off3-d1": { "fr": "Sur mesure", "en": "Custom" },
    ".i18n-b2b-off3-d2": { "fr": "Illimité", "en": "Unlimited" },

    // entreprise témoignage
    ".i18n-b2b-test-title": { "fr": "Ils nous font <strong>Confiance</strong>", "en": "They <strong>Trust</strong> Us" },
    ".i18n-b2b-test1-p": { "fr": "Une expérience incroyable pour notre team building annuel. Les équipes en parlent encore des semaines après !", "en": "An incredible experience for our annual team building. The teams are still talking about it weeks later!" },
    ".i18n-b2b-test1-job": { "fr": "DRH - TechCorp", "en": "HR Director - TechCorp" },
    ".i18n-b2b-test2-p": { "fr": "L'équipe Kodex a su s'adapter à nos contraintes et créer un parcours sur mesure. Résultat : 100% de satisfaction.", "en": "The Kodex team was able to adapt to our constraints and create a custom route. Result: 100% satisfaction." },
    ".i18n-b2b-test2-job": { "fr": "CEO - StartupHub", "en": "CEO - StartupHub" },
    ".i18n-b2b-test3-p": { "fr": "Nos collaborateurs ont redécouvert Mulhouse ensemble. Le format extérieur change vraiment des activités classiques.", "en": "Our employees rediscovered Mulhouse together. The outdoor format is a real change from traditional activities." },
    ".i18n-b2b-test3-job": { "fr": "Responsable Events - InnoGroup", "en": "Events Manager - InnoGroup" },

    // entreprise cta
    ".i18n-b2b-cta-title": { "fr": "Prêt à Fédérer vos <strong>Équipes</strong> ?", "en": "Ready to Unite your <strong>Teams</strong>?" },
    ".i18n-b2b-cta-desc": { "fr": "Contactez-nous pour un devis personnalisé adapté à vos besoins", "en": "Contact us for a personalized quote tailored to your needs" },
    ".i18n-b2b-cta-btn1": { "fr": "Demander un devis", "en": "Request a quote" },
    ".i18n-b2b-cta-btn2": { "fr": "Voir les aventures", "en": "See adventures" },

    // informations hero
    ".i18n-about-hero-title": { "fr": "Qui Sommes-<strong>Nous ?</strong>", "en": "Who Are <strong>We?</strong>" },
    ".i18n-about-hero-sub": { "fr": "L'aventure commence ici, avec <strong>Kodex</strong>", "en": "The adventure begins here, with <strong>Kodex</strong>" },

    // informations histoire
    ".i18n-about-hist-title": { "fr": "Notre <strong>Histoire</strong>", "en": "Our <strong>History</strong>" },
    ".i18n-about-hist-p1": { "fr": "Née en 2026, <strong>Kodex</strong> est bien plus qu'une simple entreprise d'escape games. Nous sommes nés d'une passion commune : celle de transformer les rues de nos villes en terrains de jeu géants où l'aventure et l'énigme se mêlent à la réalité urbaine.", "en": "Born in 2026, <strong>Kodex</strong> is much more than a simple escape game company. We were born from a shared passion: to transform the streets of our cities into giant playgrounds where adventure and puzzles blend with urban reality." },
    ".i18n-about-hist-p2": { "fr": "Inspirés par les jeux d'évasion traditionnels et le geocaching, nous avons voulu créer une expérience unique qui combine exploration urbaine, résolution d'énigmes et storytelling immersif. Chaque aventure Kodex est conçue pour vous faire découvrir votre ville sous un nouvel angle.", "en": "Inspired by traditional escape games and geocaching, we wanted to create a unique experience that combines urban exploration, puzzle-solving, and immersive storytelling. Each Kodex adventure is designed to help you discover your city from a new angle." },

    // informations valeurs
    ".i18n-about-miss-title": { "fr": "Notre <strong>Mission</strong>", "en": "Our <strong>Mission</strong>" },
    ".i18n-about-miss-p": { "fr": "Transformer chaque rue, chaque monument, chaque recoin de la ville en une page d'histoire interactive où vous êtes le héros.", "en": "To transform every street, every monument, every corner of the city into an interactive page of history where you are the hero." },
    ".i18n-about-val1-h3": { "fr": "Innovation", "en": "Innovation" },
    ".i18n-about-val1-p": { "fr": "Nous repoussons les limites du jeu en extérieur en intégrant technologies modernes et narration captivante.", "en": "We push the boundaries of outdoor gaming by integrating modern technologies and captivating storytelling." },
    ".i18n-about-val2-h3": { "fr": "Partage", "en": "Sharing" },
    ".i18n-about-val2-p": { "fr": "Nos aventures sont conçues pour créer des moments inoubliables entre amis, en famille ou entre collègues.", "en": "Our adventures are designed to create unforgettable moments with friends, family, or colleagues." },
    ".i18n-about-val3-h3": { "fr": "Excellence", "en": "Excellence" },
    ".i18n-about-val3-p": { "fr": "Chaque détail compte. De l'écriture du scénario à l'expérience terrain, nous visons la perfection.", "en": "Every detail matters. From scriptwriting to the field experience, we strive for perfection." },
    ".i18n-about-val4-h3": { "fr": "Découverte", "en": "Discovery" },
    ".i18n-about-val4-p": { "fr": "Redécouvrez votre ville à travers nos yeux et explorez des lieux que vous n'auriez jamais remarqués.", "en": "Rediscover your city through our eyes and explore places you would never have noticed." },

    // informations stats
    ".i18n-about-stats-title": { "fr": "<strong>Kodex</strong> en Chiffres", "en": "<strong>Kodex</strong> in Numbers" },
    ".i18n-about-stat1": { "fr": "Aventures Créées", "en": "Adventures Created" },
    ".i18n-about-stat2": { "fr": "Joueurs Conquis", "en": "Players Won Over" },
    ".i18n-about-stat3": { "fr": "Satisfaction Client", "en": "Customer Satisfaction" },
    ".i18n-about-stat4": { "fr": "Villes Explorées", "en": "Cities Explored" },

    // informations projet étudiant
    ".i18n-about-proj-badge": { "fr": "Projet Étudiant", "en": "Student Project" },
    ".i18n-about-proj-title": { "fr": "Un Projet Universitaire <strong>Ambitieux</strong>", "en": "An <strong>Ambitious</strong> University Project" },
    ".i18n-about-proj-p1": { "fr": "Kodex est né dans le cadre de la <strong>SAE 401</strong> au sein du département MMI de l'IUT de Mulhouse. Ce projet représente l'aboutissement de nos études en BUT Métiers du Multimédia et de l'Internet.", "en": "Kodex was born as part of the <strong>SAE 401</strong> within the MMI department of the IUT of Mulhouse. This project represents the culmination of our studies in the Multimedia and Internet Professions bachelor's degree." },
    ".i18n-about-proj-p2": { "fr": "Encadrés par des professionnels passionnés, nous avons conçu ce système de réservation d'escape games en extérieur de A à Z : de la conception du concept au développement de la plateforme web, en passant par la création des aventures et l'identité visuelle.", "en": "Supervised by passionate professionals, we designed this outdoor escape game booking system from A to Z: from the concept design to the development of the web platform, including the creation of adventures and the visual identity." },
    ".i18n-about-proj-l2": { "fr": "Département MMI", "en": "MMI Department" },

    // informations cta
    ".i18n-about-cta-title": { "fr": "Prêt à Vivre <strong>l'Aventure ?</strong>", "en": "Ready to Live <strong>the Adventure?</strong>" },
    ".i18n-about-cta-sub": { "fr": "Rejoignez des milliers d'aventuriers et découvrez votre ville comme jamais auparavant", "en": "Join thousands of adventurers and discover your city like never before" },
    ".i18n-about-cta-btn1": { "fr": "Découvrir nos aventures", "en": "Discover our adventures" },
    ".i18n-about-cta-btn2": { "fr": "Nous contacter", "en": "Contact us" },

    // mentions légales header
    ".i18n-legal-title": { "fr": "Mentions Légales", "en": "Legal Notice" },
    ".i18n-legal-subtitle": { "fr": "Informations légales et éditoriales du site Kodex", "en": "Legal and editorial information of the Kodex website" },

    // mentions légales section 1
    ".i18n-legal-s1-title": { "fr": "1. Éditeur du site", "en": "1. Site Publisher" },
    ".i18n-legal-s1-p1": { "fr": "Le site <strong>www.kodex.fr</strong> est édité par :", "en": "The website <strong>www.kodex.fr</strong> is published by:" },
    ".i18n-legal-s1-l1": { "fr": "<strong>Raison sociale :</strong> Kodex SAS", "en": "<strong>Company Name:</strong> Kodex SAS" },
    ".i18n-legal-s1-l2": { "fr": "<strong>Forme juridique :</strong> Société par Actions Simplifiée", "en": "<strong>Legal Form:</strong> Simplified Joint Stock Company (SAS)" },
    ".i18n-legal-s1-l3": { "fr": "<strong>Capital social :</strong> 50 000 €", "en": "<strong>Share Capital:</strong> €50,000" },
    ".i18n-legal-s1-l4": { "fr": "<strong>SIRET :</strong> 123 456 789 00012", "en": "<strong>SIRET:</strong> 123 456 789 00012" },
    ".i18n-legal-s1-l5": { "fr": "<strong>N° TVA intracommunautaire :</strong> FR12 123456789", "en": "<strong>Intracommunity VAT No:</strong> FR12 123456789" },
    ".i18n-legal-s1-l6": { "fr": "<strong>Siège social :</strong> 61 Rue Albert Camus, 68200 Mulhouse, France", "en": "<strong>Head Office:</strong> 61 Rue Albert Camus, 68200 Mulhouse, France" },
    ".i18n-legal-s1-l7": { "fr": "<strong>Email :</strong> <a href=\"mailto:contact@kodex.fr\">contact@kodex.fr</a>", "en": "<strong>Email:</strong> <a href=\"mailto:contact@kodex.fr\">contact@kodex.fr</a>" },
    ".i18n-legal-s1-l8": { "fr": "<strong>Téléphone :</strong> +33 1 22 33 44 55", "en": "<strong>Phone:</strong> +33 1 22 33 44 55" },

    // mentions légales section 2
    ".i18n-legal-s2-title": { "fr": "2. Directeur de la publication", "en": "2. Publication Director" },
    ".i18n-legal-s2-p1": { "fr": "Le directeur de la publication du site est <strong>Sebastien LEHMANN</strong>, en qualité de Président de Kodex SAS.", "en": "The publication director of the site is <strong>Sebastien LEHMANN</strong>, in his capacity as President of Kodex SAS." },

    // mentions légales section 3
    ".i18n-legal-s3-title": { "fr": "3. Hébergement", "en": "3. Hosting" },
    ".i18n-legal-s3-p1": { "fr": "Le site est hébergé par :", "en": "The site is hosted by:" },
    ".i18n-legal-s3-l1": { "fr": "<strong>Hébergeur :</strong> OVH SAS", "en": "<strong>Hosting Provider:</strong> OVH SAS" },
    ".i18n-legal-s3-l2": { "fr": "<strong>Siège social :</strong> 2 rue Kellermann, 59100 Roubaix, France", "en": "<strong>Head Office:</strong> 2 rue Kellermann, 59100 Roubaix, France" },
    ".i18n-legal-s3-l3": { "fr": "<strong>Téléphone :</strong> +33 9 72 10 10 07", "en": "<strong>Phone:</strong> +33 9 72 10 10 07" },
    ".i18n-legal-s3-l4": { "fr": "<strong>Site web :</strong> <a href=\"https://www.ovh.com\" target=\"_blank\" rel=\"noopener\">www.ovh.com</a>", "en": "<strong>Website:</strong> <a href=\"https://www.ovh.com\" target=\"_blank\" rel=\"noopener\">www.ovh.com</a>" },

    // mentions légales section 4
    ".i18n-legal-s4-title": { "fr": "4. Développement et conception", "en": "4. Development and Design" },
    ".i18n-legal-s4-p1": { "fr": "Le site a été développé dans le cadre d'un projet étudiant par :", "en": "The site was developed as part of a student project by:" },
    ".i18n-legal-s4-l1": { "fr": "<strong>Établissement :</strong> IUT de Mulhouse - Département MMI", "en": "<strong>Institution:</strong> IUT of Mulhouse - MMI Department" },
    ".i18n-legal-s4-l2": { "fr": "<strong>Formation :</strong> BUT Métiers du Multimédia et de l'Internet", "en": "<strong>Program:</strong> Bachelor in Multimedia and Internet Professions" },
    ".i18n-legal-s4-l3": { "fr": "<strong>Année :</strong> 2025-2026", "en": "<strong>Year:</strong> 2025-2026" },
    ".i18n-legal-s4-l4": { "fr": "<strong>Projet :</strong> SAE 401", "en": "<strong>Project:</strong> SAE 401" },

    // mentions légales section 5
    ".i18n-legal-s5-title": { "fr": "5. Propriété intellectuelle", "en": "5. Intellectual Property" },
    ".i18n-legal-s5-1-title": { "fr": "5.1 Droits d'auteur", "en": "5.1 Copyright" },
    ".i18n-legal-s5-1-p1": { "fr": "L'ensemble du contenu de ce site (textes, images, vidéos, logos, graphismes, icônes) est protégé par le droit d'auteur et appartient exclusivement à Kodex ou à ses partenaires.", "en": "All content on this site (texts, images, videos, logos, graphics, icons) is protected by copyright and belongs exclusively to Kodex or its partners." },
    ".i18n-legal-s5-1-p2": { "fr": "Toute reproduction, représentation, modification, publication ou adaptation, totale ou partielle, est strictement interdite sans l'autorisation écrite préalable de Kodex.", "en": "Any reproduction, representation, modification, publication, or adaptation, in whole or in part, is strictly prohibited without the prior written consent of Kodex." },
    ".i18n-legal-s5-2-title": { "fr": "5.2 Marques", "en": "5.2 Trademarks" },
    ".i18n-legal-s5-2-p1": { "fr": "Les marques, logos et signes distinctifs reproduits sur ce site sont la propriété exclusive de Kodex. Toute reproduction ou utilisation non autorisée constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle.", "en": "The trademarks, logos, and distinctive signs reproduced on this site are the exclusive property of Kodex. Any unauthorized reproduction or use constitutes an infringement punishable under Articles L.335-2 and following of the Intellectual Property Code." },
    ".i18n-legal-s5-3-title": { "fr": "5.3 Licence d'utilisation", "en": "5.3 License to Use" },
    ".i18n-legal-s5-3-p1": { "fr": "La navigation sur le site vous confère un droit d'usage privé, non collectif et non exclusif du contenu. Ce droit ne comporte aucune cession de droits de propriété intellectuelle.", "en": "Browsing the site grants you a private, non-collective, and non-exclusive right to use the content. This right does not include any transfer of intellectual property rights." },

    // mentions légales section 6
    ".i18n-legal-s6-title": { "fr": "6. Protection des données personnelles", "en": "6. Protection of Personal Data" },
    ".i18n-legal-s6-p1": { "fr": "Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés, vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition aux données personnelles vous concernant.", "en": "In accordance with the General Data Protection Regulation (GDPR) and the French Data Protection Act, you have the right to access, rectify, delete, and object to the processing of your personal data." },
    ".i18n-legal-s6-p2": { "fr": "Pour exercer ces droits, contactez-nous à : <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>", "en": "To exercise these rights, contact us at: <a href=\"mailto:privacy@kodex.fr\">privacy@kodex.fr</a>" },
    ".i18n-legal-s6-p3": { "fr": "Pour plus d'informations, consultez notre <a href=\"index.php?action=confidentialite\">Politique de Confidentialité</a>.", "en": "For more information, please consult our <a href=\"index.php?action=confidentialite\">Privacy Policy</a>." },
    ".i18n-legal-s6-p4": { "fr": "<strong>Responsable du traitement des données :</strong> Kodex SAS, représentée par son Président Jean Dupont", "en": "<strong>Data Controller:</strong> Kodex SAS, represented by its President Jean Dupont" },

    // mentions légales section 7
    ".i18n-legal-s7-title": { "fr": "7. Cookies", "en": "7. Cookies" },
    ".i18n-legal-s7-p1": { "fr": "Le site utilise des cookies pour améliorer l'expérience utilisateur, réaliser des statistiques de visites et personnaliser les contenus.", "en": "The site uses cookies to improve user experience, generate visit statistics, and personalize content." },
    ".i18n-legal-s7-p2": { "fr": "Pour en savoir plus sur la gestion des cookies, consultez notre <a href=\"index.php?action=cookies\">Politique de Cookies</a>.", "en": "To learn more about cookie management, see our <a href=\"index.php?action=cookies\">Cookie Policy</a>." },

    // mentions légales section 8
    ".i18n-legal-s8-title": { "fr": "8. Liens hypertextes", "en": "8. Hyperlinks" },
    ".i18n-legal-s8-p1": { "fr": "Le site peut contenir des liens vers des sites externes. Kodex n'exerce aucun contrôle sur ces sites et décline toute responsabilité quant à leur contenu.", "en": "The site may contain links to external sites. Kodex exercises no control over these sites and declines all responsibility for their content." },
    ".i18n-legal-s8-p2": { "fr": "Tout lien hypertexte pointant vers le site www.kodex.fr doit faire l'objet d'une autorisation préalable écrite.", "en": "Any hyperlink pointing to the website www.kodex.fr requires prior written authorization." },

    // mentions légales section 9
    ".i18n-legal-s9-title": { "fr": "9. Limitation de responsabilité", "en": "9. Limitation of Liability" },
    ".i18n-legal-s9-p1": { "fr": "Kodex met tout en œuvre pour assurer l'exactitude et la mise à jour des informations diffusées sur ce site. Toutefois, Kodex ne peut garantir l'exactitude, la précision ou l'exhaustivité des informations mises à disposition.", "en": "Kodex makes every effort to ensure the accuracy and updating of the information published on this site. However, Kodex cannot guarantee the exactness, precision, or completeness of the information provided." },
    ".i18n-legal-s9-p2": { "fr": "Kodex ne saurait être tenu responsable :", "en": "Kodex cannot be held liable for:" },
    ".i18n-legal-s9-l1": { "fr": "Des interruptions temporaires du site pour maintenance ou mise à jour", "en": "Temporary interruptions of the site for maintenance or updates" },
    ".i18n-legal-s9-l2": { "fr": "Des dommages directs ou indirects résultant de l'accès ou de l'utilisation du site", "en": "Direct or indirect damages resulting from accessing or using the site" },
    ".i18n-legal-s9-l3": { "fr": "Des virus informatiques ou autres éléments nuisibles", "en": "Computer viruses or other harmful elements" },
    ".i18n-legal-s9-l4": { "fr": "Des actes de piratage ou d'intrusion dans le système", "en": "Acts of hacking or intrusion into the system" },

    // mentions section 10
    ".i18n-legal-s10-title": { "fr": "10. Droit applicable", "en": "10. Applicable Law" },
    ".i18n-legal-s10-p1": { "fr": "Les présentes mentions légales sont régies par le droit français. Tout litige relatif à l'utilisation du site sera soumis à la compétence exclusive des tribunaux français.", "en": "These legal notices are governed by French law. Any dispute relating to the use of the site will be subject to the exclusive jurisdiction of the French courts." },

    // mentions section 11
    ".i18n-legal-s11-title": { "fr": "11. Médiation", "en": "11. Mediation" },
    ".i18n-legal-s11-p1": { "fr": "Conformément à l'article L.612-1 du Code de la consommation, Kodex propose un dispositif de médiation de la consommation. L'entité de médiation est :", "en": "In accordance with Article L.612-1 of the French Consumer Code, Kodex offers a consumer mediation scheme. The mediation entity is:" },
    ".i18n-legal-s11-l1": { "fr": "<strong>Médiateur :</strong> Médiateur de la Consommation", "en": "<strong>Mediator:</strong> Consumer Mediator" },
    ".i18n-legal-s11-l2": { "fr": "<strong>Site web :</strong> <a href=\"https://www.mediateur-consommation.fr\" target=\"_blank\" rel=\"noopener\">www.mediateur-consommation.fr</a>", "en": "<strong>Website:</strong> <a href=\"https://www.mediateur-consommation.fr\" target=\"_blank\" rel=\"noopener\">www.mediateur-consommation.fr</a>" },

    // mentions section 12
    ".i18n-legal-s12-title": { "fr": "12. Contact", "en": "12. Contact" },
    ".i18n-legal-s12-p1": { "fr": "Pour toute question concernant les mentions légales, vous pouvez nous contacter :", "en": "For any questions regarding the legal notice, you can contact us:" },
    ".i18n-legal-s12-l1": { "fr": "Par email : <a href=\"mailto:legal@kodex.fr\">legal@kodex.fr</a>", "en": "By email: <a href=\"mailto:legal@kodex.fr\">legal@kodex.fr</a>" },
    ".i18n-legal-s12-l2": { "fr": "Par téléphone : +33 1 22 33 44 55", "en": "By phone: +33 1 22 33 44 55" },
    ".i18n-legal-s12-l3": { "fr": "Par courrier : Kodex SAS, 61 Rue Albert Camus, 68200 Mulhouse", "en": "By mail: Kodex SAS, 61 Rue Albert Camus, 68200 Mulhouse, France" },

    // mentions légales
    ".i18n-legal-date": { "fr": "Dernière mise à jour : 8 mars 2026", "en": "Last updated: March 8, 2026" },

    // offrir hero
    ".i18n-gift-hero-title": { "fr": "Offrez une <strong>Aventure</strong>", "en": "Gift an <strong>Adventure</strong>" },
    ".i18n-gift-hero-sub": { "fr": "Un cadeau original qui marquera les esprits : offrez l'évasion urbaine <strong>Kodex</strong>", "en": "An original gift that will leave a mark: give the <strong>Kodex</strong> urban escape" },

    // offrir comment ça marche
    ".i18n-gift-how-title": { "fr": "Comment ça <strong>Marche</strong> ?", "en": "How does it <strong>Work</strong>?" },
    ".i18n-gift-step1-title": { "fr": "Choisissez", "en": "Choose" },
    ".i18n-gift-step1-desc": { "fr": "Sélectionnez l'aventure et la formule qui conviendra le mieux à la personne que vous souhaitez gâter.", "en": "Select the adventure and package that best suits the person you want to treat." },
    ".i18n-gift-step2-title": { "fr": "Personnalisez", "en": "Customize" },
    ".i18n-gift-step2-desc": { "fr": "Ajoutez un message personnalisé pour rendre votre cadeau encore plus mémorable et unique.", "en": "Add a personalized message to make your gift even more memorable and unique." },
    ".i18n-gift-step3-title": { "fr": "Envoyez", "en": "Send" },
    ".i18n-gift-step3-desc": { "fr": "Recevez instantanément votre carte cadeau par e-mail, prête à être offerte à l'heureux élu.", "en": "Instantly receive your gift card by email, ready to be given to the lucky recipient." },

    // offrir packages
    ".i18n-gift-pack-title": { "fr": "Nos <strong>Formules</strong>", "en": "Our <strong>Packages</strong>" },
    ".i18n-gift-pack-intro": { "fr": "Choisissez la formule idéale pour offrir une expérience inoubliable", "en": "Choose the perfect package to offer an unforgettable experience" },
    ".i18n-gift-pack-per": { "fr": "/ personne", "en": "/ person" },
    ".i18n-gift-pack-btn": { "fr": "Choisir cette formule", "en": "Choose this package" },
    ".i18n-gift-badge": { "fr": "Populaire", "en": "Popular" },

    // offrir package 1
    ".i18n-gift-pack1-name": { "fr": "Découverte", "en": "Discovery" },
    ".i18n-gift-pack1-l1": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 1 aventure au choix", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 1 adventure of choice" },
    ".i18n-gift-pack1-l2": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 à 6 joueurs", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 to 6 players" },
    ".i18n-gift-pack1-l3": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Carte cadeau personnalisée", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Personalized gift card" },
    ".i18n-gift-pack1-l4": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Validité 6 mois", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 6 months validity" },

    // offrir package 2
    ".i18n-gift-pack2-name": { "fr": "Aventurier", "en": "Adventurer" },
    ".i18n-gift-pack2-l1": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 aventures au choix", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 adventures of choice" },
    ".i18n-gift-pack2-l2": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 à 6 joueurs", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 to 6 players" },
    ".i18n-gift-pack2-l3": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Carte cadeau personnalisée", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Personalized gift card" },
    ".i18n-gift-pack2-l4": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Validité 12 mois", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 12 months validity" },
    ".i18n-gift-pack2-l5": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Accès prioritaire", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Priority access" },

    // offrir package 3
    ".i18n-gift-pack3-name": { "fr": "Explorateur", "en": "Explorer" },
    ".i18n-gift-pack3-l1": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Toutes les aventures", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> All adventures" },
    ".i18n-gift-pack3-l2": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 à 8 joueurs", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 2 to 8 players" },
    ".i18n-gift-pack3-l3": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Carte cadeau premium", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Premium gift card" },
    ".i18n-gift-pack3-l4": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Validité 12 mois", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> 12 months validity" },
    ".i18n-gift-pack3-l5": { "fr": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Accès prioritaire + goodies", "en": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"18\" height=\"18\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg> Priority access + goodies" },

    // offrir pourquoi
    ".i18n-gift-why-title": { "fr": "Pourquoi Offrir <strong>Kodex</strong> ?", "en": "Why Gift <strong>Kodex</strong>?" },
    ".i18n-gift-why1-title": { "fr": "Original", "en": "Original" },
    ".i18n-gift-why1-desc": { "fr": "Un cadeau qui sort de l'ordinaire et crée des souvenirs mémorables pour vos proches.", "en": "A gift that stands out and creates memorable moments for your loved ones." },
    ".i18n-gift-why2-title": { "fr": "Convivial", "en": "Friendly" },
    ".i18n-gift-why2-desc": { "fr": "Une activité partagée qui renforce les liens entre amis, en famille ou entre collègues.", "en": "A shared activity that strengthens bonds between friends, family, or colleagues." },
    ".i18n-gift-why3-title": { "fr": "Flexible", "en": "Flexible" },
    ".i18n-gift-why3-desc": { "fr": "Le bénéficiaire choisit sa date librement pendant toute la durée de validité de la carte.", "en": "The recipient chooses their date freely during the validity period of the card." },

    // offrir cta
    ".i18n-gift-cta-title": { "fr": "Faites Plaisir <strong>Maintenant</strong>", "en": "Make Someone Happy <strong>Now</strong>" },
    ".i18n-gift-cta-desc": { "fr": "Offrez un moment d'aventure unique à ceux que vous aimez", "en": "Offer a unique moment of adventure to those you love" },
    ".i18n-gift-cta-btn1": { "fr": "Voir les aventures", "en": "See adventures" },
    ".i18n-gift-cta-btn2": { "fr": "Des questions ?", "en": "Any questions?" },

    // paiement header
    ".i18n-pay-title": { "fr": "Paiement", "en": "Payment" },
    ".i18n-pay-subtitle": { "fr": "Finalisez Votre Réservation En Toute Sécurité", "en": "Finalize Your Booking Securely" },

    // paiement résumé
    ".i18n-pay-recap-title": { "fr": "Récapitulatif", "en": "Order Summary" },
    ".i18n-pay-lbl-adv": { "fr": "Aventure", "en": "Adventure" },
    ".i18n-pay-lbl-date": { "fr": "Date & Heure", "en": "Date & Time" },
    ".i18n-pay-lbl-city": { "fr": "Ville", "en": "City" },
    ".i18n-pay-lbl-players": { "fr": "Joueurs", "en": "Players" },
    ".i18n-pay-lbl-price": { "fr": "Prix unitaire", "en": "Unit Price" },
    ".i18n-pay-lbl-total": { "fr": "Total", "en": "Total" },

    // paiement formulaire
    ".i18n-pay-form-title": { "fr": "Informations de paiement", "en": "Payment Information" },
    ".i18n-pay-lbl-cardholder": { "fr": "Titulaire de la carte", "en": "Cardholder Name" },
    ".i18n-ph-cardholder": { "fr": "Nom complet", "en": "Full name" },
    ".i18n-pay-lbl-email": { "fr": "Adresse email de confirmation", "en": "Confirmation Email Address" },
    ".i18n-ph-email": { "fr": "votre@email.com", "en": "your@email.com" },
    ".i18n-pay-lbl-cardinfo": { "fr": "Informations de carte", "en": "Card Details" },
    ".i18n-pay-secure": { "fr": "Paiement sécurisé par Stripe — vos données sont chiffrées", "en": "Secure payment by Stripe — your data is encrypted" },
    ".i18n-pay-btn-submit": { "fr": "Payer", "en": "Pay" },

    // panier
    ".i18n-cart-title": { "fr": "Panier", "en": "Cart" },
    ".i18n-cart-empty": { "fr": "Votre panier est vide.", "en": "Your cart is empty." },
    ".i18n-cart-btn-discover": { "fr": "Découvrir nos aventures", "en": "Discover our adventures" },
    ".i18n-cart-lbl-gameplay": { "fr": "Gameplay :", "en": "Gameplay :" },
    ".i18n-cart-lbl-totalprice": { "fr": "Prix total", "en": "Total Price" },
    ".i18n-cart-btn-pay": { "fr": "Procéder Au Paiement", "en": "Proceed to Payment" },
    ".i18n-cart-btn-loginpay": { "fr": "Connectez-vous pour payer", "en": "Log in to pay" },

    // profil top
    ".i18n-prof-success": { "fr": "Traitement de demande réussie !", "en": "Request processed successfully!" },
    ".i18n-prof-hello": { "fr": "Bonjour,", "en": "Hello," },
    ".i18n-prof-member-since": { "fr": "Joueur depuis le", "en": "Player since" },

    // profil placeholders
    ".i18n-ph-dob": { "fr": "jj / mm / aaaa", "en": "dd / mm / yyyy" },
    ".i18n-ph-addr": { "fr": "Votre adresse", "en": "Your address" },
    ".i18n-ph-city": { "fr": "Votre ville", "en": "Your city" },
    ".i18n-ph-zip": { "fr": "Votre code postal", "en": "Your zip code" },
    ".i18n-ph-country": { "fr": "Votre pays", "en": "Your country" },
    ".i18n-prof-btn-save": { "fr": "Enregistrer les modifications", "en": "Save changes" },

    // profil aventures
    ".i18n-prof-adv-title": { "fr": "Mes Aventures", "en": "My Adventures" },
    ".i18n-prof-no-adv": { "fr": "Vous n'avez pas encore réservé d'aventure.", "en": "You haven't booked any adventures yet." },
    ".i18n-status-ended": { "fr": "Terminés", "en": "Completed" },
    ".i18n-status-planned": { "fr": "Prévues", "en": "Planned" },

    // réservation
    ".i18n-res-back": { "fr": "Retour à l'aventure", "en": "Back to adventure" },
    ".i18n-res-cat": { "fr": "Catégorie :", "en": "Category:" },
    ".i18n-res-note": { "fr": "Note", "en": "Rating" },
    ".i18n-res-diff": { "fr": "Difficulté", "en": "Difficulty" },
    ".i18n-res-price": { "fr": "Prix", "en": "Price" },
    ".i18n-res-select-time": { "fr": "Sélectionnez un horaire", "en": "Select a time" },
    ".i18n-res-back-month": { "fr": "Retour au mois", "en": "Back to month" },
    ".i18n-res-players-title": { "fr": "Joueurs", "en": "Players" },
    ".i18n-res-loc-title": { "fr": "Lieu de l'aventure (Obligatoire)", "en": "Adventure location (Required)" },
    ".i18n-res-loc-opt": { "fr": "-- Choisissez une ville --", "en": "-- Choose a city --" },
    ".i18n-res-gp-title": { "fr": "Gameplay (Obligatoire)", "en": "Gameplay (Required)" },
    ".i18n-res-gp-opt": { "fr": "-- Choisissez un gameplay --", "en": "-- Choose a gameplay --" },
    ".i18n-res-eq-title": { "fr": "Équipements (Optionnel)", "en": "Equipment (Optional)" },
    ".i18n-res-total-title": { "fr": "Total", "en": "Total" },
    ".i18n-res-price-per-player": { "fr": "Prix par joueurs", "en": "Price per player" },
    ".i18n-res-summary-title": { "fr": "Résumé", "en": "Summary" },
    ".i18n-res-for": { "fr": "pour", "en": "for" },
    ".i18n-res-player-sing": { "fr": "joueur", "en": "player" },
    ".i18n-res-city-lbl": { "fr": "Ville:", "en": "City:" },
    ".i18n-res-undef": { "fr": "Non définie", "en": "Not defined" },
    ".i18n-res-price-lbl": { "fr": "Prix:", "en": "Price:" },

    // sitemap header
    ".i18n-sitemap-title": { "fr": "Plan du Site", "en": "Sitemap" },
    ".i18n-sitemap-subtitle": { "fr": "Découvrez toutes les sections de Kodex", "en": "Discover all sections of Kodex" },

    // sitemap navigation
    ".i18n-sitemap-nav": { "fr": "Navigation", "en": "Navigation" },
    ".i18n-sitemap-nav-home": { "fr": "Accueil", "en": "Home" },
    ".i18n-sitemap-nav-adv": { "fr": "Nos Aventures", "en": "Our Adventures" },
    ".i18n-sitemap-nav-b2b": { "fr": "Entreprise", "en": "Corporate" },
    ".i18n-sitemap-nav-gift": { "fr": "Offrir", "en": "Gift" },
    ".i18n-sitemap-nav-news": { "fr": "Actualités", "en": "News" },
    ".i18n-sitemap-nav-about": { "fr": "Qui sommes-nous ?", "en": "About Us" },

    // sitemap réservation
    ".i18n-sitemap-res": { "fr": "Réservation", "en": "Booking" },
    ".i18n-sitemap-res-book": { "fr": "Réserver une aventure", "en": "Book an adventure" },
    ".i18n-sitemap-res-cart": { "fr": "Mon panier", "en": "My cart" },
    ".i18n-sitemap-res-pay": { "fr": "Paiement", "en": "Payment" },

    // sitemap compte
    ".i18n-sitemap-acc": { "fr": "Mon Compte", "en": "My Account" },
    ".i18n-sitemap-acc-login": { "fr": "Se connecter", "en": "Log In" },
    ".i18n-sitemap-acc-reg": { "fr": "S'inscrire", "en": "Register" },
    ".i18n-sitemap-acc-prof": { "fr": "Mon profil", "en": "My profile" },

    // sitemap support
    ".i18n-sitemap-help": { "fr": "Aide & Support", "en": "Help & Support" },
    ".i18n-sitemap-help-contact": { "fr": "Contact", "en": "Contact" },
    ".i18n-sitemap-help-faq": { "fr": "FAQ", "en": "FAQ" },

    // sitemap légal
    ".i18n-sitemap-legal": { "fr": "Informations Légales", "en": "Legal Information" },
    ".i18n-sitemap-legal-notice": { "fr": "Mentions légales", "en": "Legal notice" },
    ".i18n-sitemap-legal-cgv": { "fr": "Conditions générales de vente", "en": "Terms and conditions of sale" },
    ".i18n-sitemap-legal-cookies": { "fr": "Politique de cookies", "en": "Cookie policy" },
    ".i18n-sitemap-legal-privacy": { "fr": "Politique de confidentialité", "en": "Privacy policy" },

    // sitemap ressources
    ".i18n-sitemap-resources": { "fr": "Ressources", "en": "Resources" },

    // sitemap footer
    ".i18n-sitemap-footer-title": { "fr": "Besoin d'aide pour naviguer ?", "en": "Need help navigating?" },
    ".i18n-sitemap-footer-desc": { "fr": "Retrouvez toutes nos pages organisées ci-dessus. Si vous ne trouvez pas ce que vous cherchez, n'hésitez pas à nous contacter.", "en": "Find all our pages organized above. If you can't find what you're looking for, feel free to contact us." },
    ".i18n-sitemap-btn-contact": { "fr": "Nous contacter", "en": "Contact us" },

    // succes paiement
    ".i18n-success-h2": { "fr": "Merci ! Votre paiement sécurisé a bien été<br>effectué.", "en": "Thank you! Your secure payment has been<br>successfully completed." },
    ".i18n-success-p1": { "fr": "Vous recevrez immédiatement un e-mail avec les détails de votre<br>réservation, les consignes de jeu et votre facture.", "en": "You will immediately receive an email with your<br>booking details, game instructions, and invoice." },
    ".i18n-success-p2": { "fr": "Une question ou un e-mail non reçu ? N'hésitez pas à nous contacter à info@kodex.fr ou au 01 23 45 67 89.", "en": "A question or an unreceived email? Do not hesitate to contact us at info@kodex.fr or at +33 1 23 45 67 89." },

    // gabarit
    ".i18n-notif-logout": { "fr": "Vous avez bien été déconnecté.", "en": "You have been successfully logged out." },
    ".i18n-notif-login": { "fr": "Connexion réussie ! Bienvenue", "en": "Login successful! Welcome" },
    ".i18n-notif-register": { "fr": "Compte créé avec succès ! Bienvenue sur Kodex !", "en": "Account created successfully! Welcome to Kodex!" },

    // aventure formulaire avis
    ".i18n-leave-review": { "fr": "donnez votre avis", "en": "leave a review" },
    ".i18n-your-rating": { "fr": "Votre note", "en": "Your rating" },
    ".i18n-your-comment": { "fr": "Votre commentaire", "en": "Your comment" },
    ".i18n-ph-review": { "fr": "Décrivez votre expérience...", "en": "Describe your experience..." },
    ".i18n-btn-submit-review": { "fr": "Publier mon avis", "en": "Publish my review" },
    ".i18n-btn-edit-review": { "fr": "Modifier mon avis", "en": "Edit my review" },
    ".i18n-edit-review": { "fr": "modifiez votre avis", "en": "edit your review" },
    ".i18n-login-to-review-link": { "fr": "Connectez-vous", "en": "Log in" },
    ".i18n-login-to-review-text": { "fr": "pour laisser un avis.", "en": "to leave a review." },
    ".i18n-header-h2": { "fr": "Avis des joueurs", "en": "Players reviews" },
    ".notif-avis-ok": { "fr": "Votre avis a bien été enregistré, merci !", "en": "Your review has been saved, thanks!" },
    ".notif-avis-erreur": { "fr": "Veuillez sélectionner une note et écrire un commentaire.", "en": "Please select a note and write down a comment." },
};
// récupération de la langue stockée ou français par défaut (||)
let langue = localStorage.getItem(`langue`) || `fr`;

function appliquerTraduction(lang) {
    // mise à jour de l'attribut lang de l'html et stockage du choix
    document.querySelector(`html`).lang = lang;
    localStorage.setItem(`langue`, lang);

    // parcours du dictionnaire de traduction pour mettre à jour les éléments
    Object.entries(trad).forEach(([selecteur, donnee]) => {
        const elements = document.querySelectorAll(selecteur);
        elements.forEach(el => {
            if (donnee[lang]) {
                // traduction de la valeur pour les boutons de formulaire
                if (el.tagName === 'INPUT' && (el.type === 'submit' || el.type === 'button')) {
                    el.value = donnee[lang];
                } 
                // traduction du texte d'aide pour les champs de saisie
                else if ((el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') && el.hasAttribute('placeholder')) {
                    el.placeholder = donnee[lang];
                } 
                // traduction du contenu HTML pour les autres éléments
                else {
                    el.innerHTML = donnee[lang];
                }
            }
        });
    });

    // gestion de l'affichage des blocs spécifiques à la langue française
    document.querySelectorAll('.lang-fr').forEach(el => {
        el.style.display = (lang === 'fr') ? '' : 'none';
    });

    // gestion de l'affichage des blocs spécifiques à la langue anglaise
    document.querySelectorAll('.lang-en').forEach(el => {
        el.style.display = (lang === 'en') ? '' : 'none';
    });
}

function changerLangue(e) {
    // empêche le comportement par défaut et bascule entre fr et en
    e.preventDefault();
    langue = (langue === 'fr') ? 'en' : 'fr';
    // console.log("click", langue); // DEBUG LOG
    appliquerTraduction(langue);
}

// configuration du curseur et de l'événement clic sur les boutons de langue
document.querySelectorAll(`.langue`).forEach(btn => {
    btn.style.cursor = 'pointer';
    btn.addEventListener(`click`, changerLangue);
});

// application de la traduction automatique au chargement de la page
document.addEventListener("DOMContentLoaded", () => {
    appliquerTraduction(langue);
});