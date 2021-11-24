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
    <script type="text/javascript" src="./JS/validation.js"></script>
    <script type="text/javascript" src="./JS/home.js"></script>
  </head>

    <body onload="onLoad()">
        <?php include_once("./headers/homenavbar.php"); ?> 
        <div style="padding:30px">
        <table style="width:100%;border-spacing: 50px;">
            <tr>
            <td>
            <div class='card' style="width:90%;margin-left:auto;margin-right:auto;">
            <div class="card-body">
                <h5 class="card-title">Inventory Status</h5>
                <table id='inventory_table' style="width:100%;margin-left:auto;margin-right:auto;backgroud-color:#ff8080;">
                  <tr>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">A+</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>

                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">A-</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">B+</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>

                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">B-</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">AB+</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">AB-</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">O+</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">O-</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                  </tr>
                </table>
                <br><br>
                <a href="./update_stock.php" class="btn btn-primary">View Inventory</a>
            </div>
            </div>
            </td>

            <td>
            <div class='card' style="width:90%;margin-left:auto;margin-right:auto">
            <div class="card-body">
                <h5 class="card-title">Requests Status</h5>
                <table id="request_status" style="width:100%;margin-left:auto;margin-right:auto;">
                  <tr>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">A+</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>

                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">A-</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">B+</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>

                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h6 class="card-title">B-</h6>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">AB+</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">AB-</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">O+</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                      <td>
                      <div class='card bg-light' style="width:100%;margin-left:auto;margin-right:auto">
                      <div class="card-body">
                          <h5 class="card-title">O-</h5>
                          <p class="card-text"><table><tr><td>RBC</td><td>0</td></tr><tr><td>WBC</td><td>0</td></tr><tr><td>Plasma</td><td>0</td></tr><tr><td>Platelets</td><td>0</td></tr></table></p>
                      </div>
                      </div>
                      </td>
                  </tr>
                </table>
                <br><br>
                <a href="#" class="btn btn-primary">Requests</a>
            </div>
            </div>
            </td>
            </tr>
            <tr>
              <td colspan='2'>
              <div class='card' style="width:95%;margin-left:auto;margin-right:auto;margin-top:30px">
                <div class="card-body">
                <h5 class="card-title">Servicable requests</h5>
                  <table id='request_table' style="width:100%">
                  <thead class="table-danger">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Doner ID</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Type</th>
                        <th scope="col">Arrival Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                      </thead>
                  </table>
            </div>
            </div>
              </td>
            </tr>
        </table>
        <div>
    </body>
</html>