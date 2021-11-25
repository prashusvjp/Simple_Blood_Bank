var stockDonerId,arrivalDate,bloodGroup,bloodCategory,stockStatus,stockDonerId_error,arrivalDate_error,bloodGroup_error
var blood_group='A+'

function onLoad(){
    stockDonerId=document.getElementById('doner_id')
    arrivalDate=document.getElementById('arrival_date')
    bloodGroup=document.getElementById('dblood-group')
    bloodCategory=document.getElementById('dblood-category')
    stockStatus=document.getElementById('dblood-status')
    stockDonerId_error=document.getElementById('did-error')
    arrivalDate_error=document.getElementById('adate-error')
    bloodGroup_error=document.getElementById('bgroup-error')
    arrivalDate.valueAsDate = new Date();
}

function getBloodGroup(){
    if(stockDonerId == ''){
        stockDonerId_error.innerText = 'Please enter a valid Doner ID'
        return false
    } else{
        let request = new XMLHttpRequest();
            request.open("POST",'./backend/get_bg.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(JSON.stringify({"id":stockDonerId.value}))
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 0){
                        stockDonerId_error.innerText = "Enter valid Doner ID"
                        document.getElementById('dname').value = "Enter valid Doner ID"
                        bloodGroup.value = "Enter valid Doner ID"
                    }else{
                        data = JSON.parse(this.responseText)
                        document.getElementById('dname').value = data.name
                        blood_group = data.bg
                        bloodGroup.value = blood_group
                    }   
                }
            };
        if(bloodGroup.value == "Enter valid Doner ID")
            return false
        return true
    }
}

function clearUI(){
    stockDonerId_error.innerText=''
    arrivalDate_error.innerText=''
    bloodGroup_error.innerText=''
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}

function onStockSubmit(){
    if(getBloodGroup()){
        json_data = JSON.stringify({
            "donerId":stockDonerId.value,
            "bankId": getBankIdFromCookie(),
            "date":arrivalDate.value,
            "bgroup":blood_group,
            "category":bloodCategory.value,
            "status":stockStatus.value
        })
        console.log(json_data)
        let request = new XMLHttpRequest();
            request.open("POST",'./backend/add_stock.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(json_data)
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Stock added to the database")
                }
            };
    }
}