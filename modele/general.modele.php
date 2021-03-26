<?php

function deleteAllCompteurs() {
	global $bdd;
	$delete_all = $bdd->prepare("DELETE FROM compteur");
	return $delete_all->execute();
}

?>