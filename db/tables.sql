CREATE DATABASE IF NOT EXISTS `shareablechat`;
USE `shareablechat`;

#######################
#  CREATE TABLE users
#######################

CREATE TABLE IF NOT EXISTS `users`
(
	id		INT(10) 			NOT NULL AUTO_INCREMENT,
	user	VARCHAR(50)		NOT NULL,
	PRIMARY KEY (id)
);

#######################
#  CREATE TABLE chats
#######################

CREATE TABLE IF NOT EXISTS `chats`
(
	id		    INT(10) 		NOT NULL AUTO_INCREMENT,
	userid	  INT(10)		  NOT NULL,
  friendid	INT(10)		  NOT NULL,
  chat      TEXT        NULL,
  time    	CHAR(50)		NOT NULL,
	PRIMARY KEY (id)
);
