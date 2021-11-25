<html>
  <head>
    <title>Blood Bank</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="../res/favicon.ico" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./stylesheets/login.css">
    <script type="text/javascript" src="./JS/validation.js"></script>
    <script type="text/javascript" src="./JS/home.js"></script>

    
  </head>

    <body onload="onLoad()">

        <?php include_once("./headers/homenavbar.php"); ?> 

       
        <div style="padding:30px">
        <table style="width:100%;border-spacing: 50px;">
            <tr>
            <td>
            <div class='card' style="width:90%;margin-left:auto;margin-right:auto;">
            <div class="card-body">
                <h5 class="card-title">Inventory Status(In-Stock)</h5>
                <table id='inventory_table' style="width:100%;margin-left:auto;margin-right:auto;backgroud-color:#ff8080;">
                 
                </table>
                <br><br>
                <a href="./update_stock.php" class="btn btn-primary">View Inventory</a>
            </div>
            </div>
            </td>

            <td>
            <div class='card' style="width:90%;margin-left:auto;margin-right:auto">
            <div class="card-body">
                <h5 class="card-title">Requests Status(Pending)</h5>
                <table id="request_table" style="width:100%;margin-left:auto;margin-right:auto;">
                </table>
                <br><br>
                <a href="./update_request.php" class="btn btn-primary">Requests</a>
            </div>
            </div>
            </td>
            </tr>
            <tr>
              <td colspan='2'>
              <div class='card' style="width:95%;margin-left:auto;margin-right:auto;margin-top:30px">
                <div class="card-body">
                <h5 class="card-title">Servicable requests</h5>
                <center><h6 id='nodata'><br><br>Sorry, No requests found :(<br><br></h6></center>
                  <table id="serviceable_table" style="width:100%;text-align:center;"></table>
            </div>
            </div>
              </td>
            </tr>
        </table>

      <!-- Model -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="mainUpdatediv">
      <form>
                    <div class="contentDiv">
                    <form>
                <div class="form-group">
                  <label for="rid">Request ID</label>
                  <input
                    type="text"
                    class="form-control"
                    id="rid"
                    readonly
                  />
                  
                </div>

                <label for="bankID">Bank ID</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bankID"
                    readonly
                  />
                </div>


                <div class="form-group">
                  <label for="bankName">Bank Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bankName"
                    readonly
                  />
              
                </div>

                </div>

                <div class="form-group">
                  <label for="Blood_Group">Blood Group</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Blood_Group"
                    readonly
                  />
                </div>


                <div class="form-group">
                  <label for="category">Category</label>
                  <input
                    type="text"
                    class="form-control"
                    id="category"
                    value=0
                    readonly
                  />
                </div>

                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input
                    type="text"
                    class="form-control"
                    id="quantity"
                    value=0
                    readonly
                  />
                </div>

                
                <div class="form-group">
                    <label for="tdate">Transaction Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="tdate"
                      readonly
                    />
                
                </div>

                <div class="form-group">
                  <label for="cost">Cost/Quantity</label>
                  <input
                    type="text"
                    class="form-control"
                    id="cost"
                    placeholder="Enter Cost/Quantity"
                    value=0
                    onchange='updateTotal(this.value)'
                  />
                </div>

                <div class="form-group">
                  <label for="total_amount">Total Amount</label>
                  <input
                    type="text"
                    class="form-control"
                    id="total_amount"
                    placeholder="0"
                    value=0
                    readonly
                  />
                </div>


    </form>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="onConfirmTransaction()">Confirm</button>
      </div>
    </div>
  </div>
</div>




    </body>



   
</html>