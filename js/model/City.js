function City() {
    this.cityId;
    this.name;
    this.provinceId;

    this.construct = function(cityId, name, provinceId) {
        this.cityId = cityId;
        this.name = name;
        this.provinceId = provinceId;
    }
    this.getCityId = function() {
        return cityId;
    }
    this.getName = function() {
        return name;
    }
    this.getProvinceId = function() {
        return provinceId;
    }

    this.setCityId = function() {
        this.cityId = cityId;
    }
    this.setName = function() {
        this.name = name;
    }
    this.setProvinceId = function() {
        this.provinceId = provinceId;
    }
}
