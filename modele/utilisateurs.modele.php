<?php

function addUser($nom, $prenom, $pseudo, $email, $motdepasse) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO utilisateurs (nom, prenom, pseudo, email, motdepasse, date_inscription, heure_inscription, numero_confirmation, confirme, lvl) 
		VALUES (:nom, :prenom, :pseudo, :email, '".$motdepasse."', CURDATE(), CURTIME(), null, 1, 1)
	");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	return $insertion->execute();
}

function deleteUser($id) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM utilisateurs WHERE id = :id");
	$delete->bindValue(':id', $id, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllUsers() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM utilisateurs");
	return $delete_all->execute();
}

?>