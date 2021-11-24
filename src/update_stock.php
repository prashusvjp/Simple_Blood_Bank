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

    <link rel="stylesheet" href="./stylesheets/update_stock.css">
    <script src="register_bloodbank.js"></script>
  </head>


  <body onload="onLoad()">

  <?php include_once("./headers/stocknavbar.php"); ?>

       <div class="Maincontainer">
		<table class="table">
  <thead class="table-danger">
    <tr>
      <th scope="col">#</th>
      <th scope="col">StockID</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="get_stock">
		       <tr>
		        <td>1</td>
		        <td>1234</td>
		        <td>sold</td></b>
		        <td>
              	<a href="#" ><img src="../res/edit.png"  width="30" height="30">  </a>
		        	  <a href="#" ><img src="../res/delete.png"  width="30" height="30"></a>
		        	
		        </td>
		      </tr>
      
  </tbody>
</table>
	</div>
  </body>
</html>


