CREATE DATABASE tvitter_1;

USE tvitter_1;

-- create users table
CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(16) NOT NULL,
    `bio` VARCHAR(180) NOT NULL
);

-- create posts table
CREATE TABLE `posts` (
    `post_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id` INT NOT NULL,
    `time` TIME,
    `body` VARCHAR(140),

    FOREIGN KEY (post_id) REFERENCES `users`(`id`)
);
