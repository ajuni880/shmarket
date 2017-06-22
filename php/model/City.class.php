<?php

class City {
/*id,fullfullName,email,password,phone,role,registryDate,cities*/
    private $id;
    private $name;
    private $provinceId;

    function __construct($id, $name, $provinceId) {
        $this->id = $id;
        $this->name = $name;
        $this->provinceId = $provinceId;
    }
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getProvinceId() {
        return $this->provinceId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setProvinceId($provinceId) {
        $this->provinceId = $provinceId;
    }


}
?>
