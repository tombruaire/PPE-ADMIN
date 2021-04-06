<?php 

require "modele/conservatoires.modele.php";

$conservatoires = getAllConservatoires();

if (isset($_POST['submit'])) {
	$nomconserv = $_POST['nomconserv'];
	$adresseconserv = $_POST['adresseconserv'];
	$telephone = $_POST['telephone'];
	$effectifs = (int)$_POST['effectifs'];
	$datecreationconserv = $_POST['datecreationconserv'];
	if ($nomconserv != "" && $adresseconserv != "" && $telephone != "" && $effectifs != "" && $datecreationconserv != "") {
		$telephonelength = strlen($telephone);
		if ($telephonelength <= 10) {
			$requete_telephone_exist = checkTelephone($telephone);
			if (!$requete_telephone_exist) {
				if ($datecreationconserv <= date("Y-m-d")) {
					$insertion = insertConservatoire($nomconserv, $adresseconserv, $telephone, $effectifs, $datecreationconserv);
					header('Location: conservatoires');
				} else {
					Alerts::setFlash("Echec de l'insertion", "La date de création du conservatoire ne peut pas être supérieur à la date du jour !", "danger");
				}
			} else {
				Alerts::setFlash("Echec de l'insertion", "Ce numéro de télépone est déjà enregistré !", "warning");
			}
		} else {
			Alerts::setFlash("Echec de l'insertion", "Le numéro de télépone ne doit pas dépasser 10 caractères !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$idconserv = $_GET['edit'];
	$nomconserv = $_POST['nomconserv'];
	$adresseconserv = $_POST['adresseconserv'];
	$telephone = $_POST['telephone'];
	$effectifs = $_POST['effectifs'];
	$datecreationconserv = $_POST['datecreationconserv'];
	if ($nomconserv != "" && $adresseconserv != "" && $telephone != "" && $effectifs != "") {
		$update = updateConservatoire($nomconserv, $adresseconserv, $telephone, $effectifs, $datecreationconserv, $idconserv);
		header('Location: conservatoires');
	} else {
		Alerts::setFlash("Echec de modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: conservatoires');
}

if (isset($_GET['idconserv'])) {
	$idconserv  = $_GET['idconserv'];
	$delete = deleteConserv($idconserv);
	header('Location: conservatoires');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllConserv();
	header('Location: conservatoires');
}

require "vue/conservatoires.php";

?>