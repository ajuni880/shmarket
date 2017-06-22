<?php

require_once "EntityInterfaceDAO.class.php";
require_once "DBConnect.class.php";
require_once "../model/Announce.class.php";

class AnnounceDAO implements EntityInterfaceDAO{

    private $dbConnect;

    public function __construct() {
        $this->dbConnect = DBConnect::getInstance();
    }
    public function lastInsertId(){
      return $this->dbConnect->lastInsertId();
    }
    /*Add a product into the database*/
    /*id, title,description,uploadDate, price,operation,direction,userId,valorationId,
    categoryId*/
    public function add($announce) {
        $query = "insert into ANNOUNCEMENTS VALUES (null,?, ?, ? ,? ,? ,? ,? ,? ,?)";
        $vector = array($announce->getTitle(), $announce->getDescription(),$announce->getUploadDate(),
        $announce->getPrice(),$announce->getOperation(),$announce->getDirection(),
        $announce->getUserId(),null,$announce->getCategoryId());
        $rows = $this->dbConnect->execution($query,$vector);

        return $rows->rowCount();
    }

    public function addPhotos($photoName,$announceId) {
        $query = "insert into PHOTOS VALUES (null,? ,?)";
        $vector = array($photoName, $announceId);
        $rows = $this->dbConnect->execution($query,$vector);

        return $rows->rowCount();
    }


    /*List all the announcements */
    public function findAll(){
        $query = "select a.announceId,a.title,a.description,a.uploadDate,
        a.price,a.operation,a.userId,a.direction,a.valorationId,
         a.categoryId,u.fullname,c.name as catName,p.url as photoUrl from ANNOUNCEMENTS a, USERS u ,
        CATEGORIES c, PHOTOS p
        where
        a.userId = u.userId and
        a.categoryId = c.categoryId and
        a.announceId = p.announceId
        GROUP BY a.announceId";
        $vector = array();
        $rows = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO
        return $rows->fetchAll();
    }

    public function findMyAnnounces($userId){

        $query = "select a.announceId,a.title,a.description,a.uploadDate, a.price,a.operation,a.userId,a.direction,
        a.valorationId, a.categoryId,u.fullname,c.name as catName,p.url as photoUrl
        from ANNOUNCEMENTS a, USERS u , CATEGORIES c, PHOTOS p
        where a.userId = u.userId and
        a.categoryId = c.categoryId and
        a.announceId = p.announceId and a.userId = ?
        GROUP BY a.announceId, a.userId";

        $vector = array($userId);
        $rows = $this->dbConnect->execution($query,$vector);

        return $rows->fetchAll();
    }

    public function findAllCategories(){
        $query = "select * from CATEGORIES";
        $vector = array();
        $rows = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO
        return $rows->fetchAll();
    }

    public function findAllCities(){
        $query = "select * from CITIES";
        $vector = array();
        $rows = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO
        return $rows->fetchAll();
    }

    public function findPhotos($id){
        $query = "select * from PHOTOS where announceId = ?";
        $vector = array($id);
        $rows = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO
        return $rows->fetchAll();
    }

    /*The user can delete his announcement*/
    public function delete($announce){
      $query = "delete from PHOTOS where announceId = ?;delete from ANNOUNCEMENTS where announceId = ?";
      $vector = array($announce->getId(),$announce->getId());
      $rows = $this->dbConnect->execution($query,$vector);

      return $rows->rowCount();
    }
    /*The user can update his announcement*/
    public function update($announce){

      $query = "update ANNOUNCEMENTS set title = ?, description = ?,  price = ?,
      operation = ?, direction = ?, categoryId = ? where announceId = ?";
      $vector = array($announce->getTitle(),$announce->getDescription(),
      $announce->getPrice(),$announce->getOperation(),$announce->getDirection(),$announce->getCategoryId(),$announce->getId());
      $rows = $this->dbConnect->execution($query,$vector);

      return $rows->rowCount();
    }
    /*Find the the announcement by id*/
    public function findById($announce){
      $query = "select a.announceId,a.title,a.description,a.uploadDate,
      a.price,a.operation,a.userId,a.direction,a.valorationId,
       a.categoryId,u.fullname,u.telephone, u.photo, c.name as catName from ANNOUNCEMENTS a, USERS u ,
      CATEGORIES c where a.userId = u.userId and a.categoryId = c.categoryId and a.announceId = ?";
      $vector = array($announce->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }
    /*Find the the announcement by category*/
    public function findByCategoryId($cat){
      $query = "select a.announceId,a.title,a.description,a.uploadDate,
      a.price,a.operation,a.userId,a.direction,a.valorationId,
       a.categoryId,u.fullname,c.name as catName,p.url as photoUrl from ANNOUNCEMENTS a, USERS u ,
      CATEGORIES c, PHOTOS p where a.userId = u.userId and a.categoryId = c.categoryId and a.announceId = p.announceId
      and a.categoryId = ? GROUP BY a.announceId";
      $vector = array($cat->getCategoryId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }

    public function addToFavourites($userId){
      $query = "insert into FAVOURITES VALUES (null,?)";

      $vector = array($userId);
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->rowCount();
    }
    
    public function addToFavouritesHasAnnounces($favId,$announce){
      $query = "insert into 	FAVOURITES_has_ANNOUNCEMENTS VALUES (?,?)";

      $vector = array($favId,$announce->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->rowCount();
    }
    public function searchAnnounces($search){

        $where = "where a.userId = u.userId and a.categoryId = c.categoryId and a.announceId = p.announceId
        and a.title like ? and lower(a.direction) like ?";

        $vector = array(
          '%'.$search->getWordToSearch().'%',
          '%'.$search->getCity().'%'
        );

        // CATEGORY
        if(!!$search->getCategoryId()){

          $vector[] = $search->getCategoryId();
          $where .= " and a.categoryId = ?";

        } else{
          // $vector[] = $search->getCategoryId();
          $where .= " and a.categoryId > 0";
        }

        // PRICES
        if(!!$search->getMinPrice() && !!$search->getMaxPrice()){

          $vector[] = $search->getMinPrice();
          $vector[] = $search->getMaxPrice();
          $where .= " and a.price between ? and ?";

        }

        if(!!$search->getMinPrice()){
          $vector[] = $search->getMinPrice();
          $where .= " and a.price >=  ?";
        }

        if(!!$search->getMaxPrice()){
          $vector[] = $search->getMaxPrice();
          $where .= " and a.price <=  ?";
        }

        $query = "select a.announceId,a.title,a.description,a.uploadDate,
        a.price,a.operation,a.userId,a.direction,a.valorationId,
         a.categoryId,u.fullname,c.name as catName,p.url as photoUrl from ANNOUNCEMENTS a, USERS u ,
        CATEGORIES c, PHOTOS p " . $where . " GROUP BY a.announceId";

        $rows = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO
        return $rows->fetchAll();
    }
}

?>
