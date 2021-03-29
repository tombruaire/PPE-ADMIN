<?php 

require "modele/connexion.modele.php";

if (isset($_SESSION['idadmin'])) {
	header('Location: http://localhost/PPE-ADMIN/accueil');
}

if (isset($_POST['connexion'])) {
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);
	if ($mail != "" && $mdp != "") {
		$requete = getAdmin($mail, $mdp);
		if ($requete) {
			if($requete['droit'] == 0) {
				Alerts::setFlash("Erreur de connexion", "Vous n'avez pas la persmission d'accéder !", "warning");
			} else {
				$session->setVar('mail', $requete['mail']);
	    		$session->setVar('droit', $requete['droit']);
	    		$session->setVar('idadmin', $requete['idadmin']);
				header('Location: accueil');
			}
		} else {
			Alerts::setFlash("Erreur de connexion", "Identifiants incorrects", "danger");
		}
	} else {
		Alerts::setFlash("Erreur de connexion", "Veuillez compléter tous les champs", "warning");
	}
}

require "vue/connexion.php";

?>