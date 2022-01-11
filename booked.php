<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "links.php"; ?>
    <title>CHBS | Bokking Details</title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="container-fluid main">
      <div class="row">
          <div class="col-md-4">
              <div class="title-head">
                <h1>Room Info.</h1>
              </div>
          </div>
          <div class="col-md-8">
              <div class="title-head">
                <h1>Booking Details</h1>
              </div>
          </div>
        </div>
        <div class="row">
          <?php 
              $id = $_REQUEST['tokken'];
              $sql = "SELECT *, bookings.id as bid, bookings.name as bname FROM bookings LEFT JOIN rooms ON bookings.room_id = rooms.id WHERE bookings.uniq_id = '914409915'";
              $result = mysqli_query($con, $sql);
              while($row = mysqli_fetch_array($result)){
          ?>
            <div class="col-md-4">
              <div class="card">                
                  <img src="assets/images/<?php echo $row['img']; ?>" class="card-img-top pro-img" alt="product image">
                  <div class="card-body">
                  <h4 class="card-title"><strong><?php echo $row['name']; ?></strong></h4>
                  <h5 class="card-text"><strong></strong><?php echo $row['info']; ?></h5>
                  <h5 class="card-text"><strong>Price: </strong><?php echo $row['price']; ?>/-</h5>               
                </div>
              </div>
            </div>
        
          <div class="col-md-6 offset-md-1">
              
          <h5 class="card-text"><strong>Tokken: </strong><?php echo $id; ?> <small style="color:red; font-size:10px;">(Please remember (note) this tokken code)</small></h5> 
          <h5><strong>Name: </strong> <?php echo $row['bname']; ?></h5>
          <h5><strong>E-mail: </strong> <?php echo $row['email']; ?></h5>
          <h5><strong>Mobile: </strong> <?php echo $row['mobile']; ?></h5>
          <h5><strong>Date: </strong><?php echo $row['rb_date']; ?></h5>
          <h5><strong>Time: </strong><?php if($row['rb_time'] == 't1'){echo '06:00 AM to 03:00 PM';}else{ echo '04:00 PM to 12:00 PM';}; ?></h5>
          </div>
        </div>
      </div>
      <br><br>
    </div>
    <?php }  ?>

    <?php include "footer.php"; ?>
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