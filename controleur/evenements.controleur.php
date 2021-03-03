<?php require "modele/evenements.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nomevent = $_POST['nomevent'];
	$dateevent = $_POST['dateevent'];
	$heureevent = $_POST['heureevent'];
	$lieuevent = $_POST['lieuevent'];
	$prixplaceevent = $_POST['prixplaceevent'];
    $placestotal = $_POST['placestotal'];
    if ($dateevent >= date("mm/dd/YYYY")) {
    	$requete = insertEvent($nomevent, $dateevent, $heureevent, $lieuevent, $prixplaceevent, $placestotal);
		Alerts::setFlash("Évènement ajouté avec succès !");
    } else {
    	Alerts::setFlash("La date l'évènement ne peut pas être inférieur à la date du jour.", "danger");
    }
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: evenements');
}

// SUPPRESSION
if (isset($_GET['idevent'])) {
	$idevent  = $_GET['idevent'];
	$delete = $bdd->prepare("DELETE FROM evenements WHERE idevent = '$idevent'");
	$delete->execute(array($idevent));
	header('Location: evenements');
}

require "vue/evenements.php";

?>