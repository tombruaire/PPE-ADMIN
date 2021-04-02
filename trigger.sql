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

DROP TRIGGER IF EXISTS insert_inscrit_evenements;
DELIMITER //
CREATE TRIGGER insert_inscrit_evenements
AFTER INSERT ON participations
FOR EACH ROW 
BEGIN
UPDATE evenements SET nbievent = nbievent + 1
WHERE nomevent = new.evenement;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS delete_inscrit_evenements;
DELIMITER //
CREATE TRIGGER delete_inscrit_evenements
AFTER DELETE ON participations
FOR EACH ROW 
BEGIN
UPDATE evenements SET nbievent = nbievent - 1
WHERE nomevent = old.evenement;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS insert_eleve_conservatoires;
DELIMITER //
CREATE TRIGGER insert_eleve_conservatoires
AFTER INSERT ON inscrits_conservatoires
FOR EACH ROW 
BEGIN
UPDATE conservatoires SET effectifs = effectifs + 1
WHERE nomconserv = new.conservatoire;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS delete_eleve_conservatoires;
DELIMITER //
CREATE TRIGGER delete_eleve_conservatoires
AFTER DELETE ON inscrits_conservatoires
FOR EACH ROW 
BEGIN
UPDATE conservatoires SET effectifs = effectifs - 1
WHERE nomconserv = old.conservatoire;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS insert_inscrits_associations;
DELIMITER //
CREATE TRIGGER insert_inscrits_associations
AFTER INSERT ON inscrits_associations
FOR EACH ROW
BEGIN
UPDATE associations SET inscrits = inscrits + 1
WHERE nomassoc = new.association;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS delete_inscrits_associations;
DELIMITER //
CREATE TRIGGER delete_inscrits_associations
AFTER DELETE ON inscrits_associations
FOR EACH ROW 
BEGIN
UPDATE associations SET inscrits = inscrits - 1
WHERE nomassoc = old.association;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS insert_eleve_ecole;
DELIMITER //
CREATE TRIGGER insert_eleve_ecole
AFTER INSERT ON inscrits_ecoles
FOR EACH ROW
BEGIN
UPDATE ecoles SET eleves = eleves + 1
WHERE nomec = new.ecole;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS delete_eleve_ecole;
DELIMITER //
CREATE TRIGGER delete_eleve_ecole
AFTER DELETE ON inscrits_ecoles
FOR EACH ROW 
BEGIN
UPDATE ecoles SET eleves = eleves - 1
WHERE nomec = old.ecole;
End //
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_event;
DELIMITER //
CREATE TRIGGER after_update_event
AFTER UPDATE ON evenements
FOR EACH ROW 
BEGIN
	INSERT INTO old_events (
		idevent,
		nomevent,
		dateevent,
		lieuevent,
		nbievent,
		prixplaceevent,
		placestotal,
		date_histo,
		event_histo
	) VALUES (
		OLD.idevent,
		OLD.nomevent,
		OLD.dateevent,
		OLD.lieuevent,
		OLD.nbievent,
		OLD.prixplaceevent,
		OLD.placestotal,
		NOW(),
		'UPDATE'
	);
End //
DELIMITER ;

DROP TRIGGER IF EXISTS after_delete_event;
DELIMITER //
CREATE TRIGGER after_delete_event
AFTER DELETE ON evenements
FOR EACH ROW 
BEGIN
	INSERT INTO old_events (
		idold,
		idevent,
		nomevent,
		dateevent,
		lieuevent,
		nbievent,
		prixplaceevent,
		placestotal,
		date_histo,
		event_histo
	) VALUES (
		idold,
		OLD.idevent,
		OLD.nomevent,
		OLD.dateevent,
		OLD.lieuevent,
		OLD.nbievent,
		OLD.prixplaceevent,
		OLD.placestotal,
		NOW(),
		'DELETE'
	);
End //
DELIMITER ;

-- test
UPDATE evenements SET nomevent = "TEST" WHERE idevent = 1;
DELETE FROM evenements WHERE idevent = 4;

-- FUNCTION ET TRIGGER QUI ANNULE L'INSERTION SI LE PSEUDO DE L'UTILISATEUR EXISTE DEJA
DROP FUNCTION IF EXISTS check_pseudo_utilisateur;
DELIMITER //
CREATE FUNCTION check_pseudo_utilisateur (newpseudo VARCHAR(15))
RETURNS INT
BEGIN
    SELECT count(*) FROM utilisateurs WHERE pseudo = newpseudo INTO @result;
    RETURN @result;
END//
DELIMITER ;

SELECT check_pseudo_utilisateur ('tombruaire');

DROP TRIGGER IF EXISTS valide_insertion;
DELIMITER //
CREATE TRIGGER valide_insertion 
BEFORE INSERT ON utilisateurs
FOR EACH ROW
BEGIN
    IF check_pseudo_utilisateur(NEW.pseudo) 
    THEN
        signal sqlstate'45000'
        set message_text='Ce pseudo est déjà utilisé';   
    END IF;
END //
DELIMITER ;
