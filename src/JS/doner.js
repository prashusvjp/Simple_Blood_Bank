var donorName,donorEmailID,donorPhoneNo,donorAddress,donorDOB,donorBloodGroup,donorPhoto,donorName_error,donorEmailID_error,
donorPhoneNo_error,donorAddress_error,donorDOB_error,gender

function onLoad(){
    donorName = document.getElementById('dname')
    donorEmailID = document.getElementById('demail')
    donorPhoneNo = document.getElementById('dphone')
    donorAddress= document.getElementById('daddress')
    donorDOB = document.getElementById('doner-dob')
    donorBloodGroup = document.getElementById('dblood-group')
    donorPhoto = document.getElementById('dphoto')
    donorName_error = document.getElementById('dname-error')
    donorEmailID_error =document.getElementById('demail-error')
    donorPhoneNo_error = document.getElementById('dphone-error')
    donorAddress_error = document.getElementById('daddress-error')
    donorDOB_error =document.getElementById('dob-error')
    gender = 'M'
}

function onGenderChange(element){
    switch(element.target.value){
        case 'male':
            gender='M'
            break;
        case 'female':
            gender='F'
            break;   
        case 'others':
            gender='O'
            break;
    }
}

function clearUI(){
    donorName_error.innerText = ''
    donorEmailID_error.innerText='' 
    donorPhoneNo_error.innerText= ''
    donorAddress_error.innerText= ''
    donorDOB_error.innerText= ''
}


function _base64ToArrayBuffer(base64) {
    var binary_string = window.atob(base64);
    var len = binary_string.length;
    var bytes = new Uint8Array(len);
    for (var i = 0; i < len; i++) {
        bytes[i] = binary_string.charCodeAt(i);
    }
    return bytes.buffer;
}

function onDonerSubmit(){
    clearUI()
    console.log(_base64ToArrayBuffer(data))
    if(isNameValid(donorName,donorName_error) && 
    isEmailValid(donorEmailID,donorEmailID_error) && 
    isPhoneNoValid(donorPhoneNo,donorPhoneNo_error) &&
    isAddressValid(donorAddress,donorAddress_error) &&
    isAboveAge(donorDOB,donorDOB_error)){
        var file = donorPhoto.files[0];
        var reader = new FileReader();
        reader.onloadend =  function() {
            let data=(reader.result).split(',')[1]
            let request = new XMLHttpRequest();
            request.open("POST",'./backend/add_doner.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(JSON.stringify({
                "name" : donorName.value,
                "emailId" : donorEmailID.value,
                "phoneNo" : donorPhoneNo.value,
                "DOB" : donorDOB.value,
                "gender" : gender,
                "bgroup" : donorBloodGroup.value,
                "address" : donorAddress.value,
                "photo" : _base64ToArrayBuffer(data)
            }))
            
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                res = Number(this.responseText)
                console.log(this.responseText)
                if(res > 0)
                        alert("User created succesfully")
                else{ 
                    if(res < 0){
                        donorEmailID.focus()
                        document.getElementById('bemail-error').innerText = "Doner already exists"
                    }else
                        alert("Sorry, something went wrong please try again later")
                }
                }
            };
        }
        reader.readAsDataURL(file)      
    }
}