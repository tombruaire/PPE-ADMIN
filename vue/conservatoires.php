<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__backInDown">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des conservatoires</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__backInUp">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-conserv">
									<i class="align-middle me-1 fas fa-fw fas fa-building"></i>
									Ajouter un conservatoire
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
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
										$view = $bdd->query('SELECT * FROM conservatoires ORDER BY idconserv DESC');
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
												<?= $forms->edit('text', 'datecreationconserv', $donnees['datecreationconserv']) ?>
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
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="conservatoires&edit=<?= $donnees['idconserv'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="conservatoires&idconserv=<?= $donnees['idconserv'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce conservatoire ?'));">
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
<div class="modal fade" id="add-conserv" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter un conservatoire</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nom', 'pen', 'Nom du conservatoire', 'text', 'nomconserv') ?>
	        		<?= $forms->input('adresse', 'map-marker-alt', 'Adresse du conservatoire', 'text', 'adresseconserv') ?>
	        		<?= $forms->input('tel', 'phone-alt', 'Numéro de téléphone', 'text', 'telephone') ?>
	        		<?= $forms->input('effectif', 'users', 'Effectifs', 'number', 'effectifs') ?>
	        		<?= $forms->input('datepicker', 'calendar-alt', 'Date de création', 'text', 'datecreationconserv') ?>
                    <?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
