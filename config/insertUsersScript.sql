USE michaelpascale;
#Remove the data from the tables before actually adding anything,
#run this script to reset all user information
DELETE FROM `Login`;
#Add some usernames and passwords to the database
INSERT INTO `Login` (username,password)
	VALUES ('Michael-Pascale','Micpasca1'),
	('Selwyn-Grace','SelGra6'),
	('Akshat-Patel', 'AksPat9'),
	('Kees-Leune', 'KeeLeu4'),
	('Russel-Kamal', 'RusKam2');


DELETE FROM `User`;
INSERT INTO `User` (username,isparticipant,isadmin,isorganizer)
	VALUES ('Michael-Pascale',1,0,0),
	('Selwyn-Grace',1,0,0),
	('Akshat-Patel',1,0,1),
	('Kees-Leune',0,1,1),
	('Russel-Kamal',1,0,0);

