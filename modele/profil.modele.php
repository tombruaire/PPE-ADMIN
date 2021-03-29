<?php

function checkEmail($mail) {
	global $bdd;
	$SQL_mail = "SELECT mail FROM admin WHERE mail = :mail";
    $requete_email_exist = $bdd->prepare($SQL_mail);
    $requete_email_exist->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete_email_exist->execute();
    return $requete_email_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateEmail($newmail) {
	global $bdd;
	$UPDATE_email = "UPDATE admin SET mail = :mail WHERE idadmin = '".$_SESSION['idadmin']."' ";
	$update = $bdd->prepare($UPDATE_email);
	$update->bindValue(':mail', $newmail, PDO::PARAM_STR);
	return $update->execute();
}

function checkMdp($mdp) {
	global $bdd;
	$SQL_mdp = "SELECT mdp FROM admin WHERE mdp = :mdp";
    $requete_mdp_exist = $bdd->prepare($SQL_mdp);
    $requete_mdp_exist->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $requete_mdp_exist->execute();
    return $requete_mdp_exist->fetchAll(PDO::FETCH_OBJ);
}

function updateMdp($newmdp) {
	global $bdd;
	$UPDATE_mdp = "UPDATE admin SET mdp = :mdp WHERE idadmin = '".$_SESSION['idadmin']."' ";
	$update = $bdd->prepare($UPDATE_mdp);
	$update->bindValue(':mdp', $newmdp, PDO::PARAM_STR);
	return $update->execute();
}

function checkUser($mail) {
	global $bdd;
	$SQL_user = "SELECT * FROM admin WHERE mail = :mail";
    $requete_user_exist = $bdd->prepare($SQL_user);
    $requete_user_exist->bindParam(':mail', $mail, PDO::PARAM_STR);
    $requete_user_exist->execute();
    return $requete_user_exist->fetchAll(PDO::FETCH_OBJ);
}

function deleteUser() {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM admin WHERE idadmin = '".$_SESSION['idadmin']."' ");
	return $delete->execute();
}

function createAdmin($mail, $mdp) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO admin (mail, mdp, droit) VALUES (:mail, :mdp, 1)");
	$insertion->bindValue(':mail', $mail, PDO::PARAM_STR);
	$insertion->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	return $insertion->execute();
}

?>