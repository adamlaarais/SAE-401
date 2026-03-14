<?php
/*********************************************************
Classe d'exception personnalisée pour le site Kodex.
Permet de gérer différents types d'erreurs avec un code HTTP,
un titre et un message adaptés à chaque situation.
*********************************************************/
class KodexException extends Exception
{
    // Codes d'erreur internes
    const ACTION_INVALIDE     = 1001;
    const PAGE_INTROUVABLE    = 1002;
    const ACCES_REFUSE        = 1003;
    const SESSION_EXPIREE     = 1004;
    const DONNEES_INVALIDES   = 2001;
    const CHAMPS_MANQUANTS    = 2002;
    const AVENTURE_INTROUVABLE = 3001;
    const RESERVATION_ERREUR  = 3002;
    const PANIER_VIDE         = 3003;
    const PAIEMENT_ERREUR     = 3004;
    const CADEAU_ERREUR       = 3005;
    const AVIS_ERREUR         = 3006;
    const ADMIN_ERREUR        = 4001;
    const BDD_ERREUR          = 5001;

    private $httpCode;
    private $titre;

    /*******************************************************
    Constructeur de l'exception Kodex
      Entrée :
        message [string]  : Message descriptif de l'erreur
        code [int]        : Code d'erreur interne (constante de cette classe)
        httpCode [int]    : Code HTTP à renvoyer (404, 403, 500, etc.)
        titre [string]    : Titre court de l'erreur affiché à l'utilisateur

      Retour :
    *******************************************************/
    public function __construct($message = "Une erreur est survenue.", $code = 0, $httpCode = 500, $titre = "Erreur")
    {
        parent::__construct($message, $code);
        $this->httpCode = $httpCode;
        $this->titre = $titre;
    }

    /*******************************************************
    Retourne le code HTTP associé à l'erreur
    *******************************************************/
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /*******************************************************
    Retourne le titre court de l'erreur
    *******************************************************/
    public function getTitre()
    {
        return $this->titre;
    }

    // ── Méthodes statiques de création rapide ──

    /*******************************************************
    Action inconnue ou invalide dans l'URL
    *******************************************************/
    public static function actionInvalide($action = "")
    {
        $detail = $action !== "" ? " « " . htmlspecialchars($action) . " »" : "";
        return new self(
            "L'action demandée" . $detail . " n'existe pas ou n'est pas reconnue.",
            self::ACTION_INVALIDE,
            404,
            "Page introuvable"
        );
    }

    /*******************************************************
    Page ou ressource introuvable
    *******************************************************/
    public static function pageIntrouvable($detail = "")
    {
        return new self(
            $detail ?: "La page que vous cherchez n'existe pas ou a été déplacée.",
            self::PAGE_INTROUVABLE,
            404,
            "Page introuvable"
        );
    }

    /*******************************************************
    Accès refusé (non connecté ou droits insuffisants)
    *******************************************************/
    public static function accesRefuse($detail = "")
    {
        return new self(
            $detail ?: "Vous devez être connecté pour accéder à cette page.",
            self::ACCES_REFUSE,
            403,
            "Accès refusé"
        );
    }

    /*******************************************************
    Session expirée ou invalide
    *******************************************************/
    public static function sessionExpiree()
    {
        return new self(
            "Votre session a expiré. Veuillez vous reconnecter.",
            self::SESSION_EXPIREE,
            401,
            "Session expirée"
        );
    }

    /*******************************************************
    Données du formulaire invalides ou incomplètes
    *******************************************************/
    public static function donneesInvalides($detail = "")
    {
        return new self(
            $detail ?: "Les données envoyées sont invalides ou incomplètes.",
            self::DONNEES_INVALIDES,
            400,
            "Données invalides"
        );
    }

    /*******************************************************
    Champs obligatoires manquants
    *******************************************************/
    public static function champsManquants($champs = "")
    {
        $detail = $champs !== ""
            ? "Les champs suivants sont requis : " . htmlspecialchars($champs) . "."
            : "Certains champs obligatoires n'ont pas été remplis.";
        return new self(
            $detail,
            self::CHAMPS_MANQUANTS,
            400,
            "Champs manquants"
        );
    }

    /*******************************************************
    Aventure non trouvée en BDD
    *******************************************************/
    public static function aventureIntrouvable($id = 0)
    {
        $detail = $id > 0
            ? "L'aventure N°$id est introuvable dans notre catalogue."
            : "L'aventure demandée est introuvable.";
        return new self(
            $detail,
            self::AVENTURE_INTROUVABLE,
            404,
            "Aventure introuvable"
        );
    }

    /*******************************************************
    Erreur lors d'une réservation
    *******************************************************/
    public static function reservationErreur($detail = "")
    {
        return new self(
            $detail ?: "Une erreur est survenue lors de votre réservation. Veuillez réessayer.",
            self::RESERVATION_ERREUR,
            500,
            "Erreur de réservation"
        );
    }

    /*******************************************************
    Panier vide ou invalide
    *******************************************************/
    public static function panierVide()
    {
        return new self(
            "Votre panier est vide. Ajoutez une aventure avant de procéder au paiement.",
            self::PANIER_VIDE,
            400,
            "Panier vide"
        );
    }

    /*******************************************************
    Erreur de paiement
    *******************************************************/
    public static function paiementErreur($detail = "")
    {
        return new self(
            $detail ?: "Une erreur est survenue lors du traitement de votre paiement.",
            self::PAIEMENT_ERREUR,
            500,
            "Erreur de paiement"
        );
    }

    /*******************************************************
    Erreur liée à un cadeau / offre
    *******************************************************/
    public static function cadeauErreur($detail = "")
    {
        return new self(
            $detail ?: "Une erreur est survenue lors du traitement de votre carte cadeau.",
            self::CADEAU_ERREUR,
            400,
            "Erreur carte cadeau"
        );
    }

    /*******************************************************
    Erreur liée à un avis
    *******************************************************/
    public static function avisErreur($detail = "")
    {
        return new self(
            $detail ?: "Impossible de soumettre votre avis. Vérifiez que tous les champs sont remplis.",
            self::AVIS_ERREUR,
            400,
            "Erreur d'avis"
        );
    }

    /*******************************************************
    Erreur d'administration
    *******************************************************/
    public static function adminErreur($detail = "")
    {
        return new self(
            $detail ?: "Une erreur est survenue dans l'espace d'administration.",
            self::ADMIN_ERREUR,
            500,
            "Erreur administration"
        );
    }

    /*******************************************************
    Erreur de base de données
    *******************************************************/
    public static function bddErreur($detail = "")
    {
        return new self(
            $detail ?: "Une erreur interne est survenue. Veuillez réessayer ultérieurement.",
            self::BDD_ERREUR,
            500,
            "Erreur serveur"
        );
    }
}
