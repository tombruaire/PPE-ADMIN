<?php

function deleteAllCompteurs() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM compteur");
	return $delete_all->execute();
}

function getAllCompteurs() {
	global$bdd;
	$compteurs = $bdd->query("SELECT * FROM compteur ORDER BY idcompteur DESC");
	$compteurs->execute();
	return $compteurs->fetchAll();
}

?>