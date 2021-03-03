<?php require "modele/general.modele.php";

if (isset($_POST['submit'])) {
	$libelle = $_POST['libelle'];
	$nombre = $_POST['nombre'];
	$insert = addCompteur($libelle, $nombre);
	Alerts::setFlash("Compteur ajouté avec succès !");
}

require "vue/general.php";

?>