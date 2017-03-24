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
    `sender_id` INT NOT NULL,
    `recipient_id` INT NOT NULL,
    `time` TIME NOT NULL,
    `body` VARCHAR(140),

    FOREIGN KEY (sender_id) REFERENCES users(`id`),
    FOREIGN KEY (recipient_id) REFERENCES users(`id`)
);


-- insert users
INSERT INTO `users` (`username`, `password`, `bio`) VALUES

        ('usy', 'password','usy\'s bio'),
        ('ali', 'password','ali\'s bio'),
        ('mum', 'password','mum\'s bio'),
        ('jav', 'password','jav\'s bio'),
        ('tam', 'password','tam\'s bio');


-- query to collect, sender_username, recipient_username and post_body
-- located in get_user_posts method
SELECT users1.username AS 'sender',
       users2.username AS 'recipient',
       posts.body AS 'body' FROM `posts`

INNER JOIN `users` `users1` ON users1.id = posts.sender_id
INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

WHERE posts.recipient_id = ?

ORDER BY posts.time DESC;
