<?php 

require "modele/habitants.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomhab = $_POST['nomhab'];
	$prenomhab = $_POST['prenomhab'];
	$sexehab = $_POST['sexehab'];
	$datenaisshab = $_POST['datenaisshab'];
	$adressehab = $_POST['adressehab'];
	$professionhab = $_POST['professionhab'];
	if ($datenaisshab <= date("mm/dd/YYYY")) {
    	$insertion = insertHab($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab);
		Alerts::setFlash("Habitant ajouté avec succès !");
    } else {
    	Alerts::setFlash("La date de naissance ne peut pas être supérieur à la date du jour.", "danger");
    }
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: habitants');
}

// SUPPRESSION
if (isset($_GET['idhab'])) {
	$idhab  = $_GET['idhab'];
	$delete = deleteHab($idhab);
	header('Location: habitants');
}

// SUPPRIMER TOUS LES HABITANTS
if (isset($_POST['delete'])) {
	$delete_all = deleteAllHab();
	header('Location: habitants');
}

require "vue/habitants.php";

?>