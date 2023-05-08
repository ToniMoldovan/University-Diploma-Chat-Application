-- Create the "users" table
CREATE TABLE `users` (
     `user_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
     `username` VARCHAR(50) NOT NULL,
     `password` VARCHAR(255) NOT NULL,
     `email` VARCHAR(255) NOT NULL,
     `first_name` VARCHAR(50) NOT NULL,
     `last_name` VARCHAR(50) NOT NULL,
     `profile_picture` VARCHAR(255) DEFAULT NULL,
     `status` ENUM('online', 'offline') NOT NULL DEFAULT 'offline',
     `last_active` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     `account_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`user_id`),
     UNIQUE KEY (`username`)
);

-- Create the "chatrooms" table
CREATE TABLE `chatrooms` (
     `chatroom_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
     `chatroom_title` VARCHAR(255) NOT NULL,
     `chatroom_tag` VARCHAR(6) NOT NULL,
     `description` TEXT DEFAULT NULL,
     `is_public` ENUM('true', 'false') NOT NULL DEFAULT 'true',
     `created_by` INT(10) UNSIGNED NOT NULL,
     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`chatroom_id`),
     UNIQUE KEY (`chatroom_tag`),
     FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`)
);

-- Create the "messages" table
CREATE TABLE `messages` (
    `message_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `message_body` TEXT NOT NULL,
    `sender_id` INT(10) UNSIGNED NOT NULL,
    `receiver_id` INT(10) UNSIGNED NOT NULL,
    `is_read` ENUM('true', 'false') NOT NULL DEFAULT 'false',
    `sent_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`message_id`),
    FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
    FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
);
