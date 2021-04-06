<?php 

require "modele/deces.modele.php";

$deces = getAllDeces();

if (isset($_POST['submit'])) {
	$dated = $_POST['dated'];
	$motifd = $_POST['motifd'];
	$prenomhab = $_POST['prenomhab'];
	if ($dated != "" && $motifd != "") {
		if ($dated <= date("Y-m-d")) {
			$insertion = insertDeces($dated, $motifd, $prenomhab);
			header('Location: deces');
		} else {
			Alerts::setFlash("Echec de l'insertion", "La date du décès ne peut pas être supérieur à la date du jour !", "danger");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: deces');
}

if (isset($_GET['idd'])) {
	$idd  = $_GET['idd'];
	$delete = deleteDeces($idd);
	header('Location: deces');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllDeces();
	header('Location: deces');
}

require "vue/deces.php";

?>