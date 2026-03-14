<?php
$css = '<link rel="stylesheet" href="./style/aventure.css">';
?>

<div class="aventure-page">
    <a href="index.php?action=aventures" class="btn-retour">&#8592; <span class="i18n-back-catalog">Retour au
            catalogue</span></a>

    <section class="presentation-flex">
        <div class="image-aventure">
            <img src="<?= $aventure['Image'] ?>" alt="<?= htmlspecialchars($aventure['designation_fr']) ?>">
        </div>

        <div class="details-aventure">
            <h1 class="titre-aventure">
                <span class="lang-fr"><?= htmlspecialchars($aventure['designation_fr']) ?></span>
                <span class="lang-en" style="display:none;"><?= htmlspecialchars($aventure['designation_en']) ?></span>
            </h1>

            <div class="description">
                <p>
                    <span class="lang-fr"><?= nl2br(htmlspecialchars($aventure['description_fr'])) ?></span>
                    <span class="lang-en"
                        style="display:none;"><?= nl2br(htmlspecialchars($aventure['description_en'])) ?></span>
                </p>
            </div>

            <div class="badges-info">
                <span class="badge">
                    <?= htmlspecialchars($aventure['Durée']) ?>
                    <span class="i18n-hours-cap">Heures</span>
                </span>

                <span class="badge">
                    <span class="i18n-diff">Difficulté</span>: <?= htmlspecialchars($aventure['Difficulté']) ?>/5
                </span>

                <span class="badge">
                    <?= htmlspecialchars($aventure['Joueurs']) ?>
                    <span class="i18n-players">joueurs</span>
                </span>
            </div>

            <div class="achat-bloc">
                <span class="prix-detail"><?= $aventure['Prix'] ?>€ <small class="i18n-per-player">/
                        joueurs</small></span>
                <a href="index.php?action=reserver&idAventure=<?= $aventure['Code'] ?>"
                    class="btn-reserver-rouge i18n-btn-book">Réserver</a>
            </div>
        </div>
    </section>

    <section class="tutoriel">
        <h2 class="i18n-how-it-works">Comment ça <span>marche</span> ?</h2>
        <div class="etapes-grid">
            <div class="etape-carte">
                <div class="cercle-num">1</div>
                <h3 class="i18n-step1-h3">Briefing</h3>
                <p class="i18n-step1-p">Recevez votre mission et les instructions de départ.</p>
            </div>
            <div class="etape-carte">
                <div class="cercle-num">2</div>
                <h3 class="i18n-step2-h3">Exploration</h3>
                <p class="i18n-step2-p">Parcourez la ville à la recherche d'indices.</p>
            </div>
            <div class="etape-carte">
                <div class="cercle-num">3</div>
                <h3 class="i18n-step3-h3">Énigmes</h3>
                <p class="i18n-step3-p">Résolvez les puzzles pour avancer dans votre quête.</p>
            </div>
            <div class="etape-carte">
                <div class="cercle-num">4</div>
                <h3 class="i18n-step4-h3">Dénouement</h3>
                <p class="i18n-step4-p">Assemblez les découvertes pour accomplir la mission.</p>
            </div>
        </div>
    </section>

    <!-- SECTION AVIS BDD -->
    <section class="section-avis-local">
        <h2 class="i18n-header-h2">Avis des joueurs</h2>

        <?php if (isset($_GET['avis']) && $_GET['avis'] === 'ok'): ?>
            <p class="notif-avis-ok">&#10003; Votre avis a bien été enregistré, merci !</p>
        <?php endif; ?>
        <?php if (isset($_GET['erreur']) && $_GET['erreur'] === 'avis'): ?>
            <p class="notif-avis-erreur">Veuillez sélectionner une note et écrire un commentaire.</p>
        <?php endif; ?>

        <?php if (isset($_SESSION['user'])): ?>
            <?php $noteActuelle = isset($noteUtilisateur) ? (int) $noteUtilisateur['valeur_note'] : 0; ?>
            <div class="carte-formulaire-avis">
                <div class="formulaire-avis-entete">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                            stroke="var(--rouge)" stroke-width="1.5" />
                        <path d="M20 21C20 16.5817 16.4183 13 12 13C7.58172 13 4 16.5817 4 21" stroke="var(--rouge)"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <span><?= htmlspecialchars($_SESSION['user']['prenom']) ?>, <span class="<?= isset($noteUtilisateur) ? 'i18n-edit-review' : 'i18n-leave-review' ?>"><?= isset($noteUtilisateur) ? 'modifiez votre avis' : 'donnez votre avis' ?></span></span>
                </div>

                <form class="formulaire-avis" method="post" action="index.php?action=soumettre_avis">
                    <?php
                    $F = new Formulaire([
                        'commentaire' => isset($noteUtilisateur) ? $noteUtilisateur['commentaire'] : '',
                    ]);
                    echo $F->inputHidden("id_aventure", (int) $aventure['Code']);
                    echo $F->inputHidden("valeur_note", $noteActuelle, ['id' => 'valeur_note_input']);
                    ?>

                    <div class="champ-avis champ-etoiles">
                        <label class="i18n-your-rating">Votre note</label>
                        <div class="etoiles-wrapper">
                            <div class="etoiles-input" id="etoiles-input" role="group" aria-label="Note de 1 à 5">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <button type="button" class="etoile-btn <?= $i <= $noteActuelle ? 'active' : '' ?>"
                                        data-valeur="<?= $i ?>" aria-label="<?= $i ?> étoile<?= $i > 1 ? 's' : '' ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M11.523 1.332C11.56 1.235 11.625 1.151 11.71 1.091C11.796 1.032 11.898 1 12.002 1C12.106 1 12.207 1.032 12.293 1.091C12.378 1.151 12.444 1.235 12.48 1.332L15.07 8.675H22.385C22.49 8.675 22.591 8.708 22.677 8.768C22.762 8.827 22.827 8.912 22.863 9.01C22.9 9.108 22.905 9.214 22.879 9.315C22.852 9.416 22.796 9.507 22.717 9.575L16.605 14.642L19.163 22.327C19.197 22.43 19.197 22.541 19.164 22.644C19.131 22.747 19.066 22.837 18.978 22.901C18.891 22.965 18.785 22.999 18.677 22.999C18.568 22.999 18.463 22.965 18.375 22.901L12 18.224L5.622 22.9C5.534 22.963 5.429 22.997 5.321 22.997C5.213 22.997 5.108 22.963 5.021 22.899C4.933 22.835 4.869 22.745 4.836 22.642C4.803 22.539 4.803 22.429 4.837 22.326L7.396 14.641L1.283 9.574C1.204 9.506 1.148 9.415 1.121 9.314C1.095 9.213 1.101 9.107 1.137 9.009C1.173 8.911 1.238 8.826 1.324 8.767C1.409 8.707 1.511 8.674 1.615 8.674H8.931L11.523 1.332Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <span class="note-label" id="note-label"></span>
                    </div>

                    <?php
                    echo "<div class='champ-avis'>";
                    echo $F->textarea("commentaire", "<span class='i18n-your-comment'>Votre commentaire</span>", ['rows' => 4, 'maxlength' => 500, 'placeholder' => 'Décrivez votre expérience...', 'required' => true, 'id' => 'avis-commentaire']);
                    echo "</div>";
                    echo $F->submit("soumettre_avis", isset($noteUtilisateur) ? 'Modifier mon avis' : 'Publier mon avis', ['class' => isset($noteUtilisateur) ? 'btn-soumettre-avis i18n-btn-edit-review' : 'btn-soumettre-avis i18n-btn-submit-review']);
                    ?>
                </form>
            </div>
        <?php else: ?>
            <p class="message-connexion-avis">
                <a href="index.php?action=inscription&mode=connexion" class="i18n-login-to-review-link">Connectez-vous</a>
                <span class="i18n-login-to-review-text">pour laisser un avis.</span>
            </p>
        <?php endif; ?>

        <div class="avis-locaux">
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $unNote): ?>
                    <div class="carte-avis-local">
                        <div class="avis-local-entete">
                            <strong><?= htmlspecialchars($unNote['prenom']) ?></strong>
                            <div class="avis-local-etoiles">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="<?= $i <= $unNote['valeur_note'] ? '#FFEF5E' : 'none' ?>"
                                        stroke="<?= $i <= $unNote['valeur_note'] ? '#FFEF5E' : 'currentColor' ?>"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M11.523 1.332C11.56 1.235 11.625 1.151 11.71 1.091C11.796 1.032 11.898 1 12.002 1C12.106 1 12.207 1.032 12.293 1.091C12.378 1.151 12.444 1.235 12.48 1.332L15.07 8.675H22.385C22.49 8.675 22.591 8.708 22.677 8.768C22.762 8.827 22.827 8.912 22.863 9.01C22.9 9.108 22.905 9.214 22.879 9.315C22.852 9.416 22.796 9.507 22.717 9.575L16.605 14.642L19.163 22.327C19.197 22.43 19.197 22.541 19.164 22.644C19.131 22.747 19.066 22.837 18.978 22.901C18.891 22.965 18.785 22.999 18.677 22.999C18.568 22.999 18.463 22.965 18.375 22.901L12 18.224L5.622 22.9C5.534 22.963 5.429 22.997 5.321 22.997C5.213 22.997 5.108 22.963 5.021 22.899C4.933 22.835 4.869 22.745 4.836 22.642C4.803 22.539 4.803 22.429 4.837 22.326L7.396 14.641L1.283 9.574C1.204 9.506 1.148 9.415 1.121 9.314C1.095 9.213 1.101 9.107 1.137 9.009C1.173 8.911 1.238 8.826 1.324 8.767C1.409 8.707 1.511 8.674 1.615 8.674H8.931L11.523 1.332Z" />
                                    </svg>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p><?= htmlspecialchars($unNote['commentaire']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="aucun-avis-local">Aucun avis pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<script>
    (function () {
        var input = document.getElementById('valeur_note_input');
        if (!input) return;
        var noteSelectionnee = parseInt(input.value) || 0;
        var etoiles = document.querySelectorAll('.etoile-btn');
        var label = document.getElementById('note-label');
        var currentLang = localStorage.getItem('langue') || 'fr';
        var labelsFr = ['Sélectionnez une note', 'Décevant', 'Passable', 'Bien', 'Très bien', 'Excellent !'];
        var labelsEn = ['Select a rating', 'Disappointing', 'Fair', 'Good', 'Very good', 'Excellent!'];
        var labels = currentLang === 'en' ? labelsEn : labelsFr;

        function majEtoiles(valeur) {
            etoiles.forEach(function (btn) {
                btn.classList.toggle('active', parseInt(btn.dataset.valeur) <= valeur);
            });
            if (label) label.textContent = labels[valeur] || labels[0];
        }
        majEtoiles(noteSelectionnee);

        etoiles.forEach(function (btn) {
            btn.addEventListener('mouseenter', function () {
                majEtoiles(parseInt(btn.dataset.valeur));
            });
            btn.addEventListener('mouseleave', function () {
                majEtoiles(noteSelectionnee);
            });
            btn.addEventListener('click', function () {
                noteSelectionnee = parseInt(btn.dataset.valeur);
                input.value = noteSelectionnee;
                majEtoiles(noteSelectionnee);
            });
        });
    }());
</script>