CREATE OR REPLACE VIEW V_annonce as
SELECT annonce.*,
    poste.libelle as poste,
    diplome.libelle as diplome,
    experience.libelle as experience,
    adresse.libelle as adresse,
    service.libelle as nom_service,
    critere_annonce.sexe,
    critere_annonce.nationalite
FROM annonce
    join critere_annonce on annonce.id = critere_annonce.idannonce
    join poste on annonce.idposte = poste.id
    join diplome on critere_annonce.iddiplome = diplome.id
    join experience on critere_annonce.idexperience = experience.id
    join adresse on critere_annonce.idadresse = adresse.id
    join service on poste.idservice = service.id;