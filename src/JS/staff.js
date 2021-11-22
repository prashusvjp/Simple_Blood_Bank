var staffName,staffEmailID,staffPhoneNo,staffAddress,staffDOB,staffBloodGroup,staffPhoto,staffRole,staffPassword,staffCheckPassword,staffSalary
var staffName_error,staffEmailID_error,staffPhoneNo_error,staffAddress_error,staffDOB_error,staffCheckPassword_error,gender

function onLoad(){
    staffName = document.getElementById('sname')
    staffEmailID = document.getElementById('semail')
    staffPhoneNo = document.getElementById('sphone')
    staffAddress= document.getElementById('saddress')
    staffDOB = document.getElementById('sdob')
    staffBloodGroup = document.getElementById('sblood-group')
    staffPhoto = document.getElementById('sphoto')
    staffRole = document.getElementById('srole')
    staffPassword = document.getElementById('spassword')
    staffCheckPassword = document.getElementById('scheckPassword')
    staffSalary = document.getElementById('ssalary')
    staffName_error=document.getElementById('sname-error')
    staffEmailID_error=document.getElementById('smail-error')
    staffPhoneNo_error=document.getElementById('sphone-error')
    staffAddress_error=document.getElementById('saddress-error')
    staffDOB_error=document.getElementById('sdate-error')
    staffCheckPassword_error=document.getElementById('srepassword-error')
    gender = 'M'
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}


function onGenderChange(element){
    switch(element.value){
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
    staffName_error.innerText=''
    staffEmailID_error.innerText=''
    staffPhoneNo_error.innerText=''
    staffAddress_error.innerText=''
    staffDOB_error.innerText=''
    staffCheckPassword_error.innerText=''
}

function onStaffSubmit(){
    console.log(getBankIdFromCookie())
    if(isNameValid(staffName,staffName_error) &&
    isEmailValid(staffEmailID,staffEmailID_error) &&
    isPhoneNoValid(staffPhoneNo,staffPhoneNo_error) &&
    isAddressValid(staffAddress,staffAddress_error) &&
    isAboveAge(staffDOB,staffDOB_error) &&
    isPasswordValid(staffPassword,staffCheckPassword,staffCheckPassword_error)){
        var file = staffPhoto.files[0];
        var reader = new FileReader();
        reader.onloadend =  function() {
            let data=(reader.result).split(',')[1]
            json_data = JSON.stringify({
                "bankId": getBankIdFromCookie(),
                "name" : staffName.value,
                "emailId" : staffEmailID.value,
                "phoneNo" : staffPhoneNo.value,
                "DOB" : staffDOB.value,
                "gender" : gender,
                "bgroup" : staffBloodGroup.value,
                "address" : staffAddress.value,
                "password": staffPassword.value,
                "role" : staffRole.value,
                "photo" : _base64ToArrayBuffer(data),
                "salary" : (staffSalary>0)?staffSalary.value:0
            })
            console.log(json_data)
            let request = new XMLHttpRequest();
            request.open("POST",'./backend/add_staff.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(json_data)
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