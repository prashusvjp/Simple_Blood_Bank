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

    <link rel="stylesheet" href="./stylesheets/staff_list.css">
    <script src="./JS/validation.js"></script>
    <script src="./JS/request_list.js"></script>
  </head>


  <body onload="onLoad()">

  <?php include_once("./headers/stocknavbar.php"); ?>

  <img src='../res/nodata.png' id='nodata' class='nodataimg' style="display: block;
    margin-left: auto;
    margin-top:100px;
    margin-right:auto;
    width: 50%;"></img>

       <div class="Maincontainerdoner">
       <table class="table table-bordered" id="request_table">
    	</div>


   <!-- Model -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Update Request Details</h5>
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
                  <span class='error-span' id="did-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                        <label for="updaterblood-group">Blood Group</label>
                        <select class="form-control" id="updaterblood-group" required>
                          <option>A+</option>
                          <option>A-</option>
                          <option>B+</option>
                          <option>B-</option>
                          <option>AB+</option>
                          <option>AB-</option>
                          <option>O+</option>
                          <option>O-</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="updaterblood-category">Blood Category</label>
                        <select class="form-control" id="updaterblood-category">
                          <option>RBC</option>
                          <option>WBC</option>
                          <option>Platelets</option>
                          <option>Plasma</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="updatequantity">Quantity</label>
                      <input
                        type="number"
                        class="form-control"
                        id="updatequantity"
                        value='1'
                        placeholder="1"
                      />
                      <span class='error-span' id="updatequantity-error" style="color:'red'"></span>
                      </div>
    </form>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="onSaveChanges()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include_once("./footer.php"); ?> 
  </body>
</html>


