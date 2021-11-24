function onLoad(){
    getContents()
}

function getInventoryStatus(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_bank_staff.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText)
        }
    }
}

function getContents(){
    getInventoryStatus()
    getRequestStatus()
    getServiceableRequest()
}

