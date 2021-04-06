<?php 

require "modele/habitants.modele.php";

$habitants = getAllhabitants();

if (isset($_POST['submit'])) {
	$nomhab = $_POST['nomhab'];
	$prenomhab = $_POST['prenomhab'];
	$sexehab = $_POST['sexehab'];
	$datenaisshab = $_POST['datenaisshab'];
	$adressehab = $_POST['adressehab'];
	$professionhab = $_POST['professionhab'];
	if ($nomhab != "" && $prenomhab != "" && $datenaisshab != "" && $adressehab != "" && $professionhab != "") {
		if ($datenaisshab <= date("Y-m-d")) {
	    	$insertion = insertHab($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab);
			header('Location: habitants');
	    } else {
	    	Alerts::setFlash("Echec de l'insertion", "La date de naissance ne peut pas être supérieur à la date du jour !", "danger");
	    }
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$idhab = $_GET['edit'];
	$nomhab = $_POST['nomhab'];
	$prenomhab = $_POST['prenomhab'];
	$sexehab = $_POST['sexehab'];
	$datenaisshab = $_POST['datenaisshab'];
	$adressehab = $_POST['adressehab'];
	$professionhab = $_POST['professionhab'];
	if ($nomhab != "" && $prenomhab != "" && $sexehab != "" && $adressehab != "" && $professionhab != "") {
		$update = updateHabitant($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab, $idhab);
		header('Location: habitants');
	} else {
		Alerts::setFlash("Echec de modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: habitants');
}

if (isset($_GET['idhab'])) {
	$idhab  = $_GET['idhab'];
	$delete = deleteHab($idhab);
	header('Location: habitants');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllHab();
	header('Location: habitants');
}

require "vue/habitants.php";

?>