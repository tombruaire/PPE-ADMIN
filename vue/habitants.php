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
                        <h2 class="float-left mb-0">Liste des habitants</h2>
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
										<th>Sexe</th>
										<th>Date de naissance</th>
										<th>Adresse</th>
										<th>Profession</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($habitants as $habitant) { ?>
									<?php if (isset($_GET['edit'])) { ?>
									<tr>
										<form method="post" action="">
											<td><?= $habitant['idhab']; ?></td>
											<?= $forms->edit('text', 'nomhab', $habitant['nomhab']); ?>
											<?= $forms->edit('text', 'prenomhab', $habitant['prenomhab']); ?>
											<?= $forms->edit('text', 'sexehab', $habitant['sexehab']); ?>
											<?= $forms->edit('date', 'datenaisshab', $habitant['datenaisshab']); ?>
											<?= $forms->edit('text', 'adressehab', $habitant['adressehab']); ?>
											<?= $forms->edit('text', 'professionhab', $habitant['professionhab']); ?>
											<?= $forms->buttons(); ?>
										</form>
									</tr>
									<?php } else { ?>
									<tr>
										<td><?= $habitant['idhab']; ?></td>
										<td><?= $habitant['nomhab']; ?></td>
										<td><?= $habitant['prenomhab']; ?></td>
										<td><?= $habitant['sexehab']; ?></td>
										<td><?= $habitant['datenaisshab']; ?></td>
										<td><?= $habitant['adressehab']; ?></td>
										<td><?= $habitant['professionhab']; ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="habitants&edit=<?= $habitant['idhab']; ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="habitants&idhab=<?= $habitant['idhab']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet habitant ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout les habitants ?'));">
								Supprimer tout les habitants
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
                <h4 class="modal-title">Ajouter un habitant</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nomhab', 'Nom de l\'habitant', 'text', 'nomhab') ?>
	        		<?= $forms->input('prenomhab', 'Prénom de l\'habitant', 'text', 'prenomhab') ?>
	        		<?= $helpers->select('sexehab', 'Sexe de l\'habitant', 'sexehab', array('Feminin'=>'Féminin', 'Masculin'=>'Masculin')) ?>
					<?= $forms->input('datenaisshab', 'Date de naissance de l\'habitant', 'date', 'datenaisshab') ?>
					<?= $forms->input('adressehab', 'Adresse de l\'habitant', 'text', 'adressehab') ?>
					<?= $forms->input('professionhab', 'Profession de l\'habitant', 'text', 'professionhab') ?>
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
