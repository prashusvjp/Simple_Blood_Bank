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

    <link rel="stylesheet" href="./stylesheets/update_stock.css">
    <script src="./JS/validation.js"></script>
    <script src="./JS/stock_list.js"></script>
  </head>


  <body onload="onLoad()">

  <?php include_once("./headers/stocknavbar.php"); ?>
  <img src='../res/nodata.png' id='nodata' class='nodataimg' style="display:none;
    margin-left: auto;
    margin-top:100px;
    margin-right:auto;
    width: 50%;"></img>
  <div class="Maincontainer">
		<table id='stock_table' class="table" style='display:none'></table>
	</div>

  
   <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Staff Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="mainUpdatediv">
      <form>
      <div class="form-group">
                      <label for="stockid">Stock ID</label>
                      <input
                        type="text"
                        class="form-control"
                        id="stockid"
                        readonly
                      />
     </div>     
     
     <div class="form-group">
                      <label for="donerid">Doner ID</label>
                      <input
                        type="text"
                        class="form-control"
                        id="donerid"
                      />
                      <span class='error-span' id="did-error" style="color:'red'"></span><br>
                      <button type="button" id="search" class="btn btn-info" onclick="getBloodGroup()">Search</button>
                      </div>

                      <div class="form-group">
                        <label for="dblood-group">Blood Group</label>
                        <input type="text" id="dblood-group" name="dblood-group" class="form-control" value="" readonly>
                      </div>

                      <div class="form-group">
                        <label for="dblood-category">Blood Category</label>
                        <select class="form-control" id="dblood-category">
                          <option>RBC</option>
                          <option>WBC</option>
                          <option>Platelets</option>
                          <option>Plasma</option>
                        </select>
                      </div>

                      <div class="form-group">
                    <label for="doner-dob">Arrival Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="arrival_date"
                      placeholder="Enter the arrival date"
                    />
                    </div>


                      <div class="form-group">
                        <label for="dblood-status">Status</label>
                        <select class="form-control" id="dblood-status">
                          <option>Testing</option>
                          <option>In-stock</option>
                          {% comment %} <option>Experied</option>
                          <option>Sold</option> {% endcomment %}
                        </select>
                      </div>


    </form>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="onSaveChanges()">Save changes</button>
      </div>
    </div>
  </div>
</div>




  </body>
</html>


