<?php require "modele/mariages.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$prenomhab1 = $_POST['prenomhab1'];
	$prenomhab2 = $_POST['prenomhab2'];
	$datem = $_POST['datem'];
	$heurem = $_POST['heurem'];
	$datediv = $_POST['datediv'];
	if ($datem <= date("mm/dd/YYYY")) {
		$insertion = insertMariage($prenomhab1, $prenomhab2, $datem, $heurem, $datediv);
		Alerts::setFlash("Mariage ajouté avec succès !");
	} else {
		Alerts::setFlash("La date du mariage ne peut pas être supérieur à la date du jour.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: mariages');
}

// SUPPRESSION
if (isset($_GET['idhab1'])) {
	$idhab1  = $_GET['idhab1'];
	$delete = $bdd->prepare("DELETE FROM marier WHERE idhab1 = '$idhab1'");
	$delete->execute(array($idhab1));
	header('Location: mariages');
}

require "vue/mariages.php";

?>