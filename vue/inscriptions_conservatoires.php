<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des inscriptions aux conservatoires</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-part">
									<i class="align-middle me-1 fas fa-fw fa-user-plus"></i>
									Ajouter un élève
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>NOM</th>
											<th>Prénom</th>
											<th>Adresse email</th>
											<th>Téléphone</th>
											<th>Adresse</th>
											<th>Conservatoire</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM inscrits_conservatoires ORDER BY id_ins DESC");
										while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['id_ins'] ?></td>
											<td><?= $donnees['nom'] ?></td>
											<td><?= $donnees['prenom'] ?></td>
											<td><?= $donnees['email'] ?></td>
											<td><?= $donnees['tel'] ?></td>
											<td><?= $donnees['adresse'] ?></td>
											<td><?= $donnees['conservatoire'] ?></td>
											<td class="table-action">
												<a class="btn btn-danger active fw-bold" href="inscriptions_conservatoires&id_ins=<?= $donnees['id_ins'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet élève ?'));">
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
						<div class="d-flex justify-content-center">
							<form method="post" action="">
								<button type="submit" name="delete" class="btn btn-danger fs-lg active" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les inscriptions ?'));">
									Supprimer toutes les inscriptions
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
<div class="modal fade" id="add-part" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter un élève</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nom', 'user-alt', 'NOM', 'text', 'nom') ?>
	        		<?= $forms->input('prenom', 'user-alt', 'Prénom', 'text', 'prenom') ?>
	        		<?= $forms->input('email', 'at', 'Adresse email', 'email', 'email') ?>
	        		<?= $forms->input('tel', 'phone-alt', 'Téléphone', 'text', 'tel') ?>
	        		<?= $forms->input('adresse', 'map-marker-alt', 'Adresse', 'text', 'adresse') ?>
					<div class="mb-3">
						<label for="conservatoire" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-calendar-alt"></i>
							Nom du conservatoire
						</label>
                        <select name="conservatoire" class="form-select form-control-lg fw-bold">
                            <?php $requete = $bdd->query("SELECT * FROM conservatoires ORDER BY nomconserv");
                            $lesConservatoires = $requete->fetchAll();
                            foreach ($lesConservatoires as $unConservatoire) { ?>
                            <option value="<?= $unConservatoire['nomconserv'] ?>"><?= $unConservatoire['nomconserv'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
