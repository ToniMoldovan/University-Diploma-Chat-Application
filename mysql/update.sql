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
      user_id INT,
      chatroom_id INT
);
