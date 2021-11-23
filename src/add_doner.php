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

    <link rel="stylesheet" href="./stylesheets/add_doner.css">
    <script src="./JS/doner.js"></script>
    <script src="./JS/validation.js"></script>
  </head>


  <body onload="onLoad()">
    <div id="content">
        <div id="donarMainCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h4>Register Doner</h4>
            </div>
            <div class="card-body text-danger">
              <form>
                <div class="form-group">
                  <label for="dname">Doner Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="dname"
                    placeholder="Enter valid name"
                  />
                   <span class='error-span' id="dname-error" style="color:'red'"></span>
                </div>

              

                    <div class="form-group">
                        <label for="demail">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="demail"
                          placeholder="Enter valid email"
                        />
                        <span class='error-span' id="demail-error" style="color:'red'"></span>
                    </div>
                   

                  <div class="form-group">
                    <label for="dphone">Phone Number</label>
                    <input
                      type="tel"
                      class="form-control"
                      id="dphone"
                      placeholder="Enter valid phone number"
                    />
                    <span class='error-span' id="dphone-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="daddress">Address</label>
                    <input
                      type="textarea"
                      class="form-control"
                      id="daddress"
                      placeholder="Enter Address"
                    />
                    <span class='error-span' id="daddress-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="ddob">DOB</label>
                    <input
                      type="date"
                      class="form-control"
                      id="doner-dob"
                      placeholder="Enter the start date"
                    />
                   <span class='error-span' id="dob-error" style="color:'red'"></span>
                    </div>


                      <div class="form-group">
                     <div id="doner-gender">
                      <label  for="gender">
                      Gender :
                      </label>
                      <div id="gender-radio">
                      <input type="radio" id="dmale" name="dgender" value="male" checked>
                        <label for="dmale">Male</label>&nbsp
                        <input type="radio" id="dfemale" name="dgender" value="female">
                        <label for="dfemale">Female</label>&nbsp
                        <input type="radio" id="dothers" name="dgender" value="others">
                      <label for="dothers">Others</label>
                      </div>
                      </div>
                      </div>
                  

                      <div class="form-group">
                        <label for="dblood-group">Blood Group</label>
                        <select class="form-control" id="dblood-group" required>
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
                        <label for="dphoto">Photo (Only .jpg files)</label>
                        <input type="file" class="form-control-file" id="dphoto" accept=".jpg" required>
                        <span class='error-span' id="dphoto-error" style="color:'red'"></span>
                      </div>
               
                </div>
                <div id="submitButton">
                    <button type="button" id="bregistration" class="btn btn-danger" onclick='onDonerSubmit()'>Submit</button>
                    <button type="clear" id="bclear" class="btn btn-primary">Clear</button>
                </div>
                
              </form>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
  </body>
</html>
