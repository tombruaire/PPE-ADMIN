<?php 

require "modele/ecoles.modele.php";

$ecoles = getAllEcoles();

if (isset($_POST['submit'])) {
	$nomec = $_POST['nomec'];
	$adresseec = $_POST['adresseec'];
	$eleves = $_POST['eleves'];
	if ($nomec != "" && $adresseec != "" && $eleves != "") {
		$requete = insertEcole($nomec, $adresseec, $eleves);
		header('Location: ecoles');
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$idec = $_GET['edit'];
	$nomec = $_POST['nomec'];
	$adresseec = $_POST['adresseec'];
	$eleves = $_POST['eleves'];
	if ($nomec != "" && $adresseec != "" && $eleves != "") {
		$update = updateEcole($nomec, $adresseec, $eleves, $idec);
		header('Location: ecoles');
	} else {
		Alerts::setFlash("Echec de la modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: ecoles');
}

if (isset($_GET['idec'])) {
	$idec  = $_GET['idec'];
	$delete = deleteEcole($idec);
	header('Location: ecoles');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllEcoles();
	header('Location: ecoles');
}

require "vue/ecoles.php";

?>