DELIMITER //

CREATE PROCEDURE slots_disponibles(
    IN dateheuredebut_donnee DATETIME,
    IN dateheurefin_donnee DATETIME
)
BEGIN
    SELECT s.id, s.libelle
        FROM slot s
        LEFT JOIN details_rdv dr ON s.id = dr.idSlot
        WHERE NOT (
            (dateheuredebut_donnee BETWEEN dr.date_heure_debut AND dr.date_heure_fin)
            OR (dateheurefin_donnee BETWEEN dr.date_heure_debut AND dr.date_heure_fin)
        ) AND (dateheuredebut_donnee >=  dr.date_heure_debut AND dateheurefin_donnee >  dr.date_heure_fin )
        OR dr.id IS NULL;
END //

DELIMITER ;
