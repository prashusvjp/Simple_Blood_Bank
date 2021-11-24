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
    <script src="./JS/request.js"></script>
    <script src="./JS/validation.js"></script>
  </head>


  <body onload="onLoad()">
  <?php include_once("./headers/stocknavbar.php"); ?>
    <div id="content">
        <div id="donarMainCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h4>Make Request</h4>
            </div>
            <div class="card-body text-danger">
              <form>

                      <div class="form-group">
                        <label for="rblood-group">Blood Group</label>
                        <select class="form-control" id="rblood-group" required>
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
                        <label for="rblood-category">Blood Category</label>
                        <select class="form-control" id="rblood-category">
                          <option>RBC</option>
                          <option>WBC</option>
                          <option>Platelets</option>
                          <option>Plasma</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="quantity">Quantity</label>
                      <input
                        type="number"
                        class="form-control"
                        id="quantity"
                        value='1'
                        placeholder="1"
                      />
                      <span class='error-span' id="quantity-error" style="color:'red'"></span>
                      </div>

                      <div class="form-group">
                      <label for="rdate">Request Date</label>
                      <input
                        type="date"
                        class="form-control"
                        id="rdate"
                        value="<?php echo date("Y-d-m"); ?>"
                      />
                      <span class='error-span' id="rdate-error" style="color:'red'"></span>
                      </div>

      
               
                </div>
                <div id="submitButton">
                    <button type="button" id="request" class="btn btn-danger" onclick='onRequestSubmit()'>Submit</button>
                    <button type="clear" id="bclear" class="btn btn-primary">Clear</button>
                </div>
                
              </form>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
    <?php include_once("./footer.php"); ?> 
  </body>
</html>
