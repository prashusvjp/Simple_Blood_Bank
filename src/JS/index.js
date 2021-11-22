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
        <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
            <a class="navbar-brand" href="index.html"><img src="../res/favicon.ico" style="width: 30px; height:30px;"/></a>
            <!-- Links -->
            <ul class="navbar-nav ">
                <li class="nav-item active" onclick="onNavbarClick(this)">
                <a class="nav-link">Home</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="add_stock.html" >Add Stocks</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="add_staff.html" >Add Staff</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="add_doner.html" >About</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="bloodbank_register.html" >Register</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="staff_profile.html" >Template</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="update_stock.html" >Stock</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="staff_list.html" >Staff</a>
              </li>
              <li class="nav-item" onclick="onNavbarClick(this)">
                <a class="nav-link" href="navbar.html" >Navbar</a>
              </li>
            </ul>
          </nav>
          <iframe id="frame" src='login.html' style='width:100%; height:95%'></iframe>`    
    // }
}

function onNavbarClick(event){
}