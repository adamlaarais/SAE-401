<?php
/*********************************************************
Classe utilitaire chargée de la génération de formulaires HTML
*********************************************************/
class Formulaire
{
    private $values;

    /*******************************************************
    Constructeur de la classe Formulaire
      Entrée : 
        data [array] : Tableau associatif contenant les valeurs par défaut du formulaire

      Retour : 
    *******************************************************/
    public function __construct($data = array())
    {
        $this->values = $data;
    }

    /*******************************************************
    Génère l'ouverture du conteneur principal du formulaire
      Entrée : 

      Retour : 
        [string] : Code HTML de la balise <fieldset>
    *******************************************************/
    public function formHead()
    {
        $html = "<fieldset>";
        return $html;
    }

    /*******************************************************
    Récupère la valeur associée à une clé spécifique
      Entrée : 
        key [string] : Nom de la clé à chercher dans les données initiales

      Retour : 
        [mixed] : Valeur trouvée ou chaîne vide si inexistante
    *******************************************************/
    private function getValue($key)
    {
        return $this->values[$key] ?? "";
    }

    /*******************************************************
    Construit les attributs HTML optionnels à partir d'un tableau
      Entrée : 
        options [array] : Tableau associatif (placeholder, required, class, id, etc.)

      Retour : 
        [string] : Chaîne d'attributs HTML
    *******************************************************/
    private function buildAttrs($options = [])
    {
        $attrs = '';
        if (!empty($options['placeholder'])) $attrs .= " placeholder='" . htmlspecialchars($options['placeholder']) . "'";
        if (!empty($options['required']))    $attrs .= " required";
        if (!empty($options['class']))       $attrs .= " class='" . htmlspecialchars($options['class']) . "'";
        if (!empty($options['id']))          $attrs .= " id='" . htmlspecialchars($options['id']) . "'";
        if (!empty($options['step']))        $attrs .= " step='" . htmlspecialchars($options['step']) . "'";
        if (!empty($options['rows']))        $attrs .= " rows='" . (int)$options['rows'] . "'";
        if (!empty($options['maxlength']))   $attrs .= " maxlength='" . (int)$options['maxlength'] . "'";
        if (!empty($options['min']))         $attrs .= " min='" . htmlspecialchars($options['min']) . "'";
        if (!empty($options['max']))         $attrs .= " max='" . htmlspecialchars($options['max']) . "'";
        if (!empty($options['disabled']))    $attrs .= " disabled";
        if (!empty($options['style']))       $attrs .= " style='" . htmlspecialchars($options['style']) . "'";
        if (!empty($options['onclick']))     $attrs .= " onclick='" . htmlspecialchars($options['onclick']) . "'";
        // Support des attributs data-*
        foreach ($options as $key => $val) {
            if (str_starts_with($key, 'data-')) {
                $attrs .= " " . $key . "='" . htmlspecialchars($val) . "'";
            }
        }
        return $attrs;
    }

    /*******************************************************
    Génère un champ de saisie texte (input type="text")
      Entrée : 
        name [string] : Attribut name de l'input
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels (placeholder, required, class, id)

      Retour : 
        [string] : Code HTML du champ texte avec son label
    *******************************************************/
    public function inputText($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        $value = htmlspecialchars($this->getValue($name));
        if ($label === "") {
            return "<input type='text' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<input type='text' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère un champ de saisie email (input type="email")
      Entrée : 
        name [string] : Attribut name de l'input
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels

      Retour : 
        [string] : Code HTML du champ email avec son label
    *******************************************************/
    public function inputEmail($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        $value = htmlspecialchars($this->getValue($name));
        if ($label === "") {
            return "<input type='email' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<input type='email' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère un champ de saisie mot de passe (input type="password")
      Entrée : 
        name [string] : Attribut name de l'input
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels

      Retour : 
        [string] : Code HTML du champ password avec son label
    *******************************************************/
    public function inputPassword($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        // icone svg oeil pour le bouton de visibilite du mot de passe
        $eyeShow = "<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z'/><circle cx='12' cy='12' r='3'/></svg>";
        $eyeHide = "<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24'/><line x1='1' y1='1' x2='23' y2='23'/></svg>";
        $toggleBtn = "<button type='button' class='toggle-password' onclick='togglePasswordVisibility(this)' aria-label='Afficher le mot de passe'>" . $eyeShow . $eyeHide . "</button>";

        if ($label === "") {
            return "<div class='password-wrapper'><input type='password' class='texte' name='" . $name . "'" . $attrs . ">" . $toggleBtn . "</div>";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<div class='password-wrapper'><input type='password' class='texte' name='" . $name . "'" . $attrs . ">" . $toggleBtn . "</div>";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère un champ de saisie numérique (input type="number")
      Entrée : 
        name [string] : Attribut name de l'input
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels (step, min, max, etc.)

      Retour : 
        [string] : Code HTML du champ numérique avec son label
    *******************************************************/
    public function inputNumber($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        $value = htmlspecialchars($this->getValue($name));
        if ($label === "") {
            return "<input type='number' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<input type='number' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère un champ de saisie de date (input type="date")
      Entrée : 
        name [string] : Attribut name de l'input
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels

      Retour : 
        [string] : Code HTML du champ date avec son label
    *******************************************************/
    public function inputDate($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        $value = htmlspecialchars($this->getValue($name));
        if ($label === "") {
            return "<input type='date' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<input type='date' class='texte' name='" . $name . "' value='" . $value . "'" . $attrs . ">";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère un champ caché (input type="hidden")
      Entrée : 
        name [string] : Attribut name de l'input
        value [string] : Valeur du champ caché

      Retour : 
        [string] : Code HTML du champ caché
    *******************************************************/
    public function inputHidden($name, $value = "", $options = [])
    {
        $val = $value !== "" ? $value : htmlspecialchars($this->getValue($name));
        $id = !empty($options['id']) ? " id='" . htmlspecialchars($options['id']) . "'" : '';
        $cls = !empty($options['class']) ? " class='" . htmlspecialchars($options['class']) . "'" : '';
        $req = !empty($options['required']) ? " required" : '';
        $data = '';
        foreach ($options as $key => $v) {
            if (str_starts_with($key, 'data-')) {
                $data .= " " . $key . "='" . htmlspecialchars($v) . "'";
            }
        }
        return "<input type='hidden' name='" . $name . "' value='" . $val . "'" . $id . $cls . $req . $data . ">";
    }

    /*******************************************************
    Génère un champ de texte multiligne (textarea)
      Entrée : 
        name [string] : Attribut name du textarea
        label [string] : Texte affiché pour identifier le champ
        options [array] : Attributs optionnels (rows, placeholder, required, maxlength)

      Retour : 
        [string] : Code HTML du textarea avec son label
    *******************************************************/
    public function textarea($name, $label = "", $options = [])
    {
        $attrs = $this->buildAttrs($options);
        $value = htmlspecialchars($this->getValue($name));
        if ($label === "") {
            return "<textarea class='texte' name='" . $name . "'" . $attrs . ">" . $value . "</textarea>";
        }
        $html = "<label class='form_elt'> <span>" . $label . "</span>";
        $html .= "<textarea class='texte' name='" . $name . "'" . $attrs . ">" . $value . "</textarea>";
        $html .= " </label>";
        return $html;
    }

    /*******************************************************
    Génère le bouton de validation du formulaire
      Entrée : 
        name [string] : Attribut name du bouton
        label [string] : Texte affiché sur le bouton
        options [array] : Attributs optionnels (class, id)

      Retour : 
        [string] : Code HTML du bouton de soumission
    *******************************************************/
    public function submit($name, $label = "Valider", $options = [])
    {
        $cssClass = !empty($options['class']) ? $options['class'] : 'valid';
        $id = !empty($options['id']) ? " id='" . htmlspecialchars($options['id']) . "'" : '';
        $html = "<button class='" . htmlspecialchars($cssClass) . "' name='" . $name . "'" . $id . ">" . $label . "</button>";
        return $html;
    }

    /*******************************************************
    Ferme le conteneur principal du formulaire
      Entrée : 

      Retour : 
        [string] : Code HTML de fermeture </fieldset>
    *******************************************************/
    public function formFoot()
    {
        $html = "</fieldset>";
        return $html;
    }
}