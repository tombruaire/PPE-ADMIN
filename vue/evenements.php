<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des évènements</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-event">
									<i class="align-middle me-1 fas fa-fw fa-calendar-plus"></i>
									Ajouter un évènement
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
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
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="evenements&edit=<?= $donnees['idevent'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="evenements&idevent=<?= $donnees['idevent'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet évènement ?'));">
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
	        	<h3 class="modal-title">Ajouter un évènement</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nomevent', 'pen', 'Nom de l\'évènement', 'text', 'nomevent') ?>
					<?= $forms->input('dateevent', 'calendar-alt', 'Date de l\'évènement', 'date', 'dateevent') ?>
					<?= $forms->input('heureevent', 'clock', 'Heure de l\'évènement', 'time', 'heureevent') ?>
					<?= $forms->input('lieuevent', 'map-marker-alt', 'Lieu de l\'évènement', 'text', 'lieuevent') ?>
					<?= $forms->input('prixplaceevent', 'euro-sign', 'Prix de la place', 'number', 'prixplaceevent') ?>
					<?= $forms->input('placestotal', 'users', 'Places totales', 'number', 'placestotal') ?>
                   	<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
