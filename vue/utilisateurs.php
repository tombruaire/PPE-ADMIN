<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__backInDown">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des utilisateurs</font>
				</h1>
				<div class="row">
					<div class="col-12 col-sm-6 col-xxl d-flex">
						<div class="card bg-primary flex-fill animate__animated animate__backInDown">
							<div class="card-body py-4">
								<div class="d-flex align-items-start">
									<div class="flex-grow-1">
										<?php $all_users = $bdd->query("SELECT * FROM utilisateurs");
										$nb_users = $all_users->rowCount(); ?>
										<h1 class="mb-2 display-6"><?= $nb_users ?></h1>
										<?php if ($nb_users <= 1) { ?>
										<p class="fs-lg text-dark fw-bold">Compte utilisateur</p>
										<?php } elseif ($nb_users > 1) { ?>
										<p class="fs-lg text-dark fw-bold">Comptes utilisateurs</p>
										<?php } ?>
									</div>
									<div class="d-inline-block ms-3">
										<div class="stat">
											<i class="align-middle text-success" data-feather="users"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-xxl d-flex">
						<div class="card flex-fill animate__animated animate__backInDown" style="background-color: #008000;">
							<div class="card-body py-4">
								<div class="d-flex align-items-start">
									<div class="flex-grow-1">
										<?php $user_confirmed = $bdd->query("SELECT * FROM utilisateurs WHERE confirme = 1");
										$confirmed = $user_confirmed->rowCount(); ?>
										<h1 class="mb-2 text-dark display-6"><?= $confirmed ?></h1>
										<?php if ($confirmed <= 1) { ?>
										<p class="fs-lg text-dark fw-bold">Compte utilisateur confirmé</p>
										<?php } elseif ($confirmed > 1) { ?>
										<p class="fs-lg text-dark fw-bold">Comptes utilisateurs confirmés</p>
										<?php } ?>
									</div>
									<div class="d-inline-block ms-3">
										<div class="stat">
											<i class="align-middle text-success" data-feather="user-check"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-xxl d-flex">
						<div class="card bg-danger flex-fill animate__animated animate__backInDown">
							<div class="card-body py-4">
								<div class="d-flex align-items-start">
									<div class="flex-grow-1">
										<?php $user_banned = $bdd->query("SELECT * FROM utilisateurs WHERE lvl = 0");
										$banned = $user_banned->rowCount(); ?>
										<h1 class="mb-2 text-dark display-6"><?= $banned ?></h1>
										<?php if ($banned <= 1) { ?>
										<p class="fs-lg text-dark fw-bold">Compte utilisateur banni</p>
										<?php } elseif ($banned > 1) { ?>
										<p class="fs-lg text-dark fw-bold">Comptes utilisateurs bannis</p>
										<?php } ?>
									</div>
									<div class="d-inline-block ms-3">
										<div class="stat">
											<i class="align-middle text-success" data-feather="user-minus"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__backInUp">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-user">
									<i class="align-middle me-1" data-feather="user-plus"></i>
									Ajouter un utilisateur
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>NOM</th>
											<th>Prénom</th>
											<th>Pseudo</th>
											<th>Adresse email</th>
											<th>Date d'inscription</th>
											<th>Heure d'inscription</th>
											<th>Confirmation</th>
											<th>Bannissements</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query('SELECT id, nom, prenom, pseudo, email, date_format(date_inscription, "%d/%m/%Y"), heure_inscription, confirme, lvl FROM utilisateurs ORDER BY id DESC');
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="10">Aucun utilisateur trouvé dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
												<td><?= $donnees['id'] ?></td>
												<td>
													<input type="text" name="nom" autocomplete="off" value="<?= $donnees['nom'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="prenom" autocomplete="off" value="<?= $donnees['prenom'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="pseudo" autocomplete="off" value="<?= $donnees['pseudo'] ?>" class="form-control">
												</td>
												<td>
													<input type="email" name="email" autocomplete="off" value="<?= $donnees['email'] ?>" class="form-control">
												</td>
												<td><?= $donnees['date_format(date_inscription, "%d/%m/%Y")'] ?></td>
												<td><?= $donnees['heure_inscription'] ?></td>
												<td>
													<?php if ($donnees['confirme'] == 0) { ?>
													<span class="badge bg-warning text-light fw-bold fs-5">En attente...</span>
													<?php } else { ?>
													<span class="badge fs-5" style="background-color: #008000;">Confirmé</span>
													<?php } ?>
												</td>
												<td class="table-action">
													<?php if ($donnees['lvl'] == 0) { ?>
													<a class="btn btn-primary active fw-bold disabled">
														Débannir
													</a>
													<?php } else { ?>
													<a class="btn btn-warning text-dark active fw-bold disabled">
														Bannir
													</a>
													<?php } ?>
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
												$id = $_GET['edit'];
												$nom = $_POST['nom'];
												$prenom = $_POST['prenom'];
												$pseudo = $_POST['pseudo'];
												$email = $_POST['email'];
												$update = $bdd->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email WHERE id = '".$id."'");
												$update->bindValue(':nom', $nom, PDO::PARAM_STR);
												$update->bindValue(':prenom', $prenom, PDO::PARAM_STR);
												$update->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
												$update->bindValue(':email', $email, PDO::PARAM_STR);
												$update->execute();
												header('Location: utilisateurs');
											}
											?>
										<?php } ?>
										<?php } else { 
											while ($donnees = $view->fetch()) { 
										?>
										<tr>
											<td><?= $donnees['id'] ?></td>
											<td><?= $donnees['nom'] ?></td>
											<td><?= $donnees['prenom'] ?></td>
											<td><?= $donnees['pseudo'] ?></td>
											<td><?= $donnees['email'] ?></td>
											<td><?= $donnees['date_format(date_inscription, "%d/%m/%Y")'] ?></td>
											<td><?= $donnees['heure_inscription'] ?></td>
											<td>
												<?php if ($donnees['confirme'] == 0) { ?>
												<span class="badge bg-warning text-light fw-bold fs-5">En attente...</span>
												<?php } else { ?>
												<span class="badge fs-5" style="background-color: #008000;">Confirmé</span>
												<?php } ?>
											</td>
											<td class="table-action">
												<?php if ($donnees['lvl'] == 0) { ?>
												<a class="btn btn-primary active fw-bold" href="utilisateurs&deban=<?= $donnees['id'] ?>" onclick="return(confirm('Voulez-vous vraiment bannir cet utilisateur ?'));">
													Débannir
												</a>
												<?php } else { ?>
												<a class="btn btn-warning text-dark active fw-bold" href="utilisateurs&ban=<?= $donnees['id'] ?>" onclick="return(confirm('Voulez-vous vraiment débannir cet utilisateur ?'));">
													Bannir
												</a>
												<?php } ?>
											</td>
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="utilisateurs&edit=<?= $donnees['id'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="utilisateurs&delete=<?= $donnees['id'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet utilisateur ?'));">
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
<div class="modal fade" id="add-user" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter un utilisateur</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nom', 'user-alt', 'NOM', 'text', 'nom') ?>
					<?= $forms->input('prenom', 'user-alt', 'Prénom', 'text', 'prenom') ?>
					<?= $forms->input('pseudo', 'at', 'Pseudo', 'text', 'pseudo') ?>
					<?= $forms->input('email', 'envelope', 'Adresse email', 'email', 'email') ?>
                    <?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
