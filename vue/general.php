<?php auth(1); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="float-left mb-0">Liste des compteurs</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libelle</th>
                                        <th>Nombres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $view = $bdd->query("SELECT * FROM compteur ORDER BY idcompteur DESC");
                                    if ($view->rowCount() == 0) { ?>
                                        <tr>
                                            <td colspan="3">Aucun compteur trouvé</td>
                                        </tr>
                                    <?php } else {
                                        while ($donnees = $view->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?= $donnees['idcompteur'] ?></td>
                                        <td><?= $donnees['libelle'] ?></td>
                                        <td><?= $donnees['nombre'] ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form method="post" action="">
                            <button type="submit" name="delete" class="btn btn-danger fs-lg active" onclick="return(confirm('Voulez-vous vraiment supprimer tout les compteurs ?'));">
                                Supprimer tout les compteurs
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
