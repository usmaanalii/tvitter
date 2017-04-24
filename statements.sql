CREATE DATABASE tvitter_1;

USE tvitter_1;

-- create users table
CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `bio` VARCHAR(180) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    `website` VARCHAR(40) NOT NULL
);

-- TODO: Need to change the time to datetime
-- create posts table
CREATE TABLE `posts` (
    `post_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `sender_id` INT NOT NULL,
    `recipient_id` INT NOT NULL,
    `time` TIMESTAMP NOT NULL,
    `body` VARCHAR(140),
    `title` VARCHAR(140) NOT NULL,

    FOREIGN KEY (sender_id) REFERENCES users(`id`),
    FOREIGN KEY (recipient_id) REFERENCES users(`id`)
);
