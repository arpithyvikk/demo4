<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include "links.php"; ?>

    <title>CHBS | Admin | Home</title>
  </head>
  <body>

  <?php include "header.php"; ?>

    <div class="container-fluid main">
        <div class="row">
          <div class="col-md-2 col-sm-12 nav1">
                <?php include "navbar.php"; ?>
          </div>
          <div class="col-md-10 col-sm-12">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <h1 class="main-head">Rooms</h1>
                <center><hr style="max-width:200px;"></center>
                <h2 class="main-head">
                <?php
                  $result = mysqli_query($con, "SELECT * FROM rooms");
                  $rows = mysqli_num_rows($result);
                  if($rows > 10){
                    echo $rows;
                  }
                  else {
                    echo '0'.$rows;
                  }
                ?>
                </h2>
              </div>
              <div class="col-md-6 col-sm-12">
                <h1 class="main-head">Booking</h1>
                <center><hr style="max-width:200px;"></center>
                <h2 class="main-head">
                <?php
                  $result = mysqli_query($con, "SELECT * FROM bookings");
                  $rows = mysqli_num_rows($result);
                  if($rows > 10){
                    echo $rows;
                  }
                  else {
                    echo '0'.$rows;
                  }
                ?>
                </h2>
              </div>
            </div>
          </div>
        </div>
    </div>

    <?php include "../footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  
    </body>
</html>