var inventory_table,template,inventory_status,requset_table
function onLoad(){
    inventory_table = document.getElementById('inventory_table')
    requset_table = document.getElementById('request_table')
    serviceable_table = document.getElementById('serviceable_table')
    serviceable_table_nodata = document.getElementById('nodata')
    requestID_field = document.getElementById('rid')
    bankId_field = document.getElementById('bankID')
    bankName_field = document.getElementById('bankName')
    blood_group_field = document.getElementById('Blood_Group')
    category_field = document.getElementById('category')
    quantity_field = document.getElementById('quantity')
    cost_field = document.getElementById('cost')
    tdate_field = document.getElementById('tdate')
    total_amount_field = document.getElementById('total_amount')
    tdate_field.valueAsDate = new Date();
    serviceable_table_nodata.style.display ="none";
    serviceable_table.style.display ="none";
    getContents()
}

function updateTotal(value){
    total_amount_field.value = Number(quantity_field.value) * Number(value)
}

function onProceedClick(value){
    requestID_field.value = value.reqId
    bankId_field.value = value.bankId
    bankName_field.value = value.bname
    blood_group_field.value = value.bgroup
    category_field.value = value.Category
    quantity_field.value = value.Quantity
}

function onConfirmTransaction(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/transaction.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({
        "reqId" :  requestID_field.value,
        "fbankId": getBankIdFromCookie(),
        "tbankId": bankId_field.value,
        "total_amount":total_amount_field.value,
        "date": tdate_field.value,
        "bgroup":blood_group_field.value,
        "category":category_field.value,
        "quantity": quantity_field.value
    }))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            inventory_status=JSON.parse(this.responseText)
            inventory_table.innerHTML = getText(inventory_status)
            getServiceableRequest(inventory_status)
        }
    }
}

function getText(res){
    return ` <tr>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h6 class="card-title">A+</h6>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['A+']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['A+']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['A+']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['A+']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h6 class="card-title">A-</h6>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['A-']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['A-']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['A-']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['A-']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h6 class="card-title">B+</h6>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['B+']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['B+']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['B+']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['B+']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h6 class="card-title">B-</h6>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['B-']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['B-']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['B-']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['B-']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    </tr>
    <tr>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h5 class="card-title">AB+</h5>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['AB+']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['AB+']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['AB+']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['AB+']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h5 class="card-title">AB-</h5>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['AB-']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['AB-']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['AB-']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['AB-']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h5 class="card-title">O+</h5>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['O+']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['O+']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['O+']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['O+']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    <td>
    <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
    <div class="card-body">
        <h5 class="card-title">O-</h5>
        <p class="card-text"><table><tr><td>RBC</td><td>&nbsp&nbsp&nbsp${res['O-']['RBC']}</td></tr><tr><td>WBC</td><td>&nbsp&nbsp&nbsp${res['O-']['WBC']}</td></tr><tr><td>Plasma</td><td>&nbsp&nbsp&nbsp${res['O-']['Plasma']}</td></tr><tr><td>Platelets</td><td>&nbsp&nbsp&nbsp${res['O-']['Platelets']}</td></tr></table></p>
    </div>
    </div>
    </td>
    </tr>
    `
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}

function getInventoryStatus(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_inventory_status.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            inventory_status=JSON.parse(this.responseText)
            inventory_table.innerHTML = getText(inventory_status)
            getServiceableRequest(inventory_status)
        }
    }
}

function getRequestStatus(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_request_status.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res=JSON.parse(this.responseText)
            requset_table.innerHTML = getText(res)
        }
    }
}

function getServiceableRequest(inventory_status){
    serviceable_table.innerHTML=`
    <thead class="table-danger">
                      <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Bank ID</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Action</th>
                      </tr>
    </thead>
    `
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_serviceable_requests.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            if(this.responseText == 0){
                serviceable_table_nodata.style.display ="";
                serviceable_table.style.display ="none";
            }else{
                serviceable_table_nodata.style.display ="none";
                serviceable_table.style.display ="";
                res=JSON.parse(this.responseText)
                var count=0,error_count=0
                res.forEach(element => {
                    if(Number(element.Quantity) > Number(inventory_status[element.bgroup][element.Category])){
                        error_count++
                    }else{
                        serviceable_table.innerHTML+=`
                        <tbody id="get_stock">
                            <td>`+ element.reqId + `</td>
                            <td>`+ element.bankId + `</td>
                            <td>`+ element.bname + `</td>
                            <td>`+ element.address + `</td>
                            <td>`+ element.bgroup + `</td>
                            <td>`+ element.Category + `</td>
                            <td>`+ element.Quantity + `</td>
                            <td>`+ element.date + `</td>
                            <td> 
                            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" id='${count}' onclick='onProceedClick(res[${count}])'>Proceed</a>
                                </td>
                            </tr>
                        </tbody>
                         `
                        
                    }
                    count++
                
                });
                if(count == error_count){
                    serviceable_table_nodata.style.display ="";
                    serviceable_table.style.display ="none";
                }

            }
        }
    }
}

function getContents(){
    getInventoryStatus()
    getRequestStatus()
}

