<?php 

require "modele/deces.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$dated = $_POST['dated'];
	$motifd = $_POST['motifd'];
	$prenomhab = $_POST['prenomhab'];
	if ($dated <= date("Y-m-d")) {
		$insertion = insertDeces($dated, $motifd, $prenomhab);
		Alerts::setFlash("Décès ajouté avec succès !");
	} else {
		Alerts::setFlash("La date du décès ne peut pas être supérieur à la date du jour.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: deces');
}

// SUPPRESSION
if (isset($_GET['idd'])) {
	$idd  = $_GET['idd'];
	$delete = deleteDeces($idd);
	header('Location: deces');
}

// SUPPRIMER TOUS LES DÉCES
if (isset($_POST['delete'])) {
	$delete_all = deleteAllDeces();
	header('Location: deces');
}

require "vue/deces.php";

?>