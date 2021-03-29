<?php 

require "modele/habitants.modele.php";

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
			Alerts::setFlash("Insertion réussi !", "Habitant ajoutée avec succès !");
	    } else {
	    	Alerts::setFlash("Echec de l'insertion", "La date de naissance ne peut pas être supérieur à la date du jour !", "danger");
	    }
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
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