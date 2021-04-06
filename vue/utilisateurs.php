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
                        <h2 class="float-left mb-0">Liste des utilisateurs</h2>
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
										<th>NOM</th>
										<th>Prénom</th>
										<th>Pseudo</th>
										<th>Adresse email</th>
										<th>Date d'inscription</th>
										<th>Confirmation</th>
										<th>Bannissement</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($users as $user) { ?>
									<?php if (isset($_GET['edit'])) { ?>
									<tr>
										<form method="post" action="">
											<td><?= $user['id']; ?></td>
											<?= $forms->edit('text', 'nom', $user['nom']); ?>
											<?= $forms->edit('text', 'prenom', $user['prenom']); ?>
											<?= $forms->edit('text', 'pseudo', $user['pseudo']); ?>
											<?= $forms->edit('email', 'email', $user['email']); ?>
											<td><?= $user['date_format(date_inscription, "%d/%m/%Y")']; ?></td>
											<td>
												<?php if ($user['confirme'] == 0) { ?>
												<span class="badge bg-warning text-light fw-bold fs-5">En attente...</span>
												<?php } else { ?>
												<span class="badge fs-5" style="background-color: #008000;">Confirmé</span>
												<?php } ?>
											</td>
											<td class="table-action">
												<?php if ($user['lvl'] == 0) { ?>
												<a class="btn btn-primary active fw-bold disabled">
													Débannir
												</a>
												<?php } else { ?>
												<a class="btn btn-warning active fw-bold disabled">
													Bannir
												</a>
												<?php } ?>
											</td>
											<?= $forms->buttons(); ?>
										</form>
									</tr>
									<?php } else { ?>
									<tr>
										<td><?= $user['id']; ?></td>
										<td><?= $user['nom']; ?></td>
										<td><?= $user['prenom']; ?></td>
										<td><?= $user['pseudo']; ?></td>
										<td><?= $user['email']; ?></td>
										<td><?= $user['date_format(date_inscription, "%d/%m/%Y")']; ?></td>
										<td>
											<?php if ($user['confirme'] == 0) { ?>
											<span class="badge badge-pill badge-light-info mr-1">En attente</span>
											<?php } else { ?>
											<span class="badge badge-pill badge-light-success mr-1">Confirmé</span>
											<?php } ?>
										</td>
										<td class="table-action">
											<?php if ($user['lvl'] == 0) { ?>
											<a class="btn btn-primary active fw-bold" href="utilisateurs&deban=<?= $user['id'] ?>" onclick="return(confirm('Voulez-vous vraiment bannir cet utilisateur ?'));">
												Débannir
											</a>
											<?php } else { ?>
											<a class="btn btn-warning active fw-bold" href="utilisateurs&ban=<?= $user['id'] ?>" onclick="return(confirm('Voulez-vous vraiment débannir cet utilisateur ?'));">
												Bannir
											</a>
											<?php } ?>
										</td>
										<td>
											<a class="btn btn-primary font-weight-bolder mr-25" href="utilisateurs&edit=<?= $user['id']; ?>">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger font-weight-bolder" href="utilisateurs&delete=<?= $user['id']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet utilisateur ?'));">
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
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tout les utilisateurs ?'));">
								Supprimer tout les utilisateurs
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
                <h4 class="modal-title">Ajouter un utilisateur</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nom', 'Nom de l\'utilisateur', 'text', 'nom') ?>
                	<?= $forms->input('prenom', 'Prénom de l\'utilisateur', 'text', 'prenom') ?>
                	<?= $forms->input('pseudo', 'Pseudo de l\'utilisateur', 'text', 'pseudo') ?>
                	<?= $forms->input('email', 'Adresse email de l\'utilisateur', 'email', 'email') ?>
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
