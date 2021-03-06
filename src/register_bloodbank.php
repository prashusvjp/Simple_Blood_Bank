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
    <link rel="stylesheet" href="./stylesheets/register_bloodbank.css">
    <script type="text/javascript" src="./JS/validation.js"></script>
    <script type="text/javascript" src="./JS/index.js"></script>
  </head>


  <body>
    <div id="content">
        <div id="mainRegisterCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h3>Register</h3>
            </div>
            <div class="card-body text-danger">
              <form>
                <div class="form-group">
                  <label for="bname">Blood Bank Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="bname"
                    placeholder="Enter valid name"
                    required
                  />
                  <span class='error-span' id="bname-error" style="color:'red'"></span>
                </div>

                    <div class="form-group">
                        <label for="bemail">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="bemail"
                          placeholder="Enter valid email"
                          required
                        />
                        <span class='error-span' id="bemail-error" style="color:'red'"></span>
                        <!-- <small id="emailHelp" class="form-text text-muted"
                    >Your personal details are secure with us.</small> -->
                    </div>
                 

                  <div class="form-group">
                    <label for="bphone">Phone Number</label>
                    <input
                      type="tel"
                      class="form-control"
                      id="bphone"
                      placeholder="Enter valid phone number"
                      required
                    />
                    <span class='error-span' id="bphone-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="baddress">Address</label>
                    <input
                      type="textarea"
                      class="form-control"
                      id="baddress"
                      placeholder="Enter Address"
                      required
                    />
                    <span class='error-span' id="baddress-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="bstartDate">Start Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="bstartDate"
                      placeholder="Enter the start date"
                      required
                    />
                    <span class='error-span' id="sdate-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="bpassword">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="bpassword"
                      placeholder="Enter the Password"
                      required
                    />
                    <span class='error-span' id="bpassword-error" style="color:'red'"></span>
                  </div>

      
                  <div class="form-group">
                  <label for="checkPassword">Re-enter Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="bcheckPassword"
                    placeholder="Re-enter the password"
                    required
                  />
                  <span class='error-span' id="brepassword-error" style="color:'red'"></span>
                </div>
               
                </div>
                <div id="submitButton">
                    <button type="button" id="bregistration" class="btn btn-danger" onclick="onRegisterSubmit()">Submit</button>
                    <button type="clear" id="bclear" class="btn btn-primary" onclick="onClear()">Clear</button>
                </div>
                <div id="blogin">
                Already have an account? <a href="login.php">Login here</a>
              </div>
              </form>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
  </body>
</html>
