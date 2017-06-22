<?php

class User {
/*,fullfullName,email,password,phone,role,registryDate,cities*/
    private $userId;
    private $fullName;
    private $email;
    private $password;
    private $telephone;
    private $role;
    private $registryDate;

    function load($userId="", $fullName="", $email="",$password="",$telephone="", $role="", $registryDate="") {
        $this->userId = $userId;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->role = $role;
        $this->registryDate = $registryDate;
    }
    function getId() {
        return $this->userId;
    }

    function getFullName() {
        return $this->fullName;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getRole() {
        return $this->role;
    }

    function getRegistryDate() {
        return $this->registryDate;
    }

    function setId($userId) {
        $this->userId = $userId;
    }

    function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setRegistryDate($registryDate) {
        $this->registryDate = $registryDate;
    }

}
?>
