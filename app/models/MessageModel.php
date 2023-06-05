<?php

namespace app\models;

class MessageModel
{
    private $message_id = -1;
    private $message_body;
    private $sender_id;
    private $chatroom_id;
    private $sent_ad;


    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): void
    {
        $this->message_id = $message_id;
    }

    public function getMessageBody()
    {
        return $this->message_body;
    }

    public function setMessageBody($message_body): void
    {
        $this->message_body = $message_body;
    }

    public function getSenderId()
    {
        return $this->sender_id;
    }

    public function setSenderId($sender_id): void
    {
        $this->sender_id = $sender_id;
    }

    public function getChatroomId()
    {
        return $this->chatroom_id;
    }

    public function setChatroomId($chatroom_id): void
    {
        $this->chatroom_id = $chatroom_id;
    }

    public function getSentAd()
    {
        return $this->sent_ad;
    }

    public function setSentAd($sent_ad): void
    {
        $this->sent_ad = $sent_ad;
    }


}