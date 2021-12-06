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
    <script src="./JS/transactions.js"></script>
  </head>


  <body onload='onLoad()'>

  <?php include_once("./headers/staffnavbar.php"); ?>
  <img src='../res/nodata.png' id='nodata' class='nodataimg' style="display: none;
    margin-left: auto;
    margin-top:100px;
    margin-right:auto;
    width: 50%;"></img>
    <div class="Maincontainer">
		<table class="table table-bordered" id="transaction_table"></table>
	</div>
  </body>
</html>
