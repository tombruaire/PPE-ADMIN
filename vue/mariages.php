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
                        <h2 class="float-left mb-0">Liste des mariages</h2>
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
										<th>Habitant 1</th>
										<th>Habitant 2</th>
										<th>Date</th>
										<th>Heure</th>
										<th>Date divorce</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($mariages as $mariage) { ?>
									<tr>
										<td><?= $mariage['prenomhab1']; ?></td>
										<td><?= $mariage['prenomhab2']; ?></td>
										<td><?= $mariage['datem']; ?></td>
										<td><?= $mariage['heurem']; ?></td>
										<td><?= $mariage['datediv']; ?></td>
										<td>
											<a class="btn btn-danger font-weight-bolder" href="mariages&idhab1=<?= $mariage['idhab1']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce mariage ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tous les mariages ?'));">
								Supprimer tous les mariages
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
                <h4 class="modal-title">Ajouter un mariage</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<div class="form-group">
						<label for="prenomhab1" class="form-label">Le marie</label>
						<select name="prenomhab1" id="prenomhab1" class="form-control">
							<?php $requete = $bdd->query("SELECT * FROM habitants;");
							$lesHabitants = $requete->fetchAll();
							foreach ($lesHabitants as $unHabitant) { ?>
							<option value="<?= $unHabitant['idhab'] ?>"><?= $unHabitant['prenomhab'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="prenomhab2" class="form-label">La mariée</label>
						<select name="prenomhab2" id="prenomhab2" class="form-control">
							<?php $requete = $bdd->query("SELECT * FROM habitants;");
							$lesHabitants = $requete->fetchAll();
							foreach ($lesHabitants as $unHabitant) { ?>
							<option value="<?= $unHabitant['idhab'] ?>"><?= $unHabitant['prenomhab'] ?></option>
							<?php } ?>
						</select>
					</div>
					<?= $forms->input('datem', 'Date du mariage', 'date', 'datem') ?>
					<?= $forms->input('heurem', 'Heure du mariage', 'time', 'heurem') ?>
					<?= $forms->input('datediv', 'Date du divorce', 'date', 'datediv') ?>
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
