function isEmailValid(emailId){
    let regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(emailId.match(regex))
        return true
    return false
}

function isPhoneNoValid(phoneNo){
    if(phoneNo.length == 10)
        return true
    return false
}

function isNameAndAddressValid(data){
    if(data != '' )
        return true
    return false
}

function isPasswordValid(password,cpassword){
    if(password.lenght!=0 && password == cpassword)
        return true
    return false
}

function isAboveAge(dob){
    dob = dob.split("-")
    dob = new Date(Number(dob[2]),Number(dob[1]),Number(dob[0]))
    var ageDifMs = Date.now() - dob.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970) > 18;
}

function convertToBinary(inputElement) {
    var binaryBlob = null
    var file = inputElement.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        var data=(reader.result).split(',')[1];
        binaryBlob = atob(data);
    }
    reader.readAsDataURL(file);
    return binaryBlob
}

function onLoginSubmit(){
    bankEmailID = document.getElementById('bemail')
    bankPassword = document.getElementById('bpassword')
    if(isEmailValid(bankEmailID.value) && bankPassword != '')
        console.log("Ready to login")
    else
        console.log("not ready")
}

function onRegisterSubmit(){
    bankName = document.getElementById('bname')
    bankEmailID = document.getElementById('bemail')
    bankPhoneNo = document.getElementById('bphone')
    bankAddress= document.getElementById('baddress')
    bankStartDate = document.getElementById('bstartDate')
    bankPassword = document.getElementById('bpassword')
    bankCheckPassword = document.getElementById('bcheckPassword')
    
    if(isEmailValid(bankEmailID.value) 
    && isPhoneNoValid(bankPhoneNo.value) 
    && isNameAndAddressValid(bankName.value,bankAddress.value) 
    && isPasswordValid(bankPassword.value,bankCheckPassword.value)){
        console.log("Ready to request to register")
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/register.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        request.send(JSON.stringify({
            "name" : bankName,
            "emailId" : bankEmailID,
            "phoneNo" : bankPhoneNo,
            "address" : bankAddress,
            "startDate" : bankStartDate,
            "password" : bankPassword
        }))
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText)
            }
          };
    }
    else
        console.log("Not ready")
}