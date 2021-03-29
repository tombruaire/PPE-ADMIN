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
                        <h2 class="float-left mb-0">Liste des conservatoires</h2>
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
										<th>Téléphone</th>
										<th>Éffectifs</th>
										<th>Création</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$view = $bdd->query("SELECT * FROM conservatoires ORDER BY idconserv DESC");
									if ($view->rowCount() == 0) { ?>
										<tr>
											<td colspan="8">Aucun évènement trouvé dans la basse de données</td>
										</tr>
									<?php } elseif (isset($_GET['edit'])) { 
									while ($donnees = $view->fetch()) { ?>
										<tr>
											<form method="post" action="">
												<td><?= $donnees['idconserv'] ?></td>
												<?= $forms->edit('text', 'nomconserv', $donnees['nomconserv']) ?>
												<?= $forms->edit('text', 'adresseconserv', $donnees['adresseconserv']) ?>
												<?= $forms->edit('text', 'telephone', $donnees['telephone']) ?>
												<?= $forms->edit('number', 'effectifs', $donnees['effectifs']) ?>
												<?= $forms->edit('date', 'datecreationconserv', $donnees['datecreationconserv']) ?>
												<?= $forms->buttons() ?>
											</form>
										</tr>
										<?php
										if (isset($_POST['modifier'])) {
											$idconserv = $_GET['edit'];
											$nomconserv = $_POST['nomconserv'];
											$adresseconserv = $_POST['adresseconserv'];
											$telephone = $_POST['telephone'];
											$effectifs = $_POST['effectifs'];
											$datecreationconserv = $_POST['datecreationconserv'];
											$update = $bdd->prepare("UPDATE conservatoires SET nomconserv = :nomconserv, adresseconserv = :adresseconserv, telephone = :telephone, effectifs = :effectifs, datecreationconserv = :datecreationconserv WHERE idconserv = '".$idconserv."' ");
											$update->bindValue(':nomconserv', $nomconserv, PDO::PARAM_STR);
											$update->bindValue(':adresseconserv', $adresseconserv, PDO::PARAM_STR);
											$update->bindValue(':telephone', $telephone, PDO::PARAM_STR);
											$update->bindValue(':effectifs', $effectifs, PDO::PARAM_INT);
											$update->bindValue(':datecreationconserv', $datecreationconserv, PDO::PARAM_STR);
											$update->execute();
											header('Location: conservatoires');
										}
										?>
									<?php } ?>
									<?php } else {
										while ($donnees = $view->fetch()) {
									?>
									<tr>
										<td><?= $donnees['idconserv'] ?></td>
										<td><?= $donnees['nomconserv'] ?></td>
										<td><?= $donnees['adresseconserv'] ?></td>
										<td><?= $donnees['telephone'] ?></td>
										<td><?= $donnees['effectifs'] ?></td>
										<td><?= $donnees['datecreationconserv'] ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="conservatoires&edit=<?= $donnees['idconserv'] ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="conservatoires&idconserv=<?= $donnees['idconserv'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce conservatoire ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout les conservatoires ?'));">
								Supprimer tout les conservatoires
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
                <h4 class="modal-title">Ajouter un conservatoire</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nom', 'Nom du conservatoire', 'text', 'nomconserv') ?>
	        		<?= $forms->input('adresse', 'Adresse du conservatoire', 'text', 'adresseconserv') ?>
	        		<?= $forms->input('tel', 'Numéro de téléphone', 'text', 'telephone') ?>
	        		<?= $forms->input('effectif', 'Effectifs', 'number', 'effectifs') ?>
	        		<?= $forms->input('datecreationconserv', 'Date de création', 'date', 'datecreationconserv') ?>
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
