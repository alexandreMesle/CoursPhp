create table category
(
    id integer primary key auto_increment,
    nom varchar(64) NOT NULL
);

create table idea
(
  id integer primary key auto_increment,
  nom varchar(64),
  texte varchar(256),
  category_id integer NOT NULL,
  foreign key (category_id) references category(id)
);