CREATE DATABASE IF NOT EXISTS agedesrois;

-- ALTER DATABASE annuaire charset=utf8;

CREATE TABLE player(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pseudo VARCHAR(255),
    town_food INT,
    town_wood INT,
    farm_level INT,
    sawmill_level INT,
);

INSERT INTO player (pseudo, town_food, town_wood, farm_level, sawmill_level) VALUES ("Lucie", 50, 50, 0, 0);

CREATE TABLE informations(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom VARCHAR(255)
    
);

CREATE TABLE interet_adherent(
    adherent_id INT,
    centre_interet_id INT,
    PRIMARY KEY (adherent_id, centre_interet_id),
    CONSTRAINT fk_adherent_id_interet_adherent FOREIGN KEY (adherent_id)
        REFERENCES adherents (adherent_id),
    CONSTRAINT fk_interet_id FOREIGN KEY (centre_interet_id)
        REFERENCES interets (interet_id)
);


CREATE TABLE profils(
    profil_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titre VARCHAR(255),
    photo VARCHAR(255),
    description TEXT,
    adherent_id INT UNIQUE,
    CONSTRAINT fk_adherent_id_profil FOREIGN KEY (adherent_id)
        REFERENCES adherents (adherent_id)
);

INSERT INTO interets (nom) VALUES 
    ("Sport"), ("Musique"), ("Jeux vidéos"), ("Lecture"), ("Informatique"),
    ("Sorties"), ("Cuisine"), ("Aviation"), ("Mécanique"), ("Licornes"),
    ("Joaillerie"), ("Agriculture"), ("Cinéma"), ("Politique"), ("Couture"),
    ("Animaux"), ("Sciences"), ("Histoire"), ("SVT"), ("Physique-Chimie"),
    ("Taxidermie"), ("Philatélie");