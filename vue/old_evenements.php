<?php auth(1); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<?= Alerts::getFlash(); ?>
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="float-left mb-0">Historique des événements</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
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
										<td>
											<a class="btn btn-danger font-weight-bolder" href="old_evenements&idold=<?= $donnees['idold'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet historique ?'));">
                                                <i data-feather="x"></i>
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout l\'historique ?'));">
								Supprimer tout l'historique
							</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
