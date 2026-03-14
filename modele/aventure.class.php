<?php
require_once "modele/database.class.php";

/*********************************************************
Classe chargée de la gestion des aventures dans la base de données
*********************************************************/
class Aventure extends Database
{
  /*******************************************************
  Retourne les dates déjà réservées pour une aventure
    Entrée : 
      idAventure [int] : Identifiant de l'aventure

    Retour : 
      [array] : Tableau contenant les dates réservées
  *******************************************************/
  public function getReservationsByAventure($idAventure)
  {
    $req = "SELECT date_choisie FROM reservation WHERE id_aventure = ? AND date_choisie >= NOW()";
    return $this->execReqPrep($req, array($idAventure));
  }

  /*******************************************************
  Ajoute une nouvelle aventure
    Entrée : 
      designation_fr [string] : Nom de l'aventure en français
      designation_en [string] : Nom de l'aventure en anglais
      categorie_fr [string] : Catégorie en français
      categorie_en [string] : Catégorie en anglais
      prix [float] : Prix de l'aventure
      duree [string] : Durée de l'aventure
      joueurs [int] : Nombre de joueurs maximum
      difficulte [string] : Niveau de difficulté
      description_fr [string] : Description en français
      description_en [string] : Description en anglais
      image [string] : Nom du fichier image

    Retour : 
      [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
  *******************************************************/
  public function addAventure($designation_fr, $designation_en, $categorie_fr, $categorie_en, $prix, $duree, $joueurs, $difficulte, $description_fr, $description_en, $image)
  {
    $req = 'INSERT INTO aventure (designation_fr, designation_en, categorie_fr, categorie_en, prix, duree, joueurs, difficulte, description_fr, description_en, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

    return $this->execReqPrep($req, array(
      $designation_fr,
      $designation_en,
      $categorie_fr,
      $categorie_en,
      $prix,
      $duree,
      $joueurs,
      $difficulte,
      $description_fr,
      $description_en,
      $image
    ));
  }

  /*******************************************************
  Supprime une aventure
    Entrée : 
      idAventure [int] : Identifiant de l'aventure

    Retour : 
      [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
  *******************************************************/
  public function deleteAventure($idAventure)
  {
    $req = 'DELETE FROM aventure WHERE id_aventure = ?';
    return $this->execReqPrep($req, array($idAventure));
  }

  /*******************************************************
  Retourne les derniers avis de toutes les aventures
    Entrée : 

    Retour : 
      [array] : Tableau contenant les avis, les prénoms et le nom de l'aventure
  *******************************************************/
  public function getAvisClients()
  {
    $req = 'SELECT n.commentaire, n.valeur_note, u.prenom, a.designation_fr, a.designation_en
            FROM note n 
            INNER JOIN utilisateur u ON n.id_user = u.id_user 
            INNER JOIN aventure a ON n.id_aventure = a.id_aventure
            ORDER BY n.id_aventure DESC LIMIT 10;';
    return $this->execReq($req);
  }

  /*******************************************************
  Retourne la moyenne globale des notes et le nombre total d'avis
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant la moyenne et le nombre d'avis
  *******************************************************/
  public function getMoyenneNotes()
  {
    $req = 'SELECT ROUND(AVG(valeur_note), 1) AS "Moyenne", COUNT(*) AS "NbAvis" FROM note;';
    $result = $this->execReq($req);
    return $result[0];
  }

  /*******************************************************
  Confirme une réservation
    Entrée : 
      idReservation [int] : Identifiant de la réservation

    Retour : 
      [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
  *******************************************************/
  public function confirmReservation($idReservation)
  {
    $req = 'UPDATE reservation SET statut = "Confirmée" WHERE id_reservation = ?';
    return $this->execReqPrep($req, array($idReservation));
  }

  /*******************************************************
  Annule ou supprime une réservation
    Entrée : 
      idReservation [int] : Identifiant de la réservation

    Retour : 
      [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
  *******************************************************/
  public function deleteReservation($idReservation)
  {
    $req = 'DELETE FROM reservation WHERE id_reservation = ?';
    return $this->execReqPrep($req, array($idReservation));
  }

  /*******************************************************
  Retourne toutes les aventures disponibles
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant les détails des aventures
  *******************************************************/
  public function getAventures()
  {
    $req = 'SELECT a.id_aventure AS "Code", a.designation_fr, a.designation_en, a.categorie_fr, a.categorie_en, a.prix AS "Prix", l.nom_ville AS "Ville", a.duree AS "Durée", a.joueurs AS "Joueurs", difficulte AS "Difficulté", description_fr, description_en, image AS "Image" FROM aventure a INNER JOIN lieu l ON a.id_lieu = l.id_lieu ORDER BY a.categorie_fr;';
    return $this->execReq($req);
  }

  /*******************************************************
  Retourne les détails d'une aventure spécifique
    Entrée : 
      idAventure [int] : Identifiant de l'aventure

    Retour : 
      [array] : Tableau associatif contenant les attributs de l'aventure
  *******************************************************/
  public function getAventure($idAventure)
  {
    $req = 'SELECT a.id_aventure AS "Code", a.designation_fr, a.designation_en, a.categorie_fr, a.categorie_en, a.prix AS "Prix", a.duree AS "Durée", a.joueurs AS "Joueurs", a.difficulte AS "Difficulté", a.description_fr, a.description_en, a.image AS "Image", l.nom_ville AS "Ville", (SELECT ROUND(AVG(valeur_note), 1) FROM note WHERE id_aventure = a.id_aventure) AS "Note" 
            FROM aventure a INNER JOIN lieu l ON a.id_lieu = l.id_lieu WHERE a.id_aventure = ?;';
    $resultat = $this->execReqPrep($req, array($idAventure));
    return $resultat[0];
  }

  /*******************************************************
  Retourne la liste des gameplays
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant les gameplays
  *******************************************************/
  public function getGameplays()
  {
    $req = 'SELECT * FROM gameplay';
    return $this->execReq($req);
  }

  /*******************************************************
  Retourne la liste des objets ou équipements
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant les objets
  *******************************************************/
  public function getObjets()
  {
    $req = 'SELECT * FROM objets';
    return $this->execReq($req);
  }

  /*******************************************************
  Ajoute une nouvelle réservation et retourne son identifiant
    Entrée : 
      idUser [int] : Identifiant de l'utilisateur
      idAventure [int] : Identifiant de l'aventure
      nbJoueurs [int] : Nombre de joueurs
      dateChoisie [string] : Date de la réservation
      idGameplay [int] : Identifiant du gameplay

    Retour : 
      [string] : Identifiant de la dernière ligne insérée
  *******************************************************/
  public function addReservation($idUser, $idAventure, $nbJoueurs, $dateChoisie, $idGameplay)
  {
    $req = "INSERT INTO reservation (id_user, id_aventure, nb_joueurs, date_reservation, date_choisie, id_gameplay, statut) VALUES (?, ?, ?, NOW(), ?, ?, 'En attente')";
    $this->execReqPrep($req, array($idUser, $idAventure, $nbJoueurs, $dateChoisie, $idGameplay));
    return $this->getLastInsertId();
  }

  /*******************************************************
  Lie un objet à une réservation
    Entrée : 
      idReservation [int] : Identifiant de la réservation
      idObjet [int] : Identifiant de l'objet
      quantite [int] : Quantité de l'objet

    Retour : 
      [array|int|bool] : Résultat de la requête, nombre de lignes modifiées ou false
  *******************************************************/
  public function addReservationObjet($idReservation, $idObjet, $quantite)
  {
    $req = "INSERT INTO reservation_objet (id_reservation, id_objet, quantite) VALUES (?, ?, ?)";
    return $this->execReqPrep($req, array($idReservation, $idObjet, $quantite));
  }

  /*******************************************************
  Retourne toutes les réservations avec les détails associés
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant les réservations complètes
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
  Retourne la liste des lieux
    Entrée : 

    Retour : 
      [array] : Tableau associatif contenant les lieux
  *******************************************************/
  public function getLieux()
  {
    $req = 'SELECT * FROM lieu ORDER BY nom_ville ASC';
    return $this->execReq($req);
  }

  /*******************************************************
  Retourne tous les avis d'une aventure avec le prénom de l'auteur
    Entrée :
      idAventure [int] : Identifiant de l'aventure

    Retour :
      [array] : Tableau associatif contenant valeur_note, commentaire et prenom
  *******************************************************/
  public function getNotesByAventure($idAventure)
  {
    $req = 'SELECT n.valeur_note, n.commentaire, u.prenom
            FROM note n
            INNER JOIN utilisateur u ON n.id_user = u.id_user
            WHERE n.id_aventure = ?
            ORDER BY n.valeur_note DESC';
    $result = $this->execReqPrep($req, array($idAventure));
    return is_array($result) ? $result : [];
  }

  /*******************************************************
  Retourne la note et le commentaire d'un utilisateur pour une aventure
    Entrée :
      idUser [int] : Identifiant de l'utilisateur
      idAventure [int] : Identifiant de l'aventure

    Retour :
      [array|null] : Tableau associatif contenant valeur_note et commentaire, ou null
  *******************************************************/
  public function getUserNote($idUser, $idAventure)
  {
    $req = 'SELECT valeur_note, commentaire FROM note WHERE id_user = ? AND id_aventure = ?';
    $result = $this->execReqPrep($req, array($idUser, $idAventure));
    return is_array($result) ? $result[0] : null;
  }

  /*******************************************************
  Ajoute ou met à jour la note d'un utilisateur pour une aventure
    Entrée :
      idUser [int] : Identifiant de l'utilisateur
      idAventure [int] : Identifiant de l'aventure
      valeurNote [int] : Note entre 1 et 5
      commentaire [string] : Commentaire libre de l'utilisateur

    Retour :
      [int|bool] : Nombre de lignes affectées ou false en cas d'erreur
  *******************************************************/
  public function addNote($idUser, $idAventure, $valeurNote, $commentaire)
  {
    $req = 'INSERT INTO note (id_user, id_aventure, valeur_note, commentaire)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE valeur_note = VALUES(valeur_note), commentaire = VALUES(commentaire)';
    return $this->execReqPrep($req, array($idUser, $idAventure, $valeurNote, $commentaire));
  }

  /*******************************************************
  Retourne toutes les offres ou formules cadeaux disponibles
    Entrée :

    Retour :
      [array] : Tableau associatif contenant les offres
  *******************************************************/
  public function getOffres()
  {
    $req = 'SELECT id_offre, nom_offre, prix, description, validite_mois, nb_aventures FROM offres ORDER BY prix ASC';
    return $this->execReq($req);
  }

  /*******************************************************
  Retourne une offre spécifique par son identifiant
    Entrée :
      idOffre [int] : Identifiant de l'offre

    Retour :
      [array|null] : Tableau associatif contenant l'offre, ou null
  *******************************************************/
  public function getOffreById($idOffre)
  {
    $req = 'SELECT id_offre, nom_offre, prix, description, validite_mois FROM offres WHERE id_offre = ?';
    $result = $this->execReqPrep($req, array($idOffre));
    return is_array($result) ? $result[0] : null;
  }

  /*******************************************************
  Enregistre l'achat d'une offre cadeau pour un utilisateur
    Entrée :
      idUser [int] : Identifiant de l'utilisateur
      idOffre [int] : Identifiant de l'offre

    Retour :
      [int|bool] : Nombre de lignes affectées ou false en cas d'erreur
  *******************************************************/
  public function addUtilisateurOffre($idUser, $idOffre, $emailDest, $messagePerso, $idAventure)
  {
    $req = 'INSERT INTO utilisateur_offre (id_user, id_offre, email_destinataire, message_perso, id_aventure, date_obtention, est_utilise) VALUES (?, ?, ?, ?, ?, NOW(), 0)';
    $params = array($idUser, $idOffre, $emailDest, $messagePerso, $idAventure);

    try {
      return $this->execReqPrep($req, $params);
    } catch (\Exception $e) {
      // Si erreur de clé dupliquée, on migre la table pour ajouter un id auto-increment
      if (strpos($e->getMessage(), 'Duplicate entry') !== false || strpos($e->getMessage(), '1062') !== false) {
        try {
          // Désactiver les vérifications FK pour pouvoir modifier la clé primaire
          $this->execReq("SET FOREIGN_KEY_CHECKS = 0");
          // Supprimer les contraintes FK existantes
          $this->execReq("ALTER TABLE utilisateur_offre DROP FOREIGN KEY utilisateur_offre_ibfk_1");
          $this->execReq("ALTER TABLE utilisateur_offre DROP FOREIGN KEY utilisateur_offre_ibfk_2");
          // Supprimer l'ancienne clé primaire composite et ajouter un id auto-increment
          $this->execReq("ALTER TABLE utilisateur_offre DROP PRIMARY KEY, ADD COLUMN id_utilisateur_offre INT AUTO_INCREMENT PRIMARY KEY FIRST");
          // Re-ajouter un index sur (id_user, id_offre) et les contraintes FK
          $this->execReq("ALTER TABLE utilisateur_offre ADD KEY idx_user_offre (id_user, id_offre)");
          $this->execReq("ALTER TABLE utilisateur_offre ADD CONSTRAINT utilisateur_offre_ibfk_1 FOREIGN KEY (id_user) REFERENCES utilisateur(id_user) ON DELETE CASCADE");
          $this->execReq("ALTER TABLE utilisateur_offre ADD CONSTRAINT utilisateur_offre_ibfk_2 FOREIGN KEY (id_offre) REFERENCES offres(id_offre) ON DELETE CASCADE");
          // Réactiver les vérifications FK
          $this->execReq("SET FOREIGN_KEY_CHECKS = 1");
        } catch (\Exception $migrationError) {
          // S'assurer de réactiver les FK même en cas d'erreur
          try { $this->execReq("SET FOREIGN_KEY_CHECKS = 1"); } catch (\Exception $ignored) {}
        }
        return $this->execReqPrep($req, $params);
      }
      throw $e;
    }
  }
}