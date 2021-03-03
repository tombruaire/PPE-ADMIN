Create table admin (
	idadmin int(11) not null auto_increment,
	mail varchar(255) UNIQUE,
	mdp varchar(255),
	droit int not null default 0,
	primary key (idadmin)
) ENGINE=InnoDB;

Insert into admin values
(1, "test@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 0),
(2, "admin@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 1);

Create table online (
	id int(11) not null auto_increment,
	time int,
	user_ip varchar(255),
	primary key (id)
) ENGINE=InnoDB;

Create table compteur (
	idcompteur int(11) not null auto_increment,
	libelle varchar(255),
	nombre int,
	primary key (idcompteur)
) ENGINE=InnoDB;

Insert into compteur values
(1, "Nombre d'utilisateurs", 3),
(2, "Nombre d'évènements", 4),
(3, "Nombre d'habitants", 4),
(4, "Nombre d'associations", 2),
(5, "Nombre d'écoles", 2),
(6, "Nombre d'enfants", 2),
(7, "Nombre de décès", 2),
(8, "Nombre de participations", 2),
(9, "Nombre de membres d'une association", 2),
(10, "Nombre d'inscription à une école", 4),
(11, "Nombre de mariages", 2),
(12, "Nombre de conservatoire", 22);

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
