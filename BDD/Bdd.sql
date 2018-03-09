CREATE DATABASE IF NOT EXISTS news DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE news;

DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS pilot;



CREATE TABLE IF NOT EXISTS article (
  id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  titre varchar(100) NOT NULL,
  contenu text NOT NULL,
  depart varchar(100) NOT NULL,
  arrivee varchar(100) NOT NULL,
  dateAjout datetime NOT NULL,
  dateModif datetime NOT NULL,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8 ;








CREATE TABLE IF NOT EXISTS pilot (
  	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  	PRIMARY KEY (id),  	
  	  	
 	pilotname varchar(50) NOT NULL UNIQUE,
 	
 	email varchar(50) NOT NULL UNIQUE,
 	
 	pwrd varchar(50) NOT NULL,
 	
 	registered BOOLEAN DEFAULT false
  	
)DEFAULT CHARSET=utf8 ;





CREATE TABLE IF NOT EXISTS comments (
  	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  	PRIMARY KEY (id),
  	
  	id_article SMALLINT UNSIGNED NOT NULL,
	CONSTRAINT fk_id_article FOREIGN KEY (id_article) REFERENCES article(id),
  
 	auteur varchar(50) NOT NULL,
 	contenu text NOT NULL,
 	date datetime NOT NULL,
 	
 	validated BOOLEAN DEFAULT false
  	
)DEFAULT CHARSET=utf8 ;





-- CREATE TABLE IF NOT EXISTS comments (
--   	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
--   	PRIMARY KEY (id),
--   	
--   	id_article SMALLINT UNSIGNED NOT NULL,
-- 	CONSTRAINT fk_id_article FOREIGN KEY (id_article) REFERENCES article(id),
-- 	
-- 	id_pilot SMALLINT UNSIGNED NOT NULL,
-- 	CONSTRAINT fk_id_pilot FOREIGN KEY (id_pilot) REFERENCES pilot(id),
--   
--  	auteur varchar(50) NOT NULL,
--  	contenu text NOT NULL,
--  	date datetime NOT NULL,
--  	
--  	validated BOOLEAN DEFAULT false
--   	
-- )DEFAULT CHARSET=utf8 ;














