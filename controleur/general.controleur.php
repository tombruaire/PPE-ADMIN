<?php 

require "modele/general.modele.php";

// SUPPRIMER TOUS LES COMPTEURS
if (isset($_POST['delete'])) {
	$delete_all = deleteAllCompteurs();
	header('Location: general');
}

require "vue/general.php"; 

?>