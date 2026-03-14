<?php
require_once "vue/vue.class.php";
require_once "modele/aventure.class.php";
require_once "modele/utilisateur.class.php";

/*************************************
Classe chargée d'afficher les pages basiques
 *************************************/
class CtlPage
{
    /*******************************************************
    Affichage de la page d'accueil du site
    Entrée :

    Retour :

     *******************************************************/
    function accueil()
    {
        $aventure = new Aventure();
        $aventures = $aventure->getAventures();

        $avis = $aventure->getAvisClients();
        $moyenneNotes = $aventure->getMoyenneNotes();

        $vue = new Vue("Accueil");
        $vue->afficher(array(
            "aventures" => $aventures,
            "avis" => $avis,
            "moyenneNotes" => $moyenneNotes
        ));
    }

    /*******************************************************
Affichage de la page d'entreprise du site
Entrée :

Retour :

     *******************************************************/
    function entreprise()
    {
        $vue = new Vue("Entreprise");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage de la page cadeau du site
Entrée :

Retour :

     *******************************************************/
    function offrir()
    {
        $aventure = new Aventure();
        $offres = $aventure->getOffres();
        $aventures = $aventure->getAventures();

        $vue = new Vue("Offrir");
        $vue->afficher(array(
            "offres" => $offres,
            "aventures" => $aventures
        ));
    }

    /*******************************************************
Affichage de la page à propos du site
Entrée :

Retour :

     *******************************************************/
    function informations()
    {
        $vue = new Vue("Informations");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage de la page de réservation du site
Entrée :

Retour :

     *******************************************************/
    function reservation()
    {
        $vue = new Vue("Reservation");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage de la FAQ
Entrée :

Retour :

     *******************************************************/
    function faq()
    {
        $vue = new Vue("FAQ");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage des mentions légales
Entrée :

Retour :

     *******************************************************/
    function mentions()
    {
        $vue = new Vue("Mentions");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage des mentions légales
Entrée :

Retour :

     *******************************************************/
    function contact()
    {
        $vue = new Vue("Contacts");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage des cookies
Entrée :

Retour :

     *******************************************************/
    function cookies()
    {
        $vue = new Vue("Cookies");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage de la CGV/CGU
Entrée :

Retour :

     *******************************************************/
    function cgv()
    {
        $vue = new Vue("CGV");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage de la politique de confidentialité
Entrée :

Retour :

     *******************************************************/
    function confidentialite()
    {
        $vue = new Vue("Confidentialite");
        $vue->afficher(array());
    }

    /*******************************************************
Affichage du plan du site
Entrée :

Retour :

     *******************************************************/
    function sitemap()
    {
        $vue = new Vue("Sitemap");
        $vue->afficher(array());
    }

    /*******************************************************Affichage de la page de confirmation de commande
Entrée :

Retour :

     *******************************************************/
    function succes()
    {
        $vue = new Vue("Succes");
        $vue->afficher(array());
    }

    /*******************************************************
    Traite l'envoi du formulaire de contact et enregistre le message en BDD
      Entrée :
        $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['numero'], $_POST['message']

      Retour :
        [void] : Redirige vers la page de contact avec un message de succès
    *******************************************************/
    function envoyerContact()
    {
        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $numero = trim($_POST['numero'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
            throw KodexException::champsManquants("nom, prénom, email, message");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw KodexException::donneesInvalides("L'adresse email fournie n'est pas valide.");
        }

        $utilisateur = new Utilisateur();
        $resultat = $utilisateur->addMessage($nom, $prenom, $email, $numero, $message);

        if ($resultat) {
            header("Location: index.php?action=contact&msg=ok");
            exit();
        } else {
            throw KodexException::bddErreur("Impossible d'enregistrer votre message. Veuillez réessayer.");
        }
    }

    /*******************************************************
    Affichage de la page d'erreur personnalisée
      Entrée :
        message [string] : Message d'erreur
        exception [Exception|null] : Exception d'origine (optionnel)

      Retour :
        [void] : Affiche la vue Erreur avec les données d'erreur
    *******************************************************/
    function erreur($message, $exception = null)
    {
        $codeErreur = 500;
        $titreErreur = "Erreur";
        $codeInterne = 0;

        if ($exception instanceof KodexException) {
            $codeErreur = $exception->getHttpCode();
            $titreErreur = $exception->getTitre();
            $codeInterne = $exception->getCode();
        }

        // Envoyer le bon code HTTP
        http_response_code($codeErreur);

        $vue = new Vue("Erreur");
        $vue->afficher(array(
            "message" => $message,
            "codeErreur" => $codeErreur,
            "titreErreur" => $titreErreur,
            "codeInterne" => $codeInterne
        ));
    } // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement
}
