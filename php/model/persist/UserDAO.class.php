<?php
require_once "EntityInterfaceDAO.class.php";
require_once "../model/User.class.php";
require_once "DBConnect.class.php";

class UserDAO implements EntityInterfaceDAO{

    private $dbConnect;

    public function __construct() {
        $this->dbConnect = DBConnect::getInstance();
    }
    /*add a user into database*/
    public function add($user) {
        $timeDate = date('Y-m-d h:i:s',time());
        $query = "insert into USERS VALUES (null,?, ?, ? ,?, ?,?,?)";
        $vector = array($user->getFullName(), $user->getEmail(),
                    md5($user->getPassword()), $user->getTelephone(),"user",$timeDate,"");
        $flag = $this->dbConnect->execution($query,$vector);
        //return to the controller true si OK , false si KO

        return $flag->rowCount();
    }

    /*The user logins*/
    public function findUser($user) {
        $query = "select userId,fullName,email,telephone,role,registryDate,photo from USERS where email = ? && password = ?";
        $vector = array($user->getEmail(),md5($user->getPassword()));
        $flag = $this->dbConnect->execution($query,$vector);

        return $flag->fetchAll();
    }

    public function emailExists($user){
      $query = "select email from USERS where email = ?";
      $vector = array($user->getEmail());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }

    public function findAll(){
        $query = "select * from USERS";
        $vector=array();
        $rows = $this->dbConnect->execution($query,$vector);

        return $rows->fetchAll();
    }


    /*Deletes a user*/
    public function delete($user){
      $query = "delete from USERS where userId = ?";
      $vector = array($user->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }
    /*Updates a user*/

    public function update($user){
      $query = "update USERS set fullName = ?, email = ?, telephone = ? where userId = ?";
      $vector = array($user->getFullName(), $user->getEmail(), $user->getTelephone(),
      $user->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->rowCount();
    }

    public function changePassword($user){
      $query = "update USERS set password = ? where userId = ?";
      $vector = array(md5($user->getPassword()),$user->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->rowCount();
    }
    /*List the users by Id*/
    public function findById($user){
      $query = "select * from USERS where userId = ?";
      $vector = array($user->getId());
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }


    /*Lists all users*/
    public function getUserAnnouncesData($user){
        $query = "select * from ANNOUNCES_DETAILS where userId = ?";
        $vector = array($user->getId());
        $rows = $this->dbConnect->execution($query,$vector);
        return $rows->fetchAll();
    }


    public function getMyFavouritesId($user){
      $query = "SELECT a.announceId FROM FAVOURITES_has_ANNOUNCEMENTS fa inner join  ANNOUNCEMENTS a on a.announceId = fa.announceId
      inner join  FAVOURITES f on f.favId = fa.FAVOURITES_favId inner join  USERS u on f.userId = u.userId and u.userId = ?";
      $vector = array($user->getId());
      $flag = $this->dbConnect->execution($query,$vector);
      return $flag->fetchAll();
    }

    public function getMyFavouritesAnnounces($in){

      $query = "select a.announceId,a.title,a.description,a.uploadDate,
          a.price,a.operation,a.userId,a.direction,a.valorationId,
           a.categoryId,u.fullname,c.name as catName,p.url as photoUrl from ANNOUNCEMENTS a, USERS u ,
          CATEGORIES c, PHOTOS p
          where
          a.userId = u.userId and
          a.categoryId = c.categoryId and
          a.announceId = p.announceId
           and a.announceId $in
          GROUP BY a.announceId";
      $vector = array();
      $flag = $this->dbConnect->execution($query,$vector);
      return $flag->fetchAll();
    }

    public function getWebStatistics(){
      $query = "CALL getWebStatistics()";
      $vector = array();
      $flag = $this->dbConnect->execution($query,$vector);

      return $flag->fetchAll();
    }

}
?>
