<?php

class Valorations{
    private $valoration_Id;
    private $text;
    private $user_Id;

    function __construct($valoration_Id, $text, $user_Id) {
        $this->valoration_Id = $valoration_Id;
        $this->text = $text;
        $this->user_Id = $user_Id;
    }
    function getValoration_Id() {
        return $this->valoration_Id;
    }

    function getText() {
        return $this->text;
    }

    function getUser_Id() {
        return $this->user_Id;
    }

    function setValoration_Id($valoration_Id) {
        $this->valoration_Id = $valoration_Id;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setUser_Id($user_Id) {
        $this->user_Id = $user_Id;
    }


}

?>
