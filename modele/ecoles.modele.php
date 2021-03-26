<?php

function insertEcole($nomec, $adresseec, $eleves) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO ecoles (nomec, adresseec, eleves) VALUES (:nomec, :adresseec, :eleves)");
	$insertion->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$insertion->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
	$insertion->bindValue(':eleves', $eleves, PDO::PARAM_INT);
	return $insertion->execute();
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