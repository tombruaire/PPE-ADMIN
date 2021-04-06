<?php

require "modele/inscriptions_ecoles.modele.php";

$inscriptions = getAllInscriptions();

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$ecole = $_POST['ecole'];
	if ($nom != "" && $prenom != "" && $email != "" && $ecole != ""  && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($email);
			if (!$requete_email_exist) {
					$insertion = insertEcole($nom, $prenom, $email, $ecole);	
					header('Location: inscriptions_ecoles');
			} else {
				Alerts::setFlash("Echec de l'insertion", "Cette adresse email est déjà utilisé !", "danger");
			}
		} else {
			Alerts::setFlash("Echec de l'insertion", "Adresse email non valide !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_GET['id_ins'])) {
	$id_ins  = $_GET['id_ins'];
	$delete = deleteInscription($id_ins);
	header('Location: inscriptions_ecoles');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllInsEcoles();
	header('Location: inscriptions_ecoles');
}

require "vue/inscriptions_ecoles.php";

?>