var inventory_table,template,inventory_status,requset_table
function onLoad(){
    inventory_table = document.getElementById('inventory_table')
    requset_table = document.getElementById('request_table')
    serviceable_table = document.getElementById('serviceable_table')
    getContents()
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



function getInventoryStatus(){
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_inventory_status.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            inventory_status=JSON.parse(this.responseText)
            inventory_table.innerHTML = getText(inventory_status)
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

function getServiceableRequest(){
    serviceable_table.innerHTML=`
    <thead class="table-danger">
                      <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Bank ID</th>
                        <th scope="col">Bank Name/th>
                        <th scope="col">Address/th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Arrival Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
    </thead>
    `
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_request_status.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 0)
                alert("No such data found")
            else{
                res=JSON.parse(this.responseText)
                serviceable_table.innerHTML+=''
            }
        }
    }
}

function getContents(){
    getInventoryStatus()
    getRequestStatus()
    getServiceableRequest()
}

