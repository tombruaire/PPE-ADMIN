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
                        <h2 class="float-left mb-0">Liste des écoles</h2>
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
										<th>Nom</th>
										<th>Adresse</th>
										<th>Élèves</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($ecoles as $ecole) { ?>
									<?php if (isset($_GET['edit'])) { ?>
									<tr>
										<form method="post" action="">
											<td><?= $ecole['idec']; ?></td>
											<?= $forms->edit('text', 'nomec', $ecole['nomec']); ?>
											<?= $forms->edit('text', 'adresseec', $ecole['adresseec']); ?>
											<?= $forms->edit('number', 'eleves', $ecole['eleves']); ?>
											<?= $forms->buttons(); ?>
										</form>
									</tr>
									<?php } else { ?>
									<tr>
										<td><?= $ecole['idec']; ?></td>
										<td><?= $ecole['nomec']; ?></td>
										<td><?= $ecole['adresseec']; ?></td>
										<td><?= $ecole['eleves']; ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="ecoles&edit=<?= $ecole['idec']; ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="ecoles&idec=<?= $ecole['idec']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette école ?'));">
                                                <i data-feather="x"></i>
                                            </a>
										</td>
									</tr>
									<?php } ?>
									<?php } ?>
								</tbody>
                            </table>
                        </div>
                    </div>
					<div class="d-flex justify-content-center">
						<form method="post" action="">
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer toute les écoles ?'));">
								Supprimer toutes les écoles
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
                <h4 class="modal-title">Ajouter une école</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nomec', 'Nom de l\'école', 'text', 'nomec') ?>
					<?= $forms->input('adresseec', 'Adresse de l\'école', 'text', 'adresseec') ?>
					<?= $forms->input('eleves', 'Nombre d\'élèves', 'number', 'eleves') ?>
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
