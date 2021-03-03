<?php

function insertDeces($dated, $motifd, $prenomhab) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO deces (dated, motifd, idhab) VALUES (:dated, :motifd, :prenomhab)");
	$insertion->bindValue(':dated', $dated, PDO::PARAM_STR);
	$insertion->bindValue(':motifd', $motifd, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	return $insertion->execute();
}

?>