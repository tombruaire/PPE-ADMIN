<?php

function getAdmin($mail, $mdp) {
	global $bdd;
	$requete = $bdd->prepare("SELECT * FROM admin WHERE mail  = :mail AND mdp = :mdp");
	$requete->bindValue(':mail', $mail, PDO::PARAM_STR);
	$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$requete->execute();
	return $requete->fetch();
}

?>