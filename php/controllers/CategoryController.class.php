<?php

require_once '../model/persist/EntityInterface.class.php';
require_once '../model/Category.class.php';
require_once '../model/City.class.php';
require_once '../model/persist/CategoryDAO.class.php';


class CategoryController{
  private $data;
  private $action;

  function __construct($action, $data){
    $this->action = $action;
    $this->data = $data;
  }

  function getData(){
    return $this->data;
  }

  function getAction(){
    return $this->action;
  }

  function doAction(){
    $userAction = $this->getAction();
    $response = array();

    switch($userAction){
        case 100:
                $response = $this->findAll();
                break;
        case 110:
                $response = $this->findAllCities();
                break;
        case 120:
                $response = $this->findCategoryById();
                break;
        case 130:
                $response = $this->addCategory();
                break;
        default:
                $errors = array();
        				$response[0]= false;
        				$errors[]= "Sorry, there has been an error. Try later";
        				$response[]= $errors;
				        error_log("Action not correct in CategoryControllerClass, value: ".$this->getAction());
                break;
    }

    return $response;
  }


  function findAll(){

    $response = array();

    $helper = new CategoryDAO();
    $categories = $helper->findAll();

    if(!empty($categories)){

      $response[0] = true;
      $response[1] = $categories;

    } else {
      $response[0] = false;
      $errors[]="Error fetching categories.";
      $response[1] = $errors;
    }

    return $response;
  }

  public function findAllCities(){

    $response = array();
    $helper = new CategoryDAO();
    $cities = $helper->findAllCities();

    if(!empty($cities)){

      $response[0] = true;
      $response[1] = $cities;

    } else {
      $response[0] = false;
      $errors[]="Error fetching cities.";
      $response[1] = $errors;
    }

    return $response;
  }

  function addCategory(){
    $data = json_decode(stripslashes(trim($this->getData())));
    // var_dump($data);
    $category = new Category($data->categoryId,$data->name);

    $response = array();
    $helper = new CategoryDAO();
    $isInserted = $helper->add($category);

    if(!empty($isInserted)){

      $response[0] = true;

    } else {
      $response[0] = false;
      $errors[]="Error inserting category.";
      $response[1] = $errors;
    }

    return $response;
  }

}

?>
