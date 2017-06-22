function Province() {
  this.provinceId;
  this.name;
  this.construct = function(provinceId,name,){
  this.provinceId = provinceId;
  this.name = name;
  }

  this.getProvinceId = function(){return provinceId;}
  this.getName = function(){return name;}


  this.setProvinceId = function(){this.provinceId=provinceId;}
  this.setName = function(){this.name=name;}

}
