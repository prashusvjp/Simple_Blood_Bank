function isEmailValid(emailId){
    let regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(emailId.test(regex))
        return true
    return false
}

function isNameAndAddressValid(name, address){
    if(name != '' && address != '')
        return true
    return false
}

function isPasswordValid(password,cpassword){
    if(password == cpassword)
        return true
    return false
}

function onSubmit(){
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
    }else
        console.log("Not ready")
}