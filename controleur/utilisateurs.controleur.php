<?php 

require "modele/utilisateurs.modele.php";

$users = getAllUsers();

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$motdepasse = sha1(generateMdp());
	if ($nom != "" && $prenom != "" && $pseudo != "" && $email != "") {
		$requete = addUser($nom, $prenom, $pseudo, $email, $motdepasse);
		$NOM_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET nom = UPPER(nom)");
		$NOM_MAJUSCULE->execute(array($nom));
		$Prenom_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET prenom = CONCAT(UCASE(LEFT(prenom,1)), LCASE(SUBSTRING(prenom,2)))");
		$Prenom_MAJUSCULE->execute(array($prenom));
		header('Location: utilisateurs');
	} else {
		Alerts::setFlash("Echec de l'insertion", "Tous les champs doivent être compléter !", "warning");
	}
}

if (isset($_POST['modifier'])) {
	$id = $_GET['edit'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	if ($nom != "" && $prenom != "" && $pseudo != "" && $email != "") {
		$update = updateUser($nom, $prenom, $pseudo, $email, $id);
		header('Location: utilisateurs');
	} else {
		Alerts::setFlash("Echec de la modification", "Les champs ne doivent pas être vide !", "warning");
	}
}

if (isset($_POST['retour'])) {
	header('Location: utilisateurs');
}

if (isset($_GET['delete'])) {
	$id  = $_GET['delete'];
	$delete = deleteUser($id);
	header('Location: utilisateurs');
}

if (isset($_GET['ban'])) {
	$bdd->query("UPDATE utilisateurs SET lvl = 0 WHERE id = ".$_GET['ban']);
	header('Location: utilisateurs');
}

if (isset($_GET['deban'])) {
	$bdd->query("UPDATE utilisateurs SET lvl = 1 WHERE id = ".$_GET['deban']);
	header('Location: utilisateurs');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllUsers();
	header('Location: utilisateurs');
}

require "vue/utilisateurs.php";

?>