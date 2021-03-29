<?php 

require "modele/profil.modele.php";

// Modification de l'adresse email
if (isset($_POST['edit-mail'])) {
	$mail = $_POST['mail'];
	$newmail = $_POST['newmail'];
	if ($mail != "" && $newmail != "") {
		$requete_email_exist = checkEmail($mail);
		if ($requete_email_exist) {
			$update = updateEmail($newmail);
			Session::destroy();
		} else {
			Alerts::setFlash("Echec de la modification", "Adresse email incorrecte !", "danger");
		}
	} else {
		Alerts::setFlash("Echec de la modification", "Tous les champs doivent être compléter !", "warning");
	}
}

// Modification du mot de passe
if (isset($_POST['edit-mdp'])) {
	$mdp = sha1($_POST['mdp']);
	$newmdp = sha1($_POST['newmdp']);
	$newmdp2 = sha1($_POST['newmdp2']);
	if ($mdp != "" && $newmdp != "" && $newmdp2 != "") {
		$requete_mdp_exist = checkMdp($mdp);
		if ($requete_mdp_exist) {
			if ($newmdp == $newmdp2) {
				$update = updateMdp($newmdp);
				Session::destroy();
			} else {
				Alerts::setFlash("Echec de la modification", "Les mots de passes ne correspondent pas !", "warning");
			}
		} else {
			Alerts::setFlash("Echec de la modification", "Mot de passe incorrecte !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de la modification", "Tous les champs doivent être compléter !", "warning");
	}
}

// Suppression du compte
if (isset($_POST['delete'])) {
	$mail = $_POST['mail'];
	$mdp = sha1($_POST['mdp']);
	if ($mail != "" && $mdp != "") {
		$requete_user_exist = checkUser($mail, $mdp);
		if ($requete_user_exist) {
			$delete = deleteUser();
			Session::destroy();
		} else {
			Alerts::setFlash("Echec de la suppression", "Identifiants incorrects !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de la suppression", "Tous les champs doivent être compléter !", "warning");
	}
}

// Création d'un compte administrateur
if (isset($_POST['submit'])) {
	$mail = $_POST['mail'];
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
	if ($mail != "" && $mdp != "" && $mdp2 != "") {
		$requete_user_exist = checkUser($mail);
		if (!$requete_user_exist) {
			if ($mdp == $mdp2) {
				$insertion = createAdmin($mail, $mdp);
				Alerts::setFlash("Insertion réussi !", "Le compte a bien été créer !");
			} else {
				Alerts::setFlash("Echec de la création", "Les mots de passes ne correspondent pas !", "warning");
			}
		} else {
			Alerts::setFlash("Echec de la création", "Ce compte existe déjà !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de la création", "Tous les champs doivent être compléter !", "warning");
	}
}

require "vue/profil.php"; 

?>