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
    prix double precision default null
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

CREATE TABLE montant_type_service (
    id int primary key auto_increment,
    id_type_service int references type_service(id),
    montant double precision not null,
    date_debut date
) engine=InnoDB;

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

CREATE TABLE services_temp(
    service varchar(50),
    duree time
);
CREATE TABLE travaux_temp(
    voiture varchar(8),
    type_voiture varchar(50),
    date_rdv date,
    heure_rdv time,
    type_service varchar(50),
    montant double precision,
    date_paiement date
);

CREATE VIEW v_devis AS
SELECT 
    rdv.id as id_rdv,
    rdv.date_payement as pay_day,
    client.id as id_client,
    client.num_matricule as matricule,
    rdv.debut as date_rdv, 
    rdv.date_prise_rdv,
    slot.id as id_slot, 
    slot.libelle as libelle_slot,
    ts.id as id_type_service, 
    ts.libelle as libelle_service,
    ts.prix as prix_service
FROM rendez_vous AS rdv 
    JOIN slot ON rdv.id_slot = slot.id
    JOIN client ON rdv.id_client = client.id
    JOIN type_service AS ts ON rdv.id_type_service = ts.id;

DELIMITER //

CREATE PROCEDURE slots_disponibles(
    IN dateheuredebut_donnee DATETIME,
    IN dateheurefin_donnee DATETIME
)
BEGIN
    SELECT * FROM slot 
    WHERE id not in (
        SELECT idSlot FROM details_rdv 
        WHERE ((date_heure_debut <= dateheuredebut_donnee AND date_heure_fin >= dateheuredebut_donnee) 
        or (date_heure_debut <= dateheurefin_donnee AND date_heure_fin >= dateheurefin_donnee) 
        or (date_heure_debut >= dateheuredebut_donnee AND date_heure_fin <= dateheurefin_donnee))
    );
END //

DELIMITER ;
