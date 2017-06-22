<?php

require_once "../model/Category.class.php";
require_once "../model/City.class.php";
require_once "DBConnect.class.php";


class CategoryDAO{

    private $dbConnect;

    public function __construct() {
        $this->dbConnect = DBConnect::getInstance();
    }
    /*Selects all the categories*/
    public function findAll() {
       $query = "select * from CATEGORIES";
       $vector = array();
       $rows = $this->dbConnect->execution($query, $vector); //és un vector amb les línies i sense format

       return $rows->fetchAll(PDO::FETCH_ASSOC);
    }
    //Find all the cities
    public function findAllCities() {
       $query = "select * from CITIES";
       $vector = array();
       $rows = $this->dbConnect->execution($query, $vector); //és un vector amb les línies i sense format

       return $rows->fetchAll(PDO::FETCH_ASSOC);
    }
    /*Adds a new category*/
    public function add($category) {
        //crida al metode que insereix
        $query = "insert into CATEGORIES VALUES (null,?)";
        $vector = array($category->getName());
        $flag = $this->dbConnect->execution($query,$vector);

        return $flag->rowCount();
    }
    /*Find by category*/
    public function findById($category){
      $query = "select * from CATEGORIES where categoryId = ?";
      $vector = array($category->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }
    /*deletes a category*/
    public function delete($category){
      $query = "delete from CATEGORIES where categoryId = ?";
      $vector = array($category->getId());
      $rows = $this->dbConnect->execution($query,$vector);

      return $rows->rowCount();
    }
    /*Updates a category*/
    public function update($category){
      $query = "update CATEGORIES set name = ? where categoryId = ?";
      $vector = array($category->getName(),$category->getId());
      $rows = $this->dbConnect->execution($query,$vector);

      return $rows->rowCount();
    }
    /*Checks if a category is valid*/
    public function isValidEntity($category){
      $isValid = false;
      if($category->getName()!= null ){
          $isValid = true;
      }
      return $isValid;
    }

}

?>
