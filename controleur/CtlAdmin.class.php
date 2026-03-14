<?php
require_once "modele/utilisateur.class.php";
require_once "modele/aventure.class.php";
require_once "vue/vue.class.php";

/*********************************************************
Classe contrôleur pour la gestion de l'administration
*********************************************************/
class CtlAdmin
{
    private $userModel;
    private $aventureModel;

    /*******************************************************
    Constructeur de la classe CtlAdmin, initialise les modèles
      Entrée : 

      Retour : 
    *******************************************************/
    public function __construct()
    {
        $this->userModel = new Utilisateur();
        $this->aventureModel = new Aventure();
    }

    /*******************************************************
    Vérifie si l'utilisateur est connecté et possède le rôle administrateur (id_role = 2)
      Entrée : 

      Retour : 
        [void] : Redirige vers l'accueil si non autorisé
    *******************************************************/
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['id_role'] != 2) {
            throw KodexException::accesRefuse("Accès réservé aux administrateurs.");
        }
    }

    /*******************************************************
    Affiche le tableau de bord de l'administrateur avec les données récupérées
      Entrée : 

      Retour : 
        [void] : Affiche la vue Admin avec les utilisateurs, jeux et réservations
    *******************************************************/
    public function dashboard()
    {
        $this->checkAdmin();
        $users = $this->userModel->getAllUsers() ?: [];
        $games = $this->aventureModel->getAventures() ?: [];
        $reservations = $this->aventureModel->getAllReservationsAdmin() ?: [];
        $messages = $this->userModel->getAllMessages() ?: [];
        $nbMessagesNonLus = $this->userModel->countMessagesNonLus();

        $vue = new Vue("Admin");
        $vue->afficher(array(
            "users" => $users,
            "games" => $games,
            "reservations" => $reservations,
            "messages" => $messages,
            "nbMessagesNonLus" => $nbMessagesNonLus
        ));
    }

    /*******************************************************
    Traite le formulaire d'ajout d'une nouvelle aventure / d'un nouveau jeu
      Entrée : 

      Retour : 
        [void] : Redirige vers le tableau de bord après exécution
    *******************************************************/
    public function addGame()
    {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw KodexException::donneesInvalides("L'ajout d'une aventure nécessite l'envoi du formulaire.");
        }

        $champsRequis = ['designation_fr', 'designation_en', 'categorie_fr', 'categorie_en', 'prix', 'duree', 'joueurs', 'difficulte', 'description_fr', 'description_en', 'image'];
        foreach ($champsRequis as $champ) {
            if (!isset($_POST[$champ]) || trim($_POST[$champ]) === '') {
                throw KodexException::champsManquants($champ);
            }
        }

        try {
            $this->aventureModel->addAventure(
                $_POST['designation_fr'],
                $_POST['designation_en'],
                $_POST['categorie_fr'],
                $_POST['categorie_en'],
                $_POST['prix'],
                $_POST['duree'],
                $_POST['joueurs'],
                $_POST['difficulte'],
                $_POST['description_fr'],
                $_POST['description_en'],
                $_POST['image']
            );
        } catch (KodexException $e) {
            throw $e;
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible d'ajouter l'aventure : " . $e->getMessage());
        }

        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Traite la suppression d'un utilisateur
      Entrée : 
        id [int] : Identifiant de l'utilisateur à supprimer

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function deleteUser($id)
    {
        $this->checkAdmin();
        try {
            $this->userModel->deleteUser($id);
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible de supprimer l'utilisateur N°$id.");
        }
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Traite la suppression d'un jeu / d'une aventure
      Entrée : 
        id [int] : Identifiant de l'aventure à supprimer

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function deleteGame($id)
    {
        $this->checkAdmin();
        try {
            $this->aventureModel->deleteAventure($id);
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible de supprimer l'aventure N°$id.");
        }
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Confirme une réservation spécifique
      Entrée : 
        idReservation [int] : Identifiant de la réservation à confirmer

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function confirmReservation($idReservation)
    {
        $this->checkAdmin();
        $this->aventureModel->confirmReservation($idReservation);
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Annule et supprime une réservation spécifique
      Entrée : 
        idReservation [int] : Identifiant de la réservation à supprimer

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function deleteReservation($idReservation)
    {
        $this->checkAdmin();
        $this->aventureModel->deleteReservation($idReservation);
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Marque un message de contact comme lu
      Entrée : 
        idMessage [int] : Identifiant du message

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function marquerMessageLu($idMessage)
    {
        $this->checkAdmin();
        try {
            $this->userModel->marquerMessageLu($idMessage);
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible de marquer le message N°$idMessage comme lu.");
        }
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Supprime un message de contact
      Entrée : 
        idMessage [int] : Identifiant du message à supprimer

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function deleteMessage($idMessage)
    {
        $this->checkAdmin();
        try {
            $this->userModel->deleteMessage($idMessage);
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible de supprimer le message N°$idMessage.");
        }
        header("Location: index.php?action=admin");
        exit();
    }

    /*******************************************************
    Traite la modification des informations d'un utilisateur (Admin)
      Entrée : 
        idUser [int] : Identifiant de l'utilisateur à modifier

      Retour : 
        [void] : Redirige vers le tableau de bord
    *******************************************************/
    public function editUser($idUser)
    {
        $this->checkAdmin();

        // Vérifier que l'utilisateur existe
        $user = $this->userModel->getUserById($idUser);
        if (!$user) {
            throw KodexException::adminErreur("Utilisateur N°$idUser introuvable.");
        }

        // Champs requis pour la mise à jour
        $champsRequis = ['prenom', 'nom', 'email', 'id_role'];
        foreach ($champsRequis as $champ) {
            if (!isset($_POST[$champ]) || trim($_POST[$champ]) === '') {
                throw KodexException::champsManquants($champ);
            }
        }

        // Construction du tableau de données à mettre à jour
        $data = [
            'prenom'         => trim($_POST['prenom']),
            'nom'            => trim($_POST['nom']),
            'date_naissance' => !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : $user['date_naissance'],
            'email'          => trim($_POST['email']),
            'numero'         => trim($_POST['numero'] ?? ''),
            'adresse'        => trim($_POST['adresse'] ?? ''),
            'ville'          => trim($_POST['ville'] ?? ''),
            'postal'         => trim($_POST['postal'] ?? ''),
            'pays'           => trim($_POST['pays'] ?? ''),
            'id_role'        => (int) $_POST['id_role'],
        ];

        // Si un nouveau mot de passe est fourni par l'admin, on le hache avant de l'envoyer au modèle
        $nouveauMdp = trim($_POST['nouveau_mdp'] ?? '');
        if (!empty($nouveauMdp)) {
            $data['mdp'] = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        }

        // Valider le rôle (1 = client, 2 = admin)
        if (!in_array($data['id_role'], [1, 2])) {
            throw KodexException::donneesInvalides("Rôle invalide. Valeurs acceptées : 1 (Client) ou 2 (Admin).");
        }

        try {
            $this->userModel->adminUpdateUser($idUser, $data);
        } catch (KodexException $e) {
            throw $e;
        } catch (Exception $e) {
            throw KodexException::adminErreur("Impossible de modifier l'utilisateur N°$idUser : " . $e->getMessage());
        }

        header("Location: index.php?action=admin");
        exit();
    }
}