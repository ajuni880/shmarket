function Photo() {
    this.photoId;
    this.name;
    this.url;
    this.announceId;

    this.construct = function(photoId, name, url, announceId) {
        this.photoId = photoId;
        this.name = name;
        this.url = url;
        this.announceId = announceId;
    }
    
    this.getPhotoId = function() {
        return photoId;
    }
    this.getName = function() {
        return name;
    }
    this.getUrl = function() {
        return url;
    }
    this.getAnnounceId = function() {
        return announceId;
    }


    this.setPhotoId = function() {
        this.photoId = photoId;
    }
    this.setName = function() {
        this.name = name;
    }
    this.setUrl = function() {
        this.url = url;
    }
    this.setAnnounceId = function() {
        this.announceId = announceId;
    }



}
