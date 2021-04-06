<?php

function getAllDeces() {
	global $bdd;
	$deces = $bdd->query("SELECT * FROM viewDeces ORDER BY idd DESC");
	$deces->execute();
	return $deces->fetchAll();
}

function insertDeces($dated, $motifd, $prenomhab) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO deces (dated, motifd, idhab) VALUES (:dated, :motifd, :prenomhab)");
	$insertion->bindValue(':dated', $dated, PDO::PARAM_STR);
	$insertion->bindValue(':motifd', $motifd, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	return $insertion->execute();
}

function deleteDeces($idd) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM deces WHERE idd = :idd");
	$delete->bindValue(':idd', $idd, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllDeces() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM deces");
	return $delete_all->execute();
}

?>