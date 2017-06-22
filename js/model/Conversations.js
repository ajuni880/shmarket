function Conversations() {
    this.conversationId;
    this.message;
    this.time;
    this.fromUser;
    this.toUser;

    this.construct = function(conversationId, message, time,fromUser,toUser) {
      this.conversationId = conversationId;
      this.message = message;
      this.time = time;
      this.fromUser = fromUser;
      this.toUser = toUser;
    }

    this.getConversationId = function() {
        return conversationId;
    }
    this.getMessage = function() {
        return message;
    }
    this.getTime = function() {
        return time;
    }
    this.getFromUser = function() {
        return fromUser;
    }
    this.getToUser = function() {
        return toUser;
    }


}
