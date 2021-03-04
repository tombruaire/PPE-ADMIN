<?php

require "modele/inscriptions_conservatoires.modele.php";

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$adresse = $_POST['adresse'];
	$conservatoire = $_POST['conservatoire'];
	if ($nom != "" && $prenom != "" && $email != "" && $tel != "" && $adresse != "" && $conservatoire != ""  && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($email);
			if (!$requete_email_exist) {
				$requete_tel_exist = checkTel($tel);
				if (!$requete_tel_exist) {
					$requete_adresse_exist = checkAdresse($adresse);
					if (!$requete_adresse_exist) {
						$tellength = strlen($tel);
						if ($tellength <= 10) {
							$insertion = insertInscription($nom, $prenom, $email, $tel, $adresse, $conservatoire);
							Alerts::setFlash("Élève ajouté avec succès !");	
						} else {
							Alerts::setFlash("Le numéro de téléphone ne doit pas dépasser 10 caractères.", "warning");
						}
					} else {
						Alerts::setFlash("Cette adresse a déjà été enregistré.", "warning");
					}
				} else {
					Alerts::setFlash("Ce numéro de téléphone est déjà enregistré.", "warning");
				}
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

if (isset($_GET['id_ins'])) {
	$id_ins  = $_GET['id_ins'];
	$delete = deleteInscription($id_ins);
	header('Location: inscriptions_conservatoires');
}

require "vue/inscriptions_conservatoires.php";

?>