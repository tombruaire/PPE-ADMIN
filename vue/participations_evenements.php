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
                        <h2 class="float-left mb-0">Liste des participations aux événements</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn-icon btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#add">
                            <i data-feather="plus"></i>
                        </button>
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
										<th>Email</th>
										<th>Nom de l'évènement</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                            	<tbody>
                                    <?php foreach ($participations as $participation) { ?>
                                    <?php if (isset($_GET['edit'])) { ?>
									<tr>
										<form method="post" action="">
											<td><?= $participation['idpart']; ?></td>
											<?= $forms->edit('email', 'emailuser', $participation['emailuser']); ?>
											<?= $forms->edit('text', 'evenement', $participation['evenement']); ?>
											<?= $forms->buttons(); ?>
										</form>
									</tr>
									<?php } else { ?>
									<tr>
										<td><?= $participation['idpart']; ?></td>
										<td><?= $participation['emailuser']; ?></td>
										<td><?= $participation['evenement']; ?></td>
										<td class="table-action">
											<a class="btn btn-primary font-weight-bolder mr-25" href="participations_evenements&edit=<?= $participation['idpart']; ?>">
                                            	<i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="participations_evenements&idpart=<?= $participation['idpart']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette participation ?'));">
                                                <i data-feather="x"></i>
                                            </a>
										</td>
									</tr>
									<?php } ?>
									<?php } ?>
								</tbody>
                            </table>
                        </div>
                    </div>
					<div class="d-flex justify-content-center">
						<form method="post" action="">
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les participations ?'));">
								Supprimer toutes les participations
							</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter une participation</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
					<?= $forms->input('emailuser', 'Adresse email', 'email', 'emailuser') ?>
					<div class="form-group">
						<label for="evenement" class="form-label">Nom de l'événement</label>
                        <select name="evenement" class="form-control">
                            <?php $requete = $bdd->query("SELECT * FROM evenements ORDER BY nomevent");
                            $lesEvenements = $requete->fetchAll();
                            foreach ($lesEvenements as $unEvenement) { ?>
                            <option value="<?= $unEvenement['nomevent'] ?>"><?= $unEvenement['nomevent'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
