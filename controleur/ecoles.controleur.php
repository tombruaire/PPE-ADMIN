<?php 

require "modele/ecoles.modele.php";

if (isset($_POST['submit'])) {
	$nomec = $_POST['nomec'];
	$adresseec = $_POST['adresseec'];
	$eleves = $_POST['eleves'];
	if ($nomec != "" && $adresseec != "" && $eleves != "") {
		$requete = insertEcole($nomec, $adresseec, $eleves);
		Alerts::setFlash("Insertion réussi !", "École ajoutée avec succès !");
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
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