#File:	feedback.sql

#Create table named feedback

CREATE TABLE if not exists feedback
(
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	email VARCHAR(50),
	comment VARCHAR(200) NOT NULL,
	PRIMARY KEY (id)
); 

#End feedback.sql
