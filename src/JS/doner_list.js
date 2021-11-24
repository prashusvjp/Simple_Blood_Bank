var updateDPhoto,updateDName,updateDPhone,updateDGender,updateDAddress,gender='M',updateDEmail,updateDonerId
var updateDEmailError,updateDonerIdError,updateDNameError,updateDPhoneError,updateDAddressError,Dimage,selected_values
var doner_table,contents,data

function onEditClick(values){
    selected_values = values
    Dimage.src = "data:image/jpg;base64,"+selected_values.Photo
    updateDEmail.value = selected_values.EmailID
    updateDonerId.value = selected_values.DonerID
    updateDName.value = selected_values.Doner_Name
    updateDPhone.value = selected_values.PhoneNo
    updateDAddress.value=selected_values.Address
    switch(selected_values.Gender){
        case 'M':
            document.getElementById('dmale').checked = true
            break
        case 'F':
            document.getElementById('dfemale').checked = true
            break
        case 'O':
            document.getElementById('dothers').checked = true
            break
    }
    gender = selected_values.Gender
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


function getContents(){
    doner_table.innerHTML = `<thead class=" table-danger">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Bloodgroup</th>
      <th scope="col">Action</th>
    </tr>
  </thead>`
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_doner.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        res = this.responseText
        if(res == 0){
            doner_table.style.display = "none";
            nodata_img.style.display = "block";
        }else{ 
            doner_table.style.display = "";
            nodata_img.style.display = "none";
            data = JSON.parse(res)
            var count=0
            data.forEach(element => {
                doner_table.innerHTML += `
                    <tbody id="get_doner">
                    <tr>
                    <td>`+ element.DonerID +`</td>
                    <td>`+ element.Doner_Name +`</td>
                    <td>`+ element.EmailID +`</td></b>
                    <td>`+ element.PhoneNo +`</td>
                    <td>`+ element.Address +`</td>
                    <td>`+ element.Date_Of_Birth +`</td>
                    <td>`+ element.Gender +`</td>
                    <td>`+ element.Blood_Group +`</td>
                    <td>
                        <a data-toggle="modal" data-target="#exampleModalScrollable" id='`+ count +`' onclick='onEditClick(data[this.id])'><img src="../res/edit.png"  width="35" height="30"></a>
                    </td>
                    </tr>    
                    </tbody>
                `
                count++
            });
        }
        }
    };
}

function onSaveChanges(){

    if(isPhoneNoValid(updateDPhone,updateDPhoneError) && isNameValid(updateDName,updateDNameError) &&
    isAddressValid(updateDAddress,updateDAddressError) && isEmailValid(updateDEmail,updateDEmailError)){
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/update_doner.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        if(updateDPhoto.files.length > 0){
            var reader = new FileReader();
            reader.onloadend =  function() {
            let data=(reader.result).split(',')[1]          
            request.send(JSON.stringify({
                "donerId":updateDonerId.value,
                "emailId":updateDEmail.value,
                "name": updateDName.value,
                "phoneNo": updateDPhone.value,
                "gender": gender,
                "address": updateDAddress.value,
                "photo":data
            }))
         }
         reader.readAsDataURL(updateDPhoto.files[0])
    }else{
            request.send(JSON.stringify({
                "donerId":updateDonerId.value,
                "emailId":updateDEmail.value,
                "name": updateDName.value,
                "phoneNo": updateDPhone.value,
                "gender": gender,
                "address": updateDAddress.value,
                "photo": selected_values.Photo
            }))
        }
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText,1)
                if(this.responseText == 1){
                    getContents()
                    alert('Updated succesfully');
                }
                else
                    alert('Sorry, something went wrong',this.responseText)
            }
        }
    }
}


function onLoad(){
    updateDPhoto=document.getElementById('updatedPhoto')
    updateDName=document.getElementById('updatedName')
    updateDPhone=document.getElementById('updatedPhone')
    updateDAddress=document.getElementById('updatedAddress')
    updateDEmail=document.getElementById('demail')
    updateDonerId=document.getElementById('did')
    updateDEmailError=document.getElementById('demail-error')
    updateDonerIdError=document.getElementById('did-error')
    updateDNameError=document.getElementById('updatedName-error')
    updateDPhoneError=document.getElementById('updatedPhone-error')
    updateDAddressError=document.getElementById('updatedAddress-error')
    Dimage = document.getElementById('dphoto')
    nodata_img = document.getElementById('nodata')
    doner_table = document.getElementById('doner_table')
    doner_table.style.display = "none";
    nodata_img.style.display = "none";
    getContents()
}

function clearUI(){
    updateDEmailError.innerText=''
    updateDonerIdError.innerText=''
    updateDNameError.innerText=''
    updateDPhoneError.innerText=''
    updateDAddressError.innerText=''
}