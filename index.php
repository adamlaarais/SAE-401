<?php
session_start();
require_once "includes/default_config.php";
require_once "includes/html/tableau.class.php";
require_once "includes/html/formulaire.class.php";
require_once "includes/exceptions/KodexException.class.php";
require_once "controleur/CtlRouteur.class.php";

$routeur = new Routeur();
$routeur->routerRequete();