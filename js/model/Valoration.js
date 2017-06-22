function Valoration() {
    this.valorationId;
    this.message;
    this.userId;

    this.construct = function(valorationId, message, userId) {
        this.valorationId = valorationId;
        this.message = message;
        this.userId = userId;
    }
    this.getValorationId = function() {
        return valorationId;
    }
    this.getMessage = function() {
        return message;
    }
    this.getUserId = function() {
        return userId;
    }

    this.setValorationId = function() {
        this.valorationId = valorationId;
    }
    this.setMessage = function() {
        this.message = message;
    }
    this.setUserId = function() {
        this.userId = userId;
    }

}
