<?php 

require "modele/enfants.modele.php";

$enfants = getAllEnfants();

if (isset($_POST['submit'])) {
	$nomenf = $_POST['nomenf'];
	$prenomenf = $_POST['prenomenf'];
	$datenaissenf = $_POST['datenaissenf'];
	$sexenf = $_POST['sexenf'];
	$classedage = $_POST['classedage'];
	$tuteur = $_POST['tuteur'];
	if ($nomenf != "" && $prenomenf != "" && $datenaissenf !="" && $classedage != "" && $tuteur != "") {
		if ($datenaissenf <= date("Y-m-d")) {
			$insertion = insertEnf($nomenf, $prenomenf, $datenaissenf, $sexenf, $classedage, $tuteur);
			header('Location: enfants');
		} else {
			Alerts::setFlash("Echec de l'insertion", "La date de naissance ne peut pas être supérieur à la date du jour !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: enfants');
}

if (isset($_GET['idenf'])) {
	$idenf  = $_GET['idenf'];
	$delete = deleteEnfant($idenf);
	header('Location: enfants');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllEnfants();
	header('Location: enfants');
}

require "vue/enfants.php";

?>