CREATE DATABASE IF NOT EXISTS agedesrois;

-- ALTER DATABASE annuaire charset=utf8;

CREATE TABLE player(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pseudo VARCHAR(255),
    town_food INT,
    town_wood INT,
    farm_level INT,
    sawmill_level INT
);

INSERT INTO player (pseudo, town_food, town_wood, farm_level, sawmill_level) VALUES ("Lucie", 50, 50, 0, 0);

CREATE TABLE informations(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    type_item VARCHAR(255),
    level_item INT,
    time_construct INT,
    food INT,
    wood INT    
);

INSERT INTO informations (type_item, level_item, time_construct, food, wood) VALUES 
("ferme", 0, 10, 50, 0),
("ferme", 1, 20, 100, 0),
("ferme", 2, 30, 200, 0),
("scierie", 0, 10, 50, 10),
("scierie", 1, 20, 75, 20),
("scierie", 2, 30, 100, 50)
;

-- CREATE TABLE interet_adherent(
--     adherent_id INT,
--     centre_interet_id INT,
--     PRIMARY KEY (adherent_id, centre_interet_id),
--     CONSTRAINT fk_adherent_id_interet_adherent FOREIGN KEY (adherent_id)
--         REFERENCES adherents (adherent_id),
--     CONSTRAINT fk_interet_id FOREIGN KEY (centre_interet_id)
--         REFERENCES interets (interet_id)
-- );


-- CREATE TABLE profils(
--     profil_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
--     titre VARCHAR(255),
--     photo VARCHAR(255),
--     description TEXT,
--     adherent_id INT UNIQUE,
--     CONSTRAINT fk_adherent_id_profil FOREIGN KEY (adherent_id)
--         REFERENCES adherents (adherent_id)
-- );

