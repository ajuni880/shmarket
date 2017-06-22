function Category() {
    this.categoryId;
    this.name;

    this.construct = function(categoryId, name){
      this.categoryId = categoryId;
      this.name = name;
    }

    this.getCategoryId = function() {
        return this.categoryId;
    }
    this.getName = function() {
        return name;
    }


    this.setCategoryId = function(categoryId) {
        this.categoryId = categoryId;
    }
    this.setName = function(name) {
        this.name = name;
    }
}
