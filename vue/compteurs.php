<?php 

// Nombre de visiteurs
$requete_visiteur = $bdd->query("SELECT * FROM online");
$visiteurs = $requete_visiteur->rowCount();

// Nombre de comptes utilisateurs
$requete_user = $bdd->query("SELECT * FROM utilisateurs");
$utilisateurs = $requete_user->rowCount();

// Nombre d'associations créers
$requete_assoc = $bdd->query("SELECT * FROM associations");
$associations = $requete_assoc->rowCount();

// Nombre d'évènements organisés
$requete_event = $bdd->query("SELECT * FROM evenements");
$evenements = $requete_event->rowCount();

?>