<?php
$css = '<link rel="stylesheet" href="./style/accueil.css">';
?>

<div class="contenu">
    <section class="section-accueil">
        <canvas class="section-accueil_particules"></canvas>
        <h1 class="i18n-hero-h1">La ville est votre terrain de jeu, <strong>Kodex</strong> est votre mission.</h1>
        <p class="i18n-hero-p">Résolvez des énigmes, découvrez des secrets cachés et vivez une expérience unique dans
            les rues de votre
            ville.</p>
        <div class="bouton-accueil">
            <a href="index.php?action=aventures" id="decouvrir" class="i18n-btn-discover">Découvrir</a>
            <a href="index.php?action=contact" id="nous-contacter" class="i18n-btn-contact">Nous contacter</a>
        </div>
    </section>

    <section class="section-accueil-contenu">
        <h1 class="i18n-pop-h1">Nos Aventures <strong>Populaires</strong></h1>
        <div class="flex-aventures-populaires">
            <div class="aventures-populaires">
                <?php
                // utilisation de htmlspecialchars() sur toutes les donnees issues de la bdd pour echapper les caracteres speciaux html et se proteger des failles xss (cross-site scripting) qui permettraient d'injecter du code malveillant
                if (!empty($aventures)): ?>
                    <?php foreach (array_slice($aventures, 0, 2) as $a): ?>
                        <div class="container-aventures-populaires">
                            <img src="<?= $a['Image'] ?>" alt="<?= htmlspecialchars($a['designation_fr']) ?>">
                            <div class="enfant-aventures-populaires">
                                <div class="titre-aventure">
                                    <span class="lang-fr"><?= htmlspecialchars($a['designation_fr']) ?></span>
                                    <span class="lang-en"
                                        style="display:none;"><?= htmlspecialchars($a['designation_en']) ?></span>
                                </div>
                                <p class="description-aventure">
                                    <span class="lang-fr"><?= htmlspecialchars($a['description_fr'] ?? '') ?></span>
                                    <span class="lang-en"
                                        style="display:none;"><?= htmlspecialchars($a['description_en'] ?? '') ?></span>
                                </p>
                                <div class="info-aventure">
                                    <?= $a['Durée'] ?> <span class="i18n-hours">heures</span> - <span
                                        class="i18n-diff">Difficulté</span>: <?= $a['Difficulté'] ?>
                                </div>
                                <div class="container-prix-aventure">
                                    <div class="i18n-from">A partir de</div>
                                    <div class="prix-aventure"><?= $a['Prix'] ?>€</div>
                                </div>
                                <a href="index.php?action=reserver&idAventure=<?= $a['Code'] ?>" class="bouton-reservation-a">
                                    <div class="bouton-reservation i18n-btn-book">Réserver</div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="section-accueil-contenu-2">
        <h1 class="i18n-more-h1">Plus <strong>d'Aventures</strong></h1>
        <div class="nav-fleches">
            <button class="fleche" id="btn-gauche">
                <svg width="34" height="24" viewBox="0 0 34 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 12H2M32 12L22 2M32 12L22 22" stroke="#BD2734" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <span id="compteur-aventures" class="compteur-aventures"></span>
            <button class="fleche" id="btn-droite">
                <svg width="34" height="24" viewBox="0 0 34 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32 12H2M32 12L22 2M32 12L22 22" stroke="#BD2734" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="flex-container-aventures">
            <div class="container-plus-aventures">
                <?php
                $start = 2;
                $max = 5;
                if (!empty($aventures)):
                    $plus = array_slice($aventures, $start, $max);
                    foreach ($plus as $a):
                        ?>
                        <div class="enfant-container-plus-aventures">
                            <img src="<?= $a['Image'] ?>" alt="<?= htmlspecialchars($a['designation_fr']) ?>">
                            <div class="container-enfant-plus-aventures">
                                <div class="titre-aventure">
                                    <span class="lang-fr"><?= htmlspecialchars($a['designation_fr']) ?></span>
                                    <span class="lang-en"
                                        style="display:none;"><?= htmlspecialchars($a['designation_en']) ?></span>
                                </div>
                                <a href="index.php?action=reserver&idAventure=<?= $a['Code'] ?>"
                                    class="bouton-reservation-a plus">
                                    <div class="bouton-reservation i18n-btn-discover">Découvrir</div>
                                </a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="barre-progression-fond">
            <div class="barre-progression-remplissage" id="barre-remplissage"></div>
        </div>
        <div class="container-voir-plus">
            <a href="index.php?action=aventures" class="bouton-reservation-a i18n-see-all">Voir toutes les aventures</a>
        </div>
    </section>


    <section class="section-accueil-questions">
        <h1 class="i18n-faq-h1">Questions <strong>Fréquentes</strong></h1>
        <div class="flex-container-questions">
            <div class="enfant-questions">
                <div class="question">
                    <div class="question-entete">
                        <div class="enfant-svg-question">
                            <div class="elipse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                    fill="none">
                                    <path
                                        d="M2.66667 28C1.93333 28 1.30578 27.7391 0.784 27.2173C0.262222 26.6956 0.000888889 26.0676 0 25.3333V12C0 11.2667 0.261333 10.6391 0.784 10.1173C1.30667 9.59556 1.93422 9.33422 2.66667 9.33333H4V6.66667C4 4.82222 4.65022 3.25022 5.95067 1.95067C7.25111 0.651112 8.82311 0.000889799 10.6667 9.10125e-07C12.5102 -0.000887979 14.0827 0.649334 15.384 1.95067C16.6853 3.252 17.3351 4.824 17.3333 6.66667V9.33333H18.6667C19.4 9.33333 20.028 9.59467 20.5507 10.1173C21.0733 10.64 21.3342 11.2676 21.3333 12V25.3333C21.3333 26.0667 21.0724 26.6947 20.5507 27.2173C20.0289 27.74 19.4009 28.0009 18.6667 28H2.66667ZM12.5507 20.5507C13.0724 20.028 13.3333 19.4 13.3333 18.6667C13.3333 17.9333 13.0724 17.3058 12.5507 16.784C12.0289 16.2622 11.4009 16.0009 10.6667 16C9.93244 15.9991 9.30489 16.2604 8.784 16.784C8.26311 17.3076 8.00178 17.9351 8 18.6667C7.99822 19.3982 8.25956 20.0262 8.784 20.5507C9.30844 21.0751 9.936 21.336 10.6667 21.3333C11.3973 21.3307 12.0253 21.0698 12.5507 20.5507ZM6.66667 9.33333H14.6667V6.66667C14.6667 5.55556 14.2778 4.61111 13.5 3.83333C12.7222 3.05556 11.7778 2.66667 10.6667 2.66667C9.55556 2.66667 8.61111 3.05556 7.83333 3.83333C7.05556 4.61111 6.66667 5.55556 6.66667 6.66667V9.33333Z"
                                        fill="#BD2734" />
                                </svg>
                            </div>
                            <span class="i18n-faq-q1">Comment fonctionnent les aventures ?</span>
                        </div>
                        <svg class="question-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="13"
                            viewBox="0 0 20 13" fill="none">
                            <path d="M10 12.3333L0 2.33333L2.33333 0L10 7.66667L17.6667 0L20 2.33333L10 12.3333Z"
                                fill="#F7F8F9" />
                        </svg>
                    </div>
                    <div class="question-reponse">
                        <p class="i18n-faq-a1">Chaque aventure est une mission à résoudre en plein air dans votre ville.
                            Vous recevez un point de départ, des énigmes et un objectif à accomplir à votre rythme, sans
                            animateur sur place.</p>
                    </div>
                </div>

                <div class="question">
                    <div class="question-entete">
                        <div class="enfant-svg-question">
                            <div class="elipse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                    fill="none">
                                    <path
                                        d="M2.66667 28C1.93333 28 1.30578 27.7391 0.784 27.2173C0.262222 26.6956 0.000888889 26.0676 0 25.3333V12C0 11.2667 0.261333 10.6391 0.784 10.1173C1.30667 9.59556 1.93422 9.33422 2.66667 9.33333H4V6.66667C4 4.82222 4.65022 3.25022 5.95067 1.95067C7.25111 0.651112 8.82311 0.000889799 10.6667 9.10125e-07C12.5102 -0.000887979 14.0827 0.649334 15.384 1.95067C16.6853 3.252 17.3351 4.824 17.3333 6.66667V9.33333H18.6667C19.4 9.33333 20.028 9.59467 20.5507 10.1173C21.0733 10.64 21.3342 11.2676 21.3333 12V25.3333C21.3333 26.0667 21.0724 26.6947 20.5507 27.2173C20.0289 27.74 19.4009 28.0009 18.6667 28H2.66667ZM12.5507 20.5507C13.0724 20.028 13.3333 19.4 13.3333 18.6667C13.3333 17.9333 13.0724 17.3058 12.5507 16.784C12.0289 16.2622 11.4009 16.0009 10.6667 16C9.93244 15.9991 9.30489 16.2604 8.784 16.784C8.26311 17.3076 8.00178 17.9351 8 18.6667C7.99822 19.3982 8.25956 20.0262 8.784 20.5507C9.30844 21.0751 9.936 21.336 10.6667 21.3333C11.3973 21.3307 12.0253 21.0698 12.5507 20.5507ZM6.66667 9.33333H14.6667V6.66667C14.6667 5.55556 14.2778 4.61111 13.5 3.83333C12.7222 3.05556 11.7778 2.66667 10.6667 2.66667C9.55556 2.66667 8.61111 3.05556 7.83333 3.83333C7.05556 4.61111 6.66667 5.55556 6.66667 6.66667V9.33333Z"
                                        fill="#BD2734" />
                                </svg>
                            </div>
                            <span class="i18n-faq-q2">Combien de joueurs peut-on être ?</span>
                        </div>
                        <svg class="question-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="13"
                            viewBox="0 0 20 13" fill="none">
                            <path d="M10 12.3333L0 2.33333L2.33333 0L10 7.66667L17.6667 0L20 2.33333L10 12.3333Z"
                                fill="#F7F8F9" />
                        </svg>
                    </div>
                    <div class="question-reponse">
                        <p class="i18n-faq-a2">Nos aventures sont conçues pour des groupes de 2 à 10 joueurs selon
                            l'aventure choisie. Idéal pour une sortie entre amis, en famille ou un team building
                            original.</p>
                    </div>
                </div>

                <div class="question">
                    <div class="question-entete">
                        <div class="enfant-svg-question">
                            <div class="elipse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                    fill="none">
                                    <path
                                        d="M2.66667 28C1.93333 28 1.30578 27.7391 0.784 27.2173C0.262222 26.6956 0.000888889 26.0676 0 25.3333V12C0 11.2667 0.261333 10.6391 0.784 10.1173C1.30667 9.59556 1.93422 9.33422 2.66667 9.33333H4V6.66667C4 4.82222 4.65022 3.25022 5.95067 1.95067C7.25111 0.651112 8.82311 0.000889799 10.6667 9.10125e-07C12.5102 -0.000887979 14.0827 0.649334 15.384 1.95067C16.6853 3.252 17.3351 4.824 17.3333 6.66667V9.33333H18.6667C19.4 9.33333 20.028 9.59467 20.5507 10.1173C21.0733 10.64 21.3342 11.2676 21.3333 12V25.3333C21.3333 26.0667 21.0724 26.6947 20.5507 27.2173C20.0289 27.74 19.4009 28.0009 18.6667 28H2.66667ZM12.5507 20.5507C13.0724 20.028 13.3333 19.4 13.3333 18.6667C13.3333 17.9333 13.0724 17.3058 12.5507 16.784C12.0289 16.2622 11.4009 16.0009 10.6667 16C9.93244 15.9991 9.30489 16.2604 8.784 16.784C8.26311 17.3076 8.00178 17.9351 8 18.6667C7.99822 19.3982 8.25956 20.0262 8.784 20.5507C9.30844 21.0751 9.936 21.336 10.6667 21.3333C11.3973 21.3307 12.0253 21.0698 12.5507 20.5507ZM6.66667 9.33333H14.6667V6.66667C14.6667 5.55556 14.2778 4.61111 13.5 3.83333C12.7222 3.05556 11.7778 2.66667 10.6667 2.66667C9.55556 2.66667 8.61111 3.05556 7.83333 3.83333C7.05556 4.61111 6.66667 5.55556 6.66667 6.66667V9.33333Z"
                                        fill="#BD2734" />
                                </svg>
                            </div>
                            <span class="i18n-faq-q3">Comment réserver une aventure ?</span>
                        </div>
                        <svg class="question-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="13"
                            viewBox="0 0 20 13" fill="none">
                            <path d="M10 12.3333L0 2.33333L2.33333 0L10 7.66667L17.6667 0L20 2.33333L10 12.3333Z"
                                fill="#F7F8F9" />
                        </svg>
                    </div>
                    <div class="question-reponse">
                        <p class="i18n-faq-a3">Rendez-vous sur la page de l'aventure souhaitée et cliquez sur
                            "Réserver". Choisissez votre date, le nombre de joueurs et validez votre réservation en
                            quelques clics.</p>
                    </div>
                </div>

                <div class="question">
                    <div class="question-entete">
                        <div class="enfant-svg-question">
                            <div class="elipse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                    fill="none">
                                    <path
                                        d="M2.66667 28C1.93333 28 1.30578 27.7391 0.784 27.2173C0.262222 26.6956 0.000888889 26.0676 0 25.3333V12C0 11.2667 0.261333 10.6391 0.784 10.1173C1.30667 9.59556 1.93422 9.33422 2.66667 9.33333H4V6.66667C4 4.82222 4.65022 3.25022 5.95067 1.95067C7.25111 0.651112 8.82311 0.000889799 10.6667 9.10125e-07C12.5102 -0.000887979 14.0827 0.649334 15.384 1.95067C16.6853 3.252 17.3351 4.824 17.3333 6.66667V9.33333H18.6667C19.4 9.33333 20.028 9.59467 20.5507 10.1173C21.0733 10.64 21.3342 11.2676 21.3333 12V25.3333C21.3333 26.0667 21.0724 26.6947 20.5507 27.2173C20.0289 27.74 19.4009 28.0009 18.6667 28H2.66667ZM12.5507 20.5507C13.0724 20.028 13.3333 19.4 13.3333 18.6667C13.3333 17.9333 13.0724 17.3058 12.5507 16.784C12.0289 16.2622 11.4009 16.0009 10.6667 16C9.93244 15.9991 9.30489 16.2604 8.784 16.784C8.26311 17.3076 8.00178 17.9351 8 18.6667C7.99822 19.3982 8.25956 20.0262 8.784 20.5507C9.30844 21.0751 9.936 21.336 10.6667 21.3333C11.3973 21.3307 12.0253 21.0698 12.5507 20.5507ZM6.66667 9.33333H14.6667V6.66667C14.6667 5.55556 14.2778 4.61111 13.5 3.83333C12.7222 3.05556 11.7778 2.66667 10.6667 2.66667C9.55556 2.66667 8.61111 3.05556 7.83333 3.83333C7.05556 4.61111 6.66667 5.55556 6.66667 6.66667V9.33333Z"
                                        fill="#BD2734" />
                                </svg>
                            </div>
                            <span class="i18n-faq-q4">Faut-il un équipement particulier ?</span>
                        </div>
                        <svg class="question-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="13"
                            viewBox="0 0 20 13" fill="none">
                            <path d="M10 12.3333L0 2.33333L2.33333 0L10 7.66667L17.6667 0L20 2.33333L10 12.3333Z"
                                fill="#F7F8F9" />
                        </svg>
                    </div>
                    <div class="question-reponse">
                        <p class="i18n-faq-a4">Aucun équipement spécial n'est nécessaire. Un smartphone chargé et de
                            bonnes chaussures suffisent. Tout le contenu de l'aventure est accessible depuis votre
                            navigateur.</p>
                    </div>
                </div>

                <div class="question">
                    <div class="question-entete">
                        <div class="enfant-svg-question">
                            <div class="elipse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 28"
                                    fill="none">
                                    <path
                                        d="M2.66667 28C1.93333 28 1.30578 27.7391 0.784 27.2173C0.262222 26.6956 0.000888889 26.0676 0 25.3333V12C0 11.2667 0.261333 10.6391 0.784 10.1173C1.30667 9.59556 1.93422 9.33422 2.66667 9.33333H4V6.66667C4 4.82222 4.65022 3.25022 5.95067 1.95067C7.25111 0.651112 8.82311 0.000889799 10.6667 9.10125e-07C12.5102 -0.000887979 14.0827 0.649334 15.384 1.95067C16.6853 3.252 17.3351 4.824 17.3333 6.66667V9.33333H18.6667C19.4 9.33333 20.028 9.59467 20.5507 10.1173C21.0733 10.64 21.3342 11.2676 21.3333 12V25.3333C21.3333 26.0667 21.0724 26.6947 20.5507 27.2173C20.0289 27.74 19.4009 28.0009 18.6667 28H2.66667ZM12.5507 20.5507C13.0724 20.028 13.3333 19.4 13.3333 18.6667C13.3333 17.9333 13.0724 17.3058 12.5507 16.784C12.0289 16.2622 11.4009 16.0009 10.6667 16C9.93244 15.9991 9.30489 16.2604 8.784 16.784C8.26311 17.3076 8.00178 17.9351 8 18.6667C7.99822 19.3982 8.25956 20.0262 8.784 20.5507C9.30844 21.0751 9.936 21.336 10.6667 21.3333C11.3973 21.3307 12.0253 21.0698 12.5507 20.5507ZM6.66667 9.33333H14.6667V6.66667C14.6667 5.55556 14.2778 4.61111 13.5 3.83333C12.7222 3.05556 11.7778 2.66667 10.6667 2.66667C9.55556 2.66667 8.61111 3.05556 7.83333 3.83333C7.05556 4.61111 6.66667 5.55556 6.66667 6.66667V9.33333Z"
                                        fill="#BD2734" />
                                </svg>
                            </div>
                            <span class="i18n-faq-q5">Peut-on annuler ou modifier sa réservation ?</span>
                        </div>
                        <svg class="question-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="13"
                            viewBox="0 0 20 13" fill="none">
                            <path d="M10 12.3333L0 2.33333L2.33333 0L10 7.66667L17.6667 0L20 2.33333L10 12.3333Z"
                                fill="#F7F8F9" />
                        </svg>
                    </div>
                    <div class="question-reponse">
                        <p class="i18n-faq-a5">Oui, vous pouvez annuler ou modifier votre réservation jusqu'à 48h avant
                            la date prévue en contactant notre service client, sans frais supplémentaires.</p>
                    </div>
                </div>
            </div>

            <div class="enfant-img-questions">
                <img src="./style/img/interface/img-questions.png" alt="Pilier en pierre avec des symboles gravés">
            </div>
        </div>
    </section>


    <section class="section-accueil-avis">
        <h1 class="i18n-reviews-h1">Ce que vous en <strong>Pensez</strong></h1>
        <div class="flex-container-avis">
            <div class="icon-avis">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 16">
                    <g fill="none" fill-rule="evenodd" clip-rule="evenodd">
                        <path fill="#f44336"
                            d="M7.209 1.061c.725-.081 1.154-.081 1.933 0a6.57 6.57 0 0 1 3.65 1.82a100 100 0 0 0-1.986 1.93q-1.876-1.59-4.188-.734q-1.696.78-2.362 2.528a78 78 0 0 1-2.148-1.658a.26.26 0 0 0-.16-.027q1.683-3.245 5.26-3.86"
                            opacity="0.987" />
                        <path fill="#ffc107"
                            d="M1.946 4.92q.085-.013.161.027a78 78 0 0 0 2.148 1.658A7.6 7.6 0 0 0 4.04 7.99q.037.678.215 1.331L2 11.116Q.527 8.038 1.946 4.92"
                            opacity="0.997" />
                        <path fill="#448aff"
                            d="M12.685 13.29a26 26 0 0 0-2.202-1.74q1.15-.812 1.396-2.228H8.122V6.713q3.25-.027 6.497.055q.616 3.345-1.423 6.032a7 7 0 0 1-.51.49"
                            opacity="0.999" />
                        <path fill="#43a047"
                            d="M4.255 9.322q1.23 3.057 4.51 2.854a3.94 3.94 0 0 0 1.718-.626q1.148.812 2.202 1.74a6.62 6.62 0 0 1-4.027 1.684a6.4 6.4 0 0 1-1.02 0Q3.82 14.524 2 11.116z"
                            opacity="0.993" />
                    </g>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <g clip-path="url(#clip0_269_135)">
                        <path
                            d="M40 20C40 8.95438 31.0456 0 20 0C8.95437 0 0 8.95438 0 20C0 29.9825 7.31375 38.2567 16.875 39.757V25.7813H11.7969V20H16.875V15.5938C16.875 10.5813 19.8609 7.8125 24.4294 7.8125C26.6175 7.8125 28.9062 8.20313 28.9062 8.20313V13.125H26.3844C23.8998 13.125 23.125 14.6667 23.125 16.2484V20H28.6719L27.7852 25.7813H23.125V39.757C32.6862 38.2567 40 29.9827 40 20Z"
                            fill="#1877F2" />
                        <path
                            d="M27.7852 25.7812L28.6719 20H23.125V16.2484C23.125 14.6666 23.8998 13.125 26.3844 13.125H28.9062V8.20312C28.9062 8.20312 26.6175 7.8125 24.4292 7.8125C19.8609 7.8125 16.875 10.5813 16.875 15.5938V20H11.7969V25.7812H16.875V39.757C17.9088 39.919 18.9536 40.0002 20 40C21.0464 40.0002 22.0912 39.919 23.125 39.757V25.7812H27.7852Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_269_135">
                            <rect width="40" height="40" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="none">
                    <path
                        d="M24.5123 8.76892C19.061 8.76892 13.6138 10.3696 8.90371 13.573H0L4.00779 17.9319C2.18174 19.5956 0.901635 21.7728 0.335651 24.1774C-0.230333 26.582 -0.0557262 29.1015 0.836534 31.4051C1.72879 33.7086 3.29697 35.6884 5.33506 37.0843C7.37315 38.4802 9.78582 39.227 12.2561 39.2265C15.3426 39.2284 18.3153 38.0612 20.5759 35.9598L24.5 40.231L28.4241 35.9639C30.6827 38.0641 33.6536 39.23 36.7378 39.2265C39.9859 39.2265 43.1012 37.9364 45.3984 35.64C47.6956 33.3436 48.9867 30.2288 48.9878 26.9806C48.9899 25.277 48.6355 23.5919 47.9474 22.0335C47.2593 20.4751 46.2526 19.078 44.9922 17.9319L49 13.573H40.1188C35.5173 10.4401 30.0789 8.76606 24.5123 8.76892ZM24.5 12.7706C27.6258 12.7706 30.7536 13.3892 33.6957 14.6142C28.467 16.615 24.5 21.2946 24.5 26.7458C24.5 21.2925 20.5351 16.615 15.3043 14.6142C18.2178 13.3988 21.3432 12.7708 24.5 12.7706ZM12.2541 18.6955C13.3424 18.6955 14.42 18.9099 15.4254 19.3263C16.4309 19.7428 17.3444 20.3532 18.114 21.1228C18.8835 21.8923 19.4939 22.8058 19.9104 23.8113C20.3269 24.8167 20.5412 25.8944 20.5412 26.9826C20.5412 28.0709 20.3269 29.1485 19.9104 30.154C19.4939 31.1594 18.8835 32.073 18.114 32.8425C17.3444 33.612 16.4309 34.2225 15.4254 34.6389C14.42 35.0554 13.3424 35.2698 12.2541 35.2698C10.0562 35.2698 7.94834 34.3967 6.3942 32.8425C4.84006 31.2884 3.96696 29.1805 3.96696 26.9826C3.96696 24.7847 4.84006 22.6769 6.3942 21.1228C7.94834 19.5686 10.0562 18.6955 12.2541 18.6955ZM36.7378 18.6996C37.8256 18.6992 38.9029 18.9131 39.9082 19.329C40.9134 19.7449 41.8268 20.3548 42.5964 21.1238C43.3659 21.8927 43.9764 22.8057 44.3931 23.8107C44.8098 24.8156 45.0245 25.8927 45.0249 26.9806C45.0253 28.0685 44.8114 29.1458 44.3955 30.151C43.9795 31.1562 43.3697 32.0697 42.6007 32.8392C41.8317 33.6087 40.9187 34.2193 39.9138 34.636C38.9089 35.0526 37.8318 35.2673 36.7439 35.2677C34.5468 35.2685 32.4394 34.3965 30.8853 32.8435C29.3311 31.2906 28.4576 29.1838 28.4568 26.9867C28.4559 24.7896 29.3279 22.6822 30.8809 21.1281C32.4339 19.574 34.5407 18.7004 36.7378 18.6996ZM12.2541 22.64C11.1018 22.64 9.99672 23.0977 9.18194 23.9125C8.36716 24.7273 7.90942 25.8324 7.90942 26.9847C7.90942 28.137 8.36716 29.242 9.18194 30.0568C9.99672 30.8716 11.1018 31.3293 12.2541 31.3293C13.4064 31.3293 14.5114 30.8716 15.3262 30.0568C16.141 29.242 16.5988 28.137 16.5988 26.9847C16.5988 25.8324 16.141 24.7273 15.3262 23.9125C14.5114 23.0977 13.4064 22.64 12.2541 22.64ZM36.7378 22.64C35.5855 22.64 34.4804 23.0977 33.6656 23.9125C32.8508 24.7273 32.3931 25.8324 32.3931 26.9847C32.3931 28.137 32.8508 29.242 33.6656 30.0568C34.4804 30.8716 35.5855 31.3293 36.7378 31.3293C37.89 31.3293 38.9951 30.8716 39.8099 30.0568C40.6247 29.242 41.0824 28.137 41.0824 26.9847C41.0824 25.8324 40.6247 24.7273 39.8099 23.9125C38.9951 23.0977 37.89 22.64 36.7378 22.64Z"
                        fill="white" />
                </svg>
            </div>
            <div class="container-star">
                <div class="stars">
                    <?php
                    $noteArrondie = isset($moyenneNotes) && $moyenneNotes['NbAvis'] > 0 ? (int) round((float) $moyenneNotes['Moyenne']) : 0;
                    for ($i = 1; $i <= 5; $i++):
                        $remplie = $i <= $noteArrondie;
                        ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip_star_<?= $i ?>)">
                                <?php if ($remplie): ?>
                                    <path
                                        d="M11.523 1.33204C11.5596 1.23462 11.6249 1.15066 11.7104 1.09139C11.7959 1.03212 11.8975 1.00037 12.0015 1.00037C12.1056 1.00037 12.2071 1.03212 12.2926 1.09139C12.3782 1.15066 12.4435 1.23462 12.48 1.33204L15.07 8.67504H22.385C22.4894 8.67546 22.5911 8.70775 22.6766 8.76758C22.7621 8.82742 22.8272 8.91194 22.8633 9.00983C22.8995 9.10773 22.9048 9.21432 22.8786 9.31533C22.8525 9.41634 22.7961 9.50696 22.717 9.57504L16.605 14.642L19.163 22.327C19.197 22.43 19.1974 22.5411 19.1642 22.6443C19.131 22.7474 19.0659 22.8374 18.9783 22.9013C18.8906 22.9651 18.785 22.9995 18.6766 22.9994C18.5682 22.9994 18.4626 22.9649 18.375 22.901L12 18.224L5.62204 22.9C5.53453 22.9634 5.42919 22.9974 5.32114 22.9972C5.21309 22.9969 5.1079 22.9625 5.02068 22.8987C4.93346 22.8349 4.8687 22.7451 4.83571 22.6422C4.80271 22.5393 4.80318 22.4286 4.83704 22.326L7.39604 14.641L1.28304 9.57404C1.20397 9.50596 1.14758 9.41534 1.12144 9.31433C1.09529 9.21332 1.10063 9.10673 1.13674 9.00883C1.17286 8.91094 1.23802 8.82642 1.3235 8.76658C1.40898 8.70675 1.5107 8.67446 1.61504 8.67404H8.93104L11.523 1.33204Z"
                                        fill="#FFEF5E" />
                                    <path
                                        d="M12 18.224L5.62204 22.9C5.53453 22.9634 5.42919 22.9974 5.32114 22.9972C5.21309 22.9969 5.1079 22.9624 5.02068 22.8987C4.93346 22.8349 4.8687 22.7451 4.83571 22.6422C4.80271 22.5393 4.80318 22.4286 4.83704 22.326L7.39604 14.641L1.28304 9.57403C1.20397 9.50595 1.14758 9.41533 1.12144 9.31432C1.09529 9.21331 1.10063 9.10672 1.13674 9.00882C1.17286 8.91093 1.23802 8.82641 1.3235 8.76657C1.40898 8.70674 1.5107 8.67445 1.61504 8.67403H8.93104L11.521 1.33103C11.5575 1.23322 11.623 1.14895 11.7089 1.08958C11.7947 1.03021 11.8967 0.998604 12.001 0.999028L12 18.224Z"
                                        fill="#FFEF5E" />
                                <?php endif; ?>
                                <path
                                    d="M11.523 1.33204C11.5596 1.23462 11.6249 1.15066 11.7104 1.09139C11.7959 1.03212 11.8975 1.00037 12.0015 1.00037C12.1056 1.00037 12.2071 1.03212 12.2926 1.09139C12.3782 1.15066 12.4435 1.23462 12.48 1.33204L15.07 8.67504H22.385C22.4894 8.67546 22.5911 8.70775 22.6766 8.76758C22.7621 8.82742 22.8272 8.91194 22.8633 9.00983C22.8995 9.10773 22.9048 9.21432 22.8786 9.31533C22.8525 9.41634 22.7961 9.50696 22.717 9.57504L16.605 14.642L19.163 22.327C19.197 22.43 19.1974 22.5411 19.1642 22.6443C19.131 22.7474 19.0659 22.8374 18.9783 22.9013C18.8906 22.9651 18.785 22.9995 18.6766 22.9994C18.5682 22.9994 18.4626 22.9649 18.375 22.901L12 18.224L5.62204 22.9C5.53453 22.9634 5.42919 22.9974 5.32114 22.9972C5.21309 22.9969 5.1079 22.9624 5.02068 22.8987C4.93346 22.8349 4.8687 22.7451 4.83571 22.6422C4.80271 22.5393 4.80318 22.4286 4.83704 22.326L7.39604 14.641L1.28304 9.57404C1.20397 9.50596 1.14758 9.41534 1.12144 9.31433C1.09529 9.21332 1.10063 9.10673 1.13674 9.00883C1.17286 8.91094 1.23802 8.82642 1.3235 8.76658C1.40898 8.70675 1.5107 8.67446 1.61504 8.67404H8.93104L11.523 1.33204Z"
                                    stroke="#191919" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip_star_<?= $i ?>">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    <?php endfor; ?>
                </div>
                <div class="texte-avis">
                    <?php
                    if (isset($moyenneNotes) && $moyenneNotes['NbAvis'] > 0):
                        if ((float) $moyenneNotes['Moyenne'] >= 4):
                            echo $moyenneNotes['Moyenne'] . ' <span class="i18n-based-on">basé sur</span> ' . $moyenneNotes['NbAvis'] . ' <span class="i18n-reviews-on">avis sur nos aventures</span>';
                        else:
                            echo $moyenneNotes['NbAvis'] . ' <span class="i18n-reviews-on">avis sur nos aventures</span>';
                        endif;
                    else:
                        echo '<span class="i18n-no-reviews">Aucun avis pour le moment</span>';
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="avis-container">
            <div class="avis-container">
                <?php if (isset($avis) && !empty($avis)): ?>
                    <?php
                    // Ligne du tableau séparé en deux pour l'animation CSS avec array_slice()
                    $mid = (int) ceil(count($avis) / 2);
                    $row1 = array_slice($avis, 0, $mid);
                    $row2 = array_slice($avis, $mid);
                    ?>
                    <div class="avis-row-1">
                        <div class="avis-track">
                            <?php foreach (array_merge($row1, $row1) as $unAvis): ?>
                                <div class="carte">
                                    <div class="compte">
                                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 11C10 13.7614 7.76142 16 5 16C3.96191 16 3.00318 15.6881 2.19539 15.15C2.65961 17.3752 4.49845 18.8242 6.77273 19.0727L6.64394 21.0667C3.12071 20.6862 0.360155 17.7554 0.0519965 14.1203L0 14V11C0 8.23858 2.23858 6 5 6C7.76142 6 10 8.23858 10 11ZM24 11C24 13.7614 21.7614 16 19 16C17.9619 16 17.0032 15.6881 16.1954 15.15C16.6596 17.3752 18.4985 18.8242 20.7727 19.0727L20.6439 21.0667C17.1207 20.6862 14.3602 17.7554 14.052 14.1203L14 14V11C14 8.23858 16.2386 6 19 6C21.7614 6 24 8.23858 24 11Z"
                                                fill="#BD2734" />
                                        </svg>
                                        <strong><?= htmlspecialchars($unAvis['prenom']) ?></strong>
                                        <span>
                                            <span class="i18n-on-adventure">sur</span>
                                            <em>
                                                <span
                                                    class="lang-fr"><?= htmlspecialchars($unAvis['designation_fr'] ?? $unAvis['designation'] ?? 'Aventure') ?></span>
                                                <span class="lang-en"
                                                    style="display:none;"><?= htmlspecialchars($unAvis['designation_en'] ?? $unAvis['designation_fr'] ?? 'Adventure') ?></span>
                                            </em>
                                        </span>
                                    </div>
                                    <p class="citation">"<?= htmlspecialchars($unAvis['commentaire']) ?>"</p>
                                    <div><?= $unAvis['valeur_note'] ?>/5</div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if (!empty($row2)): ?>
                        <div class="avis-row-2">
                            <div class="avis-track">
                                <?php foreach (array_merge($row2, $row2) as $unAvis): ?>
                                    <div class="carte">
                                        <div class="compte">
                                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 11C10 13.7614 7.76142 16 5 16C3.96191 16 3.00318 15.6881 2.19539 15.15C2.65961 17.3752 4.49845 18.8242 6.77273 19.0727L6.64394 21.0667C3.12071 20.6862 0.360155 17.7554 0.0519965 14.1203L0 14V11C0 8.23858 2.23858 6 5 6C7.76142 6 10 8.23858 10 11ZM24 11C24 13.7614 21.7614 16 19 16C17.9619 16 17.0032 15.6881 16.1954 15.15C16.6596 17.3752 18.4985 18.8242 20.7727 19.0727L20.6439 21.0667C17.1207 20.6862 14.3602 17.7554 14.052 14.1203L14 14V11C14 8.23858 16.2386 6 19 6C21.7614 6 24 8.23858 24 11Z"
                                                    fill="#BD2734" />
                                            </svg>
                                            <strong><?= htmlspecialchars($unAvis['prenom']) ?></strong>
                                            <span>
                                                <span class="i18n-on-adventure">sur</span>
                                                <em>
                                                    <span
                                                        class="lang-fr"><?= htmlspecialchars($unAvis['designation_fr'] ?? $unAvis['designation'] ?? 'Aventure') ?></span>
                                                    <span class="lang-en"
                                                        style="display:none;"><?= htmlspecialchars($unAvis['designation_en'] ?? $unAvis['designation_fr'] ?? 'Adventure') ?></span>
                                                </em>
                                            </span>
                                        </div>
                                        <p class="citation">"<?= htmlspecialchars($unAvis['commentaire']) ?>"</p>
                                        <div><?= $unAvis['valeur_note'] ?>/5</div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <p class="i18n-no-reviews">Aucun avis pour le moment</p>
                <?php endif; ?>
            </div>
    </section>
</div>

<script src="./js/defilementAventureAccueil.js"></script>
<script src="./js/particules.js"></script>
<script>
    document.querySelectorAll('.question').forEach(function (q) {
        q.addEventListener('click', function () {
            q.classList.toggle('question--ouvert');
        });
    });
</script>