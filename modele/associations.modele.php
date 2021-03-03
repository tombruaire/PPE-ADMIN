<?php

function insertAssoc($nomassoc, $siegeassoc, $datecreationassoc) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO associations (nomassoc, siegeassoc, datecreationassoc) VALUES (:nomassoc, :siegeassoc, :datecreationassoc)");
	$insertion->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
	$insertion->bindValue(':siegeassoc', $siegeassoc, PDO::PARAM_STR);
	$insertion->bindValue(':datecreationassoc', $datecreationassoc, PDO::PARAM_STR);
	return $insertion->execute();
}

?>