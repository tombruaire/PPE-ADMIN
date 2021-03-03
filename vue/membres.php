<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__backInDown">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des membres</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__backInUp">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-deces">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter un membre
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>Associations</th>
											<th>Habitants</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query('SELECT * FROM viewMembres');
										while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['nomassoc'] ?></td>
											<td><?= $donnees['prenomhab'] ?></td>
											<td class="table-action">
												<a class="btn btn-danger active fw-bold" href="membres&idassoc=<?= $donnees['idassoc'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce membre ?'));">
													Supprimer
												</a>
											</td>
										</tr>
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
<div class="modal fade" id="add-deces" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter un membre</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
					<div class="mb-3">
						<label for="nomassoc" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-user-alt"></i>
							Nom de l'assocation
						</label>
						<select name="nomassoc" id="nomassoc" class="form-select">
							<?php $requete = $bdd->query("SELECT * FROM associations;");
							$lesAssociations = $requete->fetchAll();
							foreach ($lesAssociations as $uneAssociation) { ?>
							<option value="<?= $uneAssociation['idassoc'] ?>"><?= $uneAssociation['nomassoc'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="prenomhab" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-pen"></i>
							Prénom de l'habitant
						</label>
						<select name="prenomhab" id="prenomhab" class="form-select">
							<?php $requete = $bdd->query("SELECT * FROM habitants;");
							$lesHabitants = $requete->fetchAll();
							foreach ($lesHabitants as $unHabitant) { ?>
							<option value="<?= $unHabitant['idhab'] ?>"><?= $unHabitant['prenomhab'] ?></option>
							<?php } ?>
						</select>
					</div>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
