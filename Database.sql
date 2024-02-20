CREATE TABLE users
(
    id         SERIAL UNIQUE NOT NULL,
    first_name VARCHAR(255)  NOT NULL,
    last_name  VARCHAR(255)  NOT NULL,
    email      VARCHAR(255)  NOT NULL,
    document   VARCHAR(255)  NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE users_address
(
    user_id    SERIAL UNIQUE NOT NULL,
    id         SERIAL UNIQUE NOT NULL,
    street     VARCHAR(255)  NOT NULL,
    number     VARCHAR(255)  NOT NULL,
    complement VARCHAR(255)  NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);
