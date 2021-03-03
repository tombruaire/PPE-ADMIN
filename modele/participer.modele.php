<?php

function insertParticipation($prenomhab, $nomevent) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO participer (idhab, idevent) VALUES (:prenomhab, :nomevent)");
	$insertion->bindValue(':prenomhab', $prenomhab, PDO::PARAM_STR);
	$insertion->bindValue(':nomevent', $nomevent, PDO::PARAM_STR);
	return $insertion->execute();
}

?>