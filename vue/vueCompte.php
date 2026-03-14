<?php
$css = '<link rel="stylesheet" href="./style/compte.css">';
$mode = $_GET['mode'] ?? 'inscription';
?>

<div class="page-compte">
    <div class="panel-image">
        <canvas id="canvasParticules"></canvas>

        <a href="index.php" class="logo-overlay">
            <img src="./style/img/LOGO.png" alt="Logo Kodex" class="logo-image">
            <span class="logo-texte">← KODEX | <span
                    class="<?= $mode == 'inscription' ? 'i18n-mode-reg' : 'i18n-mode-log' ?>"><?= $mode == 'inscription' ? "S'inscrire" : "Connexion" ?></span></span>
        </a>
    </div>

    <div class="panel-formulaire">
        <div class="form-box">
            <h2 class="form-titre <?= $mode == 'inscription' ? 'i18n-title-reg' : 'i18n-title-log' ?>">
                <?= $mode == 'inscription' ? 'Créez Votre Compte <span>Kodex</span>' : 'Accédez à votre <span>Espace</span>' ?>
            </h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="notif-erreur-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <span>
                        <?php if ($_GET['error'] == '1'): ?>
                            <span class="i18n-err-login">Email ou mot de passe incorrect.</span>
                        <?php elseif ($_GET['error'] == '2'): ?>
                            <span class="i18n-err-register">L'inscription a échoué. L'adresse email est peut-être déjà utilisée.</span>
                        <?php else: ?>
                            <span class="i18n-err-generic">Une erreur est survenue, veuillez réessayer.</span>
                        <?php endif; ?>
                    </span>
                </div>
            <?php endif; ?>

            <?php if ($mode == 'inscription'): ?>
                <form method="post" action="index.php?action=inscription" class="form-kodex form-inscription">
                    <?php
                    $Formulaire = new Formulaire();
                    echo $Formulaire->formHead();

                    echo $Formulaire->inputText($name = "nom", $label = "<span class='i18n-lbl-nom'>Nom *</span>");
                    echo $Formulaire->inputText($name = "prenom", $label = "<span class='i18n-lbl-prenom'>Prénom *</span>");
                    echo $Formulaire->inputDate($name = "date_naissance", $label = "<span class='i18n-lbl-dob'>Date de naissance *</span>");
                    echo $Formulaire->inputEmail($name = "email", $label = "<span class='i18n-lbl-email'>Email *</span>");
                    echo $Formulaire->inputText($name = "numero", $label = "<span class='i18n-lbl-phone'>Numéro de téléphone</span>");
                    echo $Formulaire->inputPassword($name = "mdp", $label = "<span class='i18n-lbl-pwd'>Mot de passe *</span>");

                    echo $Formulaire->inputText($name = "adresse", $label = "<span class='i18n-lbl-address'>Adresse *</span>");
                    echo $Formulaire->inputText($name = "ville", $label = "<span class='i18n-lbl-city'>Ville *</span>");
                    echo $Formulaire->inputText($name = "postal", $label = "<span class='i18n-lbl-zip'>Code Postal *</span>");
                    echo $Formulaire->inputText($name = "pays", $label = "<span class='i18n-lbl-country'>Pays *</span>");

                    echo $Formulaire->formFoot();
                    echo $Formulaire->submit($name = "inscription");
                    ?>

                    <p class="lien-bas"><span class="i18n-already-acc">Vous avez déjà un compte ?</span> <a
                            href="index.php?action=inscription&mode=connexion" class="i18n-link-log">Connectez-vous</a></p>

                <?php else: ?>
                    <form method="POST" action="index.php?action=connexion" class="form-kodex form-connexion">
                        <?php
                        $Formulaire = new Formulaire();
                        echo $Formulaire->formHead();
                        echo $Formulaire->inputEmail($name = "email", $label = "<span class='i18n-lbl-email-log'>E-Mail</span>");
                        echo $Formulaire->inputPassword($name = "mdp", $label = "<span class='i18n-lbl-pwd-log'>Mot de passe</span>");
                        echo $Formulaire->formFoot();
                        echo $Formulaire->submit($name = "test");
                        ?>

                        <p class="lien-bas"><span class="i18n-no-acc">Pas encore de compte ?</span> <a
                                href="index.php?action=inscription&mode=inscription" class="i18n-link-reg">S'inscrire</a>
                        </p>
                    </form>
                <?php endif; ?>
        </div>
    </div>
</div>

<script src="./js/particules.js"></script>