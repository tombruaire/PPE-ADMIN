<?php 

require "modele/mariages.modele.php";

$mariages = getAllMariages();

if (isset($_POST['submit'])) {
	$prenomhab1 = $_POST['prenomhab1'];
	$prenomhab2 = $_POST['prenomhab2'];
	$datem = $_POST['datem'];
	$heurem = $_POST['heurem'];
	$datediv = $_POST['datediv'];
	if ($datem != "" && $heurem != "" && $datediv != "") {
		if ($datem <= date("Y-m-d")) {
			$insertion = insertMariage($prenomhab1, $prenomhab2, $datem, $heurem, $datediv);
			header('Location: mariages');
		} else {
			Alerts::setFlash("Echec de l'insertion", "La date du mariage ne peut pas être supérieur à la date du jour !", "danger");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: mariages');
}

if (isset($_GET['idhab1'])) {
	$idhab1  = $_GET['idhab1'];
	$delete = deleteMariage($idhab1);
	header('Location: mariages');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllMariages();
	header('Location: mariages');
}

require "vue/mariages.php";

?>