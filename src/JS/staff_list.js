var  staff_table,contents,image,data,updatePhoto,updateName,updatePhone,updateGender,updateAddress,updateRole,updateSalary,updateStatus

function onEditClick(event){
    console.log(data[event.id])
    alert("Edit option for "+event.id+" clicked")
}

function onDeleteClick(event){
    alert("Delete option for "+event.id+" clicked")
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}

function getContents(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_bank_staff.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        res = this.responseText
        console.log(this.responseText)
        if(res == 0){
            staff_table.style.display = "none";
            nodata_img.style.display = "block";
        }else{ 
            staff_table.style.display = "";
            nodata_img.style.display = "none";
            data = JSON.parse(res)
            console.log(data)
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
                        <a href="#" id='`+ count +`' onclick='onEditClick(this)'><img src="../res/edit.png"  width="35" height="30"></a>
                        <a href="#" id='`+ count +`' onclick='onDeleteClick(this)'><img src="../res/delete.png"  width="35" height="30"></a>   
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



function onLoad(){

    updatePhoto=document.getElementById('updatePhoto')
    updateName=document.getElementById('updateName')
    updatePhone=document.getElementById('updatePhone')
    updateAddress=document.getElementById('updateAddress')
    updateRole=document.getElementById('updaterole')
    updateSalary=document.getElementById('updateSalary')
    updateStatus=document.getElementById('updatestatus')

    staff_table = document.getElementById('staff_table')
    nodata_img = document.getElementById('nodata')
    staff_table.style.display = "none";
    nodata_img.style.display = "none";
    getContents()
}
`
<tbody id="get_stock">
<tr>
<td>1</td>
<td>Prashanth S</td>
<td>prashusvjp@gmail.com</td></b>
<td>9112345678</td>
<td>bangalore</td>
<td>21-08-2001</td>
<td>Male</td>
<td>A+</td>
<td>Admistrator</td>
<td>80000</td>
<td>
    <a href="#" ><img src="../res/edit.png"  width="35" height="30">  </a>
    <a href="#" ><img src="../res/delete.png"  width="35" height="30"></a>
    
</td>
</tr> 

</tbody>
`