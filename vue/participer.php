<?php auth(1); ?>
<div class="wrapper">
	<div class="main">
		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h2 mb-3 text-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-table me-1" viewBox="0 0 16 16">
  						<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
					</svg>
					<font class="align-middle">Liste des participations</font>
				</h1>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<a class="btn btn-success active fw-bold" data-bs-toggle="modal" href="#add-deces">
									<i class="align-middle me-1 fas fa-fw fa-plus"></i>
									Ajouter une participation
								</a>
							</div>
							<div class="card-body">
								<table id="datatables-reponsive" class="table text-center table-striped" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Habitant</th>
											<th>Évènement</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$view = $bdd->query("SELECT * FROM viewParticipation ORDER BY idhab DESC");
										if ($view->rowCount() == 0) { ?>
											<tr>
												<td colspan="3">Aucune participation trouvée dans la basse de données</td>
											</tr>
										<?php } elseif (isset($_GET['edit'])) { 
										while ($donnees = $view->fetch()) { ?>
											<tr>
												<form method="post" action="">
												<td><?= $donnees['idhab'] ?></td>
												<td>
													<input type="text" name="prenomhab" autocomplete="off" value="<?= $donnees['prenomhab'] ?>" class="form-control">
												</td>
												<td>
													<input type="text" name="nomevent" autocomplete="off" value="<?= $donnees['nomevent'] ?>"  class="form-control">
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
											if (isset($_POST['modifier'])) { // Ne fonctionne pas
												$idhab = $_GET['edit'];
												$prenomhab = htmlspecialchars($_POST['prenomhab']);
												$nomevent = htmlspecialchars($_POST['nomevent']);
												$update = $bdd->prepare("UPDATE participer SET prenomhab = :prenomhab, nomevent = :nomevent WHERE '".$idhab."'");
												$update->bindValue(':prenomhab', $newdated, PDO::PARAM_STR);
												$update->bindValue(':nomevent', $newmotifd, PDO::PARAM_STR);
												$update->execute();
												header('Location: participer');
											}
											?>
										<?php } ?>
										<?php } else {
											while ($donnees = $view->fetch()) {
										?>
										<tr>
											<td><?= $donnees['idhab'] ?></td>
											<td><?= $donnees['prenomhab'] ?></td>
											<td><?= $donnees['nomevent'] ?></td>
											<td class="table-action">
												<a class="btn btn-primary active fw-bold me-3" href="participer&edit=<?= $donnees['idhab'] ?>">
													Modifier
												</a>
												<a class="btn btn-danger active fw-bold" href="participer&idhab=<?= $donnees['idhab'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette participation ?'));">
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
<div class="modal fade" id="add-deces" tabindex="-1" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Ajouter une participation</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	        	<form method="post" action="">
					<div class="mb-3">
						<label for="prenomhab" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-user-alt"></i>
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
					<div class="mb-3">
						<label for="nomevent" class="form-label text-dark">
							<i class="align-middle me-1 fas fa-fw fa-pen"></i>
							Nom de l'évènement
						</label>
						<select name="nomevent" id="nomevent" class="form-select">
							<?php $requete = $bdd->query("SELECT * FROM evenements;");
							$lesEvenements = $requete->fetchAll();
							foreach ($lesEvenements as $unEvenement) { ?>
							<option value="<?= $unEvenement['idevent'] ?>"><?= $unEvenement['nomevent'] ?></option>
							<?php } ?>
						</select>
					</div>
					<?= $helpers->submit('submit', 'submit', 'Ajouter') ?>
				</form>
	      	</div>
    	</div>
  	</div>
</div>

<!-- CONFIGURATIONS DU TABLEAU -->
<script type="text/Javascript">
document.addEventListener("DOMContentLoaded", function() {
	$("#datatables-reponsive").DataTable({
		responsive: true, // Tableau responsive
		ordering: false, // Classement par ordre alphabétique
		iDisplayLength: 5, // Nombre d'affichage par défaut (au chargement de la page)
		language: {
			lengthMenu: 'Afficher <select class="form-select">'+
      		'<option value="1">1</option>'+ // Affichage de 1 participation
      		'<option value="5">5</option>'+ // Affichage de 5 participation, etc...
      		'<option value="10">10</option>'+
      		'<option value="25">25</option>'+
     		'<option value="50">50</option>'+
      		'<option value="-1">100</option>'+ // Affichage de toutes les participations
      		'</select> participations',
            emptyTable: "Aucune donnée disponible dans le tableau",
    		info: "Affichage de _START_ à _END_ participations sur _TOTAL_ participations",
		    infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
		    infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
		    infoThousands: ",",
		    loadingRecords: "Chargement...",
		    processing: "Traitement...",
		    search: "Rechercher :",
		    zeroRecords: "Aucune participations trouvé",
		    paginate: {
		        previous: "Précédent",
		        next: "Suivant"
		    }
        }
	});
});
</script>