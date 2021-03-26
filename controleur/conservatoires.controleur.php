<?php 

require "modele/conservatoires.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomconserv = $_POST['nomconserv'];
	$adresseconserv = $_POST['adresseconserv'];
	$telephone = $_POST['telephone'];
	$effectifs = (int)$_POST['effectifs'];
	$datecreationconserv = $_POST['datecreationconserv'];
	$telephonelength = strlen($telephone);
	if ($telephonelength <= 10) {
		$requete_telephone_exist = checkTelephone($telephone);
		if (!$requete_telephone_exist) {
			if ($datecreationconserv <= date("mm/dd/YYYY")) {
				$insertion = insertConservatoire($nomconserv, $adresseconserv, $telephone, $effectifs, $datecreationconserv);
				Alerts::setFlash("Conservatoire ajouté avec succès !");
			} else {
				Alerts::setFlash("La date de création du conservatoire ne peut pas être supérieur à la date du jour.", "danger");
			}
		} else {
			Alerts::setFlash("Ce numéro de télépone est déjà enregistré.", "warning");
		}
	} else {
		Alerts::setFlash("Le numéro de télépone ne doit pas dépasser 10 caractères.", "warning");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: conservatoires');
}

// SUPPRESSION
if (isset($_GET['idconserv'])) {
	$idconserv  = $_GET['idconserv'];
	$delete = deleteConserv($idconserv);
	header('Location: conservatoires');
}

// SUPRIMER TOUS LES CONSERVATOIRES
if (isset($_POST['delete'])) {
	$delete_all = deleteAllConserv();
	header('Location: conservatoires');
}

require "vue/conservatoires.php";

?>