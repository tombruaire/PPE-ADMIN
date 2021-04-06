<?php 

require "modele/associations.modele.php";

$associations = getAllAssociations();

if (isset($_POST['submit'])) {
	$nomassoc = $_POST['nomassoc'];
	$siegeassoc = $_POST['siegeassoc'];
	$datecreationassoc = $_POST['datecreationassoc'];
	$inscrits = $_POST['inscrits'];
	if ($nomassoc != "" && $siegeassoc != "" && $datecreationassoc != "" && $inscrits != "") {
		if ($datecreationassoc <= date("Y-m-d")) {
			$insertion = insertAssoc($nomassoc, $siegeassoc, $datecreationassoc, $inscrits);
			header('Location: associations');
		} else {
			Alerts::setFlash("Echec de l'insertion", "La date de création ne peut pas être supérieur à la date du jour !", "danger");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$idassoc = $_GET['edit'];
	$nomassoc = $_POST['nomassoc'];
	$siegeassoc = $_POST['siegeassoc'];
	$datecreationassoc = $_POST['datecreationassoc'];
	$inscrits = $_POST['inscrits'];
	if ($nomassoc != "" && $siegeassoc != "" && $inscrits != "") {
		$update = updateAssociation($nomassoc, $siegeassoc, $datecreationassoc, $inscrits, $idassoc);
		header('Location: associations');
	} else {
		Alerts::setFlash("Echec de la modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: associations');
}

if (isset($_GET['delete'])) {
	$idassoc  = $_GET['delete'];
	$delete = deleteAssoc($idassoc);
	header('Location: associations');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllAssoc();
	header('Location: associations');
}

require "vue/associations.php";

?>