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
									<?php
									$view = $bdd->query("SELECT * FROM habitants ORDER BY idhab DESC");
									if ($view->rowCount() == 0) { ?>
										<tr>
											<td colspan="9">Aucun habitants trouvé dans la basse de données</td>
										</tr>
									<?php } elseif (isset($_GET['edit'])) { 
									while ($donnees = $view->fetch()) { ?>
										<tr>
											<form method="post" action="">
												<td><?= $donnees['idhab'] ?></td>
												<?= $forms->edit('text', 'nomhab', $donnees['nomhab']) ?>
												<?= $forms->edit('text', 'prenomhab', $donnees['prenomhab']) ?>
												<?= $forms->edit('text', 'sexehab', $donnees['sexehab']) ?>
												<?= $forms->edit('date', 'datenaisshab', $donnees['datenaisshab']) ?>
												<?= $forms->edit('text', 'adressehab', $donnees['adressehab']) ?>
												<?= $forms->edit('text', 'professionhab', $donnees['professionhab']) ?>
												<?= $forms->buttons() ?>
											</form>
										</tr>
										<?php
										if (isset($_POST['modifier'])) {
											$idhab = $_GET['edit'];
											$nomhab = $_POST['nomhab'];
											$prenomhab = $_POST['prenomhab'];
											$sexehab = $_POST['sexehab'];
											$datenaisshab = $_POST['datenaisshab'];
											$adressehab = $_POST['adressehab'];
											$professionhab = $_POST['professionhab'];
											$update = $bdd->prepare("UPDATE habitants SET nomhab = :nomhab, prenomhab = :prenomhab, sexehab = :sexehab, datenaisshab = :datenaisshab, adressehab = :adressehab, professionhab = :professionhab WHERE idhab = '".$idhab."' ");
											$update->bindValue(':nomhab', $nomhab, PDO::PARAM_STR);
											$update->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
											$update->bindValue(':sexehab', $sexehab, PDO::PARAM_STR);
											$update->bindValue(':datenaisshab', $datenaisshab, PDO::PARAM_STR);
											$update->bindValue(':adressehab', $adressehab, PDO::PARAM_STR);
											$update->bindValue(':professionhab', $professionhab, PDO::PARAM_STR);
											$update->execute();
											header('Location: habitants');
										}
										?>
									<?php } ?>
									<?php } else {
										while ($donnees = $view->fetch()) {
									?>
									<tr>
										<td><?= $donnees['idhab'] ?></td>
										<td><?= $donnees['nomhab'] ?></td>
										<td><?= $donnees['prenomhab'] ?></td>
										<td><?= $donnees['sexehab'] ?></td>
										<td><?= $donnees['datenaisshab'] ?></td>
										<td><?= $donnees['adressehab'] ?></td>
										<td><?= $donnees['professionhab'] ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="habitants&edit=<?= $donnees['idhab'] ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="habitants&idhab=<?= $donnees['idhab'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet habitant ?'));">
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
