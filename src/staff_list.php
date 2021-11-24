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
    <script src="./JS/staff_list.js"></script>
  </head>


  <body onload='onLoad()'>

  <?php include_once("./headers/staffnavbar.php"); ?>
  <img src='../res/nodata.png' id='nodata' class='nodataimg' style="display: block;
    margin-left: auto;
    margin-top:100px;
    margin-right:auto;
    width: 50%;"></img>
  <div class="Maincontainer">
		<table class="table table-bordered" id="staff_table"></table>
	</div>


   <!-- Model -->
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
                    <div class="imageDiv">
                        <img src="../res/profile_image.png" id='sphoto' class="rounded-circle" alt="Cinque Terre" width="170" height="170">
                    </div>
                    <div class="contentDiv">
                    <form>
                <div class="form-group">
                  <label for="sid">Staff ID</label>
                  <input
                    type="text"
                    class="form-control"
                    id="sid"
                    readonly
                  />
                  <span class='error-span' id="sid-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="semail">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="semail"
                  />
                  <span class='error-span' id="semail-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="updateName">Staff Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updateName"
                    placeholder="Enter New Name"
                  />
                  <span class='error-span' id="updateName-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="updatePhone">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updatePhone"
                    placeholder="Enter New Phone number"
                  />
                  <span class='error-span' id="updatePhone-error" style="color:'red'"></span>
                </div>

                <div id="doner-gender">
                    <label  for="updateGender">
                    Gender :
                    </label>
                    <div id="gender-radio">
                    <input type="radio" id="smale" name="sgender" value="male" checked onclick='onGenderChange(this)'>
                        <label for="smale">Male</label>&nbsp
                        <input type="radio" id="sfemale" name="sgender" value="female" onclick='onGenderChange(this)'>
                        <label for="sfemale">Female</label>&nbsp
                      <input type="radio" id="sothers" name="sgender" value="others" onclick='onGenderChange(this)'>
                      <label for="sothers">Others</label>
                    </div>
                    </div>

                <div class="form-group">
                  <label for="updateAddress">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updateAddress"
                    placeholder="Enter New Address"
                  />
                  <span class='error-span' id="updateAddress-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                        <label for="updaterole">Role</label>
                        <select class="form-control" id="updaterole">
                          <option>Administrator</option>
                          <option>Doctor</option>
                          <option>Inventory Manager</option>
                          <option>Manager</option>
                        </select>
                      </div>

                      <div class="form-group">
                  <label for="updateSalary">Salary</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updateSalary"
                    placeholder="Enter New Salary"
                    value=0
                  />
                  <span class='error-span' id="updateSalary-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                        <label for="updatestatus">Status</label>
                        <select class="form-control" id="updatestatus">
                          <option>Existing</option>
                          <option>EX-employee</option>
                        </select>
                      </div>


                <div class="form-group">
                    <label for="updatePhoto">Photo (Only .jpg files)</label>
                    <input type="file" class="form-control-file" id="updatePhoto" accept=".jpg">
                    <span class='error-span' id="updatephoto-error" style="color:'red'"></span>
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


