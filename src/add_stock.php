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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./stylesheets/add_stock.css">
    <script type="text/javascript" src='./JS/validation.js'></script>
    <script type="text/javascript" src='./JS/stock.js'></script>
    
  </head>


  <body onload="onLoad()">

  <?php include_once("./headers/stocknavbar.php"); ?>
    <div id="content">
        <div id="stockMainCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h4>Register New Stock</h4>
            </div>
            <div class="card-body text-danger">
              <form>

              <div class="form-group">
                      <label for="doner_id">Stock ID</label>
                      <input
                        type="text"
                        class="form-control"
                        id="doner_id"
                        placeholder="Enter the doner id"
                      />
                      <span class='error-span' id="did-error" style="color:'red'"></span><br>
                      <button type="button" id="search" class="btn btn-info" onclick="getBloodGroup()">Search</button>
                      </div>

                    <div class="form-group">
                      <label for="dname">Doner Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="dname"
                        placeholder="Doner Name"
                        readonly
                      />
                      <span class='error-span' id="dname-error" style="color:'red'"></span>
                      </div>

                  <div class="form-group">
                    <label for="doner-dob">Arrival Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="arrival_date"
                      placeholder="Enter the arrival date"
                    />
                    <span class='error-span' id="adate-error" style="color:'red'"></span>
                    </div>

                    
                      <div class="form-group">
                        <label for="dblood-group">Blood Group</label>
                        <input type="text" id="dblood-group" name="dblood-group" class="form-control" value="" readonly>
                        <span class='error-span' id="bgroup-error" style="color:'red'"></span>
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
                        <label for="dblood-status">Status</label>
                        <select class="form-control" id="dblood-status">
                          <option>Testing</option>
                          <option>In-stock</option>
                          {% comment %} <option>Experied</option>
                          <option>Sold</option> {% endcomment %}
                        </select>
                      </div>
                </div>
                <div id="submitButton">
                    <button type="button" id="stockRegistration" class="btn btn-danger" onclick="onStockSubmit()">Submit</button>
                    
                    <button type="clear" id="sclear" class="btn btn-primary">Clear</button>
                </div>

                <!-- <a href="./update_stock.html" class="btn btn-primary">Manage</a> -->
                
              </form>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
    <?php include_once("./headers/footer.php"); ?> 
  </body>
</html>
