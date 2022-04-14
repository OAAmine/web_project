DROP DATABASE projetweb;
CREATE DATABASE projetweb;
USE projetweb;
CREATE TABLE chercheurs
(
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    date_de_naissance date,
    genre ENUM('Homme','Femme','Autre'),
    pays VARCHAR(60),
    email varchar(60),
    num_tel int(20),
    code_postal VARCHAR(5),
    travail VARCHAR(60),
    grade VARCHAR(60),
    structure VARCHAR (120),
    biographie varchar (300),
    thematique VARCHAR (200),
    cv blob,
    nom_d_utilisateur VARCHAR(60),
    mot_de_passe VARCHAR(64)
);

CREATE TABLE journaux
(
    titre_j VARCHAR(120),
    id_isbn INT,
    editeur VARCHAR(60),
    theme VARCHAR(255)
);

CREATE TABLE conferences
(
    titre_c VARCHAR(120),
    abreviation VARCHAR(10),
    sujet VARCHAR(255),
    date_publication date,
    date_inscription date,
    conferencier VARCHAR(60),
    pays VARCHAR(60)
);

CREATE TABLE information
(
    nom_info VARCHAR(100),
    contenu VARCHAR(300),
    info_img BLOB
);

CREATE TABLE evenement(
    nom_event VARCHAR(300),
    date_event date
    );

CREATE TABLE publication
(
    titre VARCHAR(100),
    date_de_publication date,
    
    
);



