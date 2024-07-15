CREATE DATABASE Garage;
use Garage;

CREATE TABLE heure_travail(
    id int primary key auto_increment,
    debut int not null,
    fin int not null
) engine=InnoDB;

CREATE TABLE slot(
    id int primary key auto_increment,
    libelle varchar(2) not null unique,
)engine=InnoDB;

CREATE TABLE type_service(
    id int primary key auto_increment,
    libelle varchar(50) not null unique,
    duree decimal(4,2) not null,
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