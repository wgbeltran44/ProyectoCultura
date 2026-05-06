CREATE DATABASE IF NOT EXISTS registrologin;
USE registrologin;

ALTER TABLE users 
ADD COLUMN role VARCHAR(20) DEFAULT 'usuario';

ALTER TABLE obras 
ADD COLUMN user_id BIGINT UNSIGNED;


SET SQL_SAFE_UPDATES = 0;

UPDATE obras 
SET 
    user_id = 1
WHERE
    user_id IS NULL;
    
ALTER TABLE obras
ADD CONSTRAINT obras_user_id_foreign
FOREIGN KEY (user_id) REFERENCES users(id)
ON DELETE CASCADE;

ALTER TABLE users 
ADD COLUMN role VARCHAR(20) DEFAULT 'usuario';

UPDATE users SET role = 'admin' WHERE id = 1;
UPDATE users SET role = 'artista' WHERE id = 3;
UPDATE users SET role = 'usuario' WHERE id = 5;

SELECT imagen FROM obras;