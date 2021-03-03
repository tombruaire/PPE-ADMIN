<?php require "modele/inscrits.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomec = $_POST['nomec'];
	$prenomenf = $_POST['prenomenf'];
	$datei = $_POST['datei'];
	$cout = $_POST['cout'];
	if ($datei <= date("mm/dd/YYYY")) {
		$insert = insertInscrit($nomec, $prenomenf, $datei, $cout);
		Alerts::setFlash("Inscrit ajouté avec succès !");
	} else {
		Alerts::setFlash("La date d'inscription ne peut pas être supérieur à la date du jour.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: inscrits');
}

// SUPPRESSION
if (isset($_GET['idec'])) {
	$idec  = $_GET['idec'];
	$delete = $bdd->prepare("DELETE FROM inscrits WHERE idec = '$idec'");
	$delete->execute(array($idec));
	header('Location: inscrits');
}

require "vue/inscrits.php";

?>