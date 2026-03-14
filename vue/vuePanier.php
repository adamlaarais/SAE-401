<?php
$titre = "Votre Panier - Kodex";
$css = '<link rel="stylesheet" href="./style/panier.css">';
?>

<div class="panier-wrapper">
    <h1 class="titre-page i18n-cart-title">Panier</h1>

    <?php if (empty($panier)): ?>
        <div class="panier-vide">
            <p class="i18n-cart-empty" style="color:var(--texte)">Votre panier est vide.</p>
            <a href="index.php?action=aventures" class="btn-decouvrir i18n-cart-btn-discover">Découvrir nos aventures</a>
        </div>
    <?php else: ?>
        <div class="panier-contenu">

            <div class="box-articles">
                <?php foreach ($panier as $index => $article): ?>
                    <div class="article-item">
                        <div class="article-image">
                            <img src="<?= $article['image'] ?>"
                                alt="<?= htmlspecialchars($article['designation_fr'] ?? 'Aventure') ?>">
                        </div>

                        <div class="article-infos">
                            <h2 class="nom-aventure">
                                <span class="lang-fr"><?= htmlspecialchars($article['designation_fr'] ?? 'Aventure') ?></span>
                                <span class="lang-en"
                                    style="display:none;"><?= htmlspecialchars($article['designation_en'] ?? $article['designation_fr'] ?? 'Adventure') ?></span>
                            </h2>

                            <p><span class="label i18n-pay-lbl-city">Ville :</span> <strong><?= $article['ville'] ?></strong>
                            </p>
                            <p><span class="label i18n-pay-lbl-date">Date & Heure :</span>
                                <strong><?= $article['date_choisie'] ?></strong>
                            </p>
                            <p><span class="label i18n-pay-lbl-players">Joueurs :</span>
                                <strong><?= $article['nb_joueurs'] ?></strong>
                            </p>

                            <p><span class="label i18n-cart-lbl-gameplay">Gameplay :</span>
                                <strong><?= htmlspecialchars($article['nom_gameplay']) ?></strong>
                            </p>

                            <?php if (!empty($article['objets'])): ?>
                                <p><span class="label i18n-pay-lbl-items">Objets :</span>
                                    <strong>
                                        <?php
                                        $listObjFr = [];
                                        $listObjEn = [];

                                        foreach ($article['objets'] as $o) {
                                            $nomFr = $o['nom_fr'] ?? 'Objet';
                                            $nomEn = $o['nom_en'] ?? $nomFr;
                                            $listObjFr[] = $o['quantite'] . 'x ' . $nomFr;
                                            $listObjEn[] = $o['quantite'] . 'x ' . $nomEn;
                                        }
                                        ?>
                                        <span class="lang-fr"><?= htmlspecialchars(implode(', ', $listObjFr)) ?></span>
                                        <span class="lang-en"
                                            style="display:none;"><?= htmlspecialchars(implode(', ', $listObjEn)) ?></span>
                                    </strong>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="article-actions">
                            <a href="index.php?action=supprimer_panier&id=<?= $index ?>" class="btn-supprimer"
                                title="Supprimer cet article">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--rouge)"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <?php if ($index < count($panier) - 1): ?>
                        <hr class="separateur-article">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="box-recapitulatif">
                <h2 class="i18n-pay-recap-title">Récapitulatif</h2>

                <div class="recap-liste">
                    <?php foreach ($panier as $article): ?>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-adv">Aventure</span>
                            <span class="valeur">
                                <strong>
                                    <span class="lang-fr"><?= $article['designation_fr'] ?></span>
                                    <span class="lang-en" style="display:none;"><?= $article['designation_en'] ?></span>
                                </strong>
                            </span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-date">Date & Heure</span>
                            <span class="valeur"><strong><?= $article['date_choisie'] ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-city">Ville</span>
                            <span class="valeur"><strong><?= $article['ville'] ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-pay-lbl-players">Joueurs</span>
                            <span class="valeur"><strong><?= $article['nb_joueurs'] ?></strong></span>
                        </div>
                        <div class="ligne-recap">
                            <span class="label i18n-cart-lbl-totalprice">Prix total</span>
                            <span class="valeur"><strong><?= number_format($article['total_ligne'], 2) ?> €</strong></span>
                        </div>
                        <hr class="separateur-mini">
                    <?php endforeach; ?>
                </div>

                <div class="total-recap">
                    <span class="label-total i18n-pay-lbl-total">Total</span>
                    <span class="prix-total"><?= number_format($total, 2) ?> €</span>
                </div>

                <?php if (isset($_SESSION['id_user'])): ?>
                    <a href="index.php?action=paiement" class="btn-proceder">
                        <span class="i18n-cart-btn-pay">Procéder Au Paiement</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="index.php?action=inscription&mode=connexion" class="btn-proceder i18n-cart-btn-loginpay">
                        Connectez-vous pour payer
                    </a>
                <?php endif; ?>
            </div>

        </div>
    <?php endif; ?>
</div>