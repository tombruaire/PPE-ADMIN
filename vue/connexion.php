<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<div class="card bg-secondary" style="max-width: 30rem;">
			<main class="form-signin mt-4">
		  		<div class="card-header bg-secondary">
			  		<div class="d-flex justify-content-center">
			    		<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle text-dark mb-3" viewBox="0 0 16 16">
			  				<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			  				<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
						</svg>
			    	</div>
			    	<h1 class="h3 mb-3 fw-normal text-dark text-center">Administration</h1>
			    	<p class="text-center text-dark">Vous devez vous connecter pour voir les pages.</p>
		    	</div>
		    	<div class="card-body">
		    		<form method="post" action="">
				    	<?= $helpers->input('email', 'mail', '', 'Adresse email') ?>
				    	<?= $helpers->input('password', 'mdp', '', 'Mot de passe') ?>
				    	<button type="submit" name="connexion" class="w-100 btn btn-lg btn-dark active fw-bold text-light">
				    		Connexion
				    	</button>
			    	</form>
		    	</div>
			</main>
		</div>
	</div>
	<div class="d-flex justify-content-center mt-4">
		<?= Alerts::getFlash(); ?>
	</div>
</div>