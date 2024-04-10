ALTER TABLE `users` ADD COLUMN `hashed_password` VARCHAR(255);
UPDATE `users` SET `hashed_password` = SHA2(`password`,256);
ALTER TABLE `users` DROP COLUMN `password`;
ALTER TABLE `users` CHANGE COLUMN `hashed_password` `password` VARCHAR(255);
