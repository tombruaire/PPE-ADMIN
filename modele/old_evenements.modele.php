<?php

function deleteHistorique($idold) {
	global $bdd;
	$delete = $bdd->prepare("DELETE FROM old_events WHERE idold = '$idold'");
	$delete->execute(array($idold));
	return $delete->execute();
}

function deleteAllHistorique() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM old_events");
	return $delete_all->execute();
}

?>