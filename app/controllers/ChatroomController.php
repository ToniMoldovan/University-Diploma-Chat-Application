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

    public function loadRooms($request, $response, $service, $app)
    {
        $tempChatroom = new ChatroomModel();
        $rooms = $tempChatroom->loadRooms();

        // Assign rooms to a service property
        $service->rooms = $rooms;

        // render the view
        return $service->render(__DIR__ . '/../views/rooms.php');
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

    public function joinRoom($request, $response, $service, $app) {
        if (!isset($_SESSION['user_id'])) {
            echo "You must be logged in to enter a room";
            return;
        }

        // Check if the room tag exists
        $tempChatroom = new ChatroomModel();
        $tempChatroom->setChatroomTag($request->tag);

        if(!$tempChatroom->tagExists()) {
            echo "Room does not exist";
            return;
        }

        $service->chatroom_tag = $request->tag;
        $service->data = $tempChatroom->getDataByTag();

        // render the view
        $service->render(__DIR__ . '/../views/chatroom.php');
    }

    public function sendMessage($request, $response, $service, $app) {

    }

    public function getRoomMessageHistory($request, $response, $service, $app) {
        $tempChatroom = new ChatroomModel();
        $tempChatroom->setChatroomTag($request->tag);
        $result = $tempChatroom->getDataByTag();

        $tempChatroom->setId($result["chatroom_id"]);
        $messageHistory = $tempChatroom->getMessageHistory();

        return $messageHistory;
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