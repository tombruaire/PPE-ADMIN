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
                        <h2 class="float-left mb-0">Liste des associations</h2>
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
										<th>Siège</th>
										<th>Date de création</th>
										<th>Inscrits</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($associations as $association) { ?>
									<?php if (isset($_GET['edit'])) { ?>
									<tr>
										<form method="post" action="">
											<td><?= $association['idassoc']; ?></td>
											<?= $forms->edit('text', 'nomassoc', $association['nomassoc']); ?>
											<?= $forms->edit('text', 'siegeassoc', $association['siegeassoc']); ?>
											<?= $forms->edit('date', 'datecreationassoc', $association['datecreationassoc']); ?>
											<?= $forms->edit('number', 'inscrits', $association['inscrits']); ?>
											<?= $forms->buttons(); ?>
										</form>
									</tr>
									<?php } else { ?>
									<tr>
										<td><?= $association['idassoc']; ?></td>
										<td><?= $association['nomassoc']; ?></td>
										<td><?= $association['siegeassoc']; ?></td>
										<td><?= $association['datecreationassoc']; ?></td>
										<td><?= $association['inscrits']; ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="associations&edit=<?= $association['idassoc']; ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="associations&delete=<?= $association['idassoc']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette association ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les associations ?'));">
								Supprimer toutes les associations
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
                <h4 class="modal-title">Ajouter une association</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nomassoc', 'Nom de l\'association', 'text', 'nomassoc') ?>
	        		<?= $forms->input('siegeassoc', 'Siège de l\'association', 'text', 'siegeassoc') ?>
					<?= $forms->input('datecreationassoc', 'Date de création de l\'association', 'date', 'datecreationassoc') ?>
					<?= $forms->input('inscrits', 'Nombre d\'inscrits', 'number', 'inscrits') ?>
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
