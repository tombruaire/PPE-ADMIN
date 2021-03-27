<?php 

require "modele/enfants.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomenf = $_POST['nomenf'];
	$prenomenf = $_POST['prenomenf'];
	$datenaissenf = $_POST['datenaissenf'];
	$sexenf = $_POST['sexenf'];
	$classedage = $_POST['classedage'];
	$tuteur = $_POST['tuteur'];
	if ($datenaissenf <= date("Y-m-d")) {
		$insertion = insertEnf($nomenf, $prenomenf, $datenaissenf, $sexenf, $classedage, $tuteur);
		Alerts::setFlash("Enfant ajouté avec succès !");
	} else {
		Alerts::setFlash("La date de naissance ne peut pas être supérieur à la date du jour.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: enfants');
}

// SUPPRESSION
if (isset($_GET['idenf'])) {
	$idenf  = $_GET['idenf'];
	$delete = deleteEnfant($idenf);
	header('Location: enfants');
}

// SUPPRIMER TOUS LES ENFANTS
if (isset($_POST['delete'])) {
	$delete_all = deleteAllEnfants();
	header('Location: enfants');
}

require "vue/enfants.php";

?>