<?php require "modele/ecoles.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomec = $_POST['nomec'];
	$adresseec = $_POST['adresseec'];
	$requete = insertEcole($nomec, $adresseec);
	Alerts::setFlash("École ajoutée avec succès !");
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: ecoles');
}

// SUPPRESSION
if (isset($_GET['idec'])) {
	$idec  = $_GET['idec'];
	$delete = $bdd->prepare("DELETE FROM ecoles WHERE idec = '$idec'");
	$delete->execute(array($idec));
	header('Location: ecoles');
}

require "vue/ecoles.php";

?>