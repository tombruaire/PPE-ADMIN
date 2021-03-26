<?php

function insertEvent($nomevent, $dateevent, $heureevent, $lieuevent, $prixplaceevent, $placestotal) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO evenements (nomevent, dateevent, heureevent, lieuevent, nbievent, prixplaceevent, placestotal) 
		VALUES (:nomevent, :dateevent, :heureevent, :lieuevent, 0, :prixplaceevent, :placestotal)");
	$insertion->bindValue(':nomevent', $nomevent, PDO::PARAM_STR);
	$insertion->bindValue(':dateevent', $dateevent, PDO::PARAM_STR);
	$insertion->bindValue(':heureevent', $heureevent, PDO::PARAM_STR);
	$insertion->bindValue(':lieuevent', $lieuevent, PDO::PARAM_STR);
	$insertion->bindValue(':prixplaceevent', $prixplaceevent, PDO::PARAM_INT);
    $insertion->bindValue(':placestotal', $placestotal, PDO::PARAM_INT);
	return $insertion->execute();
}

function deleteEvent($idevent) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM evenements WHERE idevent = :idevent");
	$delete->bindValue(':idevent', $idevent, PDO::PARAM_INT);
	return $delete->execute();
}

function deleteAllEvents() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM evenements");
	return $delete_all->execute();
}

?>