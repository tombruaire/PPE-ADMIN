<?php

function insertParticipation($emailuser, $evenement) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO participations (emailuser, evenement) VALUES (:emailuser, :evenement)");
	$insertion->bindValue(':emailuser', $emailuser, PDO::PARAM_STR);
	$insertion->bindValue(':evenement', $evenement, PDO::PARAM_STR);
	$insertion->execute();
	
	$update = $bdd->prepare("UPDATE evenements SET nbievent = nbievent + 1 WHERE nomevent = :nomevent");
	$update->bindValue(':nomevent', $evenement, PDO::PARAM_STR);
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

?>