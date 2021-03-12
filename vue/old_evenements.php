<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Historique des évènements</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Event</th>
											<th>Nom</th>
											<th>Date</th>
											<th>Lieu</th>
											<th>Inscrits</th>
											<th>Prix</th>
											<th>Places T.</th>
											<th>Date modif</th>
											<th>Commande</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM old_events ORDER BY idold DESC");
										while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idold'] ?></td>
											<td><?= $donnees['idevent'] ?></td>
											<td><?= $donnees['nomevent'] ?></td>
											<td><?= $donnees['dateevent'] ?></td>
											<td><?= $donnees['lieuevent'] ?></td>
											<td><?= $donnees['nbievent'] ?></td>
											<td><?= $donnees['prixplaceevent'] ?></td>
											<td><?= $donnees['placestotal'] ?></td>
											<td><?= $donnees['date_histo'] ?></td>
											<td><?= $donnees['event_histo'] ?></td>
											<td class="table-action">
												<a class="btn btn-danger active fw-bold" href="old_evenements&idold=<?= $donnees['idold'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet historique ?'));">
													Supprimer
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
								<button type="submit" name="delete" class="btn btn-danger fs-lg active" onclick="return(confirm('Voulez-vous vraiment supprimer tout l\'historique ?'));">
									Supprimer tout l'historique
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
