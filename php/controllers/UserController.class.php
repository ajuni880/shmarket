<?php

require_once '../model/persist/EntityInterface.class.php';
require_once '../model/User.class.php';
require_once '../model/Conversations.class.php';
require_once '../model/persist/UserDAO.class.php';


class UserController implements EntityInterfaceController{
  private $data;
  private $action;

  function __construct($action, $data){
    $this->action = $action;
    $this->data = $data;
  }

  public function getData(){
    return $this->data;
  }

  public function getAction(){
    return $this->action;
  }

  public function doAction(){
    $userAction = $this->getAction();
    $response = array();

    switch($userAction){
        case 100:
                $response = $this->doLogin();
                break;
        case 110:
                $response = $this->add();
                break;
        case 140:
                $response = $this->checkSession();
                break;
        case 150:
                $response = $this->logOut();
                break;
        case 180:
                $response = $this->getWebStatistics();
                break;
        case 190:
                $response = $this->listAll();
                break;
        case 200:
                $response = $this->getUserAnnouncesData();
                break;
        case 210:
                $response = $this->getMyFavouritesAnnounces();
                break;
        case 220:
                $response = $this->changePassword();
                break;
        case 230:
                $response = $this->update();
                break;
        default:
                $errors = array();
        				$response[0]= false;
        				$errors[]= "Sorry, there has been an error. Try later";
        				$response[]= $errors;
				        error_log("Action not correct in UserControllerClass, value: ".$this->getAction());
                break;
    }

    return $response;
  }


  public function doLogin(){

    $data = json_decode($this->getData());

    $user = new User();
    $user->setEmail($data->email);
    $user->setPassword($data->password);
    $response = array();

    $helper = new UserDAO();
    $userFound = $helper->findUser($user);
    $userArray = array();
    $response[0] = true;
    if(!empty($userFound)){
      $response[1] = $userFound[0];
      $_SESSION['userConnected'] = $userFound[0];
    } else {
      $response[0] = false;
      $errors[]="User not found.";
      $response[1] = $errors;
    }

    return $response;
  }

  public function add(){

    $data = json_decode($this->getData());

    $response = [];
    $user = new User();
    $user->setFullName($data->fullname);
    $user->setEmail($data->email);
    $user->setPassword($data->pass);
    $user->setTelephone($data->telephone);

    $helper = new UserDAO();
    $rowsAffected = $helper->emailExists($user);
    if(empty($emailExists)){

      $rowsAffected = $helper->add($user);

      if($rowsAffected == 1){
        $response[0] = true;
        $response[1] = $rowsAffected;
      }

    } else {
      $response[0] = -1;
      $errors[]="Error registering user. Try again";
      $response[1] = $errors;
    }
    return $response;
  }

  public function checkSession(){
    $response = array();
    if(isset($_SESSION['userConnected'])){
      $response[0] = true;
      $response[1] = $_SESSION['userConnected']['userId'];
    } else {
      $response[0] = false;
    }

    return $response;
  }

public function logOut(){
    $response = array();

    if(isset($_SESSION['userConnected'])){
      session_unset();
      session_destroy();
      $response[0] = true;
    } else {
      $response[0] = false;
      $response[1] = 'No session exists';
    }

    return $response;
  }

  public function changePassword(){
      $data = json_decode($this->getData());
      $response = [];
      $helper = new UserDAO();
      $user = new User();
      $user->setId($data->userId);
      $user->setPassword($data->password);
      $rowsAffected = $helper->changePassword($user);

      if($rowsAffected > 0){
        $response[0] = true;
        $response[1] = $rowsAffected;
      } else {
        $response[0] = false;
        $errors[]="Error updating user. Try again";
        $response[1] = $errors;
      }
      return $response;
  }

  public function update(){
    $data = json_decode(stripslashes($this->getData()));
    $response = [];
    $helper = new UserDAO();
    // $user = new User($data->userId,$data->fullName,$data->email,$data->telephone);
    $user = new User();
    $user->setId($data->userId);
    $user->setFullName($data->fullName);
    $user->setEmail($data->email);
    $user->setTelephone($data->telephone);

    $rowsAffected = $helper->update($user);

    if($rowsAffected > 0){
      $response[0] = true;
      $response[1] = $rowsAffected;
    } else {
      $response[0] = false;
      $errors[]="Error updating user. Try again";
      $response[1] = $errors;
    }
    return $response;
}


  public function getWebStatistics(){
    $response = [];

    $helper = new UserDAO();
    $statistics = $helper->getWebStatistics();
    var_dump($statistics);
  }

  public function listAll(){
    $response = [];

    $helper = new UserDAO();
    $usersArray = $helper->findAll();
    if(!empty($usersArray)){
      $response[0] = true;
      $response[1] = $usersArray;
    } else {
      $response[0] = false;
      $errors[]="Error fetching users. Try again";
      $response[1] = $errors;
    }
    return $response;
  }



  public function getUserAnnouncesData(){
    $data = json_decode($this->getData());
    $response = [];
    $user = new User();
    $user->setId($data->userId);

    $helper = new UserDAO();
    $userAnnouncesData = $helper->getUserAnnouncesData($user);
    if(!empty($userAnnouncesData)){
      $response[0] = true;
      $response[1] = $userAnnouncesData;
    } else {
      $response[0] = false;
      $errors[]="Error fetching users. Try again";
      $response[1] = $errors;
    }
    return $response;
  }

  public function getMyFavouritesAnnounces(){
    $data = json_decode($this->getData());
    $response = [];
    $user = new User();
    $user->setId($data->userId);

    $helper = new UserDAO();
    $favouritesId = $helper->getMyFavouritesId($user);

    if(!empty($favouritesId)){
      // var_dump($favouritesId);
      $in = "in (";
      // Get array keys
      $arrayKeys = array_keys($favouritesId);
      // Fetch last array key
      $lastArrayKey = array_pop($arrayKeys);

      foreach ($favouritesId as $key => $f) {
        if($key == $lastArrayKey)
          $in .= $f['announceId'];
        else
          $in .= $f['announceId'].",";
      }
      $in .= ")";
      $favourites = $helper->getMyFavouritesAnnounces($in);
      if(!empty($favourites)){
        $response[0] = true;
        $response[1] = $favourites;
      }

    } else {
      $response[0] = false;
      $errors[]="Error fetching users. Try again";
      $response[1] = $errors;
    }
    return $response;
  }

  public function delete(){

  }

  public function findById(){

  }

}

?>
