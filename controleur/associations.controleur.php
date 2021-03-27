<?php 

require "modele/associations.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomassoc = $_POST['nomassoc'];
	$siegeassoc = $_POST['siegeassoc'];
	$datecreationassoc = $_POST['datecreationassoc'];
	$inscrits = $_POST['inscrits'];
	if ($datecreationassoc <= date("Y-m-d")) {
		$insertion = insertAssoc($nomassoc, $siegeassoc, $datecreationassoc, $inscrits);
		Alerts::setFlash("Association ajoutée avec succès !");
	} else {
		Alerts::setFlash("La date de création ne peut pas être supérieur à la date du jour.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: associations');
}

// SUPPRESSION
if (isset($_GET['delete'])) {
	$idassoc  = $_GET['delete'];
	$delete = deleteAssoc($idassoc);
	header('Location: associations');
}

// SUPPRIMER TOUTES LES ASSOCIATIONS
if (isset($_POST['delete'])) {
	$delete_all = deleteAllAssoc();
	header('Location: associations');
}

require "vue/associations.php";

?>