insert into service(libelle) values('Informatique'),('Communication'),('Administration'),('Securite');


-- Insérer des postes réels pour le service Informatique
INSERT INTO poste (libelle, idservice)
VALUES
    ('Développeur Front-End', 1),
    ('Développeur Back-End', 1),
    ('Ingénieur Réseau', 1),
    ('Responsable de la Sécurité ', 1);

-- Insérer des postes réels pour le service Communication
INSERT INTO poste (libelle, idservice)
VALUES
    ('Responsable de la Communication Digitale', 2),
    ('Chargé de Relations Publiques', 2),
    ('Concepteur Rédacteur', 2),
    ('Directeur de Communication', 2);

-- Insérer des postes réels pour le service Administration
INSERT INTO poste (libelle, idservice)
VALUES
    ('Assistant Administratif', 3),
    ('Gestionnaire des Ressources Humaines', 3),
    ('Responsable des Finances', 3),
    ('Chef de Service Administratif', 3);

-- Insérer des postes réels pour le service Sécurité
INSERT INTO poste (libelle, idservice)
VALUES
    ('Agent de Sécurité', 4),
    ('Responsable de la Sécurité Physique', 4),
    ('Analyste en Sécurité des Systèmes d Information', 4),
    ('Consultant en Sécurité', 4);

--donnee dans experience
INSERT INTO experience(libelle,valeur) 
values
    ('Aucun',0),
    ('1 - 3 ans',3),
    ('3 - 5 ans ',5),
    ('5 - 10 ans',10),
    ('10 ans et +',20);

--donnee dans diplome
INSERT INTO diplome(libelle) 
values  
    ('Doctorat'),('Master 2'),('Master 1'),('Licence'),('BACC'),('BEPC'),('CEPE'),('Aucun');

--donnee dans adresse
INSERT INTO adresse(libelle)
values  
    ('Antananarivo'),('Toamasina'),('Mahajanga'),('Toliara'),('Fianarantsoa'),('Antsiranana');

--donnee dans TJM
-- Insérer des données pour 16 postes dans la table TJM
INSERT INTO TJM (idposte, heure, tache)
VALUES
    (1, 35.5, 8.0),
    (2, 42.0, 7.5),
    (3, 38.75, 8.5),
    (4, 40.0, 7.0),
    (5, 36.25, 7.25),
    (6, 39.0, 8.0),
    (7, 41.5, 7.75),
    (8, 37.0, 8.5),
    (9, 43.25, 7.25),
    (10, 37.5, 8.0),
    (11, 40.75, 7.5),
    (12, 38.0, 8.25),
    (13, 42.0, 7.25),
    (14, 39.25, 7.75),
    (15, 36.75, 8.25),
    (16, 41.0, 7.0);


CREATE OR REPLACE VIEW V_annonce as
SELECT annonce.*,poste.libelle as poste,
diplome.libelle as diplome, diplome.id as iddiplome,
experience.libelle as experience,experience.id as idexperience,
adresse.libelle as adresse,adresse.libelle as adresse
critere_annonce.sexe,
service.libelle as nom_service,service.id as idservice
critere_annonce.nationalite 

FROM annonce 
    join critere_annonce on annonce.id = critere_annonce.idannonce
    join poste on annonce.idposte=poste.id
    join diplome on critere_annonce.iddiplome=diplome.id
    join experience on critere_annonce.idexperience = experience.id
    join adresse on critere_annonce.idadresse=adresse.id
    join service on poste.idservice=service.id;








