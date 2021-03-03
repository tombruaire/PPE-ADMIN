<?php

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

function checkTelephone($telephone) {
	global $bdd;
	$SQL_telephone = "SELECT telephone FROM conservatoires WHERE telephone = :telephone";
    $requete_telephone_exist = $bdd->prepare($SQL_telephone);
    $requete_telephone_exist->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $requete_telephone_exist->execute();
    return $requete_telephone_exist->fetchAll(PDO::FETCH_OBJ);
}

?>