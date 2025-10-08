DROP TABLE IF EXISTS dentists;
DROP TABLE IF EXISTS clients;

CREATE TABLE IF NOT EXISTS dentists (
    dentist_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dentist_name VARCHAR(45) NOT NULL,
    dentist_surname VARCHAR(45) NOT NULL,
    dentist_dni VARCHAR(35) NOT NULL,
    dentist_date_of_birth DATE NOT NULL,
    dentist_on_vacation TINYINT NOT NULL
);

CREATE TABLE IF NOT EXISTS clients (
    client_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR(45) NOT NULL,
    client_surname VARCHAR(45) NOT NULL,
    client_dni VARCHAR(35) NOT NULL,
    client_date_of_birth DATE NOT NULL
);