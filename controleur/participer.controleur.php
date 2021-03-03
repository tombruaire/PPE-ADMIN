<?php require "modele/participer.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$prenomhab = $_POST['prenomhab'];
	$nomevent = $_POST['nomevent'];
	$insertion = insertParticipation($prenomhab, $nomevent);
	Alerts::setFlash("Participation ajoutée avec succès !");
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: participer');
}

// SUPPRESSION
if (isset($_GET['idhab'])) {
	$idhab  = $_GET['idhab'];
	$delete = $bdd->prepare("DELETE FROM participer WHERE idhab = '$idhab'");
	$delete->execute(array($idhab));
	header('Location: participer');
}

require "vue/participer.php";

?>