<?php

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

?>