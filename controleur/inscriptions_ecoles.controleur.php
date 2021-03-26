<?php

require "modele/inscriptions_ecoles.modele.php";

// INSERTION
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
					Alerts::setFlash("Inscription réussi avec succès !");	
			} else {
				Alerts::setFlash("Cette adresse email est déjà utilisé.", "warning");
			}
		} else {
			Alerts::setFlash("Adresse email non valide.", "danger");
		}
	} else {
		Alerts::setFlash("Erreur lors de l'inscription, veuillez réessayer.", "danger");
	}
}

// SUPPRIMER UNE INSCRIPTION
if (isset($_GET['id_ins'])) {
	$id_ins  = $_GET['id_ins'];
	$delete = deleteInscription($id_ins);
	header('Location: inscriptions_ecoles');
}

// SUPPRIMER TOUTES LES INSCRIPTIONS
if (isset($_POST['delete'])) {
	$delete_all = deleteAllInsEcoles();
	header('Location: inscriptions_ecoles');
}

require "vue/inscriptions_ecoles.php";

?>