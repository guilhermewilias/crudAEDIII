drop database if exists aula;
create database aula;
use aula;

CREATE TABLE `tb_profile` (
  `prof_id` int(11) NOT NULL auto_increment,
  `prof_nm` varchar(100) NOT NULL,
  PRIMARY KEY  (`prof_id`)
);

CREATE TABLE `tb_users` (
  `usr_id` int(11) NOT NULL auto_increment,
  `usr_nm` varchar(100) NOT NULL,
  `usr_prof_id` int(11) NOT NULL, 
  `usr_age` int(3) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_psw` varchar(32) NOT NULL,
  PRIMARY KEY  (`usr_id`),
  KEY idx_prof_id (usr_prof_id),
  CONSTRAINT fk_prof_id FOREIGN KEY (usr_prof_id) 
  REFERENCES tb_profile (prof_id) 
);

/* 
Acesso ao local host e BD :
	C:\xampp\xampp_start.exe 

	C:\xampp\htdocs\aula\

	http://localhost/phpmyadmin/

	http://localhost/aula/
*/

/*
Legendas :
    idx = índice (index)
	fk = Chave estrangeira (foreing key)
	usr = Usuário (User)
	prof = Perfil (Profile)
	_id = Identificador (Identification)
	_nm = Nome (Name)
    _psw = Senha (Password)
*/

