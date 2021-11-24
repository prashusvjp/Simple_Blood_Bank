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
    <script src="register_bloodbank.js"></script>
  </head>


  <body onload="onLoad()">

  <?php include_once("./headers/donernavbar.php"); ?>

  <img src='../res/nodata.png' id='nodata' class='nodataimg' style="display: block;
    margin-left: auto;
    margin-top:100px;
    margin-right:auto;
    width: 50%;"></img>

       <div class="Maincontainerdoner">
		<table class="table table-bordered">
  <thead class=" table-danger">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Bloodgroup</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
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
                <td>
              	<a href="#"  data-toggle="modal" data-target="#exampleModalScrollable" ><img src="../res/edit.png"  width="35" height="30">  </a>
		        	
		        </td>
		      </tr> 
      
  </tbody>
</table>
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
                        <img src="../res/profile_image.png" id='dphoto' class="rounded-circle" alt="Cinque Terre" width="170" height="170">
                    </div>
                    <div class="contentDiv">
                    <form>
                <div class="form-group">
                  <label for="did">Doner ID</label>
                  <input
                    type="text"
                    class="form-control"
                    id="did"
                    readonly
                  />
                  <span class='error-span' id="did-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="demail">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="demail"
                  />
                  <span class='error-span' id="demail-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="updatedName">Doner Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updatedName"
                    placeholder="Enter New Name"
                  />
                  <span class='error-span' id="updatedName-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                  <label for="updatedPhone">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updatedPhone"
                    placeholder="Enter New Phone number"
                  />
                  <span class='error-span' id="updatedPhone-error" style="color:'red'"></span>
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
                  <label for="updatedAddress">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="updatedAddress"
                    placeholder="Enter New Address"
                  />
                  <span class='error-span' id="updatedAddress-error" style="color:'red'"></span>
                </div>


                <div class="form-group">
                    <label for="updatedPhoto">Photo (Only .jpg files)</label>
                    <input type="file" class="form-control-file" id="updatedPhoto" accept=".jpg">
                    <span class='error-span' id="updatedphoto-error" style="color:'red'"></span>
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


  </body>
</html>


