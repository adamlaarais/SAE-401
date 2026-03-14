<?php
$css = '<link rel="stylesheet" href="./style/aventures.css">';
$formTri = new Formulaire();
?>

<!-- Section de tri avec menus personnalisés -->
<div class="tri-wrapper">
    <div class="tri-icon-container">
        <svg class="tri-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
        </svg>
    </div>
    
    <div class="custom-select-container">
        <div class="custom-select" data-id="tri-critere">
            <div class="select-selected">Prix</div>
            <div class="select-items select-hide">
                <div class="same-as-selected" data-value="prix">Prix</div>
                <div data-value="difficulte">Difficulté</div>
                <div data-value="joueurs">Joueurs</div>
            </div>
        </div>
        <?= $formTri->inputHidden('tri-critere', 'prix', ['id' => 'tri-critere']) ?>
    </div>
    
    <div class="custom-select-container">
        <div class="custom-select" data-id="tri-ordre">
            <div class="select-selected">Croissant</div>
            <div class="select-items select-hide">
                <div class="same-as-selected" data-value="croissant">Croissant</div>
                <div data-value="decroissant">Décroissant</div>
            </div>
        </div>
        <?= $formTri->inputHidden('tri-ordre', 'croissant', ['id' => 'tri-ordre']) ?>
    </div>
</div>

<div class="resultat" id="grille-aventures">
  <?php foreach ($aventures as $aventure): ?>
    <div class="carte" data-prix="<?= $aventure['Prix'] ?>" data-difficulte="<?= $aventure['Difficulté'] ?>" data-joueurs="<?= htmlspecialchars($aventure['Joueurs']) ?>">
      <img src="<?=$aventure['Image'] ?>" class="carte-image">
      <a href="index.php?action=detail&idAventure=<?= $aventure['Code'] ?>" class="lien-details-carte"></a>

      <div class="carte-contenu">
        <h3 class="carte-titre">
          <span class="lang-fr"><?= htmlspecialchars($aventure['designation_fr']) ?></span>
          <span class="lang-en" style="display:none;"><?= htmlspecialchars($aventure['designation_en']) ?></span>
        </h3>

        <p class="carte-description">
          <span class="lang-fr"><?= htmlspecialchars($aventure['description_fr'] ?? '') ?></span>
          <span class="lang-en" style="display:none;"><?= htmlspecialchars($aventure['description_en'] ?? '') ?></span>
        </p>

        <p class="carte-details">
          <span class="i18n-difficulty-label">Difficulté:</span> <?= $aventure['Difficulté'] ?>/5 •
          <?= $aventure['Joueurs'] ?> <span class="i18n-players">joueurs</span>
        </p>

        <div class="carte-footer">
          <div class="prix-bloc">
            <span class="label i18n-from">À partir de</span>
            <span class="prix"><?= $aventure['Prix'] ?>€</span>
          </div>
          <a href="index.php?action=reserver&idAventure=<?= $aventure['Code'] ?>"
            class="btn-reserver i18n-btn-book">Réserver</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script src="./js/triAventures.js"></script>
