<?php
require_once "modele/utilisateur.class.php";
require_once "vue/vue.class.php";

/*********************************************************
Classe contrôleur chargée de la gestion des utilisateurs (inscription, connexion, profil)
*********************************************************/
class CtlUtilisateur
{
    private $utilisateur;

    /*******************************************************
    Constructeur de la classe CtlUtilisateur, initialise le modèle Utilisateur
      Entrée : 

      Retour : 
    *******************************************************/
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    /*******************************************************
    Affiche la page de connexion ou d'inscription
      Entrée : 

      Retour : 
        [void] : Affiche la vue Compte
    *******************************************************/
    public function compte()
    {
        $vue = new Vue("Compte");
        $vue->afficher(array());
    }

    /*******************************************************
    Traite le formulaire de connexion et initialise la session si succès
      Entrée : 
        $_POST['email'] [string] : Email saisi
        $_POST['mdp'] [string] : Mot de passe saisi

      Retour : 
        [void] : Redirection vers l'accueil (ou la page sauvegardée) si succès, 
                 sinon redirection vers la page de connexion avec une erreur
    *******************************************************/
    public function connexion()
    {
        $email = $_POST['email'] ?? '';
        $mdp = $_POST['mdp'] ?? '';

        $utilisateur = $this->utilisateur->connexion($email, $mdp);

        if ($utilisateur) {
            $_SESSION['user'] = $utilisateur;
            $_SESSION['notif'] = '<span class="i18n-notif-login">Connexion réussie ! Bienvenue</span> ' . htmlspecialchars($utilisateur['prenom']) . ' !';

            // Si l'utilisateur est admin, rediriger directement vers le dashboard
            if (isset($utilisateur['id_role']) && $utilisateur['id_role'] == 2) {
                header('Location: index.php?action=admin');
                exit();
            }

            // Redirection vers la page sauvegardée (système de cookie SAE301)
            $page = $_COOKIE['page'] ?? '';
            // Sécurité : on s'assure que c'est bien une query string interne
            if (empty($page) || !str_starts_with($page, '?')) {
                $page = '';
            }
            header('Location: index.php' . $page);
            exit();
        } else {
            header("Location: index.php?action=inscription&mode=connexion&error=1");
            exit();
        }
    }

    /*******************************************************
    Traite le formulaire d'inscription et enregistre un nouvel utilisateur en BDD
      Entrée : 
        Données $_POST envoyées depuis le formulaire d'inscription

      Retour : 
        [void] : Redirection vers l'accueil si succès, 
                 sinon redirection vers le formulaire avec une erreur
    *******************************************************/
    public function inscription()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $date_naissance = !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : null;
            $email = $_POST['email'] ?? '';
            $numero = $_POST['numero'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            $ville = $_POST['ville'] ?? '';
            $postal = $_POST['postal'] ?? '';
            $pays = $_POST['pays'] ?? '';
            $mdp = $_POST['mdp'] ?? '';

            $succes = $this->utilisateur->inscription($nom, $prenom, $date_naissance, $email, $numero, $adresse, $ville, $postal, $pays, $mdp);

            if ($succes) {
                $_SESSION['notif'] = '<span class="i18n-notif-register">Compte créé avec succès ! Bienvenue sur Kodex !</span>';
                header("Location: index.php");
                exit();
            } else {
                header("Location: index.php?action=inscription&mode=inscription&error=2");
                exit();
            }
        }
    }

    /*******************************************************
    Détruit la session de l'utilisateur pour le déconnecter
      Entrée : 

      Retour : 
        [void] : Redirection vers l'accueil
    *******************************************************/
    public function deconnexion()
    {
        session_destroy();
        setcookie(session_name(), '', time() - 1, "/");
        setcookie('page', '', time() - 1, "/"); // supprime le cookie de redirection pour éviter les conflits
        header("Location: index.php?deconnexion=1");
        exit();
    }

    /*******************************************************
    Affiche le profil utilisateur et son historique de réservations
      Entrée : 

      Retour : 
        [void] : Affiche la vue Profil avec les données de l'utilisateur
    *******************************************************/
    public function profil()
    {
        if (!isset($_SESSION['id_user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour accéder à votre profil.");
        }

        $idUser = $_SESSION['id_user'];
        $infosUser = $_SESSION['user'];

        $reservations = $this->utilisateur->getReservationsUser($idUser);

        if ($reservations === 0 || $reservations === false) {
            $reservations = [];
        }

        // Récupérer les cadeaux reçus via l'email de l'utilisateur connecté
        $emailUser = $infosUser['email'] ?? '';
        $cadeaux = [];
        if (!empty($emailUser)) {
            $cadeaux = $this->utilisateur->getCadeauxRecus($emailUser);
            if ($cadeaux === 0 || $cadeaux === false) {
                $cadeaux = [];
            }
        }

        $vue = new Vue("Profil");
        $vue->afficher(array(
            "user" => $infosUser,
            "reservations" => $reservations,
            "cadeaux" => $cadeaux
        ));
    }

    /*******************************************************
    Met à jour les informations du profil utilisateur en BDD et en session
      Entrée : 
        Données $_POST envoyées depuis le formulaire de modification de profil

      Retour : 
        [void] : Redirection vers le profil avec un message de succès
    *******************************************************/
    public function profil_update()
    {
        if (!isset($_SESSION['id_user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour modifier votre profil.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'prenom' => $_POST['prenom'] ?? '',
                'nom' => $_POST['nom'] ?? '',
                'date_naissance' => !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : null,
                'email' => $_POST['email'] ?? '',
                'numero' => $_POST['numero'] ?? '',
                'adresse' => $_POST['adresse'] ?? '',
                'ville' => $_POST['ville'] ?? '',
                'postal' => $_POST['postal'] ?? '',
                'pays' => $_POST['pays'] ?? ''
            ];

            // Si un nouveau mot de passe est fourni, on le hache avant de l'envoyer au modèle
            $nouveauMdp = trim($_POST['nouveau_mdp'] ?? '');
            if (!empty($nouveauMdp)) {
                $data['mdp'] = password_hash($nouveauMdp, PASSWORD_DEFAULT);
            }

            $idUser = $_SESSION['id_user'];
            $this->utilisateur->updateUserData($idUser, $data);

            $_SESSION['user']['prenom'] = $data['prenom'];
            $_SESSION['user']['nom'] = $data['nom'];
            $_SESSION['user']['date_naissance'] = $data['date_naissance'];
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['numero'] = $data['numero'];
            $_SESSION['user']['adresse'] = $data['adresse'];
            $_SESSION['user']['ville'] = $data['ville'];
            $_SESSION['user']['postal'] = $data['postal'];
            $_SESSION['user']['pays'] = $data['pays'];

            header("Location: index.php?action=profil&update=success");
            exit();
        }
    }

    /*******************************************************
    Marque un cadeau reçu comme utilisé par le destinataire
      Entrée : 
        $_POST['id_user_expediteur'] [int] : ID de l'acheteur du cadeau
        $_POST['id_offre'] [int] : ID de l'offre cadeau

      Retour : 
        [void] : Redirection vers le profil avec un message
    *******************************************************/
    public function utiliserCadeau()
    {
        if (!isset($_SESSION['id_user']) || !isset($_SESSION['user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour utiliser un cadeau.");
        }

        $emailUser = $_SESSION['user']['email'] ?? '';
        $idUserExpediteur = (int) ($_POST['id_user_expediteur'] ?? 0);
        $idOffre = (int) ($_POST['id_offre'] ?? 0);

        if ($idUserExpediteur <= 0 || $idOffre <= 0 || empty($emailUser)) {
            throw KodexException::cadeauErreur("Données du cadeau invalides ou incomplètes.");
        }

        $this->utilisateur->utiliserCadeau($idUserExpediteur, $idOffre, $emailUser);

        header("Location: index.php?action=profil&update=success");
        exit();
    }
}