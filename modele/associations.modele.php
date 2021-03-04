<?php

function insertAssoc($nomassoc, $siegeassoc, $datecreationassoc, $inscrits) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO associations (nomassoc, siegeassoc, datecreationassoc, inscrits) VALUES (:nomassoc, :siegeassoc, :datecreationassoc, :inscrits)");
	$insertion->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
	$insertion->bindValue(':siegeassoc', $siegeassoc, PDO::PARAM_STR);
	$insertion->bindValue(':datecreationassoc', $datecreationassoc, PDO::PARAM_STR);
	$insertion->bindValue(':inscrits', $inscrits, PDO::PARAM_INT);
	return $insertion->execute();
}

?>