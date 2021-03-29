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
                        <h2 class="float-left mb-0">Liste des participations aux événements</h2>
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
										<th>Email</th>
										<th>Nom de l'évènement</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                            	<tbody>
									<?php
									$view = $bdd->query("SELECT * FROM participations ORDER BY idpart DESC");
									if ($view->rowCount() == 0) { ?>
										<tr>
											<td colspan="4">Aucune participation trouvée dans la basse de données</td>
										</tr>
									<?php } elseif (isset($_GET['edit'])) { 
									while ($donnees = $view->fetch()) { ?>
										<tr>
											<form method="post" action="">
												<td><?= $donnees['idpart'] ?></td>
												<?= $forms->edit('email', 'emailuser', $donnees['emailuser']) ?>
												<?= $forms->edit('text', 'evenement', $donnees['evenement']) ?>
												<?= $forms->buttons() ?>
											</form>
										</tr>
										<?php
										if (isset($_POST['modifier'])) {
											$idpart = $_GET['edit'];
											$emailuser = $_POST['emailuser'];
											$evenement = $_POST['evenement'];
											$update = $bdd->prepare("
												UPDATE participations 
												SET emailuser = :emailuser, evenement = :evenement 
												WHERE idpart = '".$idpart."' 
												");
											$update->bindValue(':emailuser', $emailuser, PDO::PARAM_STR);
											$update->bindValue(':evenement', $evenement, PDO::PARAM_STR);
											$update->execute();
											header('Location: participations_evenements');
										}
										?>
									<?php } ?>
									<?php } else {
										while ($donnees = $view->fetch()) {
									?>
									<tr>
										<td><?= $donnees['idpart'] ?></td>
										<td><?= $donnees['emailuser'] ?></td>
										<td><?= $donnees['evenement'] ?></td>
										<td class="table-action">
											<a class="btn btn-primary font-weight-bolder mr-25" href="participations_evenements&edit=<?= $donnees['idpart'] ?>">
                                            	<i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="participations_evenements&idpart=<?= $donnees['idpart'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette participation ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les participations ?'));">
								Supprimer toutes les participations
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
                <h4 class="modal-title">Ajouter une participation</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
					<?= $forms->input('emailuser', 'Adresse email', 'email', 'emailuser') ?>
					<div class="form-group">
						<label for="evenement" class="form-label">Nom de l'événement</label>
                        <select name="evenement" class="form-control">
                            <?php $requete = $bdd->query("SELECT * FROM evenements ORDER BY nomevent");
                            $lesEvenements = $requete->fetchAll();
                            foreach ($lesEvenements as $unEvenement) { ?>
                            <option value="<?= $unEvenement['nomevent'] ?>"><?= $unEvenement['nomevent'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
