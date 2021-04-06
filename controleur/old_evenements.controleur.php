<?php

require "modele/old_evenements.modele.php";

$oldsevents = getAllOldEvents();

if (isset($_GET['idold'])) {
	$idold  = $_GET['idold'];
	$delete = deleteHistorique($idold);
	header('Location: old_evenements');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllHistorique();
	header('Location: old_evenements');
}

require "vue/old_evenements.php";

?>