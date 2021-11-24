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

    <link rel="stylesheet" href="./stylesheets/add_staff.css">
    <script type="text/javascript" src='./JS/validation.js'></script>
    <script type="text/javascript" src='./JS/staff.js'></script>
  </head>


  <body onload="onLoad()">

      <?php include_once("./headers/staffnavbar.php"); ?>
    <div id="content">
        <div id="staffMainCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h3> Staff Register</h3>
            </div>
            <div class="card-body text-danger">
              <form>
                <div class="form-group">
                  <label for="sname">Staff Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="sname"
                    placeholder="Enter valid name"
                    required
                  />
                  <span class='error-span' id="sname-error" style="color:'red'"></span>
                </div>

                

                    <div class="form-group">
                        <label for="semail">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="semail"
                          placeholder="Enter valid email"
                          required
                        />
                        <span class='error-span' id="smail-error" style="color:'red'"></span>
                        <!-- <small id="emailHelp" class="form-text text-muted"
                    >Your personal details are secure with us.</small> -->
                    </div>
                 

                  <div class="form-group">
                    <label for="sphone">Phone Number</label>
                    <input
                      type="tel"
                      class="form-control"
                      id="sphone"
                      placeholder="Enter valid phone number"
                      required
                    />
                    <span class='error-span' id="sphone-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="saddress">Address</label>
                    <input
                      type="textarea"
                      class="form-control"
                      id="saddress"
                      placeholder="Enter Address"
                      required
                    />
                    <span class='error-span' id="saddress-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="sdob">DOB</label>
                    <input
                      type="date"
                      class="form-control"
                      id="sdob"
                      placeholder="Enter the date of birth"
                      required
                    />
                    <span class='error-span' id="sdate-error" style="color:'red'"></span>
                  </div>

                  <div id="doner-gender">
                    <label  for="gender">
                    Gender :
                    </label>
                    <div id="gender-radio">
                    <input type="radio" id="smale" name="sgender" value="male" onclick='onGenderChange(this)' checked>
                        <label for="smale">Male</label>&nbsp
                        <input type="radio" id="sfemale" name="sgender" onclick='onGenderChange(this)' value="female">
                        <label for="sfemale">Female</label>&nbsp
                      <input type="radio" id="sothers" name="sgender" onclick='onGenderChange(this)' value="others">
                      <label for="sothers">Others</label>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="sblood-group">Blood Group</label>
                        <select class="form-control" id="sblood-group">
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
                        <label for="srole">Role</label>
                        <select class="form-control" id="srole">
                          <option>Administrator</option>
                          <option>Doctor</option>
                          <option>Inventory Manager</option>
                          <option>Manager</option>
                        </select>
                      </div>

                      <div class="form-group">
                    <label for="ssalary">Salary</label>
                    <input
                      type="number"
                      class="form-control"
                      id="ssalary"
                      value='0'
                      placeholder="Enter salary"
                      required
                    />
                    <span class='error-span' id="salary-error" style="color:'red'"></span>
                  </div>



                  <div class="form-group">
                    <label for="spassword">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="spassword"
                      placeholder="Enter the Password"
                      required
                    />
                    <span class='error-span' id="spassword-error" style="color:'red'"></span>
                  </div>

      
                  <div class="form-group">
                  <label for="bcheckPassword">Re-enter Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="scheckPassword"
                    placeholder="Re-enter the password"
                    required
                  />
                  <span class='error-span' id="srepassword-error" style="color:'red'"></span>
                </div>

                <div class="form-group">
                    <label for="sphoto">Photo (Only .jpg files)</label>
                    <input type="file" class="form-control-file" id="sphoto" accept=".jpg">
                    <span class='error-span' id="sphoto-error" style="color:'red'"></span>
                  </div>
           
               
                </div>
                <div id="submitButton">
                    <button type="button" id="staffRegistration" class="btn btn-danger" onclick='onStaffSubmit()' data-toggle="modal" data-target="#exampleModalLong">Submit</button>
                    <button type="clear" id="sclear" class="btn btn-primary" onclick="onClear()">Clear</button>
                </div>
               
              </form>

              <!-- Modal -->
<!--<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
  </body>
</html>
