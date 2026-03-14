<?php
$titre = "Contact";
$css = '<link href="./style/contact.css" rel="stylesheet">';
?>

<div class="contact-page">
    <div class="contact-header">
        <h1 class="i18n-contact-title">Nous Contacter</h1>
        <p class="i18n-contact-subtitle">Une question ? Une demande ? N'hésitez pas à nous écrire</p>
    </div>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'ok'): ?>
        <div class="contact-success-banner">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <span class="lang-fr">Votre message a bien été envoyé ! Nous vous répondrons dans les plus brefs délais.</span>
            <span class="lang-en" style="display:none;">Your message has been sent! We will reply as soon as possible.</span>
        </div>
    <?php endif; ?>

    <div class="contact-container">
        <div class="contact-form-panel">
            <h2 class="i18n-contact-form-h2">Remplissez le formulaire et nous vous contacterons.</h2>

            <form method="POST" action="index.php?action=envoyer_contact">

                <?php
                $F = new Formulaire([
                    'nom' => $_SESSION['user']['nom'] ?? '',
                    'prenom' => $_SESSION['user']['prenom'] ?? '',
                    'email' => $_SESSION['user']['email'] ?? '',
                    'numero' => $_SESSION['user']['numero'] ?? '',
                ]);

                echo "<div class='form-row'>";
                echo $F->inputText("nom", "<span class='i18n-contact-lbl-nom'>Nom</span> <span class='required'>*</span>", ['placeholder' => 'Votre nom', 'required' => true]);
                echo $F->inputText("prenom", "<span class='i18n-contact-lbl-prenom'>Prénom</span> <span class='required'>*</span>", ['placeholder' => 'Votre prénom', 'required' => true]);
                echo "</div>";

                echo "<div class='form-row'>";
                echo $F->inputEmail("email", "<span class='i18n-contact-lbl-email'>Email</span> <span class='required'>*</span>", ['placeholder' => 'nom@email.com', 'required' => true]);
                echo $F->inputText("numero", "<span class='i18n-contact-lbl-phone'>Numéro de téléphone</span>", ['placeholder' => '01 02 03 04 05']);
                echo "</div>";

                echo "<div class='form-row full-width'>";
                echo $F->textarea("message", "<span class='i18n-contact-lbl-req'>Votre demande</span> <span class='required'>*</span>", ['rows' => 4, 'placeholder' => 'Décrivez votre demande ici...', 'required' => true]);
                echo "</div>";

                echo $F->submit("submit", "Envoyer", ['class' => 'valid-btn i18n-contact-btn-send']);
                ?>
            </form>
        </div>

        <div class="contact-info-panel">
            <h2 class="i18n-contact-info-h2">Informations de contact</h2>
            <div class="info-items">
                <div class="info-item">
                    <div class="icon-circle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div>
                        <h3 class="i18n-contact-info-email">Email</h3>
                        <p>admin@kodex.fr</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon-circle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="i18n-contact-info-phone">Téléphone</h3>
                        <p>+33 1 22 33 44 55</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon-circle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div>
                        <h3 class="i18n-contact-info-hours">Horaires</h3>
                        <p class="i18n-contact-hours-val">Lun - Ven: 9h00 - 20h00<br>Sam : 10h00 - 22h00</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon-circle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div>
                        <h3 class="i18n-contact-info-addr">Adresse</h3>
                        <p>61 Rue Albert Camus, 68200 Mulhouse</p>
                    </div>
                </div>
            </div>
            <p class="info-disclaimer i18n-contact-disclaimer">Nous nous engageons à répondre à tous les messages dans
                un délai de 24 heures pendant les jours ouvrables.</p>
        </div>
    </div>
</div>