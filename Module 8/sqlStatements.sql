CREATE DATABASE baseball_01;

CREATE TABLE golfers (
    firstName VARCHAR(70),
    lastName VARCHAR(70),
    age INT,
    birthCountry VARCHAR(100)
);

DROP TABLE IF EXISTS golfers;

INSERT INTO golfers (firstName, lastName, age, birthCountry) VALUES (

    (Jordan, Spieth, 30, Unites States),
    (Rory, Mcllroy, 34, United Kingdom),
    (Cameron, Smith, 30, Australia)
;)