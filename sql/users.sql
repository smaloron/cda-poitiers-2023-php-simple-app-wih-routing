CREATE TABLE users (
    id SMALLINT UNSIGNED AUTO_INCREMENT,
    user_name VARCHAR(30) NOT NULL,
    user_password VARCHAR(90) NOT NULL,
    PRIMARY KEY(id)
);