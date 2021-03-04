<?php require "modele/participations_evenements.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$emailuser = $_POST['emailuser'];
	$evenement = $_POST['evenement'];
	if ($emailuser != "" && $evenement != "" && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-z]{2,6}$#", $emailuser)) {
		if (filter_var($emailuser, FILTER_VALIDATE_EMAIL)) {
			$requete_email_exist = checkEmail($emailuser);
			if (!$requete_email_exist) {
				$insertion = insertParticipation($emailuser, $evenement);
				Alerts::setFlash("Participation ajoutée avec succès !");
			} else {
				Alerts::setFlash("Vous ne pouvez pas enregistrer 2 fois la même adresse email.", "warning");
			}
		} else {
			Alerts::setFlash("Adresse email non valide.", "danger");
		}
	} else {
		Alerts::setFlash("Erreur lors de l'inscription, veuillez réessayer.", "danger");
	}
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: participations_evenements');
}

// SUPPRESSION
if (isset($_GET['idpart'])) {
	$idpart  = $_GET['idpart'];
	$delete = $bdd->prepare("DELETE FROM participations WHERE idpart = '$idpart'");
	$delete->execute(array($idpart));
	header('Location: participations_evenements');
}

if (isset($_GET['idpart'])) {
	$idpart  = $_GET['idpart'];
	$delete = deleteInscription($idpart);
	header('Location: participations_evenements');
}

require "vue/participations_evenements.php";

?>