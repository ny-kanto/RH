CREATE TABLE adresse (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(60)
);

CREATE TABLE diplome (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(30)
);

CREATE TABLE experience (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(60),
    valeur INT
);

CREATE TABLE service (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50)
);

CREATE TABLE poste (
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50),
    idservice INT REFERENCES service
);

CREATE TABLE annonce (
    id SERIAL PRIMARY KEY,
    datelimite DATE,
    idposte INT REFERENCES poste,
    nbpersonne INT
);
CREATE TABLE nationalite(
    id SERIAL PRIMARY KEY,
    libelle VARCHAR
);
CREATE TABLE sexe(
    id SERIAL PRIMARY KEY,
    libelle VARCHAR
);

CREATE TABLE candidat (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(60),
    prenom VARCHAR(60),
    dtn DATE NOT NULL,
    idadresse INT REFERENCES adresse,
    idsexe INT REFERENCES sexe,
    idnationalite INT REFERENCES nationalite,
    email Text,
    cin VARCHAR(12)
);

CREATE TABLE cv_candidat (
    id SERIAL PRIMARY KEY,
    idcandidat INT REFERENCES candidat,
    iddiplome INT REFERENCES diplome,
    idexperience INT REFERENCES experience,
    diplomepdf TEXT,
    certificat TEXT
);

CREATE TABLE situation(
    id SERIAL PRIMARY KEY,
    libelle VARCHAR(50)
);

CREATE TABLE coeff_critere_annonce (
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    coeff_diplome INT,
    coeff_experience INT,
    coeff_adresse INT,
    coeff_nationalite INT,
    coeff_sexe INT,
    coeff_situation INT
);

CREATE TABLE diplome_note(
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    iddiplome INT REFERENCES diplome,
    note NUMERIC
);
CREATE TABLE adresse_note(
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    idadresse INT REFERENCES adresse,
    note NUMERIC
);
CREATE TABLE sexe_note(
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    idsexe INT REFERENCES sexe,
    note NUMERIC
);
CREATE TABLE nationalite_note(
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    idnationalite INT REFERENCES nationalite,
    note NUMERIC
);
CREATE TABLE situation_note(
    id SERIAL PRIMARY KEY,
    idannonce INT REFERENCES annonce,
    idsituation INT REFERENCES situation,
    note NUMERIC
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
    estVraie INT
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