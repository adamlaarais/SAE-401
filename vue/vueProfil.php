<?php
$titre = "Mon Compte";
$css = '<link rel="stylesheet" href="./style/profil.css">';

$dateVal = isset($user['date_inscription']) ? strtotime($user['date_inscription']) : time();
$moisFr = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
$dateFinaleFr = date("j", $dateVal) . " " . $moisFr[date("n", $dateVal) - 1] . " " . date("Y", $dateVal);
$dateFinaleEn = date("F j, Y", $dateVal);
?>

<div class="page-profil">

    <?php if (isset($_GET['update']) && $_GET['update'] === 'success'): ?>
        <div id="notification-succes" class="notification" style="margin-bottom: 20px;">
            <div class="notification-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-check-circle">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span class="i18n-prof-success">Traitement de demande réussie !</span>
            </div>
        </div>
    <?php endif; ?>

    <div class="profil-header-titre">
        <h1><span class="i18n-prof-hello">Bonjour,</span> <?= htmlspecialchars($user['prenom']) ?></h1>
        <p>
            <span class="i18n-prof-member-since">Joueur depuis le</span>
            <span class="lang-fr"><?= $dateFinaleFr ?></span>
            <span class="lang-en" style="display:none;"><?= $dateFinaleEn ?></span>
        </p>
    </div>

    <div class="profil-container">

        <div class="profil-col-gauche">
            <div class="user-info-card">
                <div class="user-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                    </svg>
                </div>
                <div class="user-details">
                    <h2><?= htmlspecialchars($user['prenom']) ?> <?= htmlspecialchars($user['nom']) ?></h2>
                    <p><?= htmlspecialchars($user['email']) ?></p>
                </div>
            </div>

            <form method="POST" action="index.php?action=profil_update" class="form-profil">
                <?php
                $F = new Formulaire([
                    'nom' => $user['nom'] ?? '',
                    'prenom' => $user['prenom'] ?? '',
                    'date_naissance' => $user['date_naissance'] ?? '',
                    'email' => $user['email'] ?? '',
                    'numero' => $user['numero'] ?? '',
                    'adresse' => $user['adresse'] ?? '',
                    'ville' => $user['ville'] ?? '',
                    'postal' => $user['postal'] ?? '',
                    'pays' => $user['pays'] ?? '',
                ]);
                echo $F->formHead();
                echo $F->inputText("nom", "<span class='i18n-lbl-nom'>Nom</span>", ['placeholder' => 'Votre nom']);
                echo $F->inputText("prenom", "<span class='i18n-lbl-prenom'>Prénom</span>", ['placeholder' => 'Votre prénom']);
                echo $F->inputText("date_naissance", "<span class='i18n-lbl-dob'>Date de naissance</span>", ['placeholder' => 'jj / mm / aaaa']);
                echo $F->inputEmail("email", "<span class='i18n-lbl-email'>Email</span>", ['placeholder' => 'nom@email.com']);
                echo $F->inputText("numero", "<span class='i18n-lbl-phone'>Numéro de téléphone</span>", ['placeholder' => '01 02 03 04 05']);
                echo $F->inputText("adresse", "<span class='i18n-lbl-address'>Adresse</span>", ['placeholder' => 'Votre adresse']);
                echo $F->inputText("ville", "<span class='i18n-lbl-city'>Ville</span>", ['placeholder' => 'Votre ville']);
                echo $F->inputText("postal", "<span class='i18n-lbl-zip'>Code Postal</span>", ['placeholder' => 'Votre code postal']);
                echo $F->inputText("pays", "<span class='i18n-lbl-country'>Pays</span>", ['placeholder' => 'Votre pays']);
                echo $F->inputPassword("nouveau_mdp", "<span class='i18n-lbl-new-pwd'>Nouveau mot de passe (laisser vide pour ne pas changer)</span>", ['placeholder' => '••••••••']);
                echo $F->formFoot();
                echo $F->submit("profil_update", "<span class='i18n-prof-btn-save'>Enregistrer les modifications</span>", ['class' => 'btn-modifier']);
                ?>
            </form>
        </div>


        <div class="profil-col-droite">
            <div class="profil-actions">
                <a href="index.php?action=deconnexion" class="btn-annuler i18n-logout">Déconnexion</a>
            </div>

            <div class="aventures-section">
                <div class="aventures-header">
                    <h3 class="i18n-prof-adv-title">Mes Aventures</h3>
                </div>

                <div class="aventure-list">
                    <?php if (empty($reservations)): ?>
                        <p style="color: #a0a0a0;" class="i18n-prof-no-adv">Vous n'avez pas encore réservé d'aventure.</p>
                    <?php else: ?>
                        <?php foreach ($reservations as $res):
                            $dateChoisieTimestamp = strtotime($res['date_choisie']);
                            $estTerminee = $dateChoisieTimestamp < time();
                            $statusTextFr = $estTerminee ? 'Terminé' : 'Prévue';
                            $statusTextEn = $estTerminee ? 'Ended' : 'Planned';
                            $statusClass = $estTerminee ? 'termines' : 'prevues';
                            ?>
                            <div class="aventure-item" style="display: flex; gap: 15px; align-items: center;">
                                <?php if (!empty($res['image'])): ?>
                                    <img src="<?= htmlspecialchars($res['image']) ?>" alt="Image Aventure"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                <?php endif; ?>

                                <div class="aventure-info" style="flex: 1;">
                                    <h4 class="aventure-nom">
                                        <span
                                            class="lang-fr"><?= htmlspecialchars($res['designation_fr'] ?? 'Aventure') ?></span>
                                        <span class="lang-en"
                                            style="display:none;"><?= htmlspecialchars($res['designation_en'] ?? 'Adventure') ?></span>
                                    </h4>
                                    <div class="aventure-details">
                                        <span class="aventure-date"><?= date("d-m-Y", $dateChoisieTimestamp) ?></span>
                                        <span class="aventure-heure"><?= date("H\H", $dateChoisieTimestamp) ?></span>
                                        <span class="aventure-joueurs"><?= htmlspecialchars($res['nb_joueurs']) ?>
                                            <span class="i18n-players">joueurs</span></span>
                                        <span class="status <?= $statusClass ?>">
                                            <span class="lang-fr"><?= $statusTextFr ?></span>
                                            <span class="lang-en" style="display:none;"><?= $statusTextEn ?></span>
                                        </span>
                                    </div>
                                    <div class="aventure-extras" style="margin-top: 8px; font-size: 0.9em; color: #a0a0a0;">
                                        <span><strong class="i18n-cart-lbl-gameplay">Gameplay :</strong>
                                            <?php if (empty($res['nom_gameplay'])): ?>
                                                <span class="i18n-val-classic">Classique</span>
                                            <?php else: ?>
                                                <?= htmlspecialchars($res['nom_gameplay']) ?>
                                            <?php endif; ?>
                                        </span>

                                        <?php if (!empty($res['liste_objets_fr'])): ?>
                                            <br><span><strong class="i18n-pay-lbl-items">Objets :</strong>
                                                <span class="lang-fr"><?= htmlspecialchars($res['liste_objets_fr']) ?></span>
                                                <span class="lang-en"
                                                    style="display:none;"><?= htmlspecialchars($res['liste_objets_en']) ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- SECTION CADEAUX REÇUS -->
            <div class="cadeaux-section">
                <div class="cadeaux-header">
                    <h3>
                        <span class="lang-fr">🎁 Mes Cadeaux Reçus</span>
                        <span class="lang-en" style="display:none;">🎁 My Received Gifts</span>
                    </h3>
                </div>

                <div class="cadeaux-list">
                    <?php if (empty($cadeaux)): ?>
                        <p style="color: #a0a0a0;">
                            <span class="lang-fr">Vous n'avez reçu aucune carte cadeau pour le moment.</span>
                            <span class="lang-en" style="display:none;">You haven't received any gift cards yet.</span>
                        </p>
                    <?php else: ?>
                        <?php foreach ($cadeaux as $cadeau):
                            $estUtilise = (int)($cadeau['est_utilise'] ?? 0);
                            $dateObtention = strtotime($cadeau['date_obtention']);
                            $validiteMois = (int)($cadeau['validite_mois'] ?? 0);
                            $dateExpiration = strtotime("+{$validiteMois} months", $dateObtention);
                            $estExpire = $dateExpiration < time();
                        ?>
                            <div class="cadeau-item <?= $estUtilise ? 'cadeau-utilise' : ($estExpire ? 'cadeau-expire' : 'cadeau-actif') ?>">
                                <?php if (!empty($cadeau['image'])): ?>
                                    <img src="<?= htmlspecialchars($cadeau['image']) ?>" alt="Image Aventure" class="cadeau-img">
                                <?php endif; ?>

                                <div class="cadeau-info">
                                    <h4 class="cadeau-nom-offre">
                                        <?= htmlspecialchars($cadeau['nom_offre'] ?? 'Offre') ?>
                                        <span class="cadeau-prix"><?= (int)$cadeau['prix'] ?>€</span>
                                    </h4>

                                    <p class="cadeau-aventure">
                                        <span class="lang-fr">Aventure : <strong><?= htmlspecialchars($cadeau['designation_fr'] ?? '—') ?></strong></span>
                                        <span class="lang-en" style="display:none;">Adventure: <strong><?= htmlspecialchars($cadeau['designation_en'] ?? '—') ?></strong></span>
                                    </p>

                                    <p class="cadeau-expediteur">
                                        <span class="lang-fr">Offert par <?= htmlspecialchars($cadeau['prenom_expediteur'] . ' ' . $cadeau['nom_expediteur']) ?></span>
                                        <span class="lang-en" style="display:none;">Gifted by <?= htmlspecialchars($cadeau['prenom_expediteur'] . ' ' . $cadeau['nom_expediteur']) ?></span>
                                    </p>

                                    <?php if (!empty($cadeau['message_perso'])): ?>
                                        <p class="cadeau-message">"<?= htmlspecialchars($cadeau['message_perso']) ?>"</p>
                                    <?php endif; ?>

                                    <div class="cadeau-meta">
                                        <span class="cadeau-date">
                                            <span class="lang-fr">Reçu le <?= date("d/m/Y", $dateObtention) ?></span>
                                            <span class="lang-en" style="display:none;">Received on <?= date("m/d/Y", $dateObtention) ?></span>
                                        </span>
                                        <span class="cadeau-validite">
                                            <span class="lang-fr">Expire le <?= date("d/m/Y", $dateExpiration) ?></span>
                                            <span class="lang-en" style="display:none;">Expires on <?= date("m/d/Y", $dateExpiration) ?></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="cadeau-actions">
                                    <?php if ($estUtilise): ?>
                                        <span class="cadeau-badge cadeau-badge-utilise">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <span class="lang-fr">Utilisé</span>
                                            <span class="lang-en" style="display:none;">Used</span>
                                        </span>
                                    <?php elseif ($estExpire): ?>
                                        <span class="cadeau-badge cadeau-badge-expire">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            <span class="lang-fr">Expiré</span>
                                            <span class="lang-en" style="display:none;">Expired</span>
                                        </span>
                                    <?php else: ?>
                                        <form method="POST" action="index.php?action=utiliser_cadeau" class="cadeau-form">
                                            <?php
                                            $formCadeau = new Formulaire();
                                            echo $formCadeau->inputHidden('id_user_expediteur', (int)$cadeau['id_user']);
                                            echo $formCadeau->inputHidden('id_offre', (int)$cadeau['id_offre']);
                                            ?>
                                            <button type="submit" class="cadeau-btn-utiliser" onclick="return confirm('Voulez-vous vraiment utiliser ce cadeau ?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12V8H6a2 2 0 0 1-2-2c0-1.1.9-2 2-2h12v4"></path><path d="M4 6v12c0 1.1.9 2 2 2h14v-4"></path><path d="M18 12a2 2 0 0 0 0 4h4v-4h-4z"></path></svg>
                                                <span class="lang-fr">Utiliser</span>
                                                <span class="lang-en" style="display:none;">Use</span>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="./js/profil.js"></script>