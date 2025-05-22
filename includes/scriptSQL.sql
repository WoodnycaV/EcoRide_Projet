create database if not exists ecoride;

create table utilisateurs (

    id_utilisateur serial primary key,
    pseudo_utilisateur varchar(10) unique not null,
    email_utilisateur varchar(255) unique not null,
    mot_de_passe varchar(255) not null,
    role varchar(15) not null,
    credit int null default '0',
    photo varchar(255)
);

create table preferences (

    id_preference serial primary key,
    nom varchar(15) unique not null
);

create table preferences_utilisateur (

    id_preference bigint unsigned not null,
    id_utilisateur bigint unsigned not null,
    primary key (id_preference, id_utilisateur),
    foreign key (id_preference) references preferences(id_preference),
    foreign key (id_utilisateur) references utilisateurs(id_utilisateur) 
);

create table avis (

    id_avis serial primary key,
    note int not null,
    commentaire varchar(250),
    statue varchar(10) not null,
    date_avis datetime not null,
    id_conducteur bigint unsigned not null,
    id_passager bigint unsigned not null,
    foreign key (id_conducteur) references utilisateurs(id_utilisateur),
    foreign key (id_passager) references utilisateurs(id_utilisateur)
);

create table vehicules (

    plaque_immatriculation varchar(10) primary key,
    date_premiere_immatriculation date not null,
    marque varchar(15) not null,
    modele varchar(15) not null,
    couleur varchar(15) not null,
    energie varchar(15) not null,
    id_utilisateur bigint unsigned not null,
    foreign key (id_utilisateur) references utilisateurs(id_utilisateur)

);


create table trajets (

    id_trajet serial primary key,
    lieu_depart varchar(100) not null,
    lieu_arrivee varchar(100) not null,
    heure_depart time not null,
    heure_arrivee time not null,
    date_depart date not null,
    ecologique boolean not null,
    nb_place int not null,
    voiture varchar(10) not null,
    id_conducteur bigint unsigned not null,
    prix int not null,
    foreign key (voiture) references vehicules(plaque_immatriculation),
    foreign key (id_conducteur) references utilisateurs(id_utilisateur)
);

create table reservations (

    id_reservation serial primary key,
    nb_places_reserver int not null,
    date_reservation date not null,
    id_trajet bigint unsigned not null,
    id_passager bigint unsigned not null,
    foreign key (id_trajet) references trajets(id_trajet),
    foreign key (id_passager) references utilisateurs(id_utilisateur)
);


