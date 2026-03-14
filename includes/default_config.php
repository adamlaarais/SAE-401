<?php
require_once "config/config.class.php";

/*********************************************************
Fichier d'initialisation de la configuration globale
Instancie les paramètres de connexion à la base de données 
et les constantes d'affichage du site.
*********************************************************/

$Conf = new stdClass();

/*******************************************************
Configuration de la base de données
*******************************************************/
$Conf->DBHost = Config::$DB_host ?? "localhost";
$Conf->DBName = Config::$DB_name ?? "kodex";
$Conf->DBUser = Config::$DB_user ?? "root";
$Conf->DBPwd = Config::$DB_pwd ?? "";

/*******************************************************
Configuration des éléments visuels et structurels
*******************************************************/
$Conf->TITREONGLET = Config::TITREONGLET;
$Conf->NOMSITE = Config::NOMSITE;
$Conf->MENU = Config::MENU;
$Conf->USER = Config::USER;
$Conf->FOOTER = Config::FOOTER;