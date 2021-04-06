<?php

function getAllEcoles() {
	global $bdd;
	$ecoles = $bdd->query("SELECT * FROM ecoles ORDER BY idec DESC");
	$ecoles->execute();
	return $ecoles->fetchAll();
}

function insertEcole($nomec, $adresseec, $eleves) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO ecoles (nomec, adresseec, eleves) VALUES (:nomec, :adresseec, :eleves)");
	$insertion->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$insertion->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
	$insertion->bindValue(':eleves', $eleves, PDO::PARAM_INT);
	return $insertion->execute();
}

function updateEcole($nomec, $adresseec, $eleves, $idec) {
	global $bdd;
	$update = $bdd->prepare("UPDATE ecoles SET nomec = :nomec, adresseec = :adresseec, eleves = :eleves WHERE idec = :idec");
	$update->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$update->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
	$update->bindValue(':eleves', $eleves, PDO::PARAM_INT);
	$update->bindValue(':idec', $idec, PDO::PARAM_INT);
	return $update->execute();
}

function deleteEcole($idec) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM ecoles WHERE idec = :idec");
	$delete->bindValue(':idec', $idec, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllEcoles() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM ecoles");
	return $delete_all->execute();
}

?>