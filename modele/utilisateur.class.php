<?php
require_once "modele/database.class.php";

/*********************************************************
Classe chargée de la gestion des utilisateurs dans la base de données
*********************************************************/
class Utilisateur extends Database
{

    /*******************************************************
    Vérifie en bdd un match avec $email & $mdp puis retourne l'utilisateur
      Entrée : 
        email [string] : Adresse email de l'utilisateur
        mdp [string] : Mot de passe saisi par l'utilisateur

      Retour : 
        [array|bool] : Tableau associatif contenant l'utilisateur, ou false si échec
    *******************************************************/
    public function connexion($email, $mdp)
    {
        $req = 'SELECT * FROM utilisateur WHERE email = ?';
        $utilisateur = $this->execReqPrep($req, [$email]);

        if ($utilisateur && password_verify($mdp, $utilisateur[0]['mdp'])) {
            $_SESSION['id_user'] = $utilisateur[0]['id_user'];
            $_SESSION['nom'] = $utilisateur[0]['nom'];
            return $utilisateur[0];
        }
        return false;
    }

    /*******************************************************
    Insère un compte utilisateur en bdd avec un mdp crypté (password_hash)
      Entrée : 
        nom [string] : Nom de l'utilisateur
        prenom [string] : Prénom de l'utilisateur
        date_naissance [string] : Date de naissance (format AAAA-MM-JJ)
        email [string] : Adresse email
        numero [string] : Numéro de téléphone
        adresse [string] : Adresse postale
        ville [string] : Ville de résidence
        postal [string] : Code postal
        pays [string] : Pays de résidence
        mdp [string] : Mot de passe en clair à crypter

      Retour : 
        [bool] : True si l'insertion réussit, False sinon
    *******************************************************/
    public function inscription($nom, $prenom, $date_naissance, $email, $numero, $adresse, $ville, $postal, $pays, $mdp)
    {
        $mdpCrypte = password_hash($mdp, PASSWORD_DEFAULT);

        $req = 'INSERT INTO utilisateur(id_user, nom, prenom, date_naissance, email, numero, adresse, ville, postal, pays, mdp, id_role) 
                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, "1");';

        $params = array(
            $nom,
            $prenom,
            $date_naissance,
            $email,
            $numero,
            $adresse,
            $ville,
            $postal,
            $pays,
            $mdpCrypte
        );

        $resultat = $this->execReqPrep($req, $params);

        if ($resultat == 1) {
            return TRUE;
        }
        return FALSE;
    }

    /*******************************************************
    Récupère toutes les réservations pour l'administration (Admin)
      Entrée : 

      Retour : 
        [array] : Tableau contenant toutes les réservations et leurs détails
    *******************************************************/
    public function getAllReservationsAdmin()
    {
        $req = 'SELECT r.id_reservation, r.date_choisie, r.nb_joueurs, r.date_reservation, r.statut, 
                   a.designation_fr, a.designation_en, u.nom, u.prenom, u.email,
                   g.nom as nom_gameplay,
                   GROUP_CONCAT(CONCAT(ro.quantite, "x ", o.nom_fr) SEPARATOR ", ") as liste_objets_fr,
                   GROUP_CONCAT(CONCAT(ro.quantite, "x ", o.nom_en) SEPARATOR ", ") as liste_objets_en
            FROM reservation r 
            INNER JOIN aventure a ON r.id_aventure = a.id_aventure 
            INNER JOIN utilisateur u ON r.id_user = u.id_user 
            LEFT JOIN gameplay g ON r.id_gameplay = g.id_gameplay
            LEFT JOIN reservation_objet ro ON r.id_reservation = ro.id_reservation
            LEFT JOIN objets o ON ro.id_objet = o.id_objet
            GROUP BY r.id_reservation
            ORDER BY r.date_choisie DESC';
        return $this->execReq($req);
    }

    /*******************************************************
    Récupère tous les utilisateurs enregistrés (Admin)
      Entrée : 

      Retour : 
        [array] : Tableau contenant la liste des utilisateurs
    *******************************************************/
    public function getAllUsers()
    {
        $req = 'SELECT * FROM utilisateur ORDER BY id_role DESC, nom ASC';
        return $this->execReq($req);
    }

    /*******************************************************
    Supprime un utilisateur
      Entrée : 
        idUser [int] : Identifiant de l'utilisateur à supprimer

      Retour : 
        [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
    *******************************************************/
    public function deleteUser($idUser)
    {
        $req = 'DELETE FROM utilisateur WHERE id_user = ?';
        return $this->execReqPrep($req, array($idUser));
    }

    /*******************************************************
    Récupère un utilisateur par son identifiant
      Entrée : 
        idUser [int] : Identifiant de l'utilisateur

      Retour : 
        [array|bool] : Tableau associatif de l'utilisateur ou false
    *******************************************************/
    public function getUserById($idUser)
    {
        $req = 'SELECT * FROM utilisateur WHERE id_user = ?';
        $result = $this->execReqPrep($req, array($idUser));
        if ($result && is_array($result) && count($result) > 0) {
            return $result[0];
        }
        return false;
    }

    /*******************************************************
    Met à jour toutes les informations d'un utilisateur (Admin)
      Entrée : 
        id [int] : Identifiant de l'utilisateur
        data [array] : Tableau associatif des nouvelles données (inclut id_role)
                       Si la clé 'mdp' est présente, le mot de passe (déjà haché) est aussi mis à jour

      Retour : 
        [int|bool] : Nombre de lignes modifiées ou false
    *******************************************************/
    public function adminUpdateUser($id, $data)
    {
        $sql = "UPDATE utilisateur SET 
            prenom = ?, 
            nom = ?, 
            date_naissance = ?,
            email = ?, 
            numero = ?, 
            adresse = ?, 
            ville = ?, 
            postal = ?, 
            pays = ?,
            id_role = ?";

        $params = array(
            $data['prenom'],
            $data['nom'],
            $data['date_naissance'],
            $data['email'],
            $data['numero'],
            $data['adresse'],
            $data['ville'],
            $data['postal'],
            $data['pays'],
            $data['id_role'],
        );

        // ajout conditionnel du mot de passe haché si fourni par l'admin
        if (!empty($data['mdp'])) {
            $sql .= ", mdp = ?";
            $params[] = $data['mdp'];
        }

        $sql .= " WHERE id_user = ?";
        $params[] = $id;

        return $this->execReqPrep($sql, $params);
    }

    /*******************************************************
    Permet de modifier les informations d'un utilisateur existant
      Entrée : 
        id [int] : Identifiant de l'utilisateur
        data [array] : Tableau associatif contenant les nouvelles données
                       Si la clé 'mdp' est présente, le mot de passe (déjà haché) est aussi mis à jour

      Retour : 
        [int|bool] : Nombre de lignes modifiées ou false en cas d'erreur
    *******************************************************/
    public function updateUserData($id, $data)
    {
        $sql = "UPDATE utilisateur SET 
            prenom = ?, 
            nom = ?, 
            date_naissance = ?,
            email = ?, 
            numero = ?, 
            adresse = ?, 
            ville = ?, 
            postal = ?, 
            pays = ?";

        $params = array(
            $data['prenom'],
            $data['nom'],
            $data['date_naissance'],
            $data['email'],
            $data['numero'],
            $data['adresse'],
            $data['ville'],
            $data['postal'],
            $data['pays'],
        );

        // ajout conditionnel du mot de passe haché si fourni
        if (!empty($data['mdp'])) {
            $sql .= ", mdp = ?";
            $params[] = $data['mdp'];
        }

        $sql .= " WHERE id_user = ?";
        $params[] = $id;

        return $this->execReqPrep($sql, $params);
    }

    /*******************************************************
    Récupère l'historique des réservations spécifiques d'un utilisateur
      Entrée : 
        idUser [int] : Identifiant de l'utilisateur

      Retour : 
        [array] : Tableau contenant l'historique de ses réservations
    *******************************************************/
    public function getReservationsUser($idUser)
    {
        $req = 'SELECT r.id_reservation, r.date_choisie, r.date_reservation, r.nb_joueurs, r.statut,
                       a.designation_fr, a.designation_en, a.prix AS prix_base, a.duree, a.image,
                       g.nom AS nom_gameplay, g.prix AS prix_gameplay,
                       GROUP_CONCAT(CONCAT(ro.quantite, "x ", o.nom_fr) SEPARATOR ", ") AS liste_objets_fr,
                       GROUP_CONCAT(CONCAT(ro.quantite, "x ", o.nom_en) SEPARATOR ", ") AS liste_objets_en,
                       COALESCE(SUM(ro.quantite * o.prix), 0) AS prix_objets
                FROM reservation r 
                INNER JOIN aventure a ON r.id_aventure = a.id_aventure 
                LEFT JOIN gameplay g ON r.id_gameplay = g.id_gameplay
                LEFT JOIN reservation_objet ro ON r.id_reservation = ro.id_reservation
                LEFT JOIN objets o ON ro.id_objet = o.id_objet
                WHERE r.id_user = ? 
                GROUP BY r.id_reservation
                ORDER BY r.date_choisie DESC';

        return $this->execReqPrep($req, array($idUser));
    }

    /*******************************************************
    Récupère les cadeaux reçus par un utilisateur (via son email)
      Entrée : 
        email [string] : Email de l'utilisateur connecté

      Retour : 
        [array] : Tableau contenant les cadeaux reçus avec détails offre + aventure
    *******************************************************/
    public function getCadeauxRecus($email)
    {
        $req = 'SELECT uo.id_user, uo.id_offre, uo.email_destinataire, uo.message_perso, 
                       uo.id_aventure, uo.date_obtention, uo.est_utilise,
                       o.nom_offre, o.prix, o.description, o.validite_mois,
                       a.designation_fr, a.designation_en, a.image,
                       u.prenom AS prenom_expediteur, u.nom AS nom_expediteur
                FROM utilisateur_offre uo
                INNER JOIN offres o ON uo.id_offre = o.id_offre
                LEFT JOIN aventure a ON uo.id_aventure = a.id_aventure
                INNER JOIN utilisateur u ON uo.id_user = u.id_user
                WHERE uo.email_destinataire = ?
                ORDER BY uo.date_obtention DESC';

        return $this->execReqPrep($req, array($email));
    }

    /*******************************************************
    Marque un cadeau reçu comme utilisé (est_utilise = 1)
      Entrée : 
        idUser [int] : Identifiant de l'acheteur du cadeau
        idOffre [int] : Identifiant de l'offre
        email [string] : Email du destinataire (l'utilisateur connecté)

      Retour : 
        [int|bool] : Nombre de lignes modifiées ou false
    *******************************************************/
    public function utiliserCadeau($idUser, $idOffre, $email)
    {
        $req = 'UPDATE utilisateur_offre SET est_utilise = 1 
                WHERE id_user = ? AND id_offre = ? AND email_destinataire = ? AND est_utilise = 0';
        return $this->execReqPrep($req, array($idUser, $idOffre, $email));
    }

    // ── Messages de contact ──

    /*******************************************************
    Insère un message de contact en base de données
      Entrée : 
        nom [string] : Nom de l'expéditeur
        prenom [string] : Prénom de l'expéditeur
        email [string] : Adresse email de l'expéditeur
        numero [string] : Numéro de téléphone (optionnel)
        message [string] : Contenu du message

      Retour : 
        [int|bool] : Nombre de lignes insérées ou false
    *******************************************************/
    public function addMessage($nom, $prenom, $email, $numero, $message)
    {
        $req = 'INSERT INTO message_contact (nom, prenom, email, numero, message) VALUES (?, ?, ?, ?, ?)';
        return $this->execReqPrep($req, array($nom, $prenom, $email, $numero, $message));
    }

    /*******************************************************
    Récupère tous les messages de contact (Admin)
      Entrée : 

      Retour : 
        [array] : Tableau contenant tous les messages de contact
    *******************************************************/
    public function getAllMessages()
    {
        $req = 'SELECT * FROM message_contact ORDER BY date_envoi DESC';
        return $this->execReq($req);
    }

    /*******************************************************
    Marque un message comme lu
      Entrée : 
        idMessage [int] : Identifiant du message

      Retour : 
        [int|bool] : Nombre de lignes modifiées ou false
    *******************************************************/
    public function marquerMessageLu($idMessage)
    {
        $req = 'UPDATE message_contact SET est_lu = 1 WHERE id_message = ?';
        return $this->execReqPrep($req, array($idMessage));
    }

    /*******************************************************
    Supprime un message de contact
      Entrée : 
        idMessage [int] : Identifiant du message à supprimer

      Retour : 
        [int|bool] : Nombre de lignes modifiées ou false
    *******************************************************/
    public function deleteMessage($idMessage)
    {
        $req = 'DELETE FROM message_contact WHERE id_message = ?';
        return $this->execReqPrep($req, array($idMessage));
    }

    /*******************************************************
    Compte les messages non lus
      Entrée : 

      Retour : 
        [int] : Nombre de messages non lus
    *******************************************************/
    public function countMessagesNonLus()
    {
        $req = 'SELECT COUNT(*) as total FROM message_contact WHERE est_lu = 0';
        $result = $this->execReq($req);
        return (int)($result[0]['total'] ?? 0);
    }
}