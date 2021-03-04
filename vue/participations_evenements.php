<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des participations aux évènements</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-part">
									<i class="align-middle me-1 fas fa-fw fa-user-plus"></i>
									Ajouter une participation
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
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
										$view = $bdd->query('SELECT * FROM participations ORDER BY idpart DESC');
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="4">Aucune participation trouvée dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
												<td><?= $donnees['idpart'] ?></td>
												<td>
													<input type="email" name="emailuser" autocomplete="off" value="<?= $donnees['emailuser'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="evenement" autocomplete="off" value="<?= $donnees['evenement'] ?>"  class="form-control">
												</td>
												<td>
													<button type="submit" name="modifier" class="btn btn-primary me-2" style="background-color: green; border-color: green;">
														<i class="align-middle" data-feather="check"></i>
													</button>
													<button type="submit" name="retour" class="btn btn-primary" style="background-color: red; border-color: red;">
														<i class="align-middle" data-feather="x"></i>
													</button>
												</td>
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
												<a class="btn btn-primary active fw-bold me-3" href="participations_evenements&edit=<?= $donnees['idpart'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="participations_evenements&idpart=<?= $donnees['idpart'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette participation ?'));">
													Supprimer
												</a>
											</td>
										</tr>
										<?php } ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?= Alerts::getFlash(); ?>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<!-- FORMULAIRE D'INSERTION -->
<div class="modal fade" id="add-part" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter une participation</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('emailuser', 'at', 'Adresse email', 'email', 'emailuser') ?>
					<div class="mb-3">
						<label for="evenement" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-calendar-alt"></i>
							Nom de l'évènement
						</label>
                        <select name="evenement" class="form-select form-control-lg fw-bold">
                            <?php $requete = $bdd->query("SELECT * FROM evenements ORDER BY nomevent");
                            $lesEvenements = $requete->fetchAll();
                            foreach ($lesEvenements as $unEvenement) { ?>
                            <option value="<?= $unEvenement['nomevent'] ?>"><?= $unEvenement['nomevent'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
