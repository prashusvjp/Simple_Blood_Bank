function onStaffSubmit(){
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

    if(isNameAndAddressValid(staffName.value) &&
    isEmailValid(staffEmailID.value) &&
    isPhoneNoValid(staffPhoneNo.value) &&
    isNameAndAddressValid(staffAddress.value) &&
    isAboveAge(staffDOB.value) &&
    isPasswordValid(staffPassword.value,staffCheckPassword.value))
        console.log("Ready to add stock")
    else
        console.log("Not ready")
}