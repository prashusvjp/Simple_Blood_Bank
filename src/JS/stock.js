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
                    blood_group = this.responseText
                    bloodGroup.value=blood_group
                }
            };
        return true
    }
}

function clearUI(){
    stockDonerId_error.innerText=''
    arrivalDate_error.innerText=''
    bloodGroup_error.innerText=''
}

function onStockSubmit(){
    if(getBloodGroup()){
        let request = new XMLHttpRequest();
            request.open("POST",'./backend/get_bg.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(JSON.stringify({"id":stockDonerId.value}))
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    blood_group = this.responseText
                    bloodGroup.value=blood_group
                }
            };
    }
}