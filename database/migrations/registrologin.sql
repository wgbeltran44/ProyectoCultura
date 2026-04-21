CREATE DATABASE IF NOT EXISTS registrologin;
USE registrologin;

ALTER TABLE users ADD role VARCHAR(20) DEFAULT 'usuario';

UPDATE users SET role = 'admin' WHERE email = 'admin@gmail.com';

INSERT INTO users (name, email, password, role)
VALUES (	
'Admin',
'admin@cultura.com',
'$2y$10$ejemploHASH', 
'admin'
);

SELECT * FROM users;