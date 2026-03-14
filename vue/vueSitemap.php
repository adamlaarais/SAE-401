<?php
$titre = "Plan du site";
$css = '<link href="./style/sitemap.css" rel="stylesheet">';
?>

<div class="sitemap-page">
    <div class="sitemap-header">
        <h1 class="i18n-sitemap-title">Plan du Site</h1>
        <p class="i18n-sitemap-subtitle">Découvrez toutes les sections de Kodex</p>
    </div>

    <div class="sitemap-container">
        <div class="sitemap-grid">

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-nav">Navigation</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="index.php" class="i18n-sitemap-nav-home">Accueil</a></li>
                    <li><a href="index.php?action=aventures" class="i18n-sitemap-nav-adv">Nos Aventures</a></li>
                    <li><a href="index.php?action=entreprise" class="i18n-sitemap-nav-b2b">Entreprise</a></li>
                    <li><a href="index.php?action=offrir" class="i18n-sitemap-nav-gift">Offrir</a></li>
                    <li><a href="index.php?action=actualites" class="i18n-sitemap-nav-news">Actualités</a></li>
                    <li><a href="index.php?action=informations" class="i18n-sitemap-nav-about">Qui sommes-nous ?</a>
                    </li>
                </ul>
            </div>

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-res">Réservation</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="index.php?action=reservation" class="i18n-sitemap-res-book">Réserver une aventure</a>
                    </li>
                    <li><a href="index.php?action=panier" class="i18n-sitemap-res-cart">Mon panier</a></li>
                    <li><a href="index.php?action=paiement" class="i18n-sitemap-res-pay">Paiement</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-acc">Mon Compte</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="index.php?action=inscription&mode=connexion" class="i18n-sitemap-acc-login">Se
                            connecter</a></li>
                    <li><a href="index.php?action=inscription&mode=inscription"
                            class="i18n-sitemap-acc-reg">S'inscrire</a></li>
                    <li><a href="index.php?action=profil" class="i18n-sitemap-acc-prof">Mon profil</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-help">Aide & Support</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="index.php?action=contact" class="i18n-sitemap-help-contact">Contact</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-legal">Informations Légales</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="index.php?action=mentions" class="i18n-sitemap-legal-notice">Mentions légales</a></li>
                    <li><a href="index.php?action=cgv" class="i18n-sitemap-legal-cgv">Conditions générales de vente</a>
                    </li>
                    <li><a href="index.php?action=cookies" class="i18n-sitemap-legal-cookies">Politique de cookies</a>
                    </li>
                    <li><a href="index.php?action=confidentialite" class="i18n-sitemap-legal-privacy">Politique de
                            confidentialité</a></li>
                </ul>
            </div>

            <div class="sitemap-section">
                <div class="sitemap-section-header">
                    <div class="section-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <h2 class="i18n-sitemap-resources">Ressources</h2>
                </div>
                <ul class="sitemap-links">
                    <li><a href="sitemap.xml" target="_blank">Sitemap XML</a></li>
                </ul>
            </div>

        </div>

        <div class="sitemap-footer-info">
            <div class="footer-info-card">
                <h3 class="i18n-sitemap-footer-title">Besoin d'aide pour naviguer ?</h3>
                <p class="i18n-sitemap-footer-desc">Retrouvez toutes nos pages organisées ci-dessus. Si vous ne trouvez
                    pas ce que vous cherchez, n'hésitez pas à nous contacter.</p>
                <a href="index.php?action=contact" class="contact-btn i18n-sitemap-btn-contact">Nous contacter</a>
            </div>
        </div>
    </div>
</div>