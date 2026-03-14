<?php
require_once "modele/aventure.class.php";
require_once "vue/vue.class.php";

/*********************************************************
Classe contrôleur chargée de la gestion et de l'affichage des aventures
*********************************************************/
class CtlAventure
{
    private $aventure;

    /*******************************************************
    Constructeur de la classe CtlAventure, initialise le modèle Aventure
      Entrée : 

      Retour : 
    *******************************************************/
    public function __construct()
    {
        $this->aventure = new Aventure();
    }

    /*******************************************************
    Affichage des détails d'une aventure dans la vue correspondante
      Entrée : 
        idAventure [int] : Identifiant de l'aventure

      Retour : 
        [void] : Affiche la vue Aventure avec ses données et notes
    *******************************************************/
    public function ficheAventure($idAventure)
    {
        $donneesAventure = $this->aventure->getAventure($idAventure);

        if (!$donneesAventure) {
            throw KodexException::aventureIntrouvable($idAventure);
        }

        $notes = $this->aventure->getNotesByAventure($idAventure);
        $noteUtilisateur = null;

        if (isset($_SESSION['user'])) {
            $noteUtilisateur = $this->aventure->getUserNote($_SESSION['user']['id_user'], $idAventure);
        }

        $vue = new Vue("Aventure");
        $vue->afficher(array(
            'aventure' => $donneesAventure,
            'notes' => $notes,
            'noteUtilisateur' => $noteUtilisateur,
        ));
    }

    /*******************************************************
    Soumet ou met à jour un avis sur une aventure
      Entrée :
        idAventure [int] : Identifiant de l'aventure
        $_POST['valeur_note'] [int] : Note attribuée (entre 1 et 5)
        $_POST['commentaire'] [string] : Commentaire de l'utilisateur

      Retour :
        [void] : Redirection vers la fiche aventure avec un statut
    *******************************************************/
    public function soumettreAvis($idAventure)
    {
        if (!isset($_SESSION['user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour soumettre un avis.");
        }

        $idUser = (int) $_SESSION['user']['id_user'];
        $valeurNote = (int) ($_POST['valeur_note'] ?? 0);
        $commentaire = trim($_POST['commentaire'] ?? '');

        if ($valeurNote < 1 || $valeurNote > 5 || $commentaire === '') {
            throw KodexException::avisErreur("Veuillez fournir une note entre 1 et 5 et un commentaire.");
        }

        $this->aventure->addNote($idUser, $idAventure, $valeurNote, $commentaire);
        header("Location: index.php?action=detail&idAventure=$idAventure&avis=ok");
        exit();
    }

    /*******************************************************
    Affichage du catalogue complet des aventures
      Entrée : 

      Retour : 
        [void] : Affiche la vue Aventures avec la liste des jeux
    *******************************************************/
    public function aventures()
    {
        $aventures = $this->aventure->getAventures();
        $vue = new Vue("Aventures");
        $vue->afficher(array("aventures" => $aventures));
    }

    /*******************************************************
    Prépare et affiche la vue de réservation pour une aventure spécifique
      Entrée :
        idAventure [int] : Identifiant de l'aventure à réserver

      Retour : 
        [void] : Affiche la vue Reservation avec les options disponibles
    *******************************************************/
    public function reservation($idAventure)
    {
        $aventure = $this->aventure->getAventure($idAventure);
        $reservationsExistantes = $this->aventure->getReservationsByAventure($idAventure);
        $gameplays = $this->aventure->getGameplays() ?: [];
        $objets = $this->aventure->getObjets() ?: [];
        $lieux = $this->aventure->getLieux() ?: [];

        if ($aventure) {
            $nomAventure = $aventure['designation_fr'] ?? $aventure['Désignation'] ?? 'Aventure';
            $donneesVue = array(
                "aventure" => $aventure,
                "reservations" => $reservationsExistantes,
                "gameplays" => $gameplays,
                "objets" => $objets,
                "lieux" => $lieux,
                "titre" => "Réservation : " . $nomAventure
            );
            $vue = new Vue("Reservation");
            $vue->afficher($donneesVue);
        } else {
            throw KodexException::aventureIntrouvable($idAventure);
        }
    }

    /*******************************************************
    Enregistre une réservation confirmée en base de données
      Entrée :
        idUser [int] : Identifiant de l'utilisateur
        idAventure [int] : Identifiant de l'aventure
        nbJoueurs [int] : Nombre de participants
        dateChoisie [string] : Date et heure de la réservation
        idGameplay [int] : Identifiant du gameplay sélectionné

      Retour : 
        [void] : Redirige vers la liste des aventures avec succès, ou lève une exception
    *******************************************************/
    public function confirmerReservation($idUser, $idAventure, $nbJoueurs, $dateChoisie, $idGameplay)
    {
        try {
            $resultat = $this->aventure->addReservation($idUser, $idAventure, $nbJoueurs, $dateChoisie, $idGameplay);

            if ($resultat) {
                header("Location: index.php?action=aventures&msg=success");
                exit();
            } else {
                throw KodexException::reservationErreur("Erreur lors de l'enregistrement de la réservation.");
            }
        } catch (KodexException $e) {
            throw $e;
        } catch (Exception $e) {
            throw KodexException::reservationErreur("Impossible de finaliser la réservation : " . $e->getMessage());
        }
    }

    /*******************************************************
    Construit et ajoute une ligne de réservation dans la variable de session du panier
      Entrée :
        idAventure [int] : Identifiant de l'aventure
        nbJoueurs [int] : Nombre de joueurs
        dateChoisie [string] : Date sélectionnée
        idGameplay [int] : Identifiant du gameplay choisi
        tabObjets [array] : Tableau associatif des équipements et quantités

      Retour : 
        [void] : Redirige vers l'affichage du panier
    *******************************************************/
    public function ajouterAuPanier($idAventure, $nbJoueurs, $dateChoisie, $idGameplay, $tabObjets)
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }

        $aventure = $this->aventure->getAventure($idAventure);
        $gameplays = $this->aventure->getGameplays();
        $tousLesObjets = $this->aventure->getObjets();

        $gameplayChoisi = null;
        foreach ($gameplays as $g) {
            if ($g['id_gameplay'] == $idGameplay) {
                $gameplayChoisi = $g;
                break;
            }
        }

        $objetsPanier = [];
        $prixObjets = 0;
        foreach ($tousLesObjets as $obj) {
            $idObj = $obj['id_objet'];
            if (isset($tabObjets[$idObj]) && $tabObjets[$idObj] > 0) {
                $qty = (int) $tabObjets[$idObj];
                $objetsPanier[] = [
                    'id_objet' => $idObj,
                    'nom_fr' => $obj['nom_fr'],
                    'nom_en' => $obj['nom_en'],
                    'prix' => $obj['prix'],
                    'quantite' => $qty,
                    'img' => $obj['img']
                ];
                $prixObjets += ($obj['prix'] * $qty);
            }
        }

        if ($aventure && $gameplayChoisi) {
            $prixTotal = ($aventure['Prix'] * $nbJoueurs) + $gameplayChoisi['prix'] + $prixObjets;

            $article = array(
                'id_aventure' => $idAventure,
                'designation_fr' => $aventure['designation_fr'],
                'designation_en' => $aventure['designation_en'],
                'ville' => $_POST['nom_ville'] ?? 'Ville Inconnue',
                'nb_joueurs' => $nbJoueurs,
                'date_choisie' => $dateChoisie,
                'id_gameplay' => $idGameplay,
                'nom_gameplay' => $gameplayChoisi['nom'],
                'objets' => $objetsPanier,
                'prix_unitaire' => $aventure['Prix'],
                'total_ligne' => $prixTotal,
                'image' => $aventure['Image']
            );

            $_SESSION['panier'][] = $article;
            header("Location: index.php?action=panier");
            exit();
        } else {
            throw KodexException::reservationErreur("Impossible d'ajouter cette aventure au panier. Aventure ou gameplay introuvable.");
        }
    }

    /*******************************************************
    Calcule et affiche la page récapitulative du panier
      Entrée : 

      Retour : 
        [void] : Affiche la vue Panier
    *******************************************************/
    public function afficherPanier()
    {
        $panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : array();

        $totalPanier = 0;
        foreach ($panier as $article) {
            $totalPanier += $article['total_ligne'];
        }

        $vue = new Vue("Panier");
        $vue->afficher(array(
            "panier" => $panier,
            "total" => $totalPanier
        ));
    }

    /*******************************************************
    Valide les articles du panier et les insère en base de données
      Entrée : 

      Retour : 
        [void] : Redirige vers la page de succès ou lève une exception
    *******************************************************/
    public function validerPaiement()
    {
        if (!isset($_SESSION['id_user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour valider un paiement.");
        }

        if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
            throw KodexException::panierVide();
        }

        $idUser = $_SESSION['id_user'];
        $erreurs = 0;

        foreach ($_SESSION['panier'] as $article) {
            try {
                $idRes = $this->aventure->addReservation(
                    $idUser,
                    $article['id_aventure'],
                    $article['nb_joueurs'],
                    $article['date_choisie'],
                    $article['id_gameplay']
                );

                if ($idRes) {
                    foreach ($article['objets'] as $obj) {
                        $this->aventure->addReservationObjet($idRes, $obj['id_objet'], $obj['quantite']);
                    }
                } else {
                    $erreurs++;
                }
            } catch (Exception $e) {
                $erreurs++;
            }
        }

        if ($erreurs === 0) {
            unset($_SESSION['panier']);
            header("Location: index.php?action=succes");
            exit();
        } else {
            throw KodexException::paiementErreur("Une erreur est survenue lors de l'enregistrement de vos réservations ($erreurs erreur(s)). Veuillez réessayer.");
        }
    }

    /*******************************************************
    Vérifie les prérequis et affiche la page de paiement simulé
      Entrée : 

      Retour : 
        [void] : Affiche la vue Paiement
    *******************************************************/
    public function afficherPaiement()
    {
        if (!isset($_SESSION['id_user']) && !isset($_SESSION['user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour accéder à la page de paiement.");
        }

        // Autoriser l'accès si panier OU cadeau en session
        $hasPanier = isset($_SESSION['panier']) && !empty($_SESSION['panier']);
        $hasCadeau = isset($_SESSION['cadeau']) && !empty($_SESSION['cadeau']);

        if (!$hasPanier && !$hasCadeau) {
            throw KodexException::panierVide();
        }

        $vue = new Vue("Paiement");
        $vue->afficher(array());
    }

    /*******************************************************
    Supprime un article spécifique du panier via son index
      Entrée : 
        index [int] : Position de l'article dans le tableau de session

      Retour : 
        [void] : Redirige vers le panier mis à jour
    *******************************************************/
    public function supprimerDuPanier($index)
    {
        if (isset($_SESSION['panier'][$index])) {
            unset($_SESSION['panier'][$index]);
            $_SESSION['panier'] = array_values($_SESSION['panier']);
        }

        header("Location: index.php?action=panier");
        exit();
    }

    /*******************************************************
    Valide et enregistre un achat de carte cadeau en base
      Entrée :
        $_POST['id_offre'] [int] : Identifiant de la formule choisie
        $_POST['id_aventure'] [int] : Identifiant de l'aventure offerte
        $_POST['email_dest'] [string] : Adresse e-mail du destinataire
        $_POST['message_perso'] [string] : Message personnalisé

      Retour :
        [void] : Redirection vers la page de succès ou renvoi d'erreur
    *******************************************************/
    public function validerCadeau()
    {
        if (!isset($_SESSION['user'])) {
            throw KodexException::accesRefuse("Vous devez être connecté pour offrir une aventure.");
        }

        $idUser = (int) $_SESSION['user']['id_user'];
        $idOffre = (int) ($_POST['id_offre'] ?? 0);
        $emailDest = filter_var(trim($_POST['email_dest'] ?? ''), FILTER_VALIDATE_EMAIL);
        $messagePerso = trim($_POST['message_perso'] ?? '');

        // Récupérer les aventures sélectionnées (tableau ou valeur unique pour rétrocompatibilité)
        $idsAventures = [];
        if (!empty($_POST['id_aventure']) && is_array($_POST['id_aventure'])) {
            foreach ($_POST['id_aventure'] as $id) {
                $idInt = (int)$id;
                if ($idInt > 0) $idsAventures[] = $idInt;
            }
        } elseif (!empty($_POST['id_aventure'])) {
            $idInt = (int)$_POST['id_aventure'];
            if ($idInt > 0) $idsAventures[] = $idInt;
        }

        if ($idOffre <= 0 || empty($idsAventures) || !$emailDest) {
            throw KodexException::cadeauErreur("Veuillez remplir tous les champs obligatoires : offre, aventure(s) et adresse email du destinataire.");
        }

        // Récupérer les infos de l'offre
        $offre = $this->aventure->getOffreById($idOffre);

        // Récupérer les noms des aventures pour le récapitulatif
        $nomsAventuresFr = [];
        $nomsAventuresEn = [];
        foreach ($idsAventures as $idAv) {
            $aventureData = $this->aventure->getAventure($idAv);
            $nomsAventuresFr[] = $aventureData['designation_fr'] ?? 'Aventure';
            $nomsAventuresEn[] = $aventureData['designation_en'] ?? 'Adventure';
        }

        // Stocker les données du cadeau en session pour la page de paiement
        $_SESSION['cadeau'] = [
            'id_user' => $idUser,
            'id_offre' => $idOffre,
            'ids_aventures' => $idsAventures,
            'email_dest' => $emailDest,
            'message_perso' => $messagePerso,
            'nom_offre' => $offre['nom_offre'] ?? 'Formule',
            'prix' => $offre['prix'] ?? 0,
            'noms_aventures_fr' => $nomsAventuresFr,
            'noms_aventures_en' => $nomsAventuresEn,
            // Rétrocompatibilité
            'id_aventure' => $idsAventures[0],
            'nom_aventure_fr' => implode(', ', $nomsAventuresFr),
            'nom_aventure_en' => implode(', ', $nomsAventuresEn),
        ];

        header("Location: index.php?action=paiement");
        exit();
    }

    /*******************************************************
    Finalise le paiement d'un cadeau : insère en BDD et nettoie la session
      Entrée : 

      Retour : 
        [void] : Redirection vers la page de succès
    *******************************************************/
    public function validerPaiementCadeau()
    {
        if (!isset($_SESSION['user']) || !isset($_SESSION['cadeau'])) {
            throw KodexException::cadeauErreur("Session cadeau invalide ou expirée. Veuillez recommencer la procédure d'offre.");
        }

        $cadeau = $_SESSION['cadeau'];

        // Insérer une ligne par aventure sélectionnée
        $idsAventures = !empty($cadeau['ids_aventures']) ? $cadeau['ids_aventures'] : [$cadeau['id_aventure']];
        foreach ($idsAventures as $idAv) {
            $this->aventure->addUtilisateurOffre(
                $cadeau['id_user'],
                $cadeau['id_offre'],
                $cadeau['email_dest'],
                $cadeau['message_perso'],
                (int)$idAv
            );
        }

        unset($_SESSION['cadeau']);
        header("Location: index.php?action=succes");
        exit();
    }
}