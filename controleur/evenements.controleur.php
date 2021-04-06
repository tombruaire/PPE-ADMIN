<?php 

require "modele/evenements.modele.php";

$evenements = getAllEnvent();

if (isset($_POST['submit'])) {
	$nomevent = $_POST['nomevent'];
	$dateevent = $_POST['dateevent'];
	$heureevent = $_POST['heureevent'];
	$lieuevent = $_POST['lieuevent'];
	$prixplaceevent = $_POST['prixplaceevent'];
    $placestotal = $_POST['placestotal'];
    if ($nomevent != "" && $dateevent != "" && $heureevent != "" && $lieuevent != "" && $prixplaceevent != "" && $placestotal != "") {
	    if ($dateevent >= date("Y-m-d")) {
	    	$requete = insertEvent($nomevent, $dateevent, $heureevent, $lieuevent, $prixplaceevent, $placestotal);
			header('Location: evenements');
	    } else {
	    	Alerts::setFlash("Echec de l'insertion", "La date l'évènement ne peut pas être inférieur à la date du jour !", "danger");
	    }
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$idevent = $_GET['edit'];
	$nomevent = $_POST['nomevent'];
	$dateevent = $_POST['dateevent'];
	$heureevent = $_POST['heureevent'];
	$lieuevent = $_POST['lieuevent'];
	$nbievent = $_POST['nbievent'];
	$prixplaceevent = $_POST['prixplaceevent'];
    $placestotal = $_POST['placestotal'];
    if ($nomevent != "" && $lieuevent != "" && $nbievent != "" && $prixplaceevent != "" && $placestotal != "") {
    	$update = updateEvent($nomevent, $dateevent, $heureevent, $lieuevent, $nbievent, $prixplaceevent, $placestotal, $idevent);
		header('Location: evenements');
	} else {
		Alerts::setFlash("Echec de modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: evenements');
}

if (isset($_GET['idevent'])) {
	$idevent  = $_GET['idevent'];
	$delete = deleteEvent($idevent);
	header('Location: evenements');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllEvents();
	header('Location: evenements');
}

require "vue/evenements.php";

?>