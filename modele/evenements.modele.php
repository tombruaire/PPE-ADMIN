<?php

function getAllEnvent() {
	global $bdd;
	$evenements = $bdd->query("SELECT * FROM evenements ORDER BY idevent DESC");
	$evenements->execute();
	return $evenements->fetchAll();
}

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

function updateEvent($nomevent, $dateevent, $heureevent, $lieuevent, $nbievent, $prixplaceevent, $placestotal, $idevent) {
	global $bdd;
	$update = $bdd->prepare("UPDATE evenements SET nomevent = :nomevent, dateevent = :dateevent, heureevent = :heureevent, lieuevent = :lieuevent, nbievent = :nbievent, prixplaceevent = :prixplaceevent, placestotal = :placestotal WHERE idevent = :idevent ");
	$update->bindValue(':nomevent', $nomevent, PDO::PARAM_STR);
	$update->bindValue(':dateevent', $dateevent, PDO::PARAM_STR);
	$update->bindValue(':heureevent', $heureevent, PDO::PARAM_STR);
	$update->bindValue(':lieuevent', $lieuevent, PDO::PARAM_STR);
	$update->bindValue(':nbievent', $nbievent, PDO::PARAM_INT);
	$update->bindValue(':prixplaceevent', $prixplaceevent, PDO::PARAM_INT);
    $update->bindValue(':placestotal', $placestotal, PDO::PARAM_INT);
    $update->bindValue(':idevent', $idevent, PDO::PARAM_INT);
	return $update->execute();
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