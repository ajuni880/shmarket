function Search() {
    this.wordToSearch;
    this.categoryId;
    this.city;
    this.minPrice;
    this.maxPrice;
    this.operation;

    this.construct = function(wordToSearch, category,city,minPrice,maxPrice,operation){
      this.wordToSearch = wordToSearch;
      this.categoryId = category;
      this.city = city;
      this.minPrice = minPrice;
      this.maxPrice = maxPrice;
      this.operation = operation;
    }

    this.getWordToSearch = function() {
        return wordToSearch;
    }
    this.getCategoryId = function() {
        return category;
    }

    this.getCity =  function(){
      return city;
    }

    this.getMinPrice =  function(){
      return minPrice;
    }

    this.getMaxPrice =  function(){
      return maxPrice;
    }

    this.getOperation =  function(){
      return operation;
    }

    this.setWordToSearch = function(wordToSearch) {
        this.wordToSearch = wordToSearch;
    }

    this.setCategoryId = function(category) {
        this.categoryId = category;
    }
    this.setCity = function(city) {
        this.city = city;
    }

    this.setMinPrice = function(minPrice) {
        this.minPrice = minPrice;
    }

    this.setMaxPrice = function(maxPrice) {
        this.maxPrice = maxPrice;
    }

    this.setOperation = function(operation) {
        this.operation = operation;
    }

}
