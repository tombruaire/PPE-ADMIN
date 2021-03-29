<?php 

require "modele/participations_evenements.modele.php";

if (isset($_POST['submit'])) {
	$emailuser = $_POST['emailuser'];
	$evenement = $_POST['evenement'];
	if ($emailuser != "" && $evenement != "" && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $emailuser)) {
		if (filter_var($emailuser, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($emailuser);
			if (!$requete_email_exist) {
				$insertion = insertParticipation($emailuser, $evenement);
				Alerts::setFlash("Insertion réussi !", "Participation ajoutée avec succès !");
			} else {
				Alerts::setFlash("Echec de l'insertion", "Vous ne pouvez pas enregistrer 2 fois la même adresse email !", "danger");
			}
		} else {
			Alerts::setFlash("Echec de l'insertion", "Adresse email non valide !", "warning");
		}
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: participations_evenements');
}

if (isset($_GET['idpart'])) {
	$idpart  = $_GET['idpart'];
	$delete = deleteInscription($idpart);
	header('Location: participations_evenements');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllParticipations();
	header('Location: participations_evenements');
}

require "vue/participations_evenements.php";

?>