function onDonorSubmit(){
    donorName = document.getElementById('dname')
    donorEmailID = document.getElementById('demail')
    donorPhoneNo = document.getElementById('dphone')
    donorAddress= document.getElementById('daddress')
    donorDOB = document.getElementById('ddob')
    donorBloodGroup = document.getElementById('dblood-group')
    donorPhoto = document.getElementById('dphoto')

    if(isNameAndAddressValid(donorName.value) && 
    isEmailValid(donorEmailID.value) && 
    isPhoneNoValid(donorPhoneNo.value) &&
    isNameAndAddressValid(donorAddress.value) &&
    isAboveAge(donorDOB)){
        console.log("Ready to add donor")
        let request = new XMLHttpRequest();
        request.open("POST",'donor.php',true)
    } 
    else
        console.log("Not ready")
}