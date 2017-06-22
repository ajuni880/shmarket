/*
 |------------------------------------
 | Announce class
 |------------------------------------
 */

function Announce() {
    this.announceId;
    this.title;
    this.description;
    this.uploadDate;
    this.price;
    this.operation;
    this.userId;
    this.valId;
    this.categoryId;
    this.direction;
    this.userName;
    this.catName;
    this.mainPhoto;

    this.construct = function(announceId,title,description,uploadDate,price,
      operation,userId,valId,categoryId,direction,userName,catName,mainPhoto){
      this.announceId = announceId;
      this.title = title;
      this.description = description;
      this.uploadDate = uploadDate;
      this.price = price;
      this.operation = operation;
      this.userId = userId;
      this.valId = valId;
      this.categoryId = categoryId;
      this.direction = direction;
      this.userName = userName;
      this.catName = catName;
      this.mainPhoto = mainPhoto;
    }

    this.getAnnounceId = function() {
        return this.announceid;
    }
    this.getTitle = function() {
        return this.title;;
    }
    this.getDescription = function() {
        return this.description;
    }

    this.getUploadDate = function() {
        return this.uploadDate;
    }
    this.getPrice = function() {
        return this.price;
    }
    this.getOperation = function() {
        return this.operation;
    }
    this.getUserId = function() {
        return this.userId;
    }
    this.getValId = function() {
        return this.valId;
    }
    this.getCategoryId = function() {
        return this.categoryId;
    }
    this.getDirection = function() {
        return this.direction;
    }
    this.getUserName = function() {
        return this.userName;
    }

    this.setAnnounceId = function(announceid) {
        this.announceid = announceid;
    }
    this.setTitle = function(title) {
        this.title = title;
    }
    this.setDescription = function(desc) {
        this.description = description;
    }
    this.setUploadDate = function(uploadDate) {
        this.uploadDate = uploadDate;
    }
    this.setPrice = function(price) {
        this.price = price;
    }
    this.setOperation = function(operation) {
        this.operation = operation;
    }
    this.setUserId = function(userId) {
        this.userId = userId;
    }
    this.setValId = function(valId) {
        this.valId = valId;
    }
    this.setCategoryId = function(categoryId) {
        this.categoryId = categoryId;
    }

    this.setDirection = function(c) {
        this.direction = c;
    }

    this.setUserName = function(userName) {
        this.userName = userName;
    }

    this.setCatName = function(catName) {
        this.catName = catName;
    }

}
