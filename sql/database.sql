CREATE TABLE NBA_Stats (
    Equipo VARCHAR(255),
    Jugador VARCHAR(255),
    Puntos INT,
    Asistencias INT,
    Rebotes INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Los Angeles Lakers', 'LeBron James', 25, 8, 7);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Brooklyn Nets', 'Kevin Durant', 28, 5, 6);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Golden State Warriors', 'Stephen Curry', 32, 6, 4);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Milwaukee Bucks', 'Giannis Antetokounmpo', 30, 7, 11);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Denver Nuggets', 'Nikola Jokic', 27, 8, 12);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Philadelphia 76ers', 'Joel Embiid', 29, 4, 10);
INSERT INTO NBA_Stats (Equipo, Jugador, Puntos, Asistencias, Rebotes) VALUES ('Dallas Mavericks', 'Luka Doncic', 31, 9, 8);


