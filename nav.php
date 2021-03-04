<!DOCTYPE html>
<html>

<head>
    <title>mairievilliers - Administration</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="css/fonts.googleapis.css">
    <link rel="stylesheet" type="text/css" href="css/mariev-userstyle.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body data-sidebar-position="left" data-sidebar-behavior="sticky">

    <div class="wrapper">
        <?php if (isset($_SESSION['mail'])) { ?>
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="http://localhost/PPE-ADMIN/">
                    <img src="img/logo.png" class="img-fluid" width="70">
                </a>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Menu de navigation</li>
                    <?= $helpers->lien('accueil', 'Accueil') ?>
                    <?= $helpers->lien('general', 'Compteurs') ?>
                    <?= $helpers->lien('utilisateurs', 'Utilisateurs') ?>
                    <?= $helpers->lien('evenements', 'Évènements') ?>
                    <?= $helpers->lien('participations', 'Participations') ?>
                    <?= $helpers->lien('habitants', 'Habitants') ?>
                    <?= $helpers->lien('conservatoires', 'Conservatoires') ?>
                    <?= $helpers->lien('associations', 'Associations') ?>
                    <?= $helpers->lien('ecoles', 'Écoles') ?>
                    <?= $helpers->lien('enfants', 'Enfants') ?>
                    <?= $helpers->lien('deces', 'Décès') ?>
                    <?= $helpers->lien('membres', 'Membres <i>(Associations)</i>') ?>
                    <?= $helpers->lien('inscrits', 'Inscriptions') ?>
                    <?= $helpers->lien('mariages', 'Mariages') ?>
                    <?= $helpers->lien('sources', 'Sources') ?>
                </ul>
                <div class="sidebar-cta">
                    <div class="sidebar-cta-content">
                        <div class="d-grid">
                            <a class="btn btn-lg btn-danger active animate__animated animate__pulse" href="deconnexion">
                                <span class="align-middle">Se déconnecter</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php } ?>

        <div class="main">
            <?php if (isset($_SESSION['mail'])) { ?>
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            </nav>
            <?php } ?>
            <?= $content; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/app.js"></script>
    <script src="js/grid.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/datepicker.js"></script>
    <script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker();
        $("#datepicker2").datepicker();
    });
    </script>
    <script src="js/datepicker.js"></script>

</body>

</html>