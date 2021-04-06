<?php

function getAllParticipations() {
	global $bdd;
	$participations = $bdd->query("SELECT * FROM participations ORDER BY idpart DESC");
	$participations->execute();
	return $participations->fetchAll();
}

function insertParticipation($emailuser, $evenement) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO participations (emailuser, evenement, date_heure_inscription) VALUES (:emailuser, :evenement, NOW())");
	$insertion->bindValue(':emailuser', $emailuser, PDO::PARAM_STR);
	$insertion->bindValue(':evenement', $evenement, PDO::PARAM_STR);
	$insertion->execute();
	return $insertion->execute();
}

function updateParticipation($emailuser, $evenement, $idpart) {
	global $bdd;
	$update = $bdd->prepare("UPDATE participations SET emailuser = :emailuser, evenement = :evenement WHERE idpart = :idpart");
	$update->bindValue(':emailuser', $emailuser, PDO::PARAM_STR);
	$update->bindValue(':evenement', $evenement, PDO::PARAM_STR);
	$update->bindValue(':idpart', $idpart, PDO::PARAM_INT);
	return $update->execute();
}

function checkEmail($emailuser) {
	global $bdd;
	$SQL_email = "SELECT emailuser FROM participations WHERE emailuser = :emailuser";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':emailuser', $emailuser, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function deleteInscription($idpart) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM participations WHERE idpart = '$idpart'");
	$delete->execute(array($idpart));
	return $delete->execute();
}

function deleteAllParticipations() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM participations");
	return $delete_all->execute();
}

?>