<?php auth(1); ?>
<div class="app-content content ">
	<div class="content-overlay"></div>
	<div class="header-navbar-shadow"></div>
	<div class="content-wrapper">
	<div class="content-header row"></div>
		<div class="content-body">
			<section class="app-user-view">
				<div class="row d-flex justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                    	<div class="d-flex justify-content-center">
	                        <button type="button" class="btn btn-success btn-lg active mb-2" data-toggle="modal" data-target="#add">
	                    		Ajouter un administrateur
							</button>
						</div>
                        <div class="card user-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                        <div class="user-avatar-section">
                                            <div class="d-flex justify-content-start">
                                                <img class="img-fluid rounded" src="assets/img/admin.png" height="104" width="104">
                                                <div class="d-flex flex-column ml-1">
                                                    <div class="user-info mb-1">
                                                        <span class="card-text text-light"><?= $_SESSION['mail'] ?></span>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-email">
                                                    		Modifier l'adresse email
                        								</button>
                        								<button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#edit-motdepasse">
                                                    		Modifier le mot de passe
                        								</button>
                        								<button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete-compte">
                                                    		Supprimer le compte
                        								</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</section>
		</div>
		<?= Alerts::getFlash(); ?>
	</div>
</div>

<div class="modal fade text-left" id="edit-email" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modification l'adresse email</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('mail', 'Adresse email actuelle', 'email', 'mail') ?>
					<?= $forms->input('newmail', 'Nouvelle adresse email', 'email', 'newmail') ?>
                </div>
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Attention</h4>
                    <div class="alert-body">Vous serez déconnecter après le changement</div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="edit-mail" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="edit-motdepasse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modification du mot de passe</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('mdp', 'Mot de passe actuelle', 'password', 'mdp') ?>
					<?= $forms->input('newmdp', 'Nouveau mot de passe', 'password', 'newmdp') ?>
					<?= $forms->input('newmdp2', 'Confirmation du mot de passe', 'password', 'newmdp2') ?>
                </div>
                <div class="alert alert-warning text-center" role="alert">
                    <h4 class="alert-heading">Attention</h4>
                    <div class="alert-body">Vous serez déconnecter après le changement</div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="edit-mdp" class="btn btn-primary">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="delete-compte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression du compte</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('mail', 'Adresse email', 'email', 'mail') ?>
                	<?= $forms->input('mdp', 'Mot de passe', 'password', 'mdp') ?>
                </div>
                <div class="alert alert-danger text-center" role="alert">
                    <h4 class="alert-heading text-warning">Attention</h4>
                    <div class="alert-body text-warning">Cette action est irréversible</div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Création d'un administrateur</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('mail', 'Adresse email', 'email', 'mail') ?>
					<?= $forms->input('mdp', 'Mot de passe', 'password', 'mdp') ?>
					<?= $forms->input('mdp2', 'Confirmation du mot de passe', 'password', 'mdp2') ?>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary">Créer un administrateur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>