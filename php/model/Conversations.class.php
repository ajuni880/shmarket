<?php

class Conversations{
    private $conversationId;
    private $text;
    private $time;
    private $fromUser;
    private $toUser;

    function __construct($conversationId,$text, $time, $fromUser, $toUser) {
        $this->text = $text;
        $this->time = $time;
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->conversationId = $conversationId;
    }
    function getConversationId() {
        return $this->conversationId;
    }

    function getText() {
        return $this->text;
    }

    function getTime() {
        return $this->time;
    }

    function getFromUser() {
        return $this->fromUser;
    }

    function getToUser() {
        return $this->toUser;
    }

    function setConversationId($conversation_Id) {
        $this->conversationId = $conversation_Id;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setFromUser($fromUser) {
        $this->fromUser = $fromUser;
    }

    function setToUser($toUser) {
        $this->toUser = $toUser;
    }


}

?>
