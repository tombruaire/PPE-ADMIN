<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center animate__animated animate__backInDown">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des enfants</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card animate__animated animate__backInUp">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-child">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter un enfant
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>NOM</th>
											<th>Prénom</th>
											<th>Date de naissance</th>
											<th>Sexe</th>
											<th>Classe d'age</th>
											<th>Tuteur</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query('SELECT * FROM enfants ORDER BY idenf DESC');
										while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idenf'] ?></td>
											<td><?= $donnees['nomenf'] ?></td>
											<td><?= $donnees['prenomenf'] ?></td>
											<td><?= $donnees['datenaissenf'] ?></td>
											<td><?= $donnees['sexenf'] ?></td>
											<td><?= $donnees['classedage'] ?></td>
											<td><?= $donnees['tuteur'] ?></td>
											<td class="table-action">
												<a class="btn btn-danger active fw-bold" href="enfants&idenf=<?= $donnees['idenf'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet enfant ?'));">
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
<div class="modal fade" id="add-child" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter un enfant</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
	        		<?= $forms->input('nomenf', 'user-alt', 'Nom de l\'enfant', 'text', 'nomenf') ?>
					<?= $forms->input('prenomenf', 'user-alt', 'Prénom de l\'enfant', 'text', 'prenomenf') ?>
					<?= $forms->input('datepicker', 'birthday-cake', 'Date de naissance de l\'enfant', 'text', 'datenaissenf') ?>
					<?= $helpers->select('sexenf', 'venus-mars', 'Sexe de l\'enfant', 'sexenf', array('Fille'=>'Filles', 'Garcon'=>'Garçon')) ?>
					<?= $forms->input('classedage', 'user-check', 'Classe d\'âge de l\'enfant', 'text', 'classedage') ?>
					<?= $forms->input('tuteur', 'user-tie', 'Tuteur', 'text', 'tuteur') ?>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>
