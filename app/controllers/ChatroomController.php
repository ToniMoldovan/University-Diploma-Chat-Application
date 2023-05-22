<?php

namespace app\controllers;

use app\models\ChatroomModel;

class ChatroomController
{
    public function createRoom($request, $response)
    {
        if (isset($_SESSION['user_id'])) {
            require __DIR__ . '/../views/create_room.php';
        } else {
            echo "You must be logged in to create a room";
        }
    }

    public function createNewRoom($request, $response)
    {
        if (!isset($_SESSION['user_id'])) {
            echo "You must be logged in to create a room";
            return;
        }

        $tempChatroom = new ChatroomModel();

        $isPublic = $request->room_is_private == "on" ? 'false' : 'true';

        $tempChatroom->setChatroomTitle($request->room_name);
        $tempChatroom->setChatroomTag($request->room_tag);
        $tempChatroom->setDescription($request->room_description);
        $tempChatroom->setIsPublic($isPublic);
        $tempChatroom->setCreatedBy($_SESSION['user_id']);
        $tempChatroom->setChatroomImageLink($request->room_image_link);
        $tempChatroom->setGenre($request->room_genre);
        $tempChatroom->setRoomPassword($request->room_password);

        $tempChatroom->createRoom($response);
    }

    public function tagExists($request) {
        $tempChatroom = new ChatroomModel();
        $tempChatroom->setChatroomTag($request->tag);

        $result = $tempChatroom->tagExists();

        if ($result) {
            echo "exists";
        } else {
            echo "not exists";
        }
    }

    public function nameExists($request) {
        $tempChatroom = new ChatroomModel();
        $tempChatroom->setChatroomTitle($request->title);

        $result = $tempChatroom->nameExists();

        if ($result) {
            echo "exists";
        } else {
            echo "not exists";
        }
    }
}