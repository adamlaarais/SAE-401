<?php
$titre = "Réservation";
$css = '<link rel="stylesheet" href="./style/reservation.css">';

// récupération des dates déjà prises
$datesReservees = [];

if (!empty($reservations) && is_iterable($reservations)) {
    foreach ($reservations as $res) {
        if (!empty($res['date_choisie'])) {
            $datesReservees[] = $res['date_choisie'];
        }
    }
}
?>

<div class="reservation-container">
    <a href="index.php?action=detail&idAventure=<?= $aventure['Code'] ?>" class="btn-retour">
        &#8592; <span class="i18n-res-back">Retour à l'aventure</span>
    </a>

    <div class="aventure-info">
        <div class="aventure-title-wrapper">
            <?php if (!empty($aventure['Image'])): ?>
                <img src="<?= htmlspecialchars($aventure['Image']); ?>" alt="Image" class="aventure-image-thumb">
            <?php endif; ?>
            <div class="aventure-titles">
                <h3>
                    <span class="lang-fr"><?= htmlspecialchars($aventure['designation_fr']) ?></span>
                    <span class="lang-en"
                        style="display:none;"><?= htmlspecialchars($aventure['designation_en']) ?></span>
                </h3>
                <h4>
                    <?= $aventure['Durée'] ?> <span class="i18n-hours">heures</span> •
                    <?= $aventure['Joueurs'] ?> <span class="i18n-players">joueurs</span>
                </h4>
            </div>
        </div>

        <p>
            <span class="i18n-res-cat">Catégorie :</span>
            <span class="lang-fr"><?= htmlspecialchars($aventure['categorie_fr']) ?></span>
            <span class="lang-en" style="display:none;"><?= htmlspecialchars($aventure['categorie_en']) ?></span>
        </p>

        <div class="description-res">
            <span class="lang-fr"><?= nl2br(htmlspecialchars($aventure['description_fr'])) ?></span>
            <span class="lang-en"
                style="display:none;"><?= nl2br(htmlspecialchars($aventure['description_en'])) ?></span>
        </div>

        <div class="specs">
            <p><span class="i18n-res-note">Note</span><span class="note"><?= $aventure['Note']; ?></span></p>
            <p><span class="i18n-res-diff">Difficulté</span><span
                    class="difficulte"><?= $aventure['Difficulté']; ?></span></p>
            <p><span class="i18n-res-price">Prix</span><span class="prix"><?= $aventure['Prix']; ?>€</span></p>
        </div>
    </div>

    <div class="aventure-horaire">
        <p><b class="i18n-res-select-time">Sélectionnez un horaire</b></p>
        <div class="calendar-custom-container">
            <div class="calendar-header">
                <button type="button" class="btn-cal-prev">&lt;</button>
                <h3 class="calendar-month-year"></h3>
                <button type="button" class="btn-cal-next">&gt;</button>
            </div>
            <div class="calendar-weekdays">
                <span>Lun</span><span>Mar</span><span>Mer</span><span>Jeu</span><span>Ven</span><span>Sam</span><span>Dim</span>
            </div>
            <div id="calendar-days-container"></div>
        </div>

        <div class="horaires-container">
            <button type="button" class="btn-horaire">10:00</button>
            <button type="button" class="btn-horaire">14:00</button>
            <button type="button" class="btn-horaire">18:00</button>
            <button type="button" class="btn-horaire">21:00</button>
        </div>
    </div>

    <div class="aventure-joueurs">
        <p><b>
                <span class="icon-users">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1.2em" height="1.2em"
                        fill="white" style="vertical-align: middle; margin-right: 5px; margin-bottom: 2px;">
                        <path
                            d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                    </svg>
                </span>
                <span class="i18n-res-players-title">Joueurs</span>
            </b></p>

        <form action="index.php?action=ajouter_panier" method="post" class="form-reservation"
            data-prix="<?= floatval($aventure['Prix']); ?>" data-max-joueurs="<?= intval($aventure['Joueurs']); ?>">

            <div class="player-counter">
                <button type="button" class="btn-circle btn-minus">−</button>
                <div class="big-number-display">
                    <span class="display-nb-joueurs">01</span>
                    <span class="label-joueurs i18n-players">Joueurs</span>
                </div>
                <button type="button" class="btn-circle btn-plus">+</button>
            </div>

            <p class="section-title"><b class="i18n-res-loc-title">Lieu de l'aventure (Obligatoire)</b></p>
            <div class="custom-select-wrapper" id="lieu-dropdown">
                <div class="custom-select-trigger i18n-res-loc-opt" id="lieu-trigger">-- Choisissez une ville --</div>
                <div class="custom-select-options">
                    <?php foreach ($lieux as $l): ?>
                        <div class="custom-option" data-value="<?= $l['id_lieu'] ?>"
                            data-text="<?= htmlspecialchars($l['nom_ville']) ?>">
                            <?= htmlspecialchars($l['nom_ville']) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php $formRes = new Formulaire(); ?>
            <?= $formRes->inputHidden('id_lieu', '', ['id' => 'select-lieu', 'required' => true]) ?>
            <?= $formRes->inputHidden('nom_ville', '', ['id' => 'input-nom-ville']) ?>

            <p class="section-title"><b class="i18n-res-gp-title">Gameplay (Obligatoire)</b></p>
            <div class="custom-select-wrapper" id="gameplay-dropdown">
                <div class="custom-select-trigger i18n-res-gp-opt" id="gameplay-trigger">-- Choisissez un gameplay --
                </div>
                <div class="custom-select-options">
                    <?php foreach ($gameplays as $gp): ?>
                        <div class="custom-option" data-value="<?= $gp['id_gameplay'] ?>" data-prix="<?= $gp['prix'] ?>">
                            <span class="lang-fr"><?= htmlspecialchars($gp['nom']) ?></span>
                            (+<?= $gp['prix'] ?>€)
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?= $formRes->inputHidden('id_gameplay', '', ['id' => 'select-gameplay', 'required' => true]) ?>

            <p class="section-title"><b class="i18n-res-eq-title">Équipements (Optionnel)</b></p>
            <div class="equipments-container">
                <?php foreach ($objets as $obj): ?>
                    <div class="equipment-item">
                        <div class="equipment-img-wrapper">
                            <?php if (!empty($obj['img'])): ?>
                                <img src="./style/img/objets/<?= htmlspecialchars($obj['img']) ?>" alt="Item"
                                    class="equipment-img">
                            <?php endif; ?>
                        </div>

                        <div class="equipment-label">
                            <b>
                                <span class="lang-fr"><?= htmlspecialchars($obj['nom_fr'] ?? $obj['nom']) ?></span>
                                <span class="lang-en"
                                    style="display:none;"><?= htmlspecialchars($obj['nom_en'] ?? $obj['nom_fr'] ?? $obj['nom']) ?></span>
                            </b>
                            <span class="equip-price">(+<?= $obj['prix'] ?>€)</span><br>
                            <small>
                                <span
                                    class="lang-fr"><?= htmlspecialchars($obj['description_fr'] ?? $obj['description'] ?? '') ?></span>
                                <span class="lang-en"
                                    style="display:none;"><?= htmlspecialchars($obj['description_en'] ?? $obj['description_fr'] ?? '') ?></span>
                            </small>
                        </div>

                        <div class="equipement-qty-ctrl">
                            <div class="qty-display">0</div>
                            <div class="qty-btns">
                                <button type="button" class="btn-qty-plus" data-id="<?= $obj['id_objet'] ?>">+</button>
                                <button type="button" class="btn-qty-minus" data-id="<?= $obj['id_objet'] ?>">−</button>
                            </div>
                            <?= $formRes->inputHidden('objets[' . $obj['id_objet'] . ']', '0', ['class' => 'input-objet-qty inner-qty-input', 'data-prix' => $obj['prix']]) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <p class="section-title"><b class="i18n-res-total-title">Total</b></p>
            <div class="total-box">
                <div class="total-left">
                    <span class="calc-formula">1X<?= $aventure['Prix']; ?>€</span>
                    <span class="calc-label i18n-res-price-per-player">Prix par joueurs</span>
                </div>
                <div class="total-right">
                    <span class="calc-total-top"><?= $aventure['Prix']; ?>€</span>
                    <span class="calc-label"><?= $aventure['Prix']; ?>€</span>
                </div>
            </div>

            <p class="section-title"><b class="i18n-res-summary-title">Résumé</b></p>
            <div class="resume-section-wrapper">
                <div class="resume-text">
                    <p>
                        <span class="lang-fr"><?= htmlspecialchars($aventure['designation_fr']) ?></span>
                        <span class="lang-en"
                            style="display:none;"><?= htmlspecialchars($aventure['designation_en']) ?></span>
                        <b class="resume-heure"></b>
                        <span class="i18n-res-for">pour</span>
                        <b class="resume-joueurs">1 <span class="i18n-res-player-sing">joueur</span></b>
                    </p>
                    <div class="resume-info">
                        <p><span class="i18n-res-city-lbl">Ville:</span> <b class="resume-ville"><span
                                    class="i18n-res-undef">Non définie</span></b></p>
                        <p><span class="i18n-res-price-lbl">Prix:</span> <b
                                class="resume-prix"><?= $aventure['Prix']; ?>€</b></p>
                    </div>
                </div>
                <button type="submit" class="btn-reserver i18n-btn-book" disabled
                    style="opacity: 0.5; cursor: not-allowed;">Réserver</button>
            </div>

            <?= $formRes->inputHidden('nb_joueurs', '1', ['class' => 'input-nb-joueurs']) ?>
            <?= $formRes->inputHidden('id_aventure', $aventure['Code']) ?>
            <?= $formRes->inputHidden('date_choisie', '', ['class' => 'input-heure']) ?>
            <?= $formRes->inputHidden('designation_fr', htmlspecialchars($aventure['designation_fr'])) ?>
            <?= $formRes->inputHidden('designation_en', htmlspecialchars($aventure['designation_en'])) ?>
        </form>

        <script src="./js/reservation.js"></script>
    </div>
</div>