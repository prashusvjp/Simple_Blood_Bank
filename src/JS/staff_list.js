var  staff_table,contents,image,data,updatePhoto,updateName,updatePhone,updateGender,updateAddress,updateRole,updateStatus,gender='M'
var updateEmail,updatestaffId,updateEmailError,updatestaffIdError,updateNameError,updatePhoneError,updateAddressError,updateSalaryError,selected_values

function onEditClick(id){
    selected_values = data[id]
    image.src = "data:image/jpg;base64,"+selected_values.Photo
    updateEmail.value = selected_values.EmailID
    updatestaffId.value = selected_values.StaffID
    updateName.value = selected_values.Staff_Name
    updatePhone.value = selected_values.PhoneNo
    updateAddress.value=selected_values.Address
    updateRole.value= selected_values.Role
    updateSalary.value= selected_values.salary
    updateStatus.value = selected_values.status
    switch(selected_values.Gender){
        case 'M':
            document.getElementById('smale').checked = true
            break
        case 'F':
            document.getElementById('sfemale').checked = true
            break
        case 'O':
            document.getElementById('sothers').checked = true
            break
    }
    gender = selected_values.Gender
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}

function getContents(){
    staff_table.innerHTML = `<thead class=" table-danger">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Bloodgroup</th>
      <th scope="col">Role</th>
      <th scope="col">Salary</th>
      <th scope="col">Action</th>
    </tr>
  </thead>`
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_bank_staff.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        res = this.responseText
        if(res == 0){
            staff_table.style.display = "none";
            nodata_img.style.display = "block";
        }else{ 
            staff_table.style.display = "";
            nodata_img.style.display = "none";
            data = JSON.parse(res)
            var count=0
            data.forEach(element => {
                staff_table.innerHTML += `
                    <tbody id="get_stock">
                    <tr>
                    <td>`+ element.StaffID +`</td>
                    <td>`+ element.Staff_Name +`</td>
                    <td>`+ element.EmailID +`</td></b>
                    <td>`+ element.PhoneNo +`</td>
                    <td>`+ element.Address +`</td>
                    <td>`+ element.Date_Of_Birth +`</td>
                    <td>`+ element.Gender +`</td>
                    <td>`+ element.Blood_Group +`</td>
                    <td>`+ element.Role +`</td>
                    <td>`+ element.salary +`</td>
                    <td>
                        <a data-toggle="modal" data-target="#exampleModalScrollable" id='`+ count +`' onclick='onEditClick(this.id)'><img src="../res/edit.png"  width="35" height="30"></a>
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
    salary = (updateSalary.value=='')?0:updateSalary.value
    if(isPhoneNoValid(updatePhone,updatePhoneError) && isNameValid(updateName,updateNameError) &&
    isAddressValid(updateAddress,updateAddressError && isEmailValid(updateEmail,updateEmailError))){
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/update_staff.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        if(updatePhoto.files.length > 0){
            var reader = new FileReader();
            reader.onloadend =  function() {
            let data=(reader.result).split(',')[1]          
            request.send(JSON.stringify({
                "staffId":updatestaffId.value,
                "emailId":updateEmail.value,
                "name": updateName.value,
                "phoneNo": updatePhone.value,
                "gender": gender,
                "role": updateRole.value,
                "salary": updateStatus.value,
                "status": updateStatus.value,
                "address": updateAddress.value,
                "photo":data
            }))
            reader.readAsDataURL(updatePhoto.files[0])      
        }}else{
            request.send(JSON.stringify({
                "staffId":updatestaffId.value,
                "emailId":updateEmail.value,
                "name": updateName.value,
                "phoneNo": updatePhone.value,
                "gender": gender,
                "role": updateRole.value,
                "salary": updateStatus.value,
                "status": updateStatus.value,
                "address": updateAddress.value,
                "photo": selected_values.Photo
            }))
        }
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText == 1)
                    alert('Updated succesfully');
                else
                    alert('Sorry, something went wrong')
            }
        }
    }
}

function onLoad(){

    updatePhoto=document.getElementById('updatephoto')
    updateName=document.getElementById('updateName')
    updatePhone=document.getElementById('updatePhone')
    updateAddress=document.getElementById('updateAddress')
    updateRole=document.getElementById('updaterole')
    updateSalary=document.getElementById('updateSalary')
    updateStatus=document.getElementById('updatestatus')
    updateEmail=document.getElementById('semail')
    updatestaffId=document.getElementById('sid')
    updateEmailError=document.getElementById('semail-error')
    updatestaffIdError=document.getElementById('sid-error')
    updateNameError=document.getElementById('updateName-error')
    updatePhoneError=document.getElementById('updatePhone-error')
    updateAddressError=document.getElementById('updateAddress-error')
    updateSalaryError=document.getElementById('updateSalary-error')
    image = document.getElementById('sphoto')
    staff_table = document.getElementById('staff_table')
    nodata_img = document.getElementById('nodata')
    staff_table.style.display = "none";
    nodata_img.style.display = "none";
    getContents()
}
