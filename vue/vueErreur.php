<?php
$titre = "Erreur - Kodex";
$css = '<link rel="stylesheet" href="./style/erreur.css">';

// Récupérer les données d'erreur
$codeErreur  = $codeErreur ?? 500;
$titreErreur = $titreErreur ?? "Erreur";
$message     = $message ?? "Une erreur inattendue est survenue.";
$codeInterne = $codeInterne ?? 0;
?>

<div class="erreur-page">
    <div class="erreur-container">

        <div class="erreur-illustration">
            <div class="erreur-code-display">
                <span class="erreur-code-number"><?= $codeErreur ?></span>
            </div>
            <div class="erreur-icon-pulse"></div>
            <svg class="erreur-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"
                fill="none" stroke="var(--rouge)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <?php if ($codeErreur === 404): ?>
                    <!-- Icône loupe / page introuvable -->
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                <?php elseif ($codeErreur === 403): ?>
                    <!-- Icône cadenas / accès refusé -->
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                <?php elseif ($codeErreur === 401): ?>
                    <!-- Icône utilisateur / session -->
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                    <line x1="18" y1="8" x2="23" y2="13"></line>
                    <line x1="23" y1="8" x2="18" y2="13"></line>
                <?php else: ?>
                    <!-- Icône alerte / erreur générique -->
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                <?php endif; ?>
            </svg>
        </div>

        <div class="erreur-contenu">
            <h1 class="erreur-titre">
                <span class="lang-fr"><?= htmlspecialchars($titreErreur) ?></span>
                <span class="lang-en" style="display:none;">Error</span>
            </h1>

            <p class="erreur-message">
                <span class="lang-fr"><?= htmlspecialchars($message) ?></span>
                <span class="lang-en" style="display:none;">An error has occurred. Please try again.</span>
            </p>

            <?php if ($codeInterne > 0): ?>
                <p class="erreur-code-interne">
                    <span class="lang-fr">Code erreur : #<?= $codeInterne ?></span>
                    <span class="lang-en" style="display:none;">Error code: #<?= $codeInterne ?></span>
                </p>
            <?php endif; ?>
        </div>

        <div class="erreur-actions">
            <a href="index.php" class="erreur-btn erreur-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="lang-fr">Retour à l'accueil</span>
                <span class="lang-en" style="display:none;">Back to home</span>
            </a>

            <a href="index.php?action=aventures" class="erreur-btn erreur-btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <span class="lang-fr">Voir les aventures</span>
                <span class="lang-en" style="display:none;">View adventures</span>
            </a>

            <?php if ($codeErreur === 403 || $codeErreur === 401): ?>
                <a href="index.php?action=inscription&mode=connexion" class="erreur-btn erreur-btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    <span class="lang-fr">Se connecter</span>
                    <span class="lang-en" style="display:none;">Log in</span>
                </a>
            <?php endif; ?>

            <button onclick="history.back()" class="erreur-btn erreur-btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span class="lang-fr">Page précédente</span>
                <span class="lang-en" style="display:none;">Go back</span>
            </button>
        </div>

    </div>
</div>