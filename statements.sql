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
    `user_id` INT NOT NULL,
    `time` TIME NOT NULL,
    `body` VARCHAR(140),

    FOREIGN KEY (user_id) REFERENCES `users`(`id`)
);

-- insert users
INSERT INTO `users` (`username`, `password`, `bio`) VALUES
    (
        ('usy', 'password','usy\'s bio'),
        ('ali', 'password','ali\'s bio'),
        ('mum', 'password','mum\'s bio'),
        ('jav', 'password','jav\'s bio'),
        ('tam', 'password','tam\'s bio')
    );
