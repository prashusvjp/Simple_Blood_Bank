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
    <!--<script type="text/javascript" src="./JS/index.js"></script>-->
  </head>

    <body onload="onLoad()">
        <?php include_once("./headers/homenavbar.php"); ?> 
        <div style="padding:50px">
        <table style="width:100%;border-spacing: 50px;">
            <tr>
            <td>
            <div class='card' style="width:80%;margin-left:auto;margin-right:auto;">
            <div class="card-body">
                <h5 class="card-title">Inventory Status</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">View Inventory</a>
            </div>
            </div>
            </td>

            <td>
            <div class='card' style="width:80%;margin-left:auto;margin-right:auto">
            <div class="card-body">
                <h5 class="card-title">Pending requests</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Requests</a>
            </div>
            </div>
            </td>
            </tr>
        </table>
        <div>
    </body>
</html>