function Report() {

    this.reportId;
    this.complain;
    this.sendDate;
    this.userId;
    this.announceId;

    this.construct = function(reportId, complain, sendDate, userId, announceId) {
        this.reportId = reportId;
        this.complain = complain;
        this.sendDate = sendDate;
        this.userId = userId;
        this.announceId = announceId;
    }
    this.getReportId = function() {
        return reportId;
    }
    this.getComplain = function() {
        return complain;
    }
    this.getSendDate = function() {
        return sendDate;
    }
    this.getUserId = function() {
        return userId;
    }
    this.getAnnounceId = function() {
        return announceId;
    }

    this.setReportId = function() {
        this.reportId = reportId;
    }
    this.setComplain = function() {
        this.complain = complain;
    }
    this.setSendDate = function() {
        this.sendDate = sendDate;
    }
    this.setUserId = function() {
        this.userId = userId;
    }
    this.setAnnounceId = function() {
        this.announceId = announceId;
    }

}
