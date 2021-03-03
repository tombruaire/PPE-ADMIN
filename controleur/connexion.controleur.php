<?php require "modele/connexion.modele.php";

if (isset($_SESSION['idadmin'])) {
	header('Location: http://localhost/PPE-ADMIN/accueil');
}

if (isset($_POST['connexion'])) {
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);
	$requete = getAdmin($mail, $mdp);
	if ($requete) { // Si le compte existe
		if($requete['droit'] == 0) { // - Si l'admin ne possède pas les droits (0)
			Alerts::setFlash("Vous n'avez pas la persmission d'accéder !", "warning");
		} else { // - Si l'admin possède les droits (1)
			$session->setVar('mail', $requete['mail']);
    		$session->setVar('droit', $requete['droit']);
    		$session->setVar('idadmin', $requete['idadmin']);
			header('Location: accueil');
		}
	} else {
		Alerts::setFlash("Identifiants incorrects", "warning");
	}
}

require "vue/connexion.php";

?>