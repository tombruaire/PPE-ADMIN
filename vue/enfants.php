<?php auth(1); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<?= Alerts::getFlash(); ?>
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="float-left mb-0">Liste des enfants</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn-icon btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#add">
                            <i data-feather="plus"></i>
                        </button>
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
										<th>NOM</th>
										<th>Prénom</th>
										<th>Date de naissance</th>
										<th>Sexe</th>
										<th>Classe d'age</th>
										<th>Tuteur</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach ($enfants as $enfant) { ?>
									<tr>
										<td><?= $enfant['idenf']; ?></td>
										<td><?= $enfant['nomenf']; ?></td>
										<td><?= $enfant['prenomenf']; ?></td>
										<td><?= $enfant['datenaissenf']; ?></td>
										<td><?= $enfant['sexenf']; ?></td>
										<td><?= $enfant['classedage']; ?></td>
										<td><?= $enfant['tuteur']; ?></td>
										<td>
											<a class="btn btn-danger font-weight-bolder" href="enfants&idenf=<?= $enfant['idenf']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet enfant ?'));">
                                                <i data-feather="x"></i>
                                            </a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
                            </table>
                        </div>
                    </div>
					<div class="d-flex justify-content-center">
						<form method="post" action="">
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout les enfants ?'));">
								Supprimer tout les enfants
							</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un enfant</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nomenf', 'Nom de l\'enfant', 'text', 'nomenf') ?>
					<?= $forms->input('prenomenf', 'Prénom de l\'enfant', 'text', 'prenomenf') ?>
					<?= $forms->input('datenaissenf', 'Date de naissance de l\'enfant', 'date', 'datenaissenf') ?>
					<?= $helpers->select('sexenf', 'Sexe de l\'enfant', 'sexenf', array('Fille'=>'Filles', 'Garcon'=>'Garçon')) ?>
					<?= $forms->input('classedage', 'Classe d\'âge de l\'enfant', 'text', 'classedage') ?>
					<?= $forms->input('tuteur', 'Tuteur', 'text', 'tuteur') ?>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
