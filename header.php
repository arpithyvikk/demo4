<?php 

include "dbconfig.php";
session_start();
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img itemprop="image" class="mobile" src="assets/images/logo.png" alt="Logo" style="height: 50px!important"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" data-toggle="modal" data-target="#myModal" >Check Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inquery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Contact us</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-info" type="submit">Search</button>
          </form>
          
        </div>
        </div>
</nav>
</header>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h2>Booking Check</h2>
          <button type="button" class="close" data-dismiss="modal"> &times;</button>
        </div>
        <div class="modal-body">
        <form class="row g-3 needs-validation" action="booked.php" method="POST">
                <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Tokken</label>
                    <input type="text" class="form-control" id="tokken" name="tokken" required title="Type your tokken code here.." placeholder="ex: 021542021">
                </div>
              
                <div class="col-12">
                <input class="btn btn-success " id="submit" name="submit" type="submit" value="Submit" />
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
