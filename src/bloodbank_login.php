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
    <script type="text/javascript" src='./JS/validation.js'></script>
  </head>


  <body>
    <div id="content">
        <div id="mainLoginCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h3>Login</h3>
            </div>
            <div class="card-body text-danger">
              <form>

                <div class="form-group">

                    <div class="form-group">
                        <label for="bemail">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          id="bemail"
                          placeholder="Enter valid email"
                        />
                        <small id="emailHelp" class="form-text text-muted"
                    >We'll never share your email with anyone else.</small>
                    </div>
                    <span class='error-span' id="bemail-error" style="color:'red'"></span>
                  </div>

                  <div class="form-group">
                    <label for="bpassword">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="bpassword"
                      placeholder="Enter the Password"
                    />
                    <span class='error-span' id="bpassword-error" style="color:'red'"></span>
                  </div>

                  <div id="otp" hidden>

                    <label for="loginPassword">OTP</label>
                    <input
                      type="text"
                      class="form-control"
                      id="loginPassword"
                      placeholder="Enter the OTP"
                    />
                    <span class='error-span' id="otp-error" style="color:'red'"></span>
                  </div>

               
                </div>
                <div id="submitButton">
                    <button type="button" id="bregistration" class="btn btn-danger" onclick="onLoginSubmit()">Login</button>
                    <button type="clear" id="bclear" class="btn btn-primary">Clear</button>
                </div>
                <div id="blogin">
                Do not have an account? <a href="bloodbank_register.html"> Register here</a>
              </div>
              </form>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
  </body>
</html>

