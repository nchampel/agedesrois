CREATE DATABASE IF NOT EXISTS agedesrois;

-- ALTER DATABASE annuaire charset=utf8;



-- CREATE TABLE player(
--     id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
--     pseudo VARCHAR(255),
--     town_food INT DEFAULT 50,
--     town_wood INT DEFAULT 50,
--     town_metal INT DEFAULT 0,
--     town_stone INT DEFAULT 0,
--     town_gold INT DEFAULT 0,
--     town_mana INT DEFAULT 0,
--     town_mail INT DEFAULT 0,
--     town_leather INT DEFAULT 0,
--     town_sword INT DEFAULT 0,
--     town_bow INT DEFAULT 0,
--     town_crossbow INT DEFAULT 0,
--     stock_food INT DEFAULT 0,
--     stock_wood INT DEFAULT 0,
--     stock_metal INT DEFAULT 0,
--     stock_stone INT DEFAULT 0,
--     stock_gold INT DEFAULT 0,
--     castle_level INT DEFAULT 1,
--     farm_level INT DEFAULT 0,
--     sawmill_level INT DEFAULT 0,
--     extractor_level INT DEFAULT 0,
--     quarry_level INT DEFAULT 0,
--     mine_level INT DEFAULT 0,
--     barracks_level INT DEFAULT 0,
--     workshop_level INT DEFAULT 0,
--     archer_level INT DEFAULT 0
-- );

-- INSERT INTO player (pseudo) 
-- VALUES ("Lucie");

-- CREATE TABLE items(
--     id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
--     type_item VARCHAR(255),
--     level_item INT,
--     time_construct INT,
--     food INT,
--     wood INT,
--     metal INT,
--     stone INT,
--     gold INT,
--     mana INT,
--     mail INT,
--     leather INT,
--     sword INT,
--     bow INT,
--     crossbow INT    
-- );

INSERT INTO items (type_item, level_item, time_construct, food, wood, metal, stone, gold, mana, mail, leather, sword, bow, crossbow) VALUES 
("chateau", 0, 10, 2000, 1000, 500, 250, 0, 0, 0, 0, 0, 0, 0),
("chateau", 1, 12, 2500, 2000, 750, 500, 0, 0, 0, 0, 0, 0, 0),
("chateau", 2, 15, 5000, 2500, 1000, 750, 0, 0, 0, 0, 0, 0, 0),
("chateau", 3, 20, 10000, 5000, 2000, 1000, 0, 0, 0, 0, 0, 0, 0),
("chateau", 4, 25, 20000, 7500, 2500, 2000, 0, 0, 0, 0, 0, 0, 0),
("chateau", 5, 30, 25000, 10000, 5000, 2500, 0, 0, 0, 0, 0, 0, 0),
("chateau", 6, 35, 50000, 20000, 7500, 5000, 0, 0, 0, 0, 0, 0, 0),
("chateau", 7, 40, 75000, 25000, 10000, 7500, 10, 0, 0, 0, 0, 0, 0),
("chateau", 8, 45, 100000, 50000, 20000, 10000, 25, 0, 0, 0, 0, 0, 0),
("chateau", 9, 50, 200000, 75000, 25000, 20000, 50, 0, 0, 0, 0, 0, 0),
("caserne", 0, 10, 2000, 1000, 500, 250, 0, 0, 0, 0, 0, 0, 0),
("caserne", 1, 12, 2500, 2000, 750, 500, 0, 0, 0, 0, 0, 0, 0),
("caserne", 2, 15, 5000, 2500, 1000, 750, 0, 0, 0, 0, 0, 0, 0),
("caserne", 3, 20, 10000, 5000, 2000, 1000, 0, 0, 0, 0, 0, 0, 0),
("caserne", 4, 25, 20000, 7500, 2500, 2000, 0, 0, 0, 0, 0, 0, 0),
("caserne", 5, 30, 25000, 10000, 5000, 2500, 0, 0, 0, 0, 0, 0, 0),
("caserne", 6, 35, 50000, 20000, 7500, 5000, 0, 0, 0, 0, 0, 0, 0),
("caserne", 7, 40, 75000, 25000, 10000, 7500, 10, 0, 0, 0, 0, 0, 0),
("caserne", 8, 45, 100000, 50000, 20000, 10000, 25, 0, 0, 0, 0, 0, 0),
("caserne", 9, 50, 200000, 75000, 25000, 20000, 50, 0, 0, 0, 0, 0, 0),
("atelier", 0, 10, 2000, 1000, 500, 250, 0, 0, 0, 0, 0, 0, 0),
("atelier", 1, 12, 2500, 2000, 750, 500, 0, 0, 0, 0, 0, 0, 0),
("atelier", 2, 15, 5000, 2500, 1000, 750, 0, 0, 0, 0, 0, 0, 0),
("atelier", 3, 20, 10000, 5000, 2000, 1000, 0, 0, 0, 0, 0, 0, 0),
("atelier", 4, 25, 20000, 7500, 2500, 2000, 0, 0, 0, 0, 0, 0, 0),
("atelier", 5, 30, 25000, 10000, 5000, 2500, 0, 0, 0, 0, 0, 0, 0),
("atelier", 6, 35, 50000, 20000, 7500, 5000, 0, 0, 0, 0, 0, 0, 0),
("atelier", 7, 40, 75000, 25000, 10000, 7500, 10, 0, 0, 0, 0, 0, 0),
("atelier", 8, 45, 100000, 50000, 20000, 10000, 25, 0, 0, 0, 0, 0, 0),
("atelier", 9, 50, 200000, 75000, 25000, 20000, 50, 0, 0, 0, 0, 0, 0),
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
("tour", 9, 50, 5000000, 500000, 500000, 500000, 200000, 0, 0, 0, 0, 0, 0)
;

-- CREATE TABLE army(
--     id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
--     type_item VARCHAR(255),
--     level_item INT,
--     time_construct INT,
--     strength INT,
--     life_points INT,
--     stock INT,
--     food INT,
--     gold INT,
--     mana INT,
--     mail INT,
--     leather INT,
--     sword INT,
--     bow INT,
--     crossbow INT  
-- );

INSERT INTO army (type_army, level_soldier, time_training, strength, life_points, stock, food, gold, mana, mail, leather, sword, bow, crossbow) VALUES 
("archer", 0, 30, 10, 50, 1000, 1000, 0, 0, 0, 0, 0, 10, 0),
("archer", 1, 30, 20, 100, 2000, 2000, 0, 0, 0, 0, 0, 10, 0),
("archer", 2, 30, 30, 150, 3000, 2500, 0, 0, 0, 0, 0, 10, 0),
("archer", 3, 30, 40, 200, 4000, 5000, 0, 0, 0, 0, 0, 10, 0),
("archer", 4, 30, 50, 250, 5000, 7500, 0, 0, 0, 0, 0, 10, 0),
("archer", 5, 30, 60, 300, 6000, 10000, 0, 0, 0, 0, 0, 10, 0),
("arbaletrier", 0, 30, 10000, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("piquier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("hallebardier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("guerrier", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("chevalier", 0, 30, 100000, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("magicien", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0),
("midieu", 0, 30, 1000, 500, 0, 0, 0, 0, 0, 0, 0, 0, 0)
;

CREATE TABLE map_item(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    type_item VARCHAR(255),
    level_item INT DEFAULT 0,
    position_x INT,
    position_y INT,
    map_position INT,
    item_strength INT,
    item_defense INT,
    item_quantity INT,
    generation_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO map_item (type_item, level_item, position_x, position_y, map_position, item_strength, item_defense, item_quantity) VALUES
("bois", 1, 0, 0, 1, 0, 0, 10000),
("prairie", 0, 0, 0, 2, 0, 0, 0),
("prairie", 0, 0, 0, 3, 0, 0, 0),
("prairie", 0, 0, 0, 4, 0, 0, 0),
("prairie", 0, 0, 0, 5, 0, 0, 0),
("prairie", 0, 0, 0, 6, 0, 0, 0),
("prairie", 0, 0, 0, 7, 0, 0, 0),
("prairie", 0, 0, 0, 8, 0, 0, 0),
("prairie", 0, 0, 0, 9, 0, 0, 0),
("prairie", 0, 0, 0, 10, 0, 0, 0),
("prairie", 0, 0, 0, 11, 0, 0, 0),
("prairie", 0, 0, 0, 12, 0, 0, 0),
("prairie", 0, 0, 0, 13, 0, 0, 0),
("prairie", 0, 0, 0, 14, 0, 0, 0),
("prairie", 0, 0, 0, 15, 0, 0, 0),
("prairie", 0, 0, 0, 16, 0, 0, 0),
("prairie", 0, 0, 0, 17, 0, 0, 0),
("prairie", 0, 0, 0, 18, 0, 0, 0),
("prairie", 0, 0, 0, 19, 0, 0, 0),
("prairie", 0, 0, 0, 20, 0, 0, 0),
("prairie", 0, 0, 0, 21, 0, 0, 0),
("prairie", 0, 0, 0, 22, 0, 0, 0),
("prairie", 0, 0, 0, 23, 0, 0, 0),
("prairie", 0, 0, 0, 24, 0, 0, 0),
("prairie", 0, 0, 0, 25, 0, 0, 0),
("prairie", 0, 0, 0, 26, 0, 0, 0),
("prairie", 0, 0, 0, 27, 0, 0, 0),
("prairie", 0, 0, 0, 28, 0, 0, 0),
("prairie", 0, 0, 0, 29, 0, 0, 0),
("prairie", 0, 0, 0, 30, 0, 0, 0),
("prairie", 0, 0, 0, 31, 0, 0, 0),
("prairie", 0, 0, 0, 32, 0, 0, 0),
("prairie", 0, 0, 0, 33, 0, 0, 0),
("prairie", 0, 0, 0, 34, 0, 0, 0),
("prairie", 0, 0, 0, 35, 0, 0, 0),
("prairie", 0, 0, 0, 36, 0, 0, 0),
("prairie", 0, 0, 0, 37, 0, 0, 0),
("prairie", 0, 0, 0, 38, 0, 0, 0),
("prairie", 0, 0, 0, 39, 0, 0, 0),
("prairie", 0, 0, 0, 40, 0, 0, 0),
("nourriture", 1, 0, 0, 41, 0, 0, 20000)

;

CREATE TABLE map_player(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_player INT,
    type_item VARCHAR(255),
    level_item INT DEFAULT 0,
    position_x INT,
    position_y INT,
    map_position INT,
    item_strength INT,
    item_defense INT,
    item_quantity INT,
    is_active BOOLEAN default true,
    generation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    using_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO map_player (id_player, type_item, level_item, position_x, position_y, map_position, item_strength, item_defense, item_quantity) VALUES
(1, "bois", 1, 0, 0, 1, 0, 0, 10000),
(1, "prairie", 0, 0, 0, 2, 0, 0, 0),
(1, "prairie", 0, 0, 0, 3, 0, 0, 0),
(1, "prairie", 0, 0, 0, 4, 0, 0, 0),
(1, "prairie", 0, 0, 0, 5, 0, 0, 0),
(1, "prairie", 0, 0, 0, 6, 0, 0, 0),
(1, "prairie", 0, 0, 0, 7, 0, 0, 0),
(1, "prairie", 0, 0, 0, 8, 0, 0, 0),
(1, "prairie", 0, 0, 0, 9, 0, 0, 0),
(1, "prairie", 0, 0, 0, 10, 0, 0, 0),
(1, "prairie", 0, 0, 0, 11, 0, 0, 0),
(1, "prairie", 0, 0, 0, 12, 0, 0, 0),
(1, "prairie", 0, 0, 0, 13, 0, 0, 0),
(1, "prairie", 0, 0, 0, 14, 0, 0, 0),
(1, "prairie", 0, 0, 0, 15, 0, 0, 0),
(1, "prairie", 0, 0, 0, 16, 0, 0, 0),
(1, "prairie", 0, 0, 0, 17, 0, 0, 0),
(1, "prairie", 0, 0, 0, 18, 0, 0, 0),
(1, "prairie", 0, 0, 0, 19, 0, 0, 0),
(1, "prairie", 0, 0, 0, 20, 0, 0, 0),
(1, "prairie", 0, 0, 0, 21, 0, 0, 0),
(1, "prairie", 0, 0, 0, 22, 0, 0, 0),
(1, "prairie", 0, 0, 0, 23, 0, 0, 0),
(1, "prairie", 0, 0, 0, 24, 0, 0, 0),
(1, "prairie", 0, 0, 0, 25, 0, 0, 0),
(1, "prairie", 0, 0, 0, 26, 0, 0, 0),
(1, "prairie", 0, 0, 0, 27, 0, 0, 0),
(1, "prairie", 0, 0, 0, 28, 0, 0, 0),
(1, "prairie", 0, 0, 0, 29, 0, 0, 0),
(1, "prairie", 0, 0, 0, 30, 0, 0, 0),
(1, "prairie", 0, 0, 0, 31, 0, 0, 0),
(1, "prairie", 0, 0, 0, 32, 0, 0, 0),
(1, "prairie", 0, 0, 0, 33, 0, 0, 0),
(1, "prairie", 0, 0, 0, 34, 0, 0, 0),
(1, "prairie", 0, 0, 0, 35, 0, 0, 0),
(1, "prairie", 0, 0, 0, 36, 0, 0, 0),
(1, "prairie", 0, 0, 0, 37, 0, 0, 0),
(1, "prairie", 0, 0, 0, 38, 0, 0, 0),
(1, "prairie", 0, 0, 0, 39, 0, 0, 0),
(1, "prairie", 0, 0, 0, 40, 0, 0, 0),
(1, "nourriture", 1, 0, 0, 41, 0, 0, 20000)

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

