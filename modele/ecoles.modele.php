<?php

function insertEcole($nomec, $adresseec) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO ecoles (nomec, adresseec) VALUES (:nomec, :adresseec)");
	$insertion->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$insertion->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
	return $insertion->execute();
}

?>