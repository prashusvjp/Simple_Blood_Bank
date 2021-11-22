function onLoad(){
    // if(document.cookie){
    //     document.getElementsByClassName('content').innerHTML = `
    //     <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    //         <a class="navbar-brand" href="index.html"><img src="../res/favicon.ico" style="width: 30px; height:30px;"/></a>
    //         <!-- Links -->
    //         <ul class="navbar-nav">
    //             <li class="nav-item active" onclick="onNavbarClick(this)">
    //             <a class="nav-link" >Home</a>
    //           </li>
    //           <li class="nav-item">
    //             <a class="nav-link" href="about.html">About</a>
    //           </li>
    //         </ul> 
    //     </nav>
    //     <iframe src='user_home.html' style='width:100%; height: 100vh;'></iframe>`
    // }else{
        document.getElementById('content').innerHTML = `
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <a class="navbar-brand" href="index.html"><img src="../res/favicon.ico" style="width: 30px; height:30px;"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
       
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stock
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_stock.html">Add Stock</a>
          <a class="dropdown-item" href="update_stock.html">Update Stock</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Staff
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_staff.html">Add Staff</a>
          <a class="dropdown-item" href="staff_list.html">Update Staff</a>
           <a class="dropdown-item" href="staff_profile.html">Staff Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doner
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add_doner.html">Add Doner</a>
          <a class="dropdown-item" href="update_doner.html">Update Doner</a>
      </li>
    </ul>
  </div>
</nav>
          <iframe id="frame" src='login.html' style='width:100%; height:95%'></iframe>`    
    // }
}

function onNavbarClick(event){
}