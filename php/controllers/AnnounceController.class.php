<?php

require_once '../model/persist/EntityInterface.class.php';
require_once '../model/Announce.class.php';
require_once '../model/Category.class.php';
require_once '../model/Search.class.php';
require_once '../model/persist/AnnounceDAO.class.php';


class AnnounceController implements EntityInterfaceController{

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
                $response = $this->listAll();
                break;
        case 110:
                $response = $this->findPhotos();
                break;
        case 130:
                $response = $this->findById();
                break;
        case 140:
                $response = $this->findByCategoryId();
                break;
        case 150:
                $response = $this->add();
                break;
        case 160:
                $response = $this->insertAnnouncePhotos();
                break;
        case 170:
                $response = $this->findMyAnnounces();
                break;
        case 180:
                $response = $this->searchAnnounces();
                break;
        case 190:
                $response = $this->delete();
                break;
        case 200:
                $response = $this->update();
                break;
        case 210:
                $response = $this->addToFavourites();
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


  function listAll(){

    $response = array();
    $helper = new AnnounceDAO();
    $announces = $helper->findAll();
    $categories = $helper->findAllCategories();
    $cities = $helper->findAllCities();

    if(!empty($announces) && !empty($categories) && !empty($cities)){

      $response[] = true;
      $response[] = $announces;
      $response[] = $categories;
      $response[] = $cities;

    } else {
      $response[0] = false;
      $errors[]="Error fetching announces.";
      $response[1] = $errors;
    }
    // var_dump($response);
    return $response;
  }

  function findPhotos(){
    $data = json_decode($this->getData());
    $response = array();
    $helper = new AnnounceDAO();
    $photos = $helper->findPhotos($data);
    // var_dump(is_array($photos));
    if(!empty($photos)){

      $response[] = true;
      $response[] = $photos;

    } else {
      $response[0] = false;
      $errors[]="Error fetching photos.";
      $response[1] = $errors;
    }
    // var_dump(is_array($response));
    return $response;
  }

  function findById(){

    $data = json_decode($this->getData());

    $announce = new Announce();
    $announce->setId($data);

    $response = array();
    $helper = new AnnounceDAO();
    $announces = $helper->findById($announce);

    if(!empty($announces)){
      $response[] = true;
      $response[] = $announces;

    } else {
      $response[0] = false;
      $errors[]="Error finding announces.";
      $response[1] = $errors;
    }

    return $response;
  }

  function findByCategoryId(){

    $data = json_decode($this->getData());

    $cat = new Category();
    $cat->setId($data->categoryId);

    $helper = new AnnounceDAO();
    $categories = $helper->findByCategoryId($cat);

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

  function add(){

    $data = json_decode(stripslashes(trim($this->getData())));
    // $id="", $title="", $description="",  $uploadDate="", $price="", $operation="",$direction="", $userId="",
    // $valorationId="", $categoryId="") {
    $uploadDate = date('Y-m-d h:i:s',time());
    $announce = new Announce("",$data->title,$data->description,$uploadDate,$data->price,
    $data->operation,$data->direction,$data->userId,"",$data->categoryId);

    //var_dump($data);

    $helper = new AnnounceDAO();
    $isInserted = $helper->add($announce);

    if(!empty($isInserted)){

      $response[0] = true;
      $response[1] = $helper->lastInsertId();

    } else {
      $response[0] = false;
      $errors[]="Error inserting announce.";
      $response[1] = $errors;
    }
    return $response;
  }

  function insertAnnouncePhotos(){

    $data = json_decode(stripslashes(trim($this->getData())));

    $helper = new AnnounceDAO();
    $response = [];

    $i=0;
      foreach($_FILES['images']['error'] as $key => $error){
        if($error == UPLOAD_ERR_OK){
          $name = $_FILES['images']['name'][$key];
          $fileNameParts = explode(".", $name);
          $nameWithoutExtension = $fileNameParts[0];
          $extension = end($fileNameParts);
          $newFileName = "foto_".$i.time().".".$extension;
          move_uploaded_file($_FILES['images']['tmp_name'][$key], '../../images/announces/' . $newFileName);
          $insertedId = $helper->addPhotos($newFileName,$data->announceId);
          if($insertedId){
              $newFileNames[]='images/announces/'.$newFileName;
          } else{
            $response[]=false;
            $response[]=$name;
            $errors[]="Error fetching categories.";
            $response[1] = $errors;
            break;
          }
          $i++;
        }
      }
      $response[] = true;
      $response[]=$newFileNames;
      return $response;
  }

  function findMyAnnounces(){
    $data = json_decode(stripslashes($this->getData()));
    $response = [];

    $helper = new AnnounceDAO();
    $announces = $helper->findMyAnnounces($data);

    if(!empty($announces)){
      $response[] = true;
      $response[] = $announces;
    } else{
      $response[]=false;
      $errors[]="Error fetching announces.";
      $response[]=$errors;
    }

    return $response;
  }

  function searchAnnounces(){
    $data = json_decode(stripslashes($this->getData()));
    $response = [];
    $searchObj = new Search($data->wordToSearch,$data->categoryId,$data->city,$data->minPrice,$data->maxPrice);

    $helper = new AnnounceDAO();
    $announces = $helper->searchAnnounces($searchObj);

    if(!empty($announces)){
      $response[] = true;
      $response[] = $announces;
    } else{
      $response[]=false;
      $errors[]="Error fetching announces.";
      $response[]=$errors;
    }

    return $response;
  }

  function delete(){
    $data = json_decode(stripslashes($this->getData()));

    $response = [];
    $announce = new Announce($data);

    $helper = new AnnounceDAO();
    $this->deletePhotos($announce);
    $isRemoved = $helper->delete($announce);

    if(!empty($isRemoved)){
      $response[] = true;
    } else{
      $response[]=false;
      $errors[]="Error removing announces.";
      $response[]=$errors;
    }

    return $response;
  }

  public function deletePhotos($announce){

    $helper = new AnnounceDAO();
    $photosToRemove = $helper->findPhotos($announce->getId());

    if(!empty($photosToRemove)){
      foreach ($photosToRemove as $key => $photo) {
        unlink("../../images/announces/".$photo['url']);
      }
    }
  }

  public function update(){

    $data = json_decode(stripslashes($this->getData()));
    $response = [];
    $announce = new Announce($data->announceId,$data->title,$data->description,"",$data->price,
    $data->operation,$data->direction,"","",$data->categoryId);

    $helper = new AnnounceDAO();
    $isUpdated = $helper->update($announce);

    if($isUpdated > 0){
      $response[]=true;
    }else{
      $response[]=false;
      $errors[]="Error removing announces.";
      $response[]=$errors;
    }

    return $response;
  }

  public function addToFavourites(){
  $data = json_decode(stripslashes($this->getData()));

  $response = [];
  $announce = new Announce($data);
  $userId = $_SESSION['userConnected']['userId'];
  $helper = new AnnounceDAO();
  $isAdded = $helper->addToFavourites($userId);

  if(!empty($isAdded)){
    // $response[] = true;
    $favId = $helper->lastInsertId();
    $isAdded2 = $helper->addToFavouritesHasAnnounces($favId,$announce);
    if(!empty($isAdded2)){
      $response[] = true;
    }
  } else{
    $response[]=false;
    $errors[]="Error removing announces.";
    $response[]=$errors;
  }

  return $response;
}

}

?>
