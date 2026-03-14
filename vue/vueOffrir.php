<?php
$titre = "Offrir";
$css = '<link href="./style/offrir.css" rel="stylesheet">';
?>

<div class="offrir-page">
    <section class="offrir-hero">
        <div class="offrir-hero-content">
            <h1 class="i18n-gift-hero-title">Offrez une <strong>Aventure</strong></h1>
            <p class="offrir-hero-subtitle i18n-gift-hero-sub">Un cadeau original qui marquera les esprits : offrez l'évasion urbaine <strong>Kodex</strong></p>
        </div>
    </section>

    <section class="offrir-section">
        <div class="offrir-container">
            <h2 class="offrir-title-center i18n-gift-how-title">Comment ça <strong>Marche</strong> ?</h2>
            <div class="offrir-etapes-grid">
                <div class="offrir-etape-card">
                    <div class="offrir-etape-numero">1</div>
                    <div class="offrir-etape-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-step1-title">Choisissez</h3>
                    <p class="i18n-gift-step1-desc">Sélectionnez l'aventure et la formule qui conviendra le mieux à la personne que vous souhaitez gâter.</p>
                </div>

                <div class="offrir-etape-card">
                    <div class="offrir-etape-numero">2</div>
                    <div class="offrir-etape-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M12 11V3"></path>
                            <path d="M3 11c0-3 2-6 4.5-7.5C9.5 2 12 3 12 3s2.5-1 4.5.5C19 5 21 8 21 11"></path>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-step2-title">Personnalisez</h3>
                    <p class="i18n-gift-step2-desc">Ajoutez un message personnalisé pour rendre votre cadeau encore plus mémorable et unique.</p>
                </div>

                <div class="offrir-etape-card">
                    <div class="offrir-etape-numero">3</div>
                    <div class="offrir-etape-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-step3-title">Envoyez</h3>
                    <p class="i18n-gift-step3-desc">Recevez instantanément votre carte cadeau par e-mail, prête à être offerte à l'heureux élu.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="offrir-section offrir-formules-section" id="offrir-flow">
        <div class="offrir-container">

            <div class="offrir-progress">
                <div class="offrir-progress-step actif" data-step="1">
                    <span class="offrir-progress-num">1</span>
                    <span class="offrir-progress-label"><span class="lang-fr">Formule</span><span class="lang-en" style="display:none;">Package</span></span>
                </div>
                <div class="offrir-progress-bar">
                    <div class="offrir-progress-fill" id="progress-fill"></div>
                </div>
                <div class="offrir-progress-step" data-step="2">
                    <span class="offrir-progress-num">2</span>
                    <span class="offrir-progress-label"><span class="lang-fr">Aventure</span><span class="lang-en" style="display:none;">Adventure</span></span>
                </div>
                <div class="offrir-progress-bar">
                    <div class="offrir-progress-fill"></div>
                </div>
                <div class="offrir-progress-step" data-step="3">
                    <span class="offrir-progress-num">3</span>
                    <span class="offrir-progress-label"><span class="lang-fr">Personnalisation</span><span class="lang-en" style="display:none;">Customization</span></span>
                </div>
                <div class="offrir-progress-bar">
                    <div class="offrir-progress-fill"></div>
                </div>
                <div class="offrir-progress-step" data-step="4">
                    <span class="offrir-progress-num">4</span>
                    <span class="offrir-progress-label"><span class="lang-fr">Récapitulatif</span><span class="lang-en" style="display:none;">Summary</span></span>
                </div>
            </div>

            <div class="offrir-etape-contenu actif" id="etape-1">
                <h2 class="offrir-title-center i18n-gift-pack-title">Nos <strong>Formules</strong></h2>
                <p class="offrir-formules-intro i18n-gift-pack-intro">Sélectionnez la formule idéale pour offrir une expérience inoubliable</p>

                <div class="offrir-formules-grid">
                    <?php
                    // Nombre d'aventures par défaut si la colonne nb_aventures n'existe pas encore en BDD
                    $defaultNbAventures = [1, 2, 4];
                    foreach ($offres as $i => $offre):
                        // Sécurisation des données Bilingues
                        $nomFr = !empty($offre['nom_offre_fr']) ? $offre['nom_offre_fr'] : ($offre['nom_offre'] ?? 'Formule');
                        $nomEn = !empty($offre['nom_offre_en']) ? $offre['nom_offre_en'] : $nomFr;

                        $descFr = !empty($offre['description_fr']) ? $offre['description_fr'] : ($offre['description'] ?? '');
                        $descEn = !empty($offre['description_en']) ? $offre['description_en'] : $descFr;

                        // Nombre d'aventures autorisé par pack (BDD ou fallback)
                        $nbAventures = !empty($offre['nb_aventures']) ? (int)$offre['nb_aventures'] : ($defaultNbAventures[$i] ?? 1);
                    ?>
                        <div class="offrir-formule-card <?= $i === 1 ? 'offrir-formule-populaire' : '' ?>"
                            data-id="<?= $offre['id_offre'] ?>"
                            data-nom="<?= htmlspecialchars($nomFr) ?>"
                            data-prix="<?= $offre['prix'] ?>"
                            data-validite="<?= $offre['validite_mois'] ?>"
                            data-nb-aventures="<?= $nbAventures ?>">
                            <?php if ($i === 1): ?>
                                <div class="offrir-formule-badge i18n-gift-badge">Populaire</div>
                            <?php endif; ?>
                            <div class="offrir-formule-header">
                                <h3>
                                    <span class="lang-fr"><?= htmlspecialchars($nomFr) ?></span>
                                    <span class="lang-en" style="display:none;"><?= htmlspecialchars($nomEn) ?></span>
                                </h3>
                                <div class="offrir-formule-prix">
                                    <span class="offrir-prix-valeur"><?= (int)$offre['prix'] ?>€</span>
                                    <span class="offrir-prix-detail i18n-gift-pack-per">/ personne</span>
                                </div>
                            </div>
                            <p class="offrir-formule-desc">
                                <span class="lang-fr"><?= htmlspecialchars($descFr) ?></span>
                                <span class="lang-en" style="display:none;"><?= htmlspecialchars($descEn) ?></span>
                            </p>
                            <div class="offrir-formule-validite">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="lang-fr">Validité <?= $offre['validite_mois'] ?> mois</span>
                                <span class="lang-en" style="display:none;">Validity <?= $offre['validite_mois'] ?> months</span>
                            </div>
                            <button type="button" class="offrir-formule-btn i18n-gift-pack-btn <?= $i === 1 ? 'offrir-btn-populaire' : '' ?>">Choisir cette formule</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="offrir-etape-contenu" id="etape-2">
                <h2 class="offrir-title-center"><span class="lang-fr">Choisissez <span id="label-nb-aventures">l'</span><strong>Aventure</strong></span><span class="lang-en" style="display:none;">Choose the <strong>Adventure<span id="label-nb-aventures-en"></span></strong></span></h2>
                <p class="offrir-formules-intro">
                    <span class="lang-fr" id="sous-titre-aventures">Quelle aventure souhaitez-vous offrir ?</span>
                    <span class="lang-en" style="display:none;" id="sous-titre-aventures-en">Which adventure would you like to gift?</span>
                </p>
                <div class="offrir-selection-compteur" id="compteur-aventures">
                    <span class="lang-fr"><span id="nb-selected">0</span> / <span id="nb-max">1</span> aventure(s) sélectionnée(s)</span>
                    <span class="lang-en" style="display:none;"><span id="nb-selected-en">0</span> / <span id="nb-max-en">1</span> adventure(s) selected</span>
                </div>

                <div class="offrir-aventures-grid">
                    <?php foreach ($aventures as $av):
                        // Sécurisation Bilingue des Aventures
                        $desFr = !empty($av['designation_fr']) ? $av['designation_fr'] : ($av['Designation'] ?? 'Aventure');
                        $desEn = !empty($av['designation_en']) ? $av['designation_en'] : $desFr;
                    ?>
                        <div class="offrir-aventure-card"
                            data-id="<?= $av['Code'] ?>"
                            data-nom="<?= htmlspecialchars($desFr) ?>"
                            data-image="<?= htmlspecialchars($av['Image'] ?? '') ?>">
                            <div class="offrir-aventure-img">
                                <img src="<?= htmlspecialchars($av['Image'] ?? '') ?>" alt="<?= htmlspecialchars($desFr) ?>">
                            </div>
                            <div class="offrir-aventure-info">
                                <h3>
                                    <span class="lang-fr"><?= htmlspecialchars($desFr) ?></span>
                                    <span class="lang-en" style="display:none;"><?= htmlspecialchars($desEn) ?></span>
                                </h3>
                                <div class="offrir-aventure-meta">
                                    <span><?= htmlspecialchars($av['Ville'] ?? '') ?></span>
                                    <span><?= htmlspecialchars($av['Durée'] ?? '') ?> <span class="i18n-hours">heures</span></span>
                                    <span><?= htmlspecialchars($av['Joueurs'] ?? '') ?> <span class="i18n-players">joueurs</span></span>
                                </div>
                            </div>
                            <div class="offrir-aventure-check">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="offrir-nav-btns">
                    <button type="button" class="offrir-btn-retour" data-target="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        <span class="lang-fr">Retour</span><span class="lang-en" style="display:none;">Back</span>
                    </button>
                    <button type="button" class="offrir-btn-suivant" id="btn-etape2" disabled>
                        <span class="lang-fr">Continuer</span><span class="lang-en" style="display:none;">Continue</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="offrir-etape-contenu" id="etape-3">
                <h2 class="offrir-title-center"><span class="lang-fr">Personnalisez votre <strong>Cadeau</strong></span><span class="lang-en" style="display:none;">Customize your <strong>Gift</strong></span></h2>
                <p class="offrir-formules-intro"><span class="lang-fr">Ajoutez une touche personnelle à votre carte cadeau</span><span class="lang-en" style="display:none;">Add a personal touch to your gift card</span></p>

                <div class="offrir-perso-card">
                    <?php $formOffrir = new Formulaire(); ?>
                    <div class="offrir-perso-groupe">
                        <label for="email_dest">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class="lang-fr">Adresse e-mail du destinataire</span><span class="lang-en" style="display:none;">Recipient email address</span> <span>*</span>
                        </label>
                        <?= $formOffrir->inputEmail('email_dest', '', ['id' => 'email_dest', 'placeholder' => 'destinataire@email.com', 'required' => true]) ?>
                    </div>

                    <div class="offrir-perso-groupe">
                        <label for="message_perso">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span class="lang-fr">Message personnalisé</span><span class="lang-en" style="display:none;">Personalized message</span> <span>*</span>
                        </label>
                        <?= $formOffrir->textarea('message_perso', '', ['id' => 'message_perso', 'rows' => 5, 'placeholder' => 'Écrivez votre message ici...', 'required' => true]) ?>
                        <div class="offrir-char-count"><span id="char-count">0</span> / 500</div>
                    </div>
                </div>

                <div class="offrir-nav-btns">
                    <button type="button" class="offrir-btn-retour" data-target="2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        <span class="lang-fr">Retour</span><span class="lang-en" style="display:none;">Back</span>
                    </button>
                    <button type="button" class="offrir-btn-suivant" id="btn-etape3" disabled>
                        <span class="lang-fr">Voir le récapitulatif</span><span class="lang-en" style="display:none;">View summary</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="offrir-etape-contenu" id="etape-4">
                <h2 class="offrir-title-center"><span class="lang-fr">Récapitulatif de votre <strong>Cadeau</strong></span><span class="lang-en" style="display:none;">Summary of your <strong>Gift</strong></span></h2>

                <div class="offrir-recap-card">
                    <div class="offrir-recap-ligne">
                        <span class="offrir-recap-label"><span class="lang-fr">Formule</span><span class="lang-en" style="display:none;">Package</span></span>
                        <span class="offrir-recap-valeur" id="recap-formule">—</span>
                    </div>
                    <div class="offrir-recap-ligne">
                        <span class="offrir-recap-label"><span class="lang-fr">Prix</span><span class="lang-en" style="display:none;">Price</span></span>
                        <span class="offrir-recap-valeur offrir-recap-prix" id="recap-prix">—</span>
                    </div>
                    <div class="offrir-recap-ligne">
                        <span class="offrir-recap-label"><span class="lang-fr">Aventure(s) offerte(s)</span><span class="lang-en" style="display:none;">Gifted adventure(s)</span></span>
                        <span class="offrir-recap-valeur" id="recap-aventure">—</span>
                    </div>
                    <div class="offrir-recap-ligne">
                        <span class="offrir-recap-label"><span class="lang-fr">Destinataire</span><span class="lang-en" style="display:none;">Recipient</span></span>
                        <span class="offrir-recap-valeur" id="recap-email">—</span>
                    </div>
                    <div class="offrir-recap-ligne offrir-recap-message-bloc">
                        <span class="offrir-recap-label"><span class="lang-fr">Message</span><span class="lang-en" style="display:none;">Message</span></span>
                        <p class="offrir-recap-message" id="recap-message">—</p>
                    </div>
                </div>

                <form action="index.php?action=valider_cadeau" method="POST" id="form-cadeau">
                    <?php $formCadeau = new Formulaire(); ?>
                    <?= $formCadeau->inputHidden('id_offre', '', ['id' => 'input-id-offre']) ?>
                    <div id="hidden-aventures-container">
                        <!-- Les hidden id_aventure[] seront injectés dynamiquement par JS -->
                    </div>
                    <?= $formCadeau->inputHidden('email_dest', '', ['id' => 'input-email-dest']) ?>
                    <?= $formCadeau->inputHidden('message_perso', '', ['id' => 'input-message-perso']) ?>

                    <div class="offrir-nav-btns">
                        <button type="button" class="offrir-btn-retour" data-target="3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            <span class="lang-fr">Modifier</span><span class="lang-en" style="display:none;">Edit</span>
                        </button>
                        <?php if (isset($_SESSION['user'])): ?>
                            <button type="submit" class="offrir-btn-payer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                <span class="lang-fr">Confirmer et payer</span><span class="lang-en" style="display:none;">Confirm and pay</span>
                            </button>
                        <?php else: ?>
                            <a href="index.php?action=inscription&mode=connexion" class="offrir-btn-payer">
                                <span class="lang-fr">Connectez-vous pour continuer</span><span class="lang-en" style="display:none;">Log in to continue</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <section class="offrir-section">
        <div class="offrir-container">
            <h2 class="offrir-title-center i18n-gift-why-title">Pourquoi Offrir <strong>Kodex</strong> ?</h2>
            <div class="offrir-raisons-grid">
                <div class="offrir-raison-card">
                    <div class="offrir-raison-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-why1-title">Original</h3>
                    <p class="i18n-gift-why1-desc">Un cadeau qui sort de l'ordinaire et crée des souvenirs mémorables pour vos proches.</p>
                </div>

                <div class="offrir-raison-card">
                    <div class="offrir-raison-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-why2-title">Convivial</h3>
                    <p class="i18n-gift-why2-desc">Une activité partagée qui renforce les liens entre amis, en famille ou entre collègues.</p>
                </div>

                <div class="offrir-raison-card">
                    <div class="offrir-raison-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <h3 class="i18n-gift-why3-title">Flexible</h3>
                    <p class="i18n-gift-why3-desc">Le bénéficiaire choisit sa date librement pendant toute la durée de validité de la carte.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="offrir-cta">
        <div class="offrir-cta-content">
            <h2 class="i18n-gift-cta-title">Faites Plaisir <strong>Maintenant</strong></h2>
            <p class="i18n-gift-cta-desc">Offrez un moment d'aventure unique à ceux que vous aimez</p>
            <div class="offrir-cta-buttons">
                <a href="index.php?action=aventures" class="offrir-cta-btn primary i18n-gift-cta-btn1">Voir les aventures</a>
                <a href="index.php?action=contact" class="offrir-cta-btn secondary i18n-gift-cta-btn2">Des questions ?</a>
            </div>
        </div>
    </section>
</div>

<script src="js/offrir.js"></script>