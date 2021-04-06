<?php

function getAllEnfants() {
	global $bdd;
	$enfants = $bdd->query("SELECT * FROM enfants ORDER BY idenf DESC");
	$enfants->execute();
	return $enfants->fetchAll();
}

function insertEnf($nomenf, $prenomenf, $datenaissenf, $sexenf, $classedage, $tuteur) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO enfants (nomenf, prenomenf, datenaissenf, sexenf, classedage, tuteur) 
		VALUES (:nomenf, :prenomenf, :datenaissenf, :sexenf, :classedage, :tuteur)");
	$insertion->bindValue(':nomenf', $nomenf, PDO::PARAM_STR);
	$insertion->bindValue(':prenomenf', $prenomenf, PDO::PARAM_STR);
	$insertion->bindValue(':datenaissenf', $datenaissenf, PDO::PARAM_STR);
	$insertion->bindValue(':sexenf', $sexenf, PDO::PARAM_STR);
	$insertion->bindValue(':classedage', $classedage, PDO::PARAM_STR);
	$insertion->bindValue(':tuteur', $tuteur, PDO::PARAM_STR);
	return $insertion->execute();
}

function deleteEnfant($idenf) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM enfants WHERE idenf = :idenf");
	$delete->bindValue(':idenf', $idenf, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllEnfants() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM enfants");
	return $delete_all->execute();
}

?>