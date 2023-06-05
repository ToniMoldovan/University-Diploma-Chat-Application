<?php
namespace MyApp;
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

        //echo "[Server]: New connection! ({$conn->resourceId})\n";
    }

    private function subscribe(ConnectionInterface $client, $room) {
        $this->rooms[$room][] = $client;
        echo "New client subscribed to room {$room}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg);
        switch ($data->command) {
            case "subscribe":
                $this->subscribe($from, $data->room);
                break;
            case "message":
                $this->sendMessage($from, $data->room, $data->message);
                break;
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

        echo "[Server]: Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "[Server]: An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}