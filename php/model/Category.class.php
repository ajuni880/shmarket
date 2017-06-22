<?php
class Category {

//attributes
private $id;
private $name;

//construct
    function __construct($id="", $name="") {
        $this->id = $id;
        $this->name = $name;
    }

//getters
    function getCategoryId(){
      return $this->id;
    }
    function getName(){
      return $this->name;
    }
//setters
    function setId($id){
      $this->id=$id;
    }
    function setName($name){
      $this->name=$name;
    }
//toString
    function toString(){
        return $this->id.";".$this->name.";\n";
    }

}
?>
