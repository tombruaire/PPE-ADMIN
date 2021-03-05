DROP TRIGGER IF EXISTS compteur_insert_utilisateur;
DELIMITER //
CREATE TRIGGER compteur_insert_utilisateur
AFTER INSERT ON utilisateurs
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'utilisateurs";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_utilisateur;
DELIMITER //
CREATE TRIGGER compteur_delete_utilisateur
AFTER DELETE ON utilisateurs
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'utilisateurs";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_evenements;
DELIMITER //
CREATE TRIGGER compteur_insert_evenements
AFTER INSERT ON evenements
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'évènements";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_evenements;
DELIMITER //
CREATE TRIGGER compteur_delete_evenements
AFTER DELETE ON evenements
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'évènements";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_habitants;
DELIMITER //
CREATE TRIGGER compteur_insert_habitants
AFTER INSERT ON habitants
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'habitants";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_habitants;
DELIMITER //
CREATE TRIGGER compteur_delete_habitants
AFTER DELETE ON habitants
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'habitants";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_associations;
DELIMITER //
CREATE TRIGGER compteur_insert_associations
AFTER INSERT ON associations
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'associations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_associations;
DELIMITER //
CREATE TRIGGER compteur_delete_associations
AFTER DELETE ON associations
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'associations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_ecoles;
DELIMITER //
CREATE TRIGGER compteur_insert_ecoles
AFTER INSERT ON ecoles
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'écoles";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_ecoles;
DELIMITER //
CREATE TRIGGER compteur_delete_ecoles
AFTER DELETE ON ecoles
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'écoles";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_enfants;
DELIMITER //
CREATE TRIGGER compteur_insert_enfants
AFTER INSERT ON enfants
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'enfants";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_enfants;
DELIMITER //
CREATE TRIGGER compteur_delete_enfants
AFTER DELETE ON enfants
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'enfants";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_deces;
DELIMITER //
CREATE TRIGGER compteur_insert_deces
AFTER INSERT ON deces
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre de décès";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_deces;
DELIMITER //
CREATE TRIGGER compteur_delete_deces
AFTER DELETE ON deces
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre de deces";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_participations;
DELIMITER //
CREATE TRIGGER compteur_insert_participations
AFTER INSERT ON participer
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre de participations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_participations;
DELIMITER //
CREATE TRIGGER compteur_delete_participations
AFTER DELETE ON participer
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre de participations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_membres;
DELIMITER //
CREATE TRIGGER compteur_insert_membres
AFTER INSERT ON membres
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre de membres à une associations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_membres;
DELIMITER //
CREATE TRIGGER compteur_delete_membres
AFTER DELETE ON membres
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre de membres à une associations";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_inscriptions;
DELIMITER //
CREATE TRIGGER compteur_insert_inscriptions
AFTER INSERT ON inscrits
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre d'inscription à une école";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_inscriptions;
DELIMITER //
CREATE TRIGGER compteur_delete_inscriptions
AFTER DELETE ON inscrits
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre d'inscription à une école";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_mariages;
DELIMITER //
CREATE TRIGGER compteur_insert_mariages
AFTER INSERT ON marier
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre de mariages";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_mariages;
DELIMITER //
CREATE TRIGGER compteur_delete_mariages
AFTER DELETE ON marier
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre de mariages";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_insert_conservatoire;
DELIMITER //
CREATE TRIGGER compteur_insert_conservatoire
AFTER INSERT ON conservatoires
FOR EACH ROW UPDATE compteur SET nombre = nombre + 1
WHERE libelle = "Nombre de conservatoire";//
DELIMITER ;

DROP TRIGGER IF EXISTS compteur_delete_conservatoires;
DELIMITER //
CREATE TRIGGER compteur_delete_conservatoires
AFTER DELETE ON conservatoires
FOR EACH ROW UPDATE compteur SET nombre = nombre - 1
WHERE libelle = "Nombre de conservatoire";//
DELIMITER ;

-- INSERTION D'UN INSCRIT À UN ÉVENEMENT
DROP TRIGGER IF EXISTS insert_inscrit_evenements;
DELIMITER //
CREATE TRIGGER insert_inscrit_evenements
AFTER DELETE ON participations
FOR EACH ROW 
BEGIN
UPDATE evenements SET nbievent = nbievent + 1;
End //
DELIMITER ;

-- SUPPRESSION D'UN INSCRIT À UN ÉVENEMENT
DROP TRIGGER IF EXISTS delete_inscrit_evenements;
DELIMITER //
CREATE TRIGGER delete_inscrit_evenements
AFTER DELETE ON participations
FOR EACH ROW 
BEGIN
UPDATE evenements SET nbievent = nbievent - 1;
End //
DELIMITER ;

-- INSERTION D'UN ÉLEVE DANS CONSERVATOIRE
DROP TRIGGER IF EXISTS insert_eleve_conservatoires;
DELIMITER //
CREATE TRIGGER insert_eleve_conservatoires
AFTER DELETE ON inscrits_conservatoires
FOR EACH ROW 
BEGIN
UPDATE conservatoires SET effectifs = effectifs + 1;
End //
DELIMITER ;

-- SUPPRESSION D'UN ÉLEVE D'UN CONSERVATOIRE
DROP TRIGGER IF EXISTS delete_eleve_conservatoires;
DELIMITER //
CREATE TRIGGER delete_eleve_conservatoires
AFTER DELETE ON inscrits_conservatoires
FOR EACH ROW 
BEGIN
UPDATE conservatoires SET effectifs = effectifs - 1;
End //
DELIMITER ;

-- INSERTION D'UN INSCRIT DANS UNE ASSOCIATIONS
DROP TRIGGER IF EXISTS insert_inscrits_associations;
DELIMITER //
CREATE TRIGGER insert_inscrits_associations
AFTER INSERT ON inscrits_associations
FOR EACH ROW
BEGIN
UPDATE associations SET inscrits = inscrits + 1;
End //
DELIMITER ;

-- SUPPRESSION D'UN INSCRIT D'UNE ASSOCIATION
DROP TRIGGER IF EXISTS delete_inscrits_associations;
DELIMITER //
CREATE TRIGGER delete_inscrits_associations
AFTER DELETE ON inscrits_associations
FOR EACH ROW 
BEGIN
UPDATE associations SET inscrits = inscrits - 1;
End //
DELIMITER ;

-- INSERTION D'UN ELEVE DANS UNE ECOLE
DROP TRIGGER IF EXISTS insert_eleve_ecole;
DELIMITER //
CREATE TRIGGER insert_eleve_ecole
AFTER INSERT ON inscrits_ecoles
FOR EACH ROW
BEGIN
UPDATE ecoles SET eleves = eleves + 1;
End //
DELIMITER ;

-- SUPPRESSION D'UN ELEVE D'UNE ECOLE
DROP TRIGGER IF EXISTS delete_eleve_ecole;
DELIMITER //
CREATE TRIGGER delete_eleve_ecole
AFTER DELETE ON inscrits_ecoles
FOR EACH ROW 
BEGIN
UPDATE ecoles SET eleves = eleves - 1;
End //
DELIMITER ;