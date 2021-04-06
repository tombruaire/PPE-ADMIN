<?php

function getAllhabitants() {
	global $bdd;
	$habitants = $bdd->query("SELECT * FROM habitants ORDER BY idhab DESC");
	$habitants->execute();
	return $habitants->fetchAll();
}

function insertHab($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO habitants (nomhab, prenomhab, sexehab, datenaisshab, adressehab, professionhab) 
		VALUES (:nomhab, :prenomhab, :sexehab, :datenaisshab, :adressehab, :professionhab)");
	$insertion->bindValue(':nomhab', $nomhab, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	$insertion->bindValue(':sexehab', $sexehab, PDO::PARAM_STR);
	$insertion->bindValue(':datenaisshab', $datenaisshab, PDO::PARAM_STR);
	$insertion->bindValue(':adressehab', $adressehab, PDO::PARAM_STR);
	$insertion->bindValue(':professionhab', $professionhab, PDO::PARAM_STR);
	return $insertion->execute();
}

function updateHabitant($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab, $idhab) {
	global $bdd;
	$update = $bdd->prepare("UPDATE habitants SET nomhab = :nomhab, prenomhab = :prenomhab, sexehab = :sexehab, datenaisshab = :datenaisshab, adressehab = :adressehab, professionhab = :professionhab WHERE idhab = :idhab ");
	$update->bindValue(':nomhab', $nomhab, PDO::PARAM_STR);
	$update->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	$update->bindValue(':sexehab', $sexehab, PDO::PARAM_STR);
	$update->bindValue(':datenaisshab', $datenaisshab, PDO::PARAM_STR);
	$update->bindValue(':adressehab', $adressehab, PDO::PARAM_STR);
	$update->bindValue(':professionhab', $professionhab, PDO::PARAM_STR);
	$update->bindValue(':idhab', $idhab, PDO::PARAM_INT);
	$update->execute();
}

function deleteHab($idhab) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM habitants WHERE idhab = :idhab");
	$delete->bindValue(':idhab', $idhab, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllHab() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM habitants");
	return $delete_all->execute();
}

?>