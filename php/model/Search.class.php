<?php

class Search{
    private $wordToSearch;
    private $categoryId;
    private $city;
    private $minPrice;
    private $maxPrice;
    private $operation;

    function __construct($wordToSearch="", $categoryId="", $city="",$minPrice="",$maxPrice="",$operation="") {
        $this->wordToSearch = $wordToSearch;
        $this->categoryId = $categoryId;
        $this->city = $city;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->operation = $operation;
    }

    function getWordToSearch() {
        return $this->wordToSearch;
    }

    function getCategoryId() {
        return $this->categoryId;
    }

    function getCity() {
        return $this->city;
    }

    function getMinPrice() {
        return $this->minPrice;
    }

    function getMaxPrice() {
        return $this->maxPrice;
    }

    function getOperation() {
        return $this->operation;
    }

    function setWordToSearch($wordToSearch) {
        $this->wordToSearch = $wordToSearch;
    }

    function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setMinPrice($minPrice){
      $this->minPrice = $minPrice;
    }

    function setMaxPrice($maxPrice){
      $this->maxPrice = $maxPrice;
    }

    function setOperation($operation){
      $this->operation = $operation;
    }

}

?>
