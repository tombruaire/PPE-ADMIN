<?php

function getAllUsers() {
	global$bdd;
	$users = $bdd->query('SELECT id, nom, prenom, pseudo, email, date_format(date_inscription, "%d/%m/%Y"), heure_inscription, confirme, lvl FROM utilisateurs ORDER BY id DESC');
	$users->execute();
	return $users->fetchAll();
}

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

function updateUser($nom, $prenom, $pseudo, $email, $id) {
	global $bdd;
	$update = $bdd->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email WHERE id = :id");
	$update->bindValue(':nom', $nom, PDO::PARAM_STR);
	$update->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$update->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$update->bindValue(':email', $email, PDO::PARAM_STR);
	$update->bindValue(':id', $id, PDO::PARAM_INT);
	return $update->execute();
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