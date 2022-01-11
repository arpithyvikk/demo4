<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "links.php"; ?>
    <title>CHBS | Home</title>
  </head>
  <body>
    <?php include "header.php"; ?>
    <div class="container-fluid main">
      <div class="row">
          <div class="col-md-12">
              <div class="title-head">
                <h1>Rooms & Hall</h1>
              </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $sql = "SELECT * FROM rooms";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
          ?>
            <div class="col-md-4">
              <div class="card">
                <img src="assets/images/<?php echo $row['img']; ?>" class="card-img-top pro-img" alt="product image">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['name']; ?></h5>
                  <p class="card-text"><strong></strong><?php echo $row['info']; ?></p>

                  <a href="book.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Book Now</a>
               
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <br><br>
    </div>

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