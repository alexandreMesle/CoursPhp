create table category
(
    id integer primary key auto_increment,
    nom varchar(64)
);

create table idea
(
  id integer primary key auto_increment,
  nom varchar(64),
  texte varchar(256)
);