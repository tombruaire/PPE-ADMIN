<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Villiers-sur-Marne | Administration</title>
    <link rel="icon" type="image/png" href="assets/img/villiers.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/page-auth.css">
</head>
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

<?php if (isset($_SESSION['mail'])) { ?>
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0)">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar">
                        <img class="round" src="assets/img/admin.png" class="img-fluid" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="profil">
                        <i class="mr-50" data-feather="user"></i> Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="deconnexion">
                        <i class="mr-50" data-feather="power"></i> Déconnexion
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>

<?php if (isset($_SESSION['mail'])) { ?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="javascript:void(0)">
                    <h2 class="brand-text text-light">Villiers-sur-Marne</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <?= $helpers->header('Introduction') ?>
            <?= $helpers->lien('accueil', 'home', 'Accueil') ?>
            <?= $helpers->header('Gestions') ?>
            <?= $helpers->lien('general', 'server', 'Compteurs') ?>
            <?= $helpers->lien('utilisateurs', 'server', 'Utilisateurs') ?>
            <?= $helpers->lien('evenements', 'server', 'Événements') ?>
            <?= $helpers->lien('participations_evenements', 'server', 'Participations E.') ?>
            <?= $helpers->lien('old_evenements', 'server', 'Historiques E.') ?>
            <?= $helpers->lien('habitants', 'server', 'Habitants') ?>
            <?= $helpers->lien('conservatoires','server', 'Conservatoires') ?>
            <?= $helpers->lien('inscriptions_conservatoires', 'server', 'Inscriptions C.') ?>
            <?= $helpers->lien('associations', 'server', 'Associations') ?>
            <?= $helpers->lien('inscriptions_associations', 'server', 'Inscriptions A.') ?>
            <?= $helpers->lien('ecoles', 'server', 'Écoles') ?>
            <?= $helpers->lien('inscriptions_ecoles', 'server', 'Inscriptions E.') ?>
            <?= $helpers->lien('enfants', 'server', 'Enfants') ?>
            <?= $helpers->lien('deces', 'server', 'Décés') ?>
            <?= $helpers->lien('mariages', 'server', 'Mariages') ?>
        </ul>
    </div>
</div>
<?php } ?>

<?= $content; ?>

<script src="assets/js/vendors.min.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/app-menu.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/form-select2.js"></script>
<script src="assets/js/page-auth-login.js"></script>
<script src="assets/js/active.js"></script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

</body>
</html>