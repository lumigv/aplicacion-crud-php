CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  surname VARCHAR(100) NOT NULL,
  name VARCHAR(100) NOT NULL,
  age INT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (surname, name, age) VALUES('Coloma', 'Javier', 25);
INSERT INTO users (surname, name, age) VALUES('Oviedo', 'Carmen', 34);
INSERT INTO users (surname, name, age) VALUES('Vargas', 'Pascual', 19);
INSERT INTO users (surname, name, age) VALUES('Donoso', 'Maria', 45);
INSERT INTO users (surname, name, age) VALUES('Celis', 'Manuel', 56);
INSERT INTO users (surname, name, age) VALUES('Palencia', 'Jana', 31);
INSERT INTO users (surname, name, age) VALUES('Zamanillo', 'Pedro', 63);


