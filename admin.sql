Create table admin (
	idadmin int(11) not null auto_increment,
	mail varchar(255) UNIQUE,
	mdp varchar(255),
	droit int not null default 0,
	primary key (idadmin)
) ENGINE=InnoDB;

Insert into admin values
(1, "admin@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6", 1);

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
(9, "Nombre de mariages", 2),
(10, "Nombre de conservatoire", 22);

Create table old_events (
	idold int(11) not null auto_increment,
	idevent int(11) not null,
	nomevent varchar(50),
	dateevent date,
	lieuevent varchar(50),
	nbievent int(25),
	prixplaceevent float(25),
	placestotal int(25),
	date_histo datetime,
	event_histo varchar(10),
	primary key (idold, idevent)
) ENGINE=InnoDB;
