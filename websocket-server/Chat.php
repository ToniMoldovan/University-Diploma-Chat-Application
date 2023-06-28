<?php
namespace MyApp;
use app\models\ChatroomModel;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected array $rooms = [];

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        // echo green text to the terminal
        echo "\033[32m[Server]:\033[0m New connection! ({$conn->resourceId})\n";
    }

    private function onSubscribe(ConnectionInterface $from, $data) {
        $room_tag = $data->room;
        $user_id = $data->user;

        echo "\033[32m[Server]:\033[0m User {$user_id} is subscribing to room {$room_tag}\n";

        // Add user to room in database.
        $chatroomModel = new ChatroomModel();
        $result = $chatroomModel->addUserToRoom($user_id, $room_tag);

        switch ($result) {
            case -1:
                echo "\033[32m[Server]:\033[0m User {$user_id} is already in database table.\n";
                break;

            case 1:
                echo "\033[32m[Server]:\033[0m User {$user_id} successfully added to room {$room_tag}\n";
                break;

            case 2:
                echo "\033[32m[Server]:\033[0m User {$user_id} cannot be added to room {$room_tag}\n";
                break;
        }

        // Store room tag in connection object.
        $from->room_tag = $room_tag;
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "\033[32m[Server]:\033[0m Message from {$from->resourceId}: {$msg}\n";
        $data = json_decode($msg);
        if ($data === null) {
            echo "Message is null";
            // Invalid JSON data.
            return;
        }

        switch ($data->command) {
            case 'subscribe':
                // Handle subscription logic.
                $this->onSubscribe($from, $data);
                break;

            case 'message':
                // Handle new message.
                $this->onMessageReceived($from, $data);
                break;
        }
    }

    private function onMessageReceived(ConnectionInterface $from, $data) {
        $room_tag = $from->room_tag;
        $user_id = $data->user;
        $message = $data->message;

        // Store message in database.
        $messageModel = new ChatroomModel();
        $result = $messageModel->storeMessage($user_id, $room_tag, $message);

        if ($result === 1) {
            echo "\033[32m[Server]:\033[0m Message successfully stored in database.\n";
        } else {
            echo "\033[32m[Server]:\033[0m Message could not be stored in database.\n";
        }

        // Broadcast message to all other users in the same room.
        foreach ($this->clients as $client) {
            if ($client->room_tag === $room_tag) {
                $client->send(json_encode([
                    'command' => 'message',
                    'user' => $user_id,
                    'message' => $message
                ]));
            }
        }
    }


    private function showRooms() {
        echo "Current rooms:\n";
        foreach ($this->rooms as $room => $clients) {
            echo "Room {$room} has " . count($clients) . " clients\n";
        }
    }

    private function sendMessage(ConnectionInterface $from, $room, $message) {
        foreach ($this->rooms[$room] as $client) {
            if ($from !== $client) {
                $client->send($message);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "\033[32m[Server]:\033[0m Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "\033[32m[Server]:\033[0m An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}