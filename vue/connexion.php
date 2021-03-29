<div class="app-content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="" class="brand-logo">
                                <img src="assets/img/villiers.png" class="img-fluid" width="100">
                            </a>
                            <h4 class="card-title text-center text-light mb-1">ADMINISTRATION</h4>
                            <div class="d-flex justify-content-center">
        						<?= Alerts::getFlash(); ?>
        					</div>
                            <form method="post" action="" class="auth-login-form mt-2">
                                <div class="form-group">
                                    <label for="mail" class="form-label">Adresse email</label>
                                    <input type="email" name="mail" id="mail" placeholder="exemple@domaine.com" tabindex="1" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="mdp" class="form-label">Mot de passe</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" name="mdp" id="mdp" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" class="form-control form-control-merge">
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="connexion" class="btn btn-primary btn-block" tabindex="4">Connexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
