<?php
$titre = "Paiement - Kodex";
$css = '<link rel="stylesheet" href="./style/paiement.css">';

$panier = $_SESSION['panier'] ?? [];
$cadeau = $_SESSION['cadeau'] ?? null;
$isCadeau = !empty($cadeau);
$total = 0;

if ($isCadeau) {
    $total = (float)($cadeau['prix'] ?? 0);
}
?>

<script src="https://js.stripe.com/v3/"></script>

<div class="paiement-wrapper">
    <div class="paiement-entete">
        <h1 class="i18n-pay-title">Paiement</h1>
        <p class="i18n-pay-subtitle">Finalisez Votre Réservation En Toute Sécurité</p>
    </div>

    <div class="paiement-contenu">

        <div class="box-recapitulatif">
            <h2 class="i18n-pay-recap-title">Récapitulatif</h2>

            <?php if ($isCadeau): ?>
                <!-- RÉCAPITULATIF CADEAU -->
                <div class="article-detail">
                    <div class="ligne-recap">
                        <span class="label">
                            <span class="lang-fr">Formule cadeau</span>
                            <span class="lang-en" style="display:none;">Gift package</span>
                        </span>
                        <span class="valeur"><strong><?= htmlspecialchars($cadeau['nom_offre']) ?></strong></span>
                    </div>
                    <div class="ligne-recap">
                        <span class="label">
                            <span class="lang-fr">Aventure offerte</span>
                            <span class="lang-en" style="display:none;">Gifted adventure</span>
                        </span>
                        <span class="valeur">
                            <strong>
                                <span class="lang-fr"><?= htmlspecialchars($cadeau['nom_aventure_fr']) ?></span>
                                <span class="lang-en" style="display:none;"><?= htmlspecialchars($cadeau['nom_aventure_en']) ?></span>
                            </strong>
                        </span>
                    </div>
                    <div class="ligne-recap">
                        <span class="label">
                            <span class="lang-fr">Destinataire</span>
                            <span class="lang-en" style="display:none;">Recipient</span>
                        </span>
                        <span class="valeur"><strong><?= htmlspecialchars($cadeau['email_dest']) ?></strong></span>
                    </div>
                    <?php if (!empty($cadeau['message_perso'])): ?>
                        <div class="ligne-recap">
                            <span class="label">
                                <span class="lang-fr">Message</span>
                                <span class="lang-en" style="display:none;">Message</span>
                            </span>
                            <span class="valeur" style="font-style: italic; color: #c0c0c0;">"<?= htmlspecialchars($cadeau['message_perso']) ?>"</span>
                        </div>
                    <?php endif; ?>
                </div>
                <hr class="separateur-recap">

            <?php else: ?>
                <!-- RÉCAPITULATIF PANIER -->
                <?php foreach ($panier as $index => $article): ?>
                    <?php
                    $total += $article['total_ligne'];
                    ?>
                    <div class="article-detail">
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-adv">Aventure</span>
                            <span class="valeur"><strong><?= $article['designation_fr'] ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-date">Date & Heure</span>
                            <span class="valeur"><strong><?= htmlspecialchars($article['date_choisie']) ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-city">Ville</span>
                            <span class="valeur"><strong><?= htmlspecialchars($article['ville']) ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-players">Joueurs</span>
                            <span class="valeur"><strong><?= htmlspecialchars($article['nb_joueurs']) ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-price">Prix unitaire</span>
                            <span class="valeur"><strong><?= number_format($article['prix_unitaire'], 2) ?> €</strong></span>
                        </div>
                    </div>
                    <hr class="separateur-recap">
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="total-recap">
                <span class="label-total i18n-pay-lbl-total">Total</span>
                <span class="prix-total"><?= number_format($total, 2) ?> €</span>
            </div>
        </div>

        <div class="box-formulaire">
            <h2 class="titre-formulaire">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--rouge)" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>
                <span class="i18n-pay-form-title">Informations de paiement</span>
            </h2>

            <form action="index.php?action=valider_paiement" method="POST" id="payment-form" class="form-paiement">

                <?php
                $F = new Formulaire([
                    'email_conf' => $_SESSION['user']['email'] ?? '',
                ]);
                echo $F->inputText("nom_carte", "<span class='i18n-pay-lbl-cardholder'>Titulaire de la carte</span> <span>*</span>", ['placeholder' => 'Nom complet', 'required' => true]);
                echo $F->inputEmail("email_conf", "<span class='i18n-pay-lbl-email'>Adresse email de confirmation</span> <span>*</span>", ['placeholder' => 'votre@email.com', 'required' => true]);
                ?>

                <!-- 
                    MODE TEST STRIPE — Numéros de carte fictifs à utiliser :
                     Visa (succès)       : 4242 4242 4242 4242
                     Mastercard (succès) : 5555 5555 5555 4444
                     Carte refusée       : 4000 0000 0000 0002
                     3D Secure           : 4000 0000 0000 3220
                    Date d'expiration      : n'importe quelle date future (ex: 12/28)
                    CVC                    : n'importe quels 3 chiffres (ex: 123)
                -->
                <div class="groupe-input">
                    <label for="card-element"><span class="i18n-pay-lbl-cardinfo">Informations de carte</span>
                        <span>*</span></label>
                    <div id="card-element">
                    </div>
                    <div id="card-errors" role="alert"></div>
                </div>

                <div class="info-securite">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#A0A0A0" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span class="i18n-pay-secure">Paiement sécurisé par Stripe — vos données sont chiffrées</span>
                </div>

                <button type="submit" class="btn-payer">
                    <span class="i18n-pay-btn-submit">Payer</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="./js/paiement.js"></script>