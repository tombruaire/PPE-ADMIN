<?php 

require "modele/ecoles.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomec = $_POST['nomec'];
	$adresseec = $_POST['adresseec'];
	$eleves = $_POST['eleves'];
	$requete = insertEcole($nomec, $adresseec, $eleves);
	Alerts::setFlash("École ajoutée avec succès !");
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: ecoles');
}

// SUPPRESSION
if (isset($_GET['idec'])) {
	$idec  = $_GET['idec'];
	$delete = deleteEcole($idec);
	header('Location: ecoles');
}

// SUPPRIMER TOUTES LES ÉCOLES 
if (isset($_POST['delete'])) {
	$delete_all = deleteAllEcoles();
	header('Location: ecoles');
}

require "vue/ecoles.php";

?>