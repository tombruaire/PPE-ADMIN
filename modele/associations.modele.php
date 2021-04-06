<?php

function getAllAssociations() {
	global $bdd;
	$associations = $bdd->query("SELECT * FROM associations ORDER BY idassoc DESC");
	$associations->execute();
	return $associations->fetchAll();
}

function insertAssoc($nomassoc, $siegeassoc, $datecreationassoc, $inscrits) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO associations (nomassoc, siegeassoc, datecreationassoc, inscrits) VALUES (:nomassoc, :siegeassoc, :datecreationassoc, :inscrits)");
	$insertion->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
	$insertion->bindValue(':siegeassoc', $siegeassoc, PDO::PARAM_STR);
	$insertion->bindValue(':datecreationassoc', $datecreationassoc, PDO::PARAM_STR);
	$insertion->bindValue(':inscrits', $inscrits, PDO::PARAM_INT);
	return $insertion->execute();
}

function updateAssociation($nomassoc, $siegeassoc, $datecreationassoc, $inscrits, $idassoc) {
	global $bdd;
	$update = $bdd->prepare("UPDATE associations SET nomassoc = :nomassoc, siegeassoc = :siegeassoc, datecreationassoc = :datecreationassoc, inscrits = :inscrits WHERE idassoc = :idassoc ");
	$update->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
	$update->bindValue(':siegeassoc', $siegeassoc, PDO::PARAM_STR);
	$update->bindValue(':datecreationassoc', $datecreationassoc, PDO::PARAM_STR);
	$update->bindValue(':inscrits', $inscrits, PDO::PARAM_INT);
	$update->bindValue(':idassoc', $idassoc, PDO::PARAM_INT);
	return $update->execute();
}

function deleteAssoc($idassoc) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM associations WHERE idassoc = :idassoc");
	$delete->bindValue(':idassoc', $idassoc, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllAssoc() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM associations");
	return $delete_all->execute();
}

?>