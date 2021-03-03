<?php

function insertEnf($nomenf, $prenomenf, $datenaissenf, $sexenf, $classedage, $tuteur) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO enfants (nomenf, prenomenf, datenaissenf, sexenf, classedage, tuteur) 
		VALUES (:nomenf, :prenomenf, :datenaissenf, :sexenf, :classedage, :tuteur)
	");
	$insertion->bindValue(':nomenf', $nomenf, PDO::PARAM_STR);
	$insertion->bindValue(':prenomenf', $prenomenf, PDO::PARAM_STR);
	$insertion->bindValue(':datenaissenf', $datenaissenf, PDO::PARAM_STR);
	$insertion->bindValue(':sexenf', $sexenf, PDO::PARAM_STR);
	$insertion->bindValue(':classedage', $classedage, PDO::PARAM_STR);
	$insertion->bindValue(':tuteur', $tuteur, PDO::PARAM_STR);
	return $insertion->execute();
}

?>