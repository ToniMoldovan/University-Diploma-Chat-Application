/*READ FIRST:
* For your app to work, you need to run the following commands in your database console.
*/

/*Run this for chatrooms images*/
ALTER TABLE chatrooms ADD COLUMN chatroom_image_link TEXT;

/*Run this for chatrooms genre*/
ALTER TABLE chatrooms ADD COLUMN genre VARCHAR(255);

/*Run this for chatrooms password (for private rooms only)*/
ALTER TABLE chatrooms ADD COLUMN room_password VARCHAR(255);

/*Run this for members_in_chatrooms table*/
CREATE TABLE members_in_chatrooms (
    user_id INT(10) UNSIGNED,
    chatroom_id INT(10) UNSIGNED,
    joined_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id, chatroom_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (chatroom_id) REFERENCES chatrooms(chatroom_id)
);

/*Run this for updated `messages` table*/
CREATE TABLE `messages` (
      `message_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
      `message_body` TEXT NOT NULL,
      `sender_id` INT(10) UNSIGNED NOT NULL,
      `chatroom_id` INT(10) UNSIGNED NOT NULL,
      `is_read` ENUM('true', 'false') NOT NULL DEFAULT 'false',
      `sent_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`message_id`),
      FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
      FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`)
);
