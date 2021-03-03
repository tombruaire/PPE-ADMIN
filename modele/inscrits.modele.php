<?php

function insertInscrit($nomec, $prenomenf, $datei, $cout) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO inscrits (idec, idenf, datei, cout) VALUES (:nomec, :prenomenf, :datei, :cout)");
	$insertion->bindValue(':nomec', $nomec, PDO::PARAM_STR);
	$insertion->bindValue(':prenomenf', $prenomenf, PDO::PARAM_STR);
	$insertion->bindValue(':datei', $datei, PDO::PARAM_STR);
	$insertion->bindValue(':cout', $cout, PDO::PARAM_INT);
	return $insertion->execute();
}

?>