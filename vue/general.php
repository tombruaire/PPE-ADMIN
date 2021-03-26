<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des compteurs</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Libelle</th>
											<th>Nombres</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM compteur ORDER BY idcompteur DESC");
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="4">Aucun compteur trouvé</td>
											</tr>
										<?php } else {
											while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idcompteur'] ?></td>
											<td><?= $donnees['libelle'] ?></td>
											<td><?= $donnees['nombre'] ?></td>
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
								<button type="submit" name="delete" class="btn btn-danger fs-lg active" onclick="return(confirm('Voulez-vous vraiment supprimer tout les compteurs ?'));">
									Supprimer tout les compteurs
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
