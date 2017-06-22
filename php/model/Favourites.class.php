<?php

class Favourites{
    private $favourite_Id;
    private $user_Id;

    function __construct($favourite_Id, $user_Id) {
        $this->favourite_Id = $favourite_Id;
        $this->user_Id = $user_Id;
    }

    function getFavourite_Id() {
        return $this->favourite_Id;
    }

    function getUser_Id() {
        return $this->user_Id;
    }

    function setFavourite_Id($favourite_Id) {
        $this->favourite_Id = $favourite_Id;
    }

    function setUser_Id($user_Id) {
        $this->user_Id = $user_Id;
    }

}

?>
