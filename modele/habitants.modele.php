<?php

function insertHab($nomhab, $prenomhab, $sexehab, $datenaisshab, $adressehab, $professionhab) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO habitants (nomhab, prenomhab, sexehab, datenaisshab, adressehab, professionhab) 
		VALUES (:nomhab, :prenomhab, :sexehab, :datenaisshab, :adressehab, :professionhab)");
	$insertion->bindValue(':nomhab', $nomhab, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	$insertion->bindValue(':sexehab', $sexehab, PDO::PARAM_STR);
	$insertion->bindValue(':datenaisshab', $datenaisshab, PDO::PARAM_STR);
	$insertion->bindValue(':adressehab', $adressehab, PDO::PARAM_STR);
	$insertion->bindValue(':professionhab', $professionhab, PDO::PARAM_STR);
	return $insertion->execute();
}

?>