<?php require "modele/membres.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomassoc = $_POST['nomassoc'];
	$prenomhab = $_POST['prenomhab'];
	$insertion = insertMembre($nomassoc, $prenomhab);
	Alerts::setFlash("Membre ajouté avec succès !");
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: membres');
}

// SUPPRESSION
if (isset($_GET['idassoc'])) {
	$idassoc  = $_GET['idassoc'];
	$delete = $bdd->prepare("DELETE FROM membres WHERE idassoc = '$idassoc'");
	$delete->execute(array($idassoc));
	header('Location: membres');
}

require "vue/membres.php";

?>