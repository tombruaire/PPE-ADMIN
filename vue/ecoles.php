<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des écoles</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-event">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter une école
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom</th>
											<th>Adresse</th>
											<td>Élèves</td>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM ecoles ORDER BY idec DESC");
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="5">Aucune école trouvée dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
													<td><?= $donnees['idec'] ?></td>
													<?= $forms->edit('text', 'nomec', $donnees['nomec']) ?>
													<?= $forms->edit('text', 'adresseec', $donnees['adresseec']) ?>
													<?= $forms->edit('number', 'eleves', $donnees['eleves']) ?>
													<?= $forms->buttons() ?>
												</form>
											</tr>
											<?php
											if (isset($_POST['modifier'])) {
												$idec = $_GET['edit'];
												$nomec = $_POST['nomec'];
												$adresseec = $_POST['adresseec'];
												$eleves = $_POST['eleves'];
												$update = $bdd->prepare("UPDATE ecoles SET nomec = :nomec, adresseec = :adresseec, eleves = :eleves WHERE idec = '".$idec."'");
												$update->bindValue(':nomec', $nomec, PDO::PARAM_STR);
												$update->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
												$update->bindValue(':eleves', $eleves, PDO::PARAM_INT);
												$update->execute();
												header('Location: ecoles');
											}
											?>
										<?php } ?>
										<?php } else {
											while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idec'] ?></td>
											<td><?= $donnees['nomec'] ?></td>
											<td><?= $donnees['adresseec'] ?></td>
											<td><?= $donnees['eleves'] ?></td>
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="ecoles&edit=<?= $donnees['idec'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="ecoles&idec=<?= $donnees['idec'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette école ?'));">
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
<div class="modal fade" id="add-event" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter une école</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nomec', 'pen', 'Nom de l\'école', 'text', 'nomec') ?>
					<?= $forms->input('adresseec', 'map-marker-alt', 'Adresse de l\'école', 'text', 'adresseec') ?>
					<?= $forms->input('eleves', 'users', 'Nombre d\'élèves', 'number', 'eleves') ?>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
