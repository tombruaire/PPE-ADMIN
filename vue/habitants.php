<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__fadeIn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des habitants</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-event">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter un habitant
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>NOM</th>
											<th>Prénom</th>
											<th>Sexe</th>
											<th>Date de naissance</th>
											<th>Adresse</th>
											<th>Profession</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM habitants ORDER BY idhab DESC");
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="9">Aucun habitants trouvé dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
												<td><?= $donnees['idhab'] ?></td>
												<td>
													<input type="text" name="nomhab" autocomplete="off" value="<?= $donnees['nomhab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="prenomhab" autocomplete="off" value="<?= $donnees['prenomhab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="sexehab" autocomplete="off" value="<?= $donnees['sexehab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="datenaisshab" autocomplete="off" value="<?= $donnees['datenaisshab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="adressehab" value="<?= $donnees['adressehab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="professionhab" value="<?= $donnees['professionhab'] ?>" class="form-control">
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
												$idhab = $_GET['edit'];
												$nomhab = $_POST['nomhab'];
												$prenomhab = $_POST['prenomhab'];
												$sexehab = $_POST['sexehab'];
												$datenaisshab = $_POST['datenaisshab'];
												$adressehab = $_POST['adressehab'];
												$professionhab = $_POST['professionhab'];
												$update = $bdd->prepare("UPDATE habitants SET nomhab = :nomhab, prenomhab = :prenomhab, sexehab = :sexehab, datenaisshab = :datenaisshab, adressehab = :adressehab, professionhab = :professionhab WHERE idhab = '".$idhab."' ");
												$update->bindValue(':nomhab', $nomhab, PDO::PARAM_STR);
												$update->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
												$update->bindValue(':sexehab', $sexehab, PDO::PARAM_STR);
												$update->bindValue(':datenaisshab', $datenaisshab, PDO::PARAM_STR);
												$update->bindValue(':adressehab', $adressehab, PDO::PARAM_STR);
												$update->bindValue(':professionhab', $professionhab, PDO::PARAM_STR);
												$update->execute();
												header('Location: habitants');
											}
											?>
										<?php } ?>
										<?php } else {
											while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idhab'] ?></td>
											<td><?= $donnees['nomhab'] ?></td>
											<td><?= $donnees['prenomhab'] ?></td>
											<td><?= $donnees['sexehab'] ?></td>
											<td><?= $donnees['datenaisshab'] ?></td>
											<td><?= $donnees['adressehab'] ?></td>
											<td><?= $donnees['professionhab'] ?></td>
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="habitants&edit=<?= $donnees['idhab'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="habitants&idhab=<?= $donnees['idhab'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet habitant ?'));">
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
	        	<h3 class="modal-title">Ajouter un habitant</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nomhab', 'user-alt', 'Nom de l\'habitant', 'text', 'nomhab') ?>
	        		<?= $forms->input('prenomhab', 'user-alt', 'Prénom de l\'habitant', 'text', 'prenomhab') ?>
	        		<?= $helpers->select('sexehab', 'venus-mars', 'Sexe de l\'habitant', 'sexehab', array('Feminin'=>'Féminin', 'Masculin'=>'Masculin')) ?>
					<?= $forms->input('datepicker', 'birthday-cake', 'Date de naissance de l\'habitant', 'text', 'datenaisshab') ?>
					<?= $forms->input('adressehab', 'map-marker-alt', 'Adresse de l\'habitant', 'text', 'adressehab') ?>
					<?= $forms->input('professionhab', 'user-tie', 'Profession de l\'habitant', 'text', 'professionhab') ?>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
