<?php
/*********************************************************
Classe utilitaire chargée de la génération de tableaux HTML
*********************************************************/
class Tableau
{
    /*******************************************************
    Génère une ligne de tableau HTML (<tr>)
      Entrée : 
        data [array] : Tableau contenant les éléments de la cellule
        tag [string] : Balise HTML à utiliser ('td' par défaut, 'th' pour les en-têtes)

      Retour : 
        [string] : Code HTML de la ligne générée
    *******************************************************/
    public static function row($data, $tag = 'td')
    {
        $html = "<tr>";
        foreach ($data as $item) {
            $html .= "<" . $tag . ">" . $item . "</" . $tag . ">";
        }
        $html .= "</tr>";

        return $html;
    }

    /*******************************************************
    Ouvre la balise table et génère l'en-tête (<thead>) si des données sont passées
      Entrée : 
        data [array] : Tableau contenant les éléments de l'en-tête (optionnel)

      Retour : 
        [string] : Code HTML de l'ouverture du tableau et de son en-tête
    *******************************************************/
    public static function head($data = [])
    {
        $html = "<table>";
        if (!empty($data)) {
            $html .= "<thead>" . self::row($data, "th") . "</thead>";
        }

        return $html;
    }

    /*******************************************************
    Génère le corps du tableau (<tbody>) en itérant sur les lignes
      Entrée : 
        data [array] : Tableau à deux dimensions contenant les lignes et cellules

      Retour : 
        [string] : Code HTML du corps du tableau
    *******************************************************/
    public static function body($data)
    {
        $html = "<tbody>";
        foreach ($data as $ligne) {
            $html .= self::row($ligne);
        }
        $html .= "</tbody>";

        return $html;
    }

    /*******************************************************
    Génère le pied de tableau (<tfoot>) et ferme la balise table
      Entrée : 
        data [array] : Tableau contenant les éléments du pied de tableau (optionnel)

      Retour : 
        [string] : Code HTML du pied de tableau et fermeture du tableau
    *******************************************************/
    public static function foot($data = [])
    {
        $html = "";
        if (!empty($data)) {
            $html .= "<tfoot>" . self::row($data, "th") . "</tfoot>";
        }
        $html .= "</table>";

        return $html;
    }
}