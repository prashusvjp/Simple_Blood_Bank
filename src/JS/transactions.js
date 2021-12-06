var transaction_table
function onLoad(){
    transaction_table = document.getElementById("transaction_table")
    nodata_img = document.getElementById("nodata")
    nodata_img.style.display = "none"
    transaction_table.style.display = "none"
    getContents()
}

function getContents(){
    staff_table.innerHTML = `<thead class=" table-danger">
    <tr>
      <th scope="col">Transaction ID</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Address</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>`
}