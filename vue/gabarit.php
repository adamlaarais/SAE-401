<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="./style/main.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="./style/img/LOGO.png">
  <?= $css ?? '' ?>
</head>

<body>

  <?php if (isset($_SESSION['notif']) || isset($_GET['deconnexion'])): ?>
    <?php if (isset($_GET['deconnexion']) && !isset($_SESSION['notif']))
      // injection d'un span avec classe de traduction pour le message de déconnexion
      // uniquement si aucune notif de connexion/inscription n'est déjà en session
      $_SESSION['notif'] = '<span class="i18n-notif-logout">Vous avez bien été déconnecté.</span>'; ?>
    <div class="notif-connexion" id="notif-connexion">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"></polyline>
      </svg>
      <span><?= $_SESSION['notif'] ?></span>
    </div>
    <script>
      history.replaceState(null, '', 'index.php'); // remplace l'URL dans la barre du navigateur par index.php sans recharger la page
      setTimeout(function () {
        const notif = document.getElementById('notif-connexion');
        if (notif) {
          notif.classList.add('notif-fade'); // déclenche la transition css
          setTimeout(function () { notif.remove(); }, 500); // retire l'élément du dom après l'animation
        }
      }, 3000);
    </script>
    <?php unset($_SESSION['notif']); // suppression du message en session après affichage ?>
  <?php endif; ?>
  <div id="page-loader" class="page-loader">
    <div class="loader-content">
      <img src="./style/img/LOGO.png" alt="Chargement" class="loader-logo">
      <div class="loader-progress-bar">
        <div class="loader-progress-fill"></div>
      </div>
    </div>
  </div>
  <script>
    /*********************************************************
    Gestion du loader de première visite
    Affiche le loader uniquement lors de la première visite du site
    Le masque lors de la navigation entre les pages et des actualisations
    *********************************************************/
    if (sessionStorage.getItem('loader_vu')) {
      const loader = document.getElementById('page-loader');
      if (loader) loader.remove();
    } else {
      sessionStorage.setItem('loader_vu', 'true');
    }
  </script>

  <!-- partie header avec l'affichage des boutons, etc -->
  <header>
    <div class="fond"></div>
    <div class="header-container">
      <div id="menu-toggle">
        <div class="burger-bars">
          <span class="burger1"></span>
          <span class="burger2"></span>
          <span class="burger3"></span>
        </div>
        <span id="menu-text" class="i18n-menu-text">Menu</span>
      </div>

      <div class="menu" id="menu-nav"><?= $menu ?></div>

      <div class="logo">
        <a href="index.php">
          <img src="./style/img/LOGO.png" alt="Kodex">
        </a>
      </div>

      <div class="fond-user"></div>
      <div class="menu-user-toggle">
        <?php if (isset($_SESSION['user'])): ?>
          <div class='dropdown'>
            <div class="dropdown-greeting">
              <span class="greeting-text i18n-greeting">Bonjour,</span>
              <span class="greeting-name"><?= htmlspecialchars($_SESSION['user']['prenom']) ?></span>
            </div>
            <span class='lien i18n-account'>COMPTE</span>
            <div class='dropdown-content'>
              <a href='index.php?action=profil' class="i18n-profile">Mon profil</a>
              <a href='index.php?action=deconnexion' class="i18n-logout">Déconnexion</a>
            </div>
          </div>
        <?php else: ?>
          <?= $user ?>
        <?php endif; ?>
      </div>

      <div class="cross">
        <span class="stick"></span>
        <span class="stick2"></span>
      </div>

      <div class="icons">
        <div class="langue">
          <svg class="lang-fr" width="28" height="28" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"
            style="border-radius: 50%;">
            <defs>
              <clipPath id="clipFR">
                <circle cx="50" cy="50" r="50" />
              </clipPath>
            </defs>
            <g clip-path="url(#clipFR)">
              <rect x="0" y="0" width="33.3" height="100" fill="#002395" />
              <rect x="33.3" y="0" width="33.4" height="100" fill="#fff" />
              <rect x="66.7" y="0" width="33.3" height="100" fill="#ed2939" />
            </g>
          </svg>

          <svg class="lang-en" width="28" height="28" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"
            style="display:none; border-radius: 50%;">
            <defs>
              <clipPath id="clipEN">
                <circle cx="50" cy="50" r="50" />
              </clipPath>
            </defs>
            <g clip-path="url(#clipEN)">
              <rect width="100" height="100" fill="#00247d" />
              <path d="M0 0 L100 100 M100 0 L0 100" stroke="#fff" stroke-width="12" />
              <path d="M0 0 L100 100 M100 0 L0 100" stroke="#cf142b" stroke-width="8" />
              <path d="M50 0 V100 M0 50 H100" stroke="#fff" stroke-width="20" />
              <path d="M50 0 V100 M0 50 H100" stroke="#cf142b" stroke-width="12" />
            </g>
          </svg>
        </div>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['id_role'] == 2): ?>
          <div class="admin-panel-btn" style="margin-right: 15px;">
            <a href="index.php?action=admin" title="Panel Administration">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                <circle cx="12" cy="11" r="3" />
                <path d="M12 14v4" />
              </svg>
            </a>
          </div>
        <?php endif; ?>

        <div class="locker">
          <a href="index.php?action=panier" style="display: block; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
              stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
          </a>
        </div>

        <div class="compte">
          <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
            <path
              d="M5.13334 20.1333C6.26667 19.2667 7.53334 18.5836 8.93334 18.084C10.3333 17.5844 11.8 17.3342 13.3333 17.3333C14.8667 17.3324 16.3333 17.5827 17.7333 18.084C19.1333 18.5853 20.4 19.2684 21.5333 20.1333C22.3111 19.2222 22.9169 18.1889 23.3507 17.0333C23.7844 15.8778 24.0009 14.6444 24 13.3333C24 10.3778 22.9613 7.86089 20.884 5.78267C18.8067 3.70444 16.2898 2.66578 13.3333 2.66667C10.3769 2.66756 7.86 3.70667 5.78267 5.784C3.70534 7.86133 2.66667 10.3778 2.66667 13.3333C2.66667 14.6444 2.88356 15.8778 3.31733 17.0333C3.75111 18.1889 4.35645 19.2222 5.13334 20.1333ZM13.3333 14.6667C12.0222 14.6667 10.9164 14.2169 10.016 13.3173C9.11556 12.4178 8.66578 11.312 8.66667 10C8.66756 8.688 9.11778 7.58222 10.0173 6.68267C10.9169 5.78311 12.0222 5.33333 13.3333 5.33333C14.6444 5.33333 15.7502 5.78356 16.6507 6.684C17.5511 7.58444 18.0009 8.68978 18 10C17.9991 11.3102 17.5493 12.416 16.6507 13.3173C15.752 14.2187 14.6462 14.6684 13.3333 14.6667ZM13.3333 26.6667C11.4889 26.6667 9.75556 26.3164 8.13334 25.616C6.51111 24.9156 5.1 23.9658 3.9 22.7667C2.7 21.5676 1.75022 20.1564 1.05067 18.5333C0.351113 16.9102 0.000890577 15.1769 1.68776e-06 13.3333C-0.000887201 11.4898 0.349335 9.75644 1.05067 8.13333C1.752 6.51022 2.70178 5.09911 3.9 3.9C5.09822 2.70089 6.50934 1.75111 8.13334 1.05067C9.75734 0.350222 11.4907 0 13.3333 0C15.176 0 16.9093 0.350222 18.5333 1.05067C20.1573 1.75111 21.5684 2.70089 22.7667 3.9C23.9649 5.09911 24.9151 6.51022 25.6173 8.13333C26.3196 9.75644 26.6693 11.4898 26.6667 13.3333C26.664 15.1769 26.3138 16.9102 25.616 18.5333C24.9182 20.1564 23.9684 21.5676 22.7667 22.7667C21.5649 23.9658 20.1538 24.916 18.5333 25.6173C16.9129 26.3187 15.1796 26.6684 13.3333 26.6667Z"
              fill="white" />
          </svg>
        </div>
      </div>
    </div>
  </header>
  <main>
    <?= $contenu ?>
  </main>
  <footer>
    <?= $footer ?>
  </footer>

  <script src="./js/menu.js"></script>
  <script src="./js/connection.js"></script>
  <script src="./js/traduire.js"></script>

  <script>
    // exécution du retrait du loader une fois toutes les ressources chargées (images, styles)
    window.addEventListener('load', function () {
      const loader = document.getElementById('page-loader');
      if (loader) {
        // ajout d'un délai pour que le loader soit bien visible même avec un chargement rapide
        setTimeout(() => {
          loader.classList.add('loader-hidden'); // lance le fade out via css
          setTimeout(() => {
            loader.remove(); // nettoyage définitif du dom
          }, 800);
        }, 2500); // durée d'exposition minimale du logo
      }
    });

    // écouteur d'événement sur le défilement pour modifier l'aspect visuel du header
    window.addEventListener('scroll', function () {
      const monHeader = document.querySelector('header');

      // bascule de classe pour changer le fond ou la taille au scroll
      if (window.scrollY > 50) {
        monHeader.classList.add('header-scroll');
      } else {
        monHeader.classList.remove('header-scroll');
      }
    });

    // bascule la visibilite d'un champ mot de passe (password <-> text)
    function togglePasswordVisibility(btn) {
      const wrapper = btn.closest('.password-wrapper');
      const input = wrapper.querySelector('input');
      if (input.type === 'password') {
        input.type = 'text';
        btn.classList.add('active');
      } else {
        input.type = 'password';
        btn.classList.remove('active');
      }
    }
  </script>
</body>

</html>