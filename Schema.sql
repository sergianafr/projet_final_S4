CREATE DATABASE Garage;
use Garage;

CREATE TABLE heure_travail(
    id int primary key auto_increment,
    debut int not null,
    fin int not null
) engine=InnoDB;

CREATE TABLE slot(
    id int primary key auto_increment,
    libelle varchar(2) not null unique
)engine=InnoDB;

CREATE TABLE type_service(
    id int primary key auto_increment,
    libelle varchar(50) not null unique,
    duree time not null,
    prix double precision not null
)engine=InnoDB;

CREATE TABLE type_vehicule(
    id int primary key auto_increment,
    libelle varchar(50) not null unique
)engine=InnoDB;

CREATE TABLE client(
    id int primary key auto_increment,
    num_matricule varchar(8) not null unique,
    id_type_vehicule int references type_vehicule(id)
)engine=InnoDB;

CREATE TABLE admin(
    id int primary key auto_increment,
    pseudo varchar(30),
    mdp varchar(100)
)engine=InnoDB;

CREATE TABLE rendez_vous(
    id int primary key auto_increment,
    id_client int references client(id),
    debut datetime not null,
    date_prise_rdv date not null,
    id_type_service int references type_service(id),
    id_slot int references slot(id),
    devis double precision,
    date_payement date default null
)engine=InnoDB;

CREATE TABLE date_reference(
    id int primary key auto_increment,
    date_reference date not null
)engine=InnoDB;


CREATE TABLE details_rdv(
    id int primary key auto_increment,
    idRDV int references rdv(id),
    date_heure_debut datetime not null,
    date_heure_fin datetime not null,
    idSlot int references slot(id),
    duree time not null
)engine=InnoDB;

DELIMITER //

CREATE PROCEDURE slots_disponibles(
    IN dateheuredebut_donnee DATETIME,
    IN dateheurefin_donnee DATETIME
)
BEGIN
    SELECT DISTINCT s.id, s.libelle
        FROM slot s
        LEFT JOIN details_rdv dr ON s.id = dr.idSlot
        WHERE NOT (
            (dateheuredebut_donnee BETWEEN dr.date_heure_debut AND dr.date_heure_fin)
            OR (dateheurefin_donnee BETWEEN dr.date_heure_debut AND dr.date_heure_fin)
        ) AND (dateheuredebut_donnee >=  dr.date_heure_debut AND dateheurefin_donnee >  dr.date_heure_fin )
        OR dr.id IS NULL;
END //

DELIMITER ;
