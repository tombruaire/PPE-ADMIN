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
                        <h2 class="float-left mb-0">Liste des événements</h2>
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
										<th>Date</th>
										<th>Heure</th>
										<th>Lieu</th>
										<th>Nombre d'inscrits</th>
										<th>Prix de la place</th>
										<th>Places totales</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$view = $bdd->query("SELECT * FROM evenements ORDER BY idevent DESC");
									if ($view->rowCount() == 0) { ?>
										<tr>
											<td colspan="9">Aucun évènement trouvé dans la basse de données</td>
										</tr>
									<?php } elseif (isset($_GET['edit'])) { 
									while ($donnees = $view->fetch()) { ?>
										<tr>
											<form method="post" action="">
												<td><?= $donnees['idevent'] ?></td>
												<?= $forms->edit('text', 'nomevent', $donnees['nomevent']) ?>
												<?= $forms->edit('date', 'dateevent', $donnees['dateevent']) ?>
												<?= $forms->edit('text', 'heureevent', $donnees['heureevent']) ?>
												<?= $forms->edit('text', 'lieuevent', $donnees['lieuevent']) ?>
												<?= $forms->edit('number', 'nbievent', $donnees['nbievent']) ?>
												<?= $forms->edit('number', 'prixplaceevent', $donnees['prixplaceevent']) ?>
												<?= $forms->edit('number', 'placestotal', $donnees['placestotal']) ?>
												<?= $forms->buttons() ?>
											</form>
										</tr>
										<?php
										if (isset($_POST['modifier'])) {
											$idevent = $_GET['edit'];
											$nomevent = $_POST['nomevent'];
											$dateevent = $_POST['dateevent'];
											$heureevent = $_POST['heureevent'];
											$lieuevent = $_POST['lieuevent'];
											$nbievent = $_POST['nbievent'];
											$prixplaceevent = $_POST['prixplaceevent'];
                                            $placestotal = $_POST['placestotal'];
											$update = $bdd->prepare("UPDATE evenements SET nomevent = :nomevent, dateevent = :dateevent, heureevent = :heureevent, lieuevent = :lieuevent, nbievent = :nbievent, prixplaceevent = :prixplaceevent, placestotal = :placestotal WHERE idevent = '".$idevent."' ");
											$update->bindValue(':nomevent', $nomevent, PDO::PARAM_STR);
											$update->bindValue(':dateevent', $dateevent, PDO::PARAM_STR);
											$update->bindValue(':heureevent', $heureevent, PDO::PARAM_STR);
											$update->bindValue(':lieuevent', $lieuevent, PDO::PARAM_STR);
											$update->bindValue(':nbievent', $nbievent, PDO::PARAM_INT);
											$update->bindValue(':prixplaceevent', $prixplaceevent, PDO::PARAM_INT);
                                            $update->bindValue(':placestotal', $placestotal, PDO::PARAM_INT);
											$update->execute();
											header('Location: evenements');
										}
										?>
									<?php } ?>
									<?php } else {
										while ($donnees = $view->fetch()) {
									?>
									<tr>
										<td><?= $donnees['idevent'] ?></td>
										<td><?= $donnees['nomevent'] ?></td>
										<td><?= $donnees['dateevent'] ?></td>
										<td><?= $donnees['heureevent'] ?></td>
										<td><?= $donnees['lieuevent'] ?></td>
										<td><?= $donnees['nbievent'] ?></td>
										<td><?= $donnees['prixplaceevent'] ?></td>
										<td><?= $donnees['placestotal'] ?></td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="evenements&edit=<?= $donnees['idevent'] ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="evenements&idevent=<?= $donnees['idevent'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet évènement ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout les évènements ?'));">
								Supprimer tout les évènements
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
                <h4 class="modal-title">Ajouter un événement</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nomevent', 'Nom de l\'événement', 'text', 'nomevent') ?>
					<?= $forms->input('dateevent', 'Date de l\'événement', 'date', 'dateevent') ?>
					<?= $forms->input('heureevent', 'Heure de l\'événement', 'time', 'heureevent') ?>
					<?= $forms->input('lieuevent', 'Lieu de l\'événement', 'text', 'lieuevent') ?>
					<?= $forms->input('prixplaceevent', 'Prix de la place', 'number', 'prixplaceevent') ?>
					<?= $forms->input('placestotal', 'Places totales', 'number', 'placestotal') ?>
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
