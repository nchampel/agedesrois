CREATE DATABASE IF NOT EXISTS agedesrois;

-- ALTER DATABASE annuaire charset=utf8;

CREATE TABLE player(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pseudo VARCHAR(255),
    town_food INT,
    town_wood INT,
    town_metal INT,
    town_stone INT,
    town_gold INT,
    town_mana INT,
    town_mail INT,
    town_leather INT,
    town_sword INT,
    town_bow INT,
    town_crossbow INT,
    stock_food INT,
    stock_wood INT,
    stock_metal INT,
    stock_stone INT,
    stock_gold INT,
    farm_level INT,
    sawmill_level INT,
    extractor_level INT,
    quarry_level INT,
    mine_level INT
);

INSERT INTO player (pseudo, town_food, town_wood, town_metal, town_stone, town_gold, town_mana, 
town_mail, town_leather, town_sword, town_bow, town_crossbow, 
stock_food, stock_wood, stock_metal, stock_stone, stock_gold, 
farm_level, sawmill_level, extractor_level, quarry_level, mine_level) 
VALUES ("Lucie", 50, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

CREATE TABLE items(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    type_item VARCHAR(255),
    level_item INT,
    time_construct INT,
    food INT,
    wood INT,
    metal INT,
    stone INT,
    gold INT,
    mana INT,
    mail INT,
    leather INT,
    sword INT,
    bow INT,
    crossbow INT    
);

INSERT INTO items (type_item, level_item, time_construct, food, wood, metal, stone, gold, mana, mail, leather, sword, bow, crossbow) VALUES 
("ferme", 0, 10, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("ferme", 1, 12, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("ferme", 2, 15, 200, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("ferme", 3, 20, 500, 100, 10, 0, 0, 0, 0, 0, 0, 0, 0),
("ferme", 4, 25, 750, 150, 30, 0, 0, 0, 0, 0, 0, 0, 0),
("ferme", 5, 30, 1000, 200, 50, 5, 0, 0, 0, 0, 0, 0, 0),
("ferme", 6, 35, 2000, 300, 75, 10, 0, 0, 0, 0, 0, 0, 0),
("ferme", 7, 40, 3000, 400, 100, 20, 10, 0, 0, 0, 0, 0, 0),
("ferme", 8, 45, 4000, 450, 150, 50, 25, 0, 0, 0, 0, 0, 0),
("ferme", 9, 50, 5000, 500, 200, 100, 50, 0, 0, 0, 0, 0, 0),
("ferme", 10, 55, 10000, 750, 250, 200, 100, 0, 0, 0, 0, 0, 0),
("ferme", 11, 60, 20000, 1000, 500, 250, 150, 0, 0, 0, 0, 0, 0),
("ferme", 12, 65, 30000, 2000, 750, 500, 200, 0, 0, 0, 0, 0, 0),
("ferme", 13, 70, 50000, 2500, 1000, 750, 250, 0, 0, 0, 0, 0, 0),
("ferme", 14, 75, 75000, 5000, 2000, 1000, 500, 0, 0, 0, 0, 0, 0),
("ferme", 15, 80, 100000, 7500, 2500, 2000, 750, 0, 0, 0, 0, 0, 0),
("ferme", 16, 85, 200000, 10000, 5000, 2500, 1000, 0, 0, 0, 0, 0, 0),
("ferme", 17, 90, 250000, 20000, 7500, 5000, 2000, 0, 0, 0, 0, 0, 0),
("ferme", 18, 95, 500000, 25000, 10000, 7500, 2500, 0, 0, 0, 0, 0, 0),
("ferme", 19, 100, 750000, 50000, 20000, 10000, 5000, 0, 0, 0, 0, 0, 0),
("ferme", 20, 110, 1000000, 75000, 25000, 20000, 7500, 0, 0, 0, 0, 0, 0),
("ferme", 21, 120, 2000000, 100000, 50000, 25000, 10000, 0, 0, 0, 0, 0, 0),
("scierie", 0, 10, 50, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("scierie", 1, 12, 75, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("scierie", 2, 15, 100, 50, 10, 0, 0, 0, 0, 0, 0, 0, 0),
("scierie", 3, 20, 500, 100, 20, 0, 0, 0, 0, 0, 0, 0, 0),
("scierie", 4, 25, 750, 150, 30, 0, 0, 0, 0, 0, 0, 0, 0),
("scierie", 5, 30, 1000, 200, 40, 10, 0, 0, 0, 0, 0, 0, 0),
("scierie", 6, 35, 2000, 300, 50, 20, 0, 0, 0, 0, 0, 0, 0),
("scierie", 7, 40, 3000, 400, 75, 50, 50, 0, 0, 0, 0, 0, 0),
("scierie", 8, 45, 4000, 450, 100, 75, 100, 0, 0, 0, 0, 0, 0),
("scierie", 9, 50, 5000, 500, 150, 100, 200, 0, 0, 0, 0, 0, 0),
("extracteur", 0, 10, 250, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("extracteur", 1, 12, 750, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("extracteur", 2, 15, 1000, 500, 100, 0, 0, 0, 0, 0, 0, 0, 0),
("extracteur", 3, 20, 5000, 1000, 200, 0, 20, 0, 0, 0, 0, 0, 0),
("extracteur", 4, 25, 7500, 1500, 300, 0, 30, 0, 0, 0, 0, 0, 0),
("extracteur", 5, 30, 10000, 2000, 400, 100, 50, 0, 0, 0, 0, 0, 0),
("extracteur", 6, 35, 20000, 3000, 500, 200, 75, 0, 0, 0, 0, 0, 0),
("extracteur", 7, 40, 30000, 4000, 750, 500, 100, 0, 0, 0, 0, 0, 0),
("extracteur", 8, 45, 40000, 4500, 1000, 750, 150, 0, 0, 0, 0, 0, 0),
("extracteur", 9, 50, 50000, 5000, 1500, 1000, 200, 0, 0, 0, 0, 0, 0),
("mine", 0, 10, 5000, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("mine", 1, 12, 7500, 2000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("mine", 2, 15, 10000, 5000, 1000, 0, 0, 0, 0, 0, 0, 0, 0),
("mine", 3, 20, 50000, 10000, 2000, 100, 20, 0, 0, 0, 0, 0, 0),
("mine", 4, 25, 75000, 15000, 3000, 200, 30, 0, 0, 0, 0, 0, 0),
("mine", 5, 30, 100000, 20000, 4000, 300, 50, 0, 0, 0, 0, 0, 0),
("mine", 6, 35, 200000, 30000, 5000, 400, 75, 0, 0, 0, 0, 0, 0),
("mine", 7, 40, 300000, 40000, 7500, 500, 100, 0, 0, 0, 0, 0, 0),
("mine", 8, 45, 400000, 45000, 10000, 750, 150, 0, 0, 0, 0, 0, 0),
("mine", 9, 50, 500000, 50000, 15000, 1000, 200, 0, 0, 0, 0, 0, 0),
("carriere", 0, 10, 500, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("carriere", 1, 12, 750, 200, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("carriere", 2, 15, 1000, 500, 100, 0, 0, 0, 0, 0, 0, 0, 0),
("carriere", 3, 20, 5000, 1000, 200, 0, 20, 0, 0, 0, 0, 0, 0),
("carriere", 4, 25, 7500, 1500, 300, 0, 30, 0, 0, 0, 0, 0, 0),
("carriere", 5, 30, 10000, 2000, 400, 100, 50, 0, 0, 0, 0, 0, 0),
("carriere", 6, 35, 20000, 3000, 500, 200, 75, 0, 0, 0, 0, 0, 0),
("carriere", 7, 40, 30000, 4000, 750, 500, 100, 0, 0, 0, 0, 0, 0),
("carriere", 8, 45, 40000, 4500, 1000, 750, 150, 0, 0, 0, 0, 0, 0),
("carriere", 9, 50, 50000, 5000, 1500, 1000, 200, 0, 0, 0, 0, 0, 0),
("tour", 0, 10, 50000, 10000, 5000, 2000, 1000, 0, 0, 0, 0, 0, 0),
("tour", 1, 12, 100000, 20000, 10000, 5000, 2000, 0, 0, 0, 0, 0, 0),
("tour", 2, 15, 200000, 50000, 20000, 10000, 5000, 0, 0, 0, 0, 0, 0),
("tour", 3, 20, 500000, 75000, 50000, 20000, 10000, 0, 0, 0, 0, 0, 0),
("tour", 4, 25, 750000, 150000, 75000, 25000, 25000, 0, 0, 0, 0, 0, 0),
("tour", 5, 30, 1000000, 200000, 100000, 50000, 50000, 0, 0, 0, 0, 0, 0),
("tour", 6, 35, 2000000, 300000, 250000, 75000, 75000, 0, 0, 0, 0, 0, 0),
("tour", 7, 40, 3000000, 400000, 400000, 100000, 100000, 0, 0, 0, 0, 0, 0),
("tour", 8, 45, 4000000, 450000, 450000, 250000, 150000, 0, 0, 0, 0, 0, 0),
("tour", 9, 50, 5000000, 500000, 500000, 500000, 200000, 0, 0, 0, 0, 0, 0),
("archer", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("arbaletrier", 0, 30, 10000, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("piquier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("hallebardier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("guerrier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("chevalier", 0, 30, 100000, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("magicien", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("midieu", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0)
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

