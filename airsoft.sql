DROP DATABASE IF EXISTS airsoft;
CREATE DATABASE airsoft CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE airsoft;

CREATE TABLE IF NOT EXISTS jogosultsagok (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nev VARCHAR(32) NOT NULL UNIQUE
);

INSERT INTO jogosultsagok (nev) VALUES ('admin'), ('user');

CREATE TABLE `felhasznalok` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `csaladi_nev` varchar(45) NOT NULL default '',
  `uto_nev` varchar(45) NOT NULL default '',
  `bejelentkezes` varchar(12) NOT NULL default '',
  `jelszo` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

CREATE TABLE fegyverek (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nev VARCHAR(100) NOT NULL,
  tipus VARCHAR(50),
  tuzero INT,
  hatotav INT
);

INSERT INTO fegyverek (nev, tipus, tuzero, hatotav) VALUES
('Shadow Viper', 'SMG', 60, 80),
('Iron Phoenix', 'Shotgun', 75, 40),
('Ghost Reaper', 'Sniper', 95, 120),
('Blaze Falcon', 'Assault Rifle', 85, 90),
('Nova Striker', 'Pistol', 45, 30);

CREATE TABLE uzenetek (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nev VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  uzenet TEXT NOT NULL,
  kuldve DATETIME DEFAULT CURRENT_TIMESTAMP
);
