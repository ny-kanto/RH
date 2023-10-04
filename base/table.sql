CREATE TABLE critere (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(60)
);

CREATE TABLE sous_critere (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(60),
    idcritere INT REFERENCES critere
);

CREATE TABLE annonce (
    id SERIAL PRIMARY KEY,
    datelimite DATE,
    idposte INT REFERENCES poste,
    nbpersonne INT
);

CREATE TABLE candidat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(60),
    prenom VARCHAR(60),
    dtn DATE NOT NULL,
    sexe INT,
    nationalite INT,
    email TEXT NOT NULL
);

CREATE TABLE cv_candidat (
    id SERIAL PRIMARY KEY,
    idcandidat INT REFERENCES candidat,
    idannonce INT REFERENCES annonce
    iddiplome INT REFERENCES sous_critere,
    idexperience INT REFERENCES sous_critere,
    idadresse INT REFERENCES sous_critere
    idsituation INT REFERENCES sous_critere,
    -- diplomepdf TEXT,
    -- certificat TEXT
);

CREATE TABLE service (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50)
);

CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    email TEXT,
    mdp VARCHAR(50),
    idservice INT REFERENCES service
);

CREATE TABLE poste (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50),
    idservice INT REFERENCES service
);

CREATE TABLE critere_annonce (
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    idcritere INT REFERENCES critere,
    coeff NUMERIC,
    nationalite INT,
    sexe INT
);

CREATE TABLE note_sous_critere(
    idsous_critere INT REFERENCES sous_critere,
    idannonce INT REFERENCES annonce,
    note NUMERIC
);

CREATE TABLE coeff_critere(
    idcritere INT REFERENCES critere,
    idannonce INT REFERENCES annonce,
    coeff INT
);

CREATE TABLE questionnaire (
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce
);

CREATE TABLE question (
    id SERIAL PRIMARY KEY,
    idquestionnaire INT REFERENCES questionnaire,
    texte TEXT NOT NULL,
    coefficient INT,
    note NUMERIC
);

CREATE TABLE reponse (
    id SERIAL PRIMARY KEY,
    idquestion INT REFERENCES question,
    texte TEXT NOT NULL,
    estVraie INT DEFAULT 0
);

CREATE TABLE resultat_test (
    id SERIAL PRIMARY KEY,
    idquestionnaire INT REFERENCES questionnaire,
    idcandidat INT REFERENCES candidat,
    note NUMERIC
);

CREATE TABLE entretien (
    id SERIAL PRIMARY KEY,
    idcandidat INT REFERENCES candidat,
    note NUMERIC,
    date TIMESTAMP
);
--------------NEW
CREATE TABLE TJM(
    id SERIAL PRIMARY KEY,
    idposte INT REFERENCES poste,
    heure NUMERIC,
    tache NUMERIC
);