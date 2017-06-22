<?php
/*id, title,description, specifications,uploadDate, price,operation,userId,valorationId,
categoryId,cityId*/
class Announce{
	private $id;
	private $title;
	private $description;
  private $specifications;
  private $uploadDate;
	private $price;
  private $operation;
	private $direction;
  private $userId;
  private $valorationId;
  private $categoryId;

        function __construct($id="", $title="", $description="", $uploadDate="", $price="", $operation="",$direction="", $userId="",
				$valorationId="", $categoryId="") {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->uploadDate = $uploadDate;
            $this->price = $price;
            $this->operation = $operation;
						$this->direction = $direction;
            $this->userId = $userId;
            $this->valorationId = $valorationId;
            $this->categoryId = $categoryId;
        }
        //getters
        function getId() {
            return $this->id;
        }

        function getTitle() {
            return $this->title;
        }

        function getDescription() {
            return $this->description;
        }

        function getUploadDate() {
            return $this->uploadDate;
        }

        function getPrice() {
            return $this->price;
        }

        function getOperation() {
            return $this->operation;
        }
				function getDirection() {
						return $this->direction;
				}
        function getUserId() {
            return $this->userId;
        }

        function getValorationId() {
            return $this->valorationId;
        }

        function getCategoryId() {
            return $this->categoryId;
        }

        function getPostalCode() {
            return $this->direction;
        }
        //setters
        function setId($id) {
            $this->id = $id;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setDescription($description) {
            $this->description = $description;
        }

        function setSpecifications($specifications) {
            $this->specifications = $specifications;
        }

        function setUploadDate($uploadDate) {
            $this->uploadDate = $uploadDate;
        }

        function setPrice($price) {
            $this->price = $price;
        }

        function setOperation($operation) {
            $this->operation = $operation;
        }
				function setDirection($direction) {
						$this->direction = $direction;
				}

        function setUserId($userId) {
            $this->userId = $userId;
        }

        function setValorationId($valorationId) {
            $this->valorationId = $valorationId;
        }

        function setCategoryId($categoryId) {
            $this->categoryId = $categoryId;
        }

        function setPostalCode($direction) {
            $this->direction = $direction;
        }
// construct($id, $title, $description, $specifications, $uploadDate, $price, $operation, $userId, $valorationId, $categoryId, $direction) {
				function getAll(){
					$data = array();
					$data["id"] = $this->id;
					$data["title"] = $this->title;
					$data["description"] = $this->description;
					$data["specifications"] = $this->specifications;
					$data["uploadDate"] = $this->uploadDate;
					$data["price"] = $this->price;
					$data["operation"] = $this->operation;
					$data["userId"] = $this->userId;
					$data["valorationId"] = $this->valorationId;
					$data["categoryId"] = $this->categoryId;
					// $data["direction"] = $this->direction
					return $data;
			}
}


?>
