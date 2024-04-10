CREATE TABLE logging (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    success TINYINT(1) NOT NULL
);

ALTER TABLE users ADD COLUMN last_password_change TIMESTAMP DEFAULT CURRENT_TIMESTAMP

DELIMITER $$
CREATE TRIGGER update_users_changed_password_time
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    IF NEW.password != OLD.password THEN
        INSERT INTO users (change_time) VALUES (NOW());
    END IF;
END $$
DELIMITER ;