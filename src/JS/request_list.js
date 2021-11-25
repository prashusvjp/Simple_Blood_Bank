var updateRID,updateBloodGroup,updateBloodCategory,updateQuantity,updateQuantityError, request_table, selected_values

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}

function onEditClick(values){
    selected_values = values
    updateRID.value = selected_values.RequestID
    updateBloodGroup.value = selected_values.Blood_Group
    updateBloodCategory.value = selected_values.Category
    updateQuantity.value = selected_values.Quantity
}

function getContents(){
    request_table.innerHTML = `<thead class=" table-danger">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Blood Category</th>
      <th scope="col">Requested Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>`
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_requests.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        res = this.responseText
        if(res == 0){
            request_table.style.display = "none";
            nodata_img.style.display = "block";
        }else{ 
            request_table.style.display = "";
            nodata_img.style.display = "none";
            data = JSON.parse(res)
            var count=0
            data.forEach(element => {
                if(element.Status == 'Pending')
                    request_table.innerHTML += `
                        <tbody id="get_request">
                        <tr>
                        <td>`+ element.RequestID +`</td>
                        <td>`+ element.Blood_Group +`</td>
                        <td>`+ element.Category +`</td></b>
                        <td>`+ element.Request_Date +`</td>
                        <td>`+ element.Quantity +`</td>
                        <td>`+ element.Status +`</td>
                        <td>
                            <a data-toggle="modal" data-target="#exampleModalScrollable" id='`+ count +`' onclick='onEditClick(data[this.id])'><img src="../res/edit.png"  width="35" height="30"></a>
                        </td>
                        </tr>    
                        </tbody>
                    `
                else
                request_table.innerHTML += `
                <tbody id="get_request">
                <tr>
                <td>`+ element.RequestID +`</td>
                <td>`+ element.Blood_Group +`</td>
                <td>`+ element.Category +`</td></b>
                <td>`+ element.Request_Date +`</td>
                <td>`+ element.Quantity +`</td>
                <td>`+ element.Status +`</td>
                <td>
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

    updateQuantityError.innerText = ''
    if(updateQuantity.value == '' || updateQuantity.value == '0')
    updateQuantityError.innerText = 'Quantity cannot be 0/empty'
    else{
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/update_request.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")          
        request.send(JSON.stringify({
            "requestId":updateRID.value,
            "bgroup" : updateBloodGroup.value,
            "category" : updateBloodCategory.value,
            "quantity" : updateQuantity.value,
        }))
    
         
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
    
    updateRID=document.getElementById('rid')
    updateQuantity=document.getElementById('updatequantity')
    updateBloodGroup=document.getElementById('updaterblood-group')
    updateBloodCategory=document.getElementById('updaterblood-category')
    updateQuantityError=document.getElementById('updatequantity-error')
    nodata_img = document.getElementById('nodata')
    request_table = document.getElementById('request_table')
    request_table.style.display = "none";
    nodata_img.style.display = "none";
    getContents()

}

function clearUI(){

    updateQuantityError.innerText=''

}