<?php 

require "modele/evenements.modele.php";

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
			Alerts::setFlash("Insertion réussi !", "Événement ajouté avec succès !");
	    } else {
	    	Alerts::setFlash("Echec de l'insertion", "La date l'évènement ne peut pas être inférieur à la date du jour !", "danger");
	    }
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
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