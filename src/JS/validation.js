function isEmailValid(element,error_element){
    let regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if((element.value).match(regex))
        return true
    element.focus()
    error_element.innerText="Invalid Email ID"
    return false
}

function isPhoneNoValid(element,error_element){
    if((element.value).length == 10)
        return true
    element.focus()
    error_element.innerText="Invalid Phone number"
    return false
}

function isNameValid(element,error_element){
    if(element.value != '' )
        return true
    element.focus()
    error_element.innerText="Name field is required"
    return false
}

function isAddressValid(element,error_element){
    if(element.value != '')
        return true
    element.focus()
    error_element.innerText="Address field is required"
    return false
}

function isPasswordValid(password,cpassword,error_element){
    //let regex = /^(?:([A-Z])+([a-z])+(\d)+(\W)+){8,12}$/
    let value = password.value 
    if(value.length>=8)
        if(password.value == cpassword.value)
            return true
        else
            error_element.innerText="Passwords do not match"
    else
            //error_element.innerText="Password should consist of atleast 8 characters\n*Minimum 1 uppercase letter\n*Minimum 1 lowercase letter\n*Minimum 1 special character"
            error_element.innerText="Password should consist of atleast 8 characters"
    password.focus()
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

function clearLoginUI(){
    document.getElementById('loginEmail').value = ''
    document.getElementById('loginPassword').value = ''
    document.getElementById("password-error").innerText=""
}

function onLoginSubmit(){
    document.getElementById("password-error").innerText=""
    bankEmailID = document.getElementById('loginEmail')
    bankPassword = document.getElementById('loginPassword')
    if(isEmailValid(bankEmailID.value) && bankPassword != ''){
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/bank_login.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        request.send(JSON.stringify({
            "emailId" : bankEmailID.value,
            "password" : bankPassword.value
        }))
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            res = Number(this.responseText)
            console.log(res,this.responseText)
            if(res == 0)
                document.getElementById("password-error").innerText="Incorrect username/password"
            else
                console.log("Logged In")
            }
        };
    }
}

function clearErrorMessages(){
    document.getElementById('bemail-error').innerText = ""
    document.getElementById('bphone-error').innerText = ""
    document.getElementById('bname-error').innerText = ""
    document.getElementById('baddress-error').innerText = ""
    document.getElementById('brepassword-error').innerText = ""

}

function onRegisterSubmit(){
    clearErrorMessages()
    bankName = document.getElementById('bname')
    bankEmailID = document.getElementById('bemail')
    bankPhoneNo = document.getElementById('bphone')
    bankAddress= document.getElementById('baddress')
    bankStartDate = document.getElementById('bstartDate')
    bankPassword = document.getElementById('bpassword')
    bankCheckPassword = document.getElementById('bcheckPassword')
    
    if(isEmailValid(bankEmailID,document.getElementById('bemail-error')) 
    && isPhoneNoValid(bankPhoneNo,document.getElementById('bphone-error')) 
    && isNameValid(bankName,document.getElementById('bname-error')) 
    && isAddressValid(bankAddress,document.getElementById('baddress-error'))
    && isPasswordValid(bankPassword,bankCheckPassword,document.getElementById('brepassword-error'))){
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/register.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        request.send(JSON.stringify({
            "name" : bankName.value,
            "emailId" : bankEmailID.value,
            "phoneNo" : bankPhoneNo.value,
            "address" : bankAddress.value,
            "startDate" : bankStartDate.value,
            "password" : bankPassword.value
        }))
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            res = Number(this.responseText)
            console.log(res,this.responseText)
              if(res > 0)
                console.log("User created succesfully")
              else{ 
                if(res < 0)
                    console.log("User already exists")
                else
                    console.log("Sorry, something went wrong please try again later")
            }
            }
        };
    }
}