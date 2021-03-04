<?php auth(1); ?>
<?php include('compteurs.php'); ?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12 col-sm-6 col-xxl d-flex">
				<div class="card bg-primary flex-fill animate__animated animate__backInDown">
					<div class="card-body py-4">
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<h1 class="mb-2 display-6"><?= $visiteurs ?></h1>
								<p class="fs-lg text-dark">Visiteurs</p>
							</div>
							<div class="d-inline-block ms-3">
								<div class="stat">
									<i class="align-middle text-success" data-feather="eye"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-xxl d-flex">
				<div class="card bg-success flex-fill animate__animated animate__backInDown">
					<div class="card-body py-4">
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<h1 class="mb-2 text-light display-6"><?= $utilisateurs ?></h1>
								<p class="fs-lg fw-bold text-light">Comptes utilisateurs</p>
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
				<div class="card bg-info flex-fill animate__animated animate__backInDown">
					<div class="card-body py-4">
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<h1 class="mb-2 display-6"><?= $associations ?></h1>
								<p class="fs-lg fw-bold text-dark">Associations crées</p>
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
				<div class="card bg-secondary flex-fill animate__animated animate__backInDown">
					<div class="card-body py-4">
						<div class="d-flex align-items-start">
							<div class="flex-grow-1">
								<h1 class="mb-2 display-6"><?= $evenements ?></h1>
								<p class="fs-lg fw-bold text-dark">Évènements organisés</p>
							</div>
							<div class="d-inline-block ms-3">
								<div class="stat">
									<i class="align-middle text-success" data-feather="calendar"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card animate__animated animate__bounceIn">
					<div class="card-header">
						<h1 class="text-dark h2 text-center">
							Bienvenue dans la partie administratrive de la Mairie de Villiers !
						</h1>
					</div>
					<div class="card-body">
						<p class="text-dark fs-lg">
							C'est ici que vous pouvez :
						</p>
						<ul class="text-dark fs-lg">
							<li>Insérer, modifier, supprimer, bannir un utilisateur.</li>
							<li>Insérer, supprimer un évènement.</li>
							<li>Insérer, supprimer une participation à un évènement.</li>
							<li>Insérer, supprimer un habitant.</li>
							<li>Insérer, modifier, supprimer un conservatoire.</li>
							<li>Insérer, supprimer une association.</li>
							<li>Insérer, supprimer une école.</li>
							<li>Insérer, supprimer un enfant.</li>
							<li>Insérer, supprimer un décès.</li>
							<li>Insérer, supprimer un membre d'une association.</li>
							<li>Insérer, supprimer une inscription à une école.</li>
							<li>Insérer, supprimer un mariage.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>