<?php
require_once "controleur/CtlAventures.class.php";
require_once "controleur/CtlUtilisateur.class.php";
require_once "controleur/CtlPage.class.php";
require_once "controleur/CtlAdmin.class.php";

/*************************************
Classe chargée d'afficher les pages basiques
 *************************************/
class Routeur
{
    private $ctlAventures;
    private $ctlUtilisateur;
    private $ctlPage;
    private $ctlAdmin;

    public function __construct()
    {
        $this->ctlAventures = new CtlAventure();
        $this->ctlUtilisateur = new CtlUtilisateur();
        $this->ctlPage = new CtlPage();
        $this->ctlAdmin = new CtlAdmin();
    }

    public function routerRequete()
    {
        // Sauvegarde de la page courante pour la redirection post-connexion (inspiré de SAE301)
        $action = $_GET['action'] ?? '';
        if ($action != 'connexion' && $action != 'deconnexion' && $action != 'inscription') {
            // $_SERVER['QUERY_STRING'] retourne toute la chaîne d'URL après le "?" (ex: "action=detail&idAventure=3") ce qui permet de rediriger l'utilisateur exactement sur la page qu'il consultait après sa connexion
            $queryString = !empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
            setcookie('page', $queryString, time() + 3600, '/');
        }

        try {
            if (isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    // HEADER
                    // Cas chargé d'afficher la page aventures                 
                    case "aventures":
                        $this->ctlAventures->aventures();
                        break;

                    case "detail":
                        if (!isset($_GET["idAventure"])) {
                            throw KodexException::donneesInvalides("Aucun identifiant d'aventure fourni.");
                        }
                        $idAventure = (int) $_GET["idAventure"];
                        if ($idAventure <= 0) {
                            throw KodexException::donneesInvalides("Identifiant d'aventure invalide.");
                        }
                        $this->ctlAventures->ficheAventure($idAventure);
                        break;

                    // Cas chargé d'afficher la page réservation
                    case "reservation":
                        $this->ctlPage->reservation();
                        break;

                    case "reserver":
                        if (!isset($_GET["idAventure"])) {
                            throw KodexException::donneesInvalides("Aucun identifiant d'aventure fourni pour la réservation.");
                        }
                        $idAventure = (int) $_GET["idAventure"];
                        if ($idAventure <= 0) {
                            throw KodexException::donneesInvalides("Identifiant d'aventure invalide.");
                        }
                        $this->ctlAventures->reservation($idAventure);
                        break;

                    // Cas chargé d'afficher la page entreprise
                    case "entreprise":
                        $this->ctlPage->entreprise();
                        break;

                    // Cas chargé d'afficher la page offrir
                    case "offrir":
                        $this->ctlPage->offrir();
                        break;

                    // Cas chargé d'afficher la page à propos
                    case "informations":
                        $this->ctlPage->informations();
                        break;

                    // Cas chargés de s'occuper de l'utilisateur
                    case 'inscription':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $this->ctlUtilisateur->inscription();
                        } else {
                            $this->ctlUtilisateur->compte();
                        }
                        break;

                    case 'connexion':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $this->ctlUtilisateur->connexion();
                        } else {
                            throw KodexException::donneesInvalides("La connexion nécessite l'envoi du formulaire.");
                        }
                        break;

                    case 'deconnexion':
                        $this->ctlUtilisateur->deconnexion();
                        break;

                    // FOOTER
                    // Cas chargé d'afficher la page contact
                    case "contact":
                        $this->ctlPage->contact();
                        break;

                    // Cas chargé de traiter l'envoi du formulaire de contact
                    case "envoyer_contact":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("L'envoi du formulaire de contact nécessite la méthode POST.");
                        }
                        $this->ctlPage->envoyerContact();
                        break;

                    // Cas chargé d'afficher la page mentions légales
                    case "mentions":
                        $this->ctlPage->mentions();
                        break;

                    // Cas chargé d'afficher la page cookies
                    case "cookies":
                        $this->ctlPage->cookies();
                        break;

                    // Cas chargé d'afficher la page CGV/CGU
                    case "cgv":
                        $this->ctlPage->cgv();
                        break;

                    // Cas chargé d'afficher la politique de confidentialité
                    case "confidentialite":
                        $this->ctlPage->confidentialite();
                        break;

                    // Cas chargé d'afficher le plan du site
                    case "sitemap":
                        $this->ctlPage->sitemap();
                        break;

                    // Cas chargé d'ajouter un élément au panier
                    case "ajouter_panier":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("L'ajout au panier nécessite l'envoi du formulaire.");
                        }
                        $idAventure = (int) ($_POST['id_aventure'] ?? 0);
                        $nbJoueurs = (int) ($_POST['nb_joueurs'] ?? 0);
                        $dateChoisie = $_POST['date_choisie'] ?? '';
                        $idGameplay = (int) ($_POST['id_gameplay'] ?? 0);
                        $objets = isset($_POST['objets']) ? $_POST['objets'] : [];

                        if ($idAventure <= 0 || $nbJoueurs <= 0 || empty($dateChoisie) || $idGameplay <= 0) {
                            throw KodexException::champsManquants("aventure, joueurs, date, gameplay");
                        }
                        $this->ctlAventures->ajouterAuPanier($idAventure, $nbJoueurs, $dateChoisie, $idGameplay, $objets);
                        break;

                    // Cas chargé d'afficher le contenu du panier
                    case "panier":
                        $this->ctlAventures->afficherPanier();
                        break;

                    // Cas chargé de traiter le paiement et l'enregistrement
                    case "paiement":
                        $this->ctlAventures->afficherPaiement();
                        break;

                    // Cas chargé de traiter le paiement soumis par le formulaire
                    case "valider_paiement":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("La validation du paiement nécessite l'envoi du formulaire.");
                        }
                        // Si c'est un paiement cadeau
                        if (isset($_SESSION['cadeau']) && !empty($_SESSION['cadeau'])) {
                            $this->ctlAventures->validerPaiementCadeau();
                        } else {
                            $this->ctlAventures->validerPaiement();
                        }
                        break;

                    // Cas chargé de soumettre ou mettre à jour un avis
                    case "soumettre_avis":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("La soumission d'un avis nécessite l'envoi du formulaire.");
                        }
                        if (!isset($_POST['id_aventure']) || (int)$_POST['id_aventure'] <= 0) {
                            throw KodexException::avisErreur("Aventure non spécifiée pour l'avis.");
                        }
                        $this->ctlAventures->soumettreAvis((int) $_POST['id_aventure']);
                        break;

                    // Cas chargé d'afficher la page de confirmation de commande
                    case "succes":
                        $this->ctlPage->succes();
                        break;

                    // Cas chargé de valider un achat de carte cadeau
                    case "valider_cadeau":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("La validation du cadeau nécessite l'envoi du formulaire.");
                        }
                        $this->ctlAventures->validerCadeau();
                        break;

                    case "profil":
                        $this->ctlUtilisateur->profil();
                        break;

                    // --- ROUTES ADMINISTRATION ---
                    case "admin":
                        $this->ctlAdmin->dashboard();
                        break;

                    case "admin_add_game":
                        $this->ctlAdmin->addGame();
                        break;

                    case "admin_delete_user":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant utilisateur manquant ou invalide.");
                        }
                        $this->ctlAdmin->deleteUser((int) $_GET['id']);
                        break;

                    case "admin_edit_user":
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            throw KodexException::donneesInvalides("La modification d'un utilisateur nécessite l'envoi du formulaire.");
                        }
                        if (!isset($_POST['id_user']) || (int)$_POST['id_user'] <= 0) {
                            throw KodexException::adminErreur("Identifiant utilisateur manquant ou invalide.");
                        }
                        $this->ctlAdmin->editUser((int) $_POST['id_user']);
                        break;

                    case "admin_delete_game":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant aventure manquant ou invalide.");
                        }
                        $this->ctlAdmin->deleteGame((int) $_GET['id']);
                        break;

                    case "supprimer_panier":
                        if (!isset($_GET['id'])) {
                            throw KodexException::donneesInvalides("Identifiant de l'article à supprimer manquant.");
                        }
                        $idArticle = (int) $_GET['id'];
                        $this->ctlAventures->supprimerDuPanier($idArticle);
                        break;

                    case "admin_confirm_res":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant de réservation manquant ou invalide.");
                        }
                        $this->ctlAdmin->confirmReservation((int) $_GET['id']);
                        break;

                    case "admin_delete_res":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant de réservation manquant ou invalide.");
                        }
                        $this->ctlAdmin->deleteReservation((int) $_GET['id']);
                        break;

                    case "admin_lu_message":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant de message manquant ou invalide.");
                        }
                        $this->ctlAdmin->marquerMessageLu((int) $_GET['id']);
                        break;

                    case "admin_delete_message":
                        if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
                            throw KodexException::adminErreur("Identifiant de message manquant ou invalide.");
                        }
                        $this->ctlAdmin->deleteMessage((int) $_GET['id']);
                        break;

                    case 'profil_update':
                        $this->ctlUtilisateur->profil_update();
                        break;

                    case 'utiliser_cadeau':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $this->ctlUtilisateur->utiliserCadeau();
                        }
                        break;

                    default:
                        throw KodexException::actionInvalide($_GET["action"]);
                }
            } else {
                $this->ctlPage->accueil();
            }
        } catch (KodexException $e) {
            $this->ctlPage->erreur($e->getMessage(), $e);
        } catch (Exception $e) {
            $this->ctlPage->erreur($e->getMessage());
        }
    }
}
