<?php

require "modele/inscriptions_associations.modele.php";

$inscriptions = getAllInscriptions();

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$association = $_POST['association'];
	if ($nom != "" && $prenom != "" && $email != "" && $association != ""  && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($email);
			if (!$requete_email_exist) {
					$insertion = insertInscription($nom, $prenom, $email, $association);
					header('Location: inscriptions_associations');
			} else {
				Alerts::setFlash("Echec de l'insertion", "Cette adresse email est déjà utilisé !", "danger");
			}
		} else {
			Alerts::setFlash("Echec de l'insertion", "Adresse email non valide !", "danger");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_GET['id_ins'])) {
	$id_ins  = $_GET['id_ins'];
	$delete = deleteInscription($id_ins);
	header('Location: inscriptions_associations');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllInsAssoc();
	header('Location: inscriptions_associations');
}

require "vue/inscriptions_associations.php";

?>