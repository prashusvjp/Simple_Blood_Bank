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

    <link rel="stylesheet" href="./stylesheets/staff_profile.css">
    <script type="text/javascript" src='./JS/validation.js'></script>
  </head>


  <body>
    
  <?php include_once("./headers/staffnavbar.php"); ?>
    <div id="content">
        <div id="mainTemplateCard">
        <div class="card border-danger mb-3">
            <div class="card-header">
              <h3>Profile</h3>
            </div>
            <div class="card-body text-danger">

                <div class="mainProfilediv">
                    <div class="imageDiv">
                        <img src="../res/profile_image.png" class="rounded-circle" alt="Cinque Terre" width="170" height="170">
                    </div>
                    <div class="contentDiv">
                        StaffID : <br>
                        Name:  <br>
                        Email: <br>
                        Role : <br>
                    </div>


                </div>
              
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
          </div>
        </div>
      
    </div>
  </body>
</html>