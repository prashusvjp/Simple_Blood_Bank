var stock_table,data,selectedData,updateStockId,updateDonerId,updateDate,updateBloodGroup,updateCategory,searchDonorButton,updateStatus

function onEditClick(values){
    selectedData = values
    updateStockId.value = selectedData.StockID
    updateDonerId.value = selectedData.DonerID
    updateDate.value = selectedData.Arrival_Date
    updateBloodGroup.value = selectedData.Blood_Group
    updateCategory.value = selectedData.Category
    updateStatus.value = selectedData.Status
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}


function getBloodGroup(){
    if(updateDonerId.value == ''){
        stockDonerId_error.innerText = 'Please enter a valid Doner ID'
        return false
    } else{
        let request = new XMLHttpRequest();
            request.open("POST",'./backend/get_bg.php',true)
            request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
            request.send(JSON.stringify({"id":updateDonerId.value}))
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 0){
                        updateDonerId_error.innerText = "Enter valid Doner ID"
                        updateBloodGroup.value = "Enter valid Doner ID"
                    }else{
                        data = JSON.parse(this.responseText)
                        updateBloodGroup.value = data.bg
                    }   
                }
            };
        if(updateBloodGroup.value == "Enter valid Doner ID"){
            updateDonerId.focus()
            return false
        }  
        return true
    }
}


function getContents(){
    stock_table.innerHTML = ` <thead class="table-danger">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Doner ID</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Type</th>
      <th scope="col">Arrival Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
    </thead>`
    let request = new XMLHttpRequest();
    request.open("POST",'./backend/get_bank_stocks.php',true)
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    request.send(JSON.stringify({"bankId":getBankIdFromCookie()}))
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        res = this.responseText
        if(res == 0){
            stock_table.style.display = "none";
            nodata_img.style.display = "block";
        }else{ 
            stock_table.style.display = "";
            nodata_img.style.display = "none";
            data = JSON.parse(res)
            var count=0
            data.forEach(element => {
               stock_table.innerHTML += `
               <tbody id="get_stock">
               <tr>
               <td>`+ element.StockID + `</td>
               <td>`+ element.DonerID + `</td>
               <td>`+ element.Blood_Group + `</td>
               <td>`+ element.Category + `</td>
               <td>`+ element.Arrival_Date + `</td>
               <td>`+ element.Status + `</td>
               <td> <a data-toggle="modal" data-target="#exampleModalScrollable" id='`+ count +`' onclick='onEditClick(data[this.id])'><img src="../res/edit.png"  width="30" height="30">  </a>
                </td>
              </tr>
               </tbody>
               `
               count++
            });
        }
    }
}}

function onSaveChanges(){
    if(getBloodGroup()){
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/update_stock.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        request.send(JSON.stringify({
            "stockId" : updateStockId.value,
            "donerId" : updateDonerId.value,
            "date" : updateDate.value,
            "bgroup":updateBloodGroup.value,
            "category": updateCategory.value,
            "status": updateStatus.value
        }))
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)

                if(this.responseText == 1){
                    alert('Updated succesfully');
                    getContents()
                }
                else
                    alert('Sorry, something went wrong',this.responseText)
            }
        }
    }
}


function onLoad(){
    nodata_img = document.getElementById('nodata')
    stock_table = document.getElementById('stock_table')
    updateStockId = document.getElementById('stockid')
    updateDonerId = document.getElementById('donerid')
    updateDate = document.getElementById('arrival_date')
    updateBloodGroup = document.getElementById('dblood-group')
    updateCategory = document.getElementById('dblood-category')
    updateStatus = document.getElementById('dblood-status')
    updateDonerId_error = document.getElementById('did-error')

    stock_table.style.display = "none";
    nodata_img.style.display = "none";
    getContents()
}
