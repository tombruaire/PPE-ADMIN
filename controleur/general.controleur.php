<?php 

require "modele/general.modele.php";

if (isset($_POST['delete'])) {
	$delete_all = deleteAllCompteurs();
	header('Location: general');
}

$compteurs = getAllCompteurs();

require "vue/general.php"; 

?>