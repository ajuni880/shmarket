function User(){
  this.userId;
  this.fullName;
  this.email;
  this.password;
  this.telephone;
  this.role;
  this.registryDate;
  this.userPhoto;

  this.construct = function(userId,fullName,email,password,telephone,role,registryDate,userPhoto){
    this.userId = userId;
    this.fullName = fullName;
    this.email = email;
    this.password = password;
    this.telephone = telephone;
    this.role = role;
    this.registryDate = registryDate;
    this.userPhoto = userPhoto;
  }

  this.getUserId = function(){
    return this.userId;
  }

  this.getFullName = function(){
    return this.fullName;
  }

  this.getEmail = function(){
    return this.fullName;
  }

  this.getPassword = function(){
    return this.password;
  }

  this.getTelephone = function(){
    return this.telephone;
  }

  this.getRole = function(){
    return this.role;
  }

  this.getRegistryDate = function(){
    return this.registryDate;
  }

  this.setUserId = function(userId){
     this.userId=userId;
  }

  this.setFullName = function(fullName){
     this.fullName=fullName;
  }
  this.setTelephone = function(tel){
     this.telephone=tel;
  }

  this.setUserPhoto = function(userPhoto){
     this.userPhoto=userPhoto;
  }
}
