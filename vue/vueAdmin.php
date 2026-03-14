<?php
$titre = "Tableau de bord - Kodex";
$css = '<link rel="stylesheet" href="./style/admin.css">';

// Petits calculs pour les statistiques
$totalRes = isset($reservations) ? count($reservations) : 0;
$totalAventures = isset($games) ? count($games) : 0;
$totalUtilisateurs = isset($users) ? count($users) : 0;
$totalMessages = isset($messages) ? count($messages) : 0;
$nbNonLus = $nbMessagesNonLus ?? 0;
?>

<div class="admin-wrapper">
    <div class="admin-header">
        <h1 class="i18n-admin-title">Tableau de bord</h1>
        <p class="i18n-admin-desc">Gérez les réservations et les messages clients</p>
    </div>

    <div class="admin-stats">
        <div class="stat-card">
            <div class="stat-header">
                <span class="i18n-stat-res">Total des réservations</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--rouge)" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
            <div class="stat-value"><?= $totalRes ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="i18n-stat-adv">Aventures actives</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E5B05C" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon
                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                    </polygon>
                </svg>
            </div>
            <div class="stat-value"><?= $totalAventures ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="i18n-stat-users">Utilisateurs</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="stat-value"><?= $totalUtilisateurs ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="i18n-stat-msg">Nouveaux Messages</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--rouge)" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <div class="stat-value"><?= $nbNonLus ?></div>
        </div>
    </div>

    <div class="admin-tabs-container">
        <div class="admin-tabs">
            <button class="tab-btn active i18n-tab-res" data-target="tab-reservations">Réservations</button>
            <button class="tab-btn i18n-tab-msg" data-target="tab-messages">
                Messages
                <?php if ($nbNonLus > 0): ?>
                    <span class="tab-badge"><?= $nbNonLus ?></span>
                <?php endif; ?>
            </button>
            <button class="tab-btn i18n-tab-adv" data-target="tab-aventures">Aventures</button>
            <button class="tab-btn i18n-tab-users" data-target="tab-utilisateurs">Utilisateurs</button>
        </div>
    </div>

    <div class="admin-content">

        <div id="tab-reservations" class="tab-pane active">
            <div class="section-box">
                <div class="box-header">
                    <h2 class="i18n-res-h2">Gestion des Réservations</h2>
                    <p class="i18n-res-p">Consultez et gérez toutes les réservations</p>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th class="i18n-th-client">Client</th>
                                <th class="i18n-th-game">Jeu</th>
                                <th class="i18n-th-date">Date</th>
                                <th class="i18n-th-time">Heure</th>
                                <th class="i18n-th-players">Joueurs</th>
                                <th>Gameplay</th>
                                <th class="i18n-th-items">Objets</th>
                                <th class="i18n-th-status">Statut</th>
                                <th class="i18n-th-actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($reservations)):
                                foreach ($reservations as $r): ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($r['prenom'] . ' ' . $r['nom']) ?><br>
                                            <small class="text-muted"><?= htmlspecialchars($r['email']) ?></small>
                                        </td>
                                        <td>
                                            <span
                                                class="lang-fr"><?= htmlspecialchars($r['designation_fr'] ?? 'Aventure') ?></span>
                                            <span class="lang-en"
                                                style="display:none;"><?= htmlspecialchars($r['designation_en'] ?? 'Adventure') ?></span>
                                        </td>
                                        <td><?= date("d/m/Y", strtotime($r['date_choisie'])) ?></td>
                                        <td><?= date("H:i", strtotime($r['date_choisie'])) ?></td>
                                        <td><?= $r['nb_joueurs'] ?></td>

                                        <td>
                                            <?= empty($r['nom_gameplay']) ? '<span class="i18n-val-classic">Classique</span>' : htmlspecialchars($r['nom_gameplay']) ?>
                                        </td>
                                        <td>
                                            <?php if (empty($r['liste_objets_fr'])): ?>
                                                <span class="i18n-val-none">Aucun</span>
                                            <?php else: ?>
                                                <span class="lang-fr"><?= htmlspecialchars($r['liste_objets_fr']) ?></span>
                                                <span class="lang-en"
                                                    style="display:none;"><?= htmlspecialchars($r['liste_objets_en']) ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <?php
                                        $statut = $r['statut'] ?? 'En attente';
                                        $classStatut = ($statut == 'Confirmée') ? 'status-confirm' : 'status-pending';
                                        $i18nStatut = ($statut == 'Confirmée') ? 'i18n-status-confirmed' : 'i18n-status-pending';
                                        ?>
                                        <td class="<?= $classStatut ?>"><span
                                                class="<?= $i18nStatut ?>"><?= htmlspecialchars($statut) ?></span></td>
                                        <td class="actions-cell">
                                            <div class="actions-wrap">
                                            <?php if ($statut !== 'Confirmée'): ?>
                                                <a href="index.php?action=admin_confirm_res&id=<?= $r['id_reservation'] ?>"
                                                    class="action-btn text-green i18n-btn-confirm">Confirmer</a>
                                            <?php endif; ?>
                                            <a href="index.php?action=admin_delete_res&id=<?= $r['id_reservation'] ?>"
                                                class="action-btn text-red i18n-btn-cancel"
                                                onclick="return confirm('Êtes-vous sûr de vouloir annuler et supprimer cette réservation ?');">Annuler</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="9" style="text-align:center;" class="i18n-no-res">Aucune réservation
                                        trouvée.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ═══ ONGLET MESSAGES ═══ -->
        <div id="tab-messages" class="tab-pane">
            <div class="section-box">
                <div class="box-header">
                    <h2 class="i18n-msg-h2">Messages de Contact</h2>
                    <p class="i18n-msg-p">Consultez et gérez les messages envoyés par les visiteurs</p>
                </div>

                <?php if (!empty($messages)): ?>
                    <div class="messages-list">
                        <?php foreach ($messages as $msg): ?>
                            <div class="message-card <?= $msg['est_lu'] ? '' : 'message-non-lu' ?>">
                                <div class="message-header">
                                    <div class="message-auteur">
                                        <div class="message-avatar">
                                            <?= strtoupper(mb_substr($msg['prenom'], 0, 1)) . strtoupper(mb_substr($msg['nom'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <strong><?= htmlspecialchars($msg['prenom'] . ' ' . $msg['nom']) ?></strong>
                                            <span class="message-email"><?= htmlspecialchars($msg['email']) ?></span>
                                            <?php if (!empty($msg['numero'])): ?>
                                                <span class="message-tel"><?= htmlspecialchars($msg['numero']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="message-meta">
                                        <?php if (!$msg['est_lu']): ?>
                                            <span class="badge-non-lu">
                                                <span class="lang-fr">Nouveau</span>
                                                <span class="lang-en" style="display:none;">New</span>
                                            </span>
                                        <?php endif; ?>
                                        <span class="message-date"><?= date("d/m/Y à H:i", strtotime($msg['date_envoi'])) ?></span>
                                    </div>
                                </div>
                                <div class="message-body">
                                    <p><?= nl2br(htmlspecialchars($msg['message'])) ?></p>
                                </div>
                                <div class="message-actions">
                                    <?php if (!$msg['est_lu']): ?>
                                        <a href="index.php?action=admin_lu_message&id=<?= $msg['id_message'] ?>" class="action-btn text-green i18n-btn-markread">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                            Marquer comme lu
                                        </a>
                                    <?php endif; ?>
                                    <a href="mailto:<?= htmlspecialchars($msg['email']) ?>" class="action-btn text-blue">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="lang-fr">Répondre</span>
                                        <span class="lang-en" style="display:none;">Reply</span>
                                    </a>
                                    <a href="index.php?action=admin_delete_message&id=<?= $msg['id_message'] ?>" class="action-btn text-red i18n-btn-delete-msg"
                                       onclick="return confirm('Supprimer ce message ?');">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                        <span class="lang-fr">Supprimer</span>
                                        <span class="lang-en" style="display:none;">Delete</span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <p class="lang-fr">Aucun message pour le moment.</p>
                        <p class="lang-en" style="display:none;">No messages yet.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div id="tab-aventures" class="tab-pane">
            <div class="section-box mb-4">
                <div class="box-header">
                    <h2 class="i18n-adv-add-h2">Ajouter une aventure</h2>
                    <p class="i18n-adv-add-p">Créez une nouvelle mission pour vos joueurs</p>
                </div>
                <form action="index.php?action=admin_add_game" method="POST" class="form-admin">
                    <?php
                    $formAdmin = new Formulaire();
                    ?>
                    <div class="form-grid">
                        <?= $formAdmin->inputText('designation_fr', '', ['placeholder' => "Nom de l'aventure (FR)", 'required' => true]) ?>
                        <?= $formAdmin->inputText('categorie_fr', '', ['placeholder' => 'Catégorie (FR) (ex: Horreur, Enquête)', 'required' => true]) ?>
                        <?= $formAdmin->inputText('duree', '', ['placeholder' => 'Durée (ex: 2-3 heures)', 'required' => true]) ?>
                        <?= $formAdmin->inputText('joueurs', '', ['placeholder' => 'Joueurs (ex: 2-8 joueurs)', 'required' => true]) ?>

                        <?= $formAdmin->inputText('designation_en', '', ['placeholder' => "Nom de l'aventure (EN)", 'required' => true]) ?>
                        <?= $formAdmin->inputText('categorie_en', '', ['placeholder' => 'Catégorie (EN) (ex: Horror, Investigation)', 'required' => true]) ?>

                        <?= $formAdmin->inputNumber('prix', '', ['placeholder' => 'Prix unitaire (€)', 'step' => '0.01', 'required' => true]) ?>
                        <?= $formAdmin->inputNumber('difficulte', '', ['placeholder' => 'Difficulté (1 à 5)', 'required' => true]) ?>
                        <?= $formAdmin->inputText('image', '', ['placeholder' => 'Image (URL)', 'required' => true]) ?>
                    </div>

                    <div class="form-grid" style="margin-top: 15px;">
                        <?= $formAdmin->textarea('description_fr', '', ['placeholder' => "Description complète de l'aventure (FR)", 'rows' => 4, 'required' => true]) ?>
                        <?= $formAdmin->textarea('description_en', '', ['placeholder' => "Description complète de l'aventure (EN)", 'rows' => 4, 'required' => true]) ?>
                    </div>

                    <?= $formAdmin->submit('submit', "Créer l'aventure", ['class' => 'btn-submit i18n-adv-btn-create']) ?>
                </form>
            </div>

            <div class="section-box">
                <div class="box-header">
                    <h2 class="i18n-adv-cat-h2">Catalogue des Aventures</h2>
                </div>
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="i18n-th-name">Nom</th>
                                <th class="i18n-th-cat">Catégorie</th>
                                <th class="i18n-th-price">Prix</th>
                                <th class="i18n-th-actions">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($games)):
                                foreach ($games as $game): ?>
                                    <tr>
                                        <td><?= $game['Code'] ?></td>
                                        <td>
                                            <span class="lang-fr"><?= htmlspecialchars($game['designation_fr'] ?? '') ?></span>
                                            <span class="lang-en"
                                                style="display:none;"><?= htmlspecialchars($game['designation_en'] ?? '') ?></span>
                                        </td>
                                        <td>
                                            <span class="lang-fr"><?= htmlspecialchars($game['categorie_fr'] ?? '') ?></span>
                                            <span class="lang-en"
                                                style="display:none;"><?= htmlspecialchars($game['categorie_en'] ?? '') ?></span>
                                        </td>
                                        <td><?= $game['Prix'] ?> €</td>
                                        <td>
                                            <a href="index.php?action=admin_delete_game&id=<?= $game['Code'] ?>"
                                                class="action-btn text-red i18n-btn-delete"
                                                onclick="return confirm('Supprimer ce jeu ?');">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="tab-utilisateurs" class="tab-pane">
            <div class="section-box">
                <div class="box-header">
                    <h2 class="i18n-users-h2">Utilisateurs Inscrits</h2>
                    <p class="i18n-users-p">Gérez les comptes clients et administrateurs</p>
                </div>
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="i18n-th-fullname">Nom / Prénom</th>
                                <th>Email</th>
                                <th class="i18n-th-phone">Téléphone</th>
                                <th class="i18n-th-role">Rôle</th>
                                <th class="i18n-th-actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)):
                                foreach ($users as $u): ?>
                                    <tr>
                                        <td><?= $u['id_user'] ?></td>
                                        <td><?= htmlspecialchars($u['nom'] . ' ' . $u['prenom']) ?></td>
                                        <td><?= htmlspecialchars($u['email']) ?></td>
                                        <td><?= htmlspecialchars($u['numero'] ?? '-') ?></td>
                                        <td>
                                            <span class="role-badge <?= $u['id_role'] == 2 ? 'admin' : 'client' ?>">
                                                <span
                                                    class="<?= $u['id_role'] == 2 ? 'i18n-role-admin' : 'i18n-role-client' ?>">
                                                    <?= $u['id_role'] == 2 ? 'Admin' : 'Client' ?>
                                                </span>
                                            </span>
                                        </td>
                                        <td class="actions-cell">
                                            <div class="actions-wrap">
                                            <button type="button" class="action-btn text-blue btn-edit-user"
                                                data-id="<?= $u['id_user'] ?>"
                                                data-prenom="<?= htmlspecialchars($u['prenom'] ?? '') ?>"
                                                data-nom="<?= htmlspecialchars($u['nom'] ?? '') ?>"
                                                data-date_naissance="<?= htmlspecialchars($u['date_naissance'] ?? '') ?>"
                                                data-email="<?= htmlspecialchars($u['email'] ?? '') ?>"
                                                data-numero="<?= htmlspecialchars($u['numero'] ?? '') ?>"
                                                data-adresse="<?= htmlspecialchars($u['adresse'] ?? '') ?>"
                                                data-ville="<?= htmlspecialchars($u['ville'] ?? '') ?>"
                                                data-postal="<?= htmlspecialchars($u['postal'] ?? '') ?>"
                                                data-pays="<?= htmlspecialchars($u['pays'] ?? '') ?>"
                                                data-id_role="<?= $u['id_role'] ?>">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                                <span class="lang-fr">Éditer</span>
                                                <span class="lang-en" style="display:none;">Edit</span>
                                            </button>
                                            <?php if ($u['id_role'] != 2): ?>
                                                <a href="index.php?action=admin_delete_user&id=<?= $u['id_user'] ?>"
                                                    class="action-btn text-red i18n-btn-delete"
                                                    onclick="return confirm('Supprimer ce compte ?');">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    </svg>
                                                    <span class="lang-fr">Supprimer</span>
                                                    <span class="lang-en" style="display:none;">Delete</span>
                                                </a>
                                            <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ═══ MODALE D'ÉDITION UTILISATEUR ═══ -->
        <div id="modal-edit-user" class="modal-overlay" style="display:none;">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--rouge)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                        <span class="lang-fr">Modifier l'utilisateur</span>
                        <span class="lang-en" style="display:none;">Edit user</span>
                    </h2>
                    <button type="button" class="modal-close" id="modal-close-btn">&times;</button>
                </div>
                <form action="index.php?action=admin_edit_user" method="POST" class="form-admin" id="form-edit-user">
                    <input type="hidden" name="id_user" id="edit-id_user">
                    <div class="form-grid form-grid-2">
                        <div class="form-group">
                            <label for="edit-prenom" class="lang-fr">Prénom</label>
                            <label for="edit-prenom" class="lang-en" style="display:none;">First name</label>
                            <input type="text" name="prenom" id="edit-prenom" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-nom" class="lang-fr">Nom</label>
                            <label for="edit-nom" class="lang-en" style="display:none;">Last name</label>
                            <input type="text" name="nom" id="edit-nom" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" name="email" id="edit-email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-numero" class="lang-fr">Téléphone</label>
                            <label for="edit-numero" class="lang-en" style="display:none;">Phone</label>
                            <input type="text" name="numero" id="edit-numero">
                        </div>
                        <div class="form-group">
                            <label for="edit-date_naissance" class="lang-fr">Date de naissance</label>
                            <label for="edit-date_naissance" class="lang-en" style="display:none;">Birth date</label>
                            <input type="date" name="date_naissance" id="edit-date_naissance">
                        </div>
                        <div class="form-group">
                            <label for="edit-adresse" class="lang-fr">Adresse</label>
                            <label for="edit-adresse" class="lang-en" style="display:none;">Address</label>
                            <input type="text" name="adresse" id="edit-adresse">
                        </div>
                        <div class="form-group">
                            <label for="edit-ville" class="lang-fr">Ville</label>
                            <label for="edit-ville" class="lang-en" style="display:none;">City</label>
                            <input type="text" name="ville" id="edit-ville">
                        </div>
                        <div class="form-group">
                            <label for="edit-postal" class="lang-fr">Code postal</label>
                            <label for="edit-postal" class="lang-en" style="display:none;">Zip code</label>
                            <input type="text" name="postal" id="edit-postal">
                        </div>
                        <div class="form-group">
                            <label for="edit-pays" class="lang-fr">Pays</label>
                            <label for="edit-pays" class="lang-en" style="display:none;">Country</label>
                            <input type="text" name="pays" id="edit-pays">
                        </div>
                        <div class="form-group">
                            <label for="edit-id_role" class="lang-fr">Rôle</label>
                            <label for="edit-id_role" class="lang-en" style="display:none;">Role</label>
                            <select name="id_role" id="edit-id_role" required>
                                <option value="1">Client</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="form-group form-group-full">
                            <label for="edit-nouveau_mdp" class="lang-fr">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                            <label for="edit-nouveau_mdp" class="lang-en" style="display:none;">New password (leave empty to keep current)</label>
                            <div class="password-wrapper">
                                <input type="password" name="nouveau_mdp" id="edit-nouveau_mdp" placeholder="••••••••" autocomplete="new-password">
                                <button type="button" class="toggle-password" onclick="togglePasswordVisibility(this)" aria-label="Afficher le mot de passe">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-cancel" id="modal-cancel-btn">
                            <span class="lang-fr">Annuler</span>
                            <span class="lang-en" style="display:none;">Cancel</span>
                        </button>
                        <button type="submit" class="btn-submit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="lang-fr">Enregistrer</span>
                            <span class="lang-en" style="display:none;">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    // Fonction pour basculer la visibilité du mot de passe
    function togglePasswordVisibility(btn) {
        const input = btn.parentElement.querySelector('input');
        if (input.type === 'password') {
            input.type = 'text';
            btn.classList.add('active');
        } else {
            input.type = 'password';
            btn.classList.remove('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // ── Onglets ──
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                tabBtns.forEach(b => b.classList.remove('active'));
                tabPanes.forEach(p => p.classList.remove('active'));

                btn.classList.add('active');
                const targetId = btn.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });

        // ── Modale édition utilisateur ──
        const modal = document.getElementById('modal-edit-user');
        const closeBtn = document.getElementById('modal-close-btn');
        const cancelBtn = document.getElementById('modal-cancel-btn');
        const editBtns = document.querySelectorAll('.btn-edit-user');

        // Champs du formulaire modale
        const fields = ['id_user', 'prenom', 'nom', 'date_naissance', 'email', 'numero', 'adresse', 'ville', 'postal', 'pays', 'id_role'];

        function openModal(data) {
            fields.forEach(field => {
                const el = document.getElementById('edit-' + field);
                if (el) el.value = data[field] || '';
            });
            // Réinitialiser le champ mot de passe à chaque ouverture
            const mdpField = document.getElementById('edit-nouveau_mdp');
            if (mdpField) {
                mdpField.value = '';
                mdpField.type = 'password';
            }
            // Réinitialiser le bouton toggle
            const toggleBtn = document.querySelector('.toggle-password');
            if (toggleBtn) toggleBtn.classList.remove('active');

            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }

        editBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const data = {};
                fields.forEach(field => {
                    if (field === 'id_user') {
                        data[field] = btn.getAttribute('data-id');
                    } else {
                        data[field] = btn.getAttribute('data-' + field) || '';
                    }
                });
                openModal(data);
            });
        });

        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

        // Fermer en cliquant sur le fond
        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) closeModal();
            });
        }

        // Fermer avec Echap
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.style.display === 'flex') closeModal();
        });
    });
</script>