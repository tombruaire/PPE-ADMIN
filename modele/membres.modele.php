<?php

function insertMembre($nomassoc, $prenomhab) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO membres (idassoc, idhab) VALUES (:nomassoc, :prenomhab)");
	$insertion->bindValue(':nomassoc', $nomassoc, PDO::PARAM_STR);
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	return $insertion->execute();
}

?>