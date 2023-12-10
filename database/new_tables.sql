-- CREATE TABLE personal_access_tokens (
--     id BIGINT PRIMARY KEY AUTO_INCREMENT,
--     tokenable_id BIGINT UNSIGNED,
--     tokenable_type VARCHAR(255),
--     name VARCHAR(255),
--     token VARCHAR(64) UNIQUE,
--     abilities TEXT,
--     last_used_at TIMESTAMP NULL,
--     expires_at TIMESTAMP NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );


-- CREATE TABLE failed_jobs (
--     id BIGINT PRIMARY KEY AUTO_INCREMENT,
--     uuid VARCHAR(255) UNIQUE,
--     connection TEXT,
--     queue TEXT,
--     payload LONGTEXT,
--     exception LONGTEXT,
--     failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE password_reset_tokens (
--     email VARCHAR(255) PRIMARY KEY,
--     token VARCHAR(255),
--     created_at TIMESTAMP NULL
-- );
ALTER TABLE Utenze
MODIFY Password VARCHAR(250);

ALTER TABLE `anagrafiche` CHANGE `Brand/Prodotto` `Brand` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL; 