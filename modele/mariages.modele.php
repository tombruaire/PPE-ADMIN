<?php

function getAllMariages() {
	global $bdd;
	$mariages = $bdd->query("SELECT * FROM viewMariage ORDER BY idhab1 DESC");
	$mariages->execute();
	return $mariages->fetchAll();
}

function insertMariage($prenomhab1, $prenomhab2, $datem, $heurem, $datediv) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO marier (idhab1, idhab2, datem, heurem, datediv) VALUES (:prenomhab1, :prenomhab2, :datem, :heurem, :datediv)");
	$insertion->bindValue(':prenomhab1', $prenomhab1, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab2', $prenomhab2, PDO::PARAM_STR);
	$insertion->bindValue(':datem', $datem, PDO::PARAM_STR);
	$insertion->bindValue(':heurem', $heurem, PDO::PARAM_STR);
	$insertion->bindValue(':datediv', $datediv, PDO::PARAM_STR);
	return $insertion->execute();
}

function deleteMariage($idhab1) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM marier WHERE idhab1 = :idhab1");
	$delete->bindValue(':idhab1', $idhab1, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllMariages() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM marier");
	return $delete_all->execute();
}

?>