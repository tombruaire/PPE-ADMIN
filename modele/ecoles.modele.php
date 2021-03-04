<?php

function insertEcole($nomec, $adresseec, $eleves) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO ecoles (nomec, adresseec, eleves) VALUES (:nomec, :adresseec, :eleves)");
	$insertion->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$insertion->bindValue(':adresseec', $adresseec, PDO::PARAM_STR);
	$insertion->bindValue(':eleves', $eleves, PDO::PARAM_INT);
	return $insertion->execute();
}

?>