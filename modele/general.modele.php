<?php

function addCompteur($libelle, $nombre) {
	global $bdd;
	$insert = $bdd->prepare("INSERT INTO compteur (libelle, nombre) VALUES (:libelle, :nombre)");
	$insert->bindValue(':libelle', $libelle, PDO::PARAM_STR);
	$insert->bindValue(':nombre', $nombre, PDO::PARAM_INT);
	return $insert->execute();
}

?>