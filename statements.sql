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

    FOREIGN KEY (sender_id) REFERENCES users(`id`),
    FOREIGN KEY (recipient_id) REFERENCES users(`id`)
);

-- query to collect, sender_username, recipient_username and post_body
-- located in get_user_posts method
SELECT users1.username AS 'sender',
       users2.username AS 'recipient',
       posts.body AS 'body' FROM `posts`

INNER JOIN `users` `users1` ON users1.id = posts.sender_id
INNER JOIN `users` `users2` ON users2.id = posts.recipient_id

WHERE posts.recipient_id = ?

ORDER BY posts.time DESC;
