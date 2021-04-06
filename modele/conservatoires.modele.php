<?php

function getAllConservatoires() {
	global $bdd;
	$conservatoires = $bdd->query("SELECT * FROM conservatoires ORDER BY idconserv DESC");
	$conservatoires->execute();
	return $conservatoires->fetchAll();
}

function insertConservatoire($nomconserv, $adresseconserv, $telephone, $effectifs, $datecreationconserv) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO conservatoires (nomconserv, adresseconserv, telephone, effectifs, datecreationconserv) 
		VALUES (:nomconserv, :adresseconserv, :telephone, :effectifs, :datecreationconserv)");
	$insertion->bindValue(':nomconserv', $nomconserv, PDO::PARAM_STR);
	$insertion->bindValue(':adresseconserv', $adresseconserv, PDO::PARAM_STR);
	$insertion->bindValue(':telephone', $telephone, PDO::PARAM_STR);
	$insertion->bindValue(':effectifs', $effectifs, PDO::PARAM_INT);
	$insertion->bindValue(':datecreationconserv', $datecreationconserv, PDO::PARAM_STR);
	return $insertion->execute();
}

function updateConservatoire($nomconserv, $adresseconserv, $telephone, $effectifs, $datecreationconserv, $idconserv){
	global $bdd;
	$update = $bdd->prepare("UPDATE conservatoires SET nomconserv = :nomconserv, adresseconserv = :adresseconserv, telephone = :telephone, effectifs = :effectifs, datecreationconserv = :datecreationconserv WHERE idconserv = :idconserv ");
	$update->bindValue(':nomconserv', $nomconserv, PDO::PARAM_STR);
	$update->bindValue(':adresseconserv', $adresseconserv, PDO::PARAM_STR);
	$update->bindValue(':telephone', $telephone, PDO::PARAM_STR);
	$update->bindValue(':effectifs', $effectifs, PDO::PARAM_INT);
	$update->bindValue(':datecreationconserv', $datecreationconserv, PDO::PARAM_STR);
	$update->bindValue(':idconserv', $idconserv, PDO::PARAM_INT);
	return $update->execute();
}

function checkTelephone($telephone) {
	global $bdd;
	$SQL_telephone = "SELECT telephone FROM conservatoires WHERE telephone = :telephone";
    $requete_telephone_exist = $bdd->prepare($SQL_telephone);
    $requete_telephone_exist->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $requete_telephone_exist->execute();
    return $requete_telephone_exist->fetchAll(PDO::FETCH_OBJ);
}

function deleteConserv($idconserv) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM conservatoires WHERE idconserv = :idconserv");
	$delete->bindValue(':idconserv', $idconserv, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllConserv() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM conservatoires");
	return $delete_all->execute();
}

?>