<?php

function getAllInscriptions() {
	global $bdd;
	$inscriptions = $bdd->query("SELECT * FROM inscrits_associations ORDER BY id_ins DESC");
	$inscriptions->execute();
	return $inscriptions->fetchAll();
}


function insertInscription($nom, $prenom, $email, $association) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO inscrits_associations (nom, prenom, email, association, date_heure_inscription) VALUES (:nom, :prenom, :email, :association, NOW())");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':association', $association, PDO::PARAM_STR);
	$insertion->execute();
	return $insertion->execute();
}

function checkEmail($email) {
	global $bdd;
	$SQL_email = "SELECT email FROM inscrits_associations WHERE email = :email";
    $requete_email_exist = $bdd->prepare($SQL_email);
    $requete_email_exist->bindParam(':email', $email, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function deleteInscription($id_ins) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM inscrits_associations WHERE id_ins = :id_ins");
	$delete->bindValue(':id_ins', $id_ins, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllInsAssoc() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM inscrits_associations");
	return $delete_all->execute();
}

?>