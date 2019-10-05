CREATE TABLE users (
    u_id INTEGER AUTO_INCREMENT,
    u_name VARCHAR(150),
    u_img VARCHAR(150),
    u_gender VARCHAR(1),
    u_tel INTEGER,
    u_age INTEGER,
    u_email VARCHAR(150),
    u_password VARCHAR(250),
    u_address_1 VARCHAR(250),
    u_address_2 VARCHAR(250),
    u_town VARCHAR(40),
    u_type VARCHAR(5),
    u_zip INTEGER(6),
    u_email_verify_token VARCHAR(250),
    u_status VARCHAR(6),
    CONSTRAINT users_pk PRIMARY KEY(u_id)
)