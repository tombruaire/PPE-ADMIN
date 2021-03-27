<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des associations</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-assoc">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter une association
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
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
										<?php
										$view = $bdd->query("SELECT * FROM associations ORDER BY idassoc DESC");
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="6">Aucune association trouvée dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
													<td><?= $donnees['idassoc'] ?></td>
													<?= $forms->edit('text', 'nomassoc', $donnees['nomassoc']) ?>
													<?= $forms->edit('text', 'siegeassoc', $donnees['siegeassoc']) ?>
													<?= $forms->edit('date', 'datecreationassoc', $donnees['datecreationassoc']) ?>
													<?= $forms->edit('number', 'inscrits', $donnees['inscrits']) ?>
													<?= $forms->buttons() ?>
												</form>
											</tr>
											<?php
											if (isset($_POST['modifier'])) {
												$idassoc = $_GET['edit'];
												$nomassoc = $_POST['nomassoc'];
												$siegeassoc = $_POST['siegeassoc'];
												$datecreationassoc = $_POST['datecreationassoc'];
												$inscrits = $_POST['inscrits'];
												$update = $bdd->prepare("UPDATE associations SET nomassoc = :nomassoc, siegeassoc = :siegeassoc, datecreationassoc = :datecreationassoc, inscrits = :inscrits WHERE idassoc = '".$idassoc."' ");
												$update->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
												$update->bindValue(':siegeassoc', $siegeassoc, PDO::PARAM_STR);
												$update->bindValue(':datecreationassoc', $datecreationassoc, PDO::PARAM_STR);
												$update->bindValue(':inscrits', $inscrits, PDO::PARAM_INT);
												$update->execute();
												header('Location: associations');
											}
											?>
										<?php } ?>
										<?php } else {
											while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idassoc'] ?></td>
											<td><?= $donnees['nomassoc'] ?></td>
											<td><?= $donnees['siegeassoc'] ?></td>
											<td><?= $donnees['datecreationassoc'] ?></td>
											<td><?= $donnees['inscrits'] ?></td>
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="associations&edit=<?= $donnees['idassoc'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="associations&delete=<?= $donnees['idassoc'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette association ?'));">
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
						<div class="d-flex justify-content-center">
							<form method="post" action="">
								<button type="submit" name="delete" class="btn btn-danger fs-lg active" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les associations ?'));">
									Supprimer toutes les associations
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<!-- FORMULAIRE D'INSERTION -->
<div class="modal fade" id="add-assoc" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter une association</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nomassoc', 'pen', 'Nom de l\'association', 'text', 'nomassoc') ?>
	        		<?= $forms->input('siegeassoc', 'map-marker-alt', 'Siège de l\'association', 'text', 'siegeassoc') ?>
					<?= $forms->input('datecreationassoc', 'calendar', 'Date de création de l\'association', 'date', 'datecreationassoc') ?>
					<?= $forms->input('inscrits', 'users', 'Nombre d\'inscrits', 'number', 'inscrits') ?>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
