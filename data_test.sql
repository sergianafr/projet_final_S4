INSERT INTO type_vehicule values (default, 'legere'), (default, '4*4'), (default, 'utilitaire');

INSERT INTO client values (default, '6090TBB', 1), (default, '7890TAB', 1), (default, '6009TBA', 3);

INSERT INTO slot values
(default, 'A'), (default, 'B'), (default, 'C');
INSERT INTO date_reference VALUES(null, '2024-07-16');

-- INSERT INTO type_service values 
-- (default, 'Reparation simple', '1:00:00', 150000),
-- (default, 'Reparation standard', '2:00:00', 250000),
-- (default, 'Reparation complexe', '8:00:00', 800000),
-- (default, 'Entretien', '2:30:00', 300000);

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-02', 2, 1,  150000, default);
INSERT INTO details_rdv VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-07 10:00:00', 1, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 11:00:00', '2024-07-02', 3, 1,  800000, default);
INSERT INTO details_rdv VALUES
(default, 2, '2024-07-07 11:00:00', '2024-07-08 08:00:00', 1, '8:00:00');


INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 11:00:00', '2024-07-02', 3, 1,  800000, default);
INSERT INTO details_rdv VALUES
(default, 2, '2024-07-07 11:00:00', '2024-07-08 08:00:00', 1, '8:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-16 8:40:00', '2024-07-02', 2, 1,  150000, default);
INSERT INTO details_rdv VALUES
(default, 3, '2024-07-16 8:40:00', '2024-07-16 10:40:00', 1, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-16 8:40:00', '2024-07-02', 2, 2,  150000, default);
INSERT INTO details_rdv VALUES
(default, 4, '2024-07-16 8:40:00', '2024-07-16 10:40:00', 2, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-16 8:40:00', '2024-07-02', 2, 3,  150000, default);
INSERT INTO details_rdv VALUES
(default, 5, '2024-07-16 8:40:00', '2024-07-16 10:40:00', 3, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-16 8:40:00', '2024-07-02', 2, 1,  150000, default);
INSERT INTO details_rdv VALUES
(default, 6, '2024-07-16 8:40:00', '2024-07-16 10:40:00', 1, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-02', 2, 2,  150000, default);
INSERT INTO details_rdv VALUES
(default, 7, '2024-07-07 8:00:00', '2024-07-07 10:00:00', 2, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-02', 2, 3,  150000, default);
INSERT INTO details_rdv VALUES
(default, 8, '2024-07-07 8:00:00', '2024-07-07 10:00:00', 3, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-19 8:00:00', '2024-07-19', 2, 3,  150000, default);
INSERT INTO details_rdv VALUES
(default, 8, '2024-07-19 8:00:00', '2024-07-19 10:00:00', 3, '2:00:00');

INSERT INTO date_reference VALUES
(default, '2024-01-01');

INSERT INTO admin VALUES
(default, 'asta@gmail.com', 'atlasss');

INSERT INTO heure_travail VALUES
(default, '08:00:00', '18:00:00');
