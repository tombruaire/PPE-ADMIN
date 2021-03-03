<?php require "modele/utilisateurs.modele.php";

// INSERTION
if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$motdepasse = sha1(generateMdp());
	$requete = addUser($nom, $prenom, $pseudo, $email, $motdepasse);
	$NOM_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET nom = UPPER(nom)");
	$NOM_MAJUSCULE->execute(array($nom));
	$Prenom_MAJUSCULE = $bdd->prepare("UPDATE utilisateurs SET prenom = CONCAT(UCASE(LEFT(prenom,1)), LCASE(SUBSTRING(prenom,2)))");
	$Prenom_MAJUSCULE->execute(array($prenom));
	Alerts::setFlash("Utilisateur ajouté avec succès !");
}

// RETOUR
if (isset($_POST['retour'])) {
	header('Location: utilisateurs');
}

// SUPPRESSION
if (isset($_GET['delete'])) {
	$id  = $_GET['delete'];
	$delete = $bdd->prepare("DELETE FROM utilisateurs WHERE id = '$id'");
	$delete->execute(array($id));
	header('Location: utilisateurs');
}


// Banir
if (isset($_GET['ban'])) {
	$bdd->query("UPDATE utilisateurs SET lvl = 0 WHERE id = ".$_GET['ban']);
	header('Location: utilisateurs');
}

// Débanir
if (isset($_GET['deban'])) {
	$bdd->query("UPDATE utilisateurs SET lvl = 1 WHERE id = ".$_GET['deban']);
	header('Location: utilisateurs');
}

require "vue/utilisateurs.php";

?>