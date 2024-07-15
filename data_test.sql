INSERT INTO type_vehicule values (default, 'legere'), (default, '4*4'), (default, 'utilitaire');

INSERT INTO client values (default, '6090TBB', 1), (default, '7890TAB', 1), (default, '6009TBA', 3);

INSERT INTO slot values
(default, 'A'), (default, 'B'), (default, 'C');

INSERT INTO type_service values 
(default, 'Reparation simple', '1:00:00', 150000),
(default, 'Reparation standard', '2:00:00', 250000),
(default, 'Reparation complexe', '8:00:00', 800000),
(default, 'Entretien', '2:30:00', 300000);

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-02', 2, 1,  150000, default);

INSERT INTO details_rdv VALUES
(default, 1, '2024-07-07 8:00:00', '2024-07-07 10:00:00', 1, '2:00:00');

INSERT INTO rendez_vous VALUES
(default, 1, '2024-07-07 11:00:00', '2024-07-02', 3, 1,  800000, default);
INSERT INTO details_rdv VALUES
(default, 1, '2024-07-07 11:00:00', '2024-07-08 08:00:00', 1, '8:00:00');
