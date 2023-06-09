<?php

namespace app\models;

use PDO;

class ChatroomModel
{
    private $my_pdo;

    public function __construct() {
        $this->my_pdo = new PDO('mysql:host=mysql;dbname=chatapp', 'admin', 'admin');
    }

    private $id = -1;
    private $chatroom_title;
    private $chatroom_tag;
    private $description;
    private $is_public;
    private $created_by;
    private $created_at;
    private $chatroom_image_link;
    private $genre;
    private $room_password;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getChatroomTitle()
    {
        return $this->chatroom_title;
    }

    public function setChatroomTitle($chatroom_title): void
    {
        $this->chatroom_title = $chatroom_title;
    }

    public function getChatroomTag()
    {
        return $this->chatroom_tag;
    }

    public function setChatroomTag($chatroom_tag): void
    {
        $this->chatroom_tag = $chatroom_tag;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getIsPublic()
    {
        return $this->is_public;
    }

    public function setIsPublic($is_public): void
    {
        $this->is_public = $is_public;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by): void
    {
        $this->created_by = $created_by;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getChatroomImageLink()
    {
        return $this->chatroom_image_link;
    }

    public function setChatroomImageLink($chatroom_image_link): void
    {
        $this->chatroom_image_link = $chatroom_image_link;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    public function getRoomPassword()
    {
        return $this->room_password;
    }

    public function setRoomPassword($room_password): void
    {
        $this->room_password = $room_password;
    }

    public function loadRooms()
    {
        global $pdo;

        $query = "SELECT * FROM chatrooms";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // return data as json for jquery to handle
        return $data;
    }

    public function tagExists() {
        global $pdo;

        $query = "SELECT chatroom_tag FROM chatrooms WHERE chatroom_tag = :tag";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':tag', $this->chatroom_tag);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getMessageHistory() {
        global $pdo;

        $query = "SELECT * FROM messages WHERE chatroom_tag = :chatroom_tag";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':chatroom_tag', $this->chatroom_tag);
        $stmt->execute();

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getDataByTag() {
        global $pdo;

        $query = "SELECT * FROM chatrooms WHERE chatroom_tag = :tag";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':tag', $this->chatroom_tag);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function nameExists() {
        global $pdo;

        $query = "SELECT chatroom_title FROM chatrooms WHERE chatroom_title = :name";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':name', $this->chatroom_title);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function createRoom($response)
    {
        global $pdo;

        $query = "INSERT INTO chatrooms (chatroom_title, chatroom_tag, description, is_public, created_by, chatroom_image_link, genre, room_password) 
                VALUES (:chatroom_title, :chatroom_tag, :description, :is_public, :created_by, :chatroom_image_link, :genre, :room_password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':chatroom_title', $this->chatroom_title);
        $stmt->bindValue(':chatroom_tag', $this->chatroom_tag);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':is_public', $this->is_public);
        $stmt->bindValue(':created_by', $this->created_by);
        $stmt->bindValue(':chatroom_image_link', $this->chatroom_image_link);
        $stmt->bindValue(':genre', $this->genre);
        $stmt->bindValue(':room_password', $this->room_password);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = 'Chatroom created successfully!';
            $response->redirect('/rooms/create');
        } else {
            $_SESSION['error_message'] = 'Chatroom creation failed. Please try again.';
        }
    }

    private function checkIfUserIsInsideRoom($user_id, $room_tag)
    {
        $query = "SELECT * FROM members_in_chatrooms WHERE user_id = :user_id AND chatroom_tag = :chatroom_tag";
        $stmt = $this->my_pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':chatroom_tag', $room_tag);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addUserToRoom($user_id, $room_tag)
    {
        // check if user is already in room
        if ($this->checkIfUserIsInsideRoom($user_id, $room_tag)) {
            return -1;
        }

        $query = "INSERT INTO members_in_chatrooms (user_id, chatroom_tag) VALUES (:user_id, :chatroom_tag)";
        $stmt = $this->my_pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':chatroom_tag', $room_tag);

        if ($stmt->execute()) {
            return 1;
        } else {
            return 2;
        }
    }

    public function storeMessage($user_id, $room_tag, $message)
    {
        $query = "INSERT INTO messages (sender_id, chatroom_tag, message_body) VALUES (:sender_id, :chatroom_tag, :message_body)";
        $stmt = $this->my_pdo->prepare($query);
        $stmt->bindValue(':sender_id', $user_id);
        $stmt->bindValue(':chatroom_tag', $room_tag);
        $stmt->bindValue(':message_body', $message);

        try {
            if ($stmt->execute()) {
                return 1;
            } else {
                return 2;
            }
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return 2;
        }
    }

}