<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "links.php"; ?>
    <title>CHBS | Booking</title>
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
                <h1>For Booking</h1>
              </div>
          </div>
        </div>
        <div class="row">
          <?php 
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM rooms WHERE id = '$id'";
            $res = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($res)){
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
          <?php } 
            $sql1 = "SELECT * FROM bookings WHERE room_id = '$id'";
            $res1 = mysqli_query($con, $sql1);
            while($row1 = mysqli_fetch_array($res1)){
                 $rb_date = $row1['rb_date'];
                 $rb_time = $row1['rb_time'];
            }
          ?>
          <div class="col-md-6 offset-md-1">
            <form class="row g-3 needs-validation" name="form" id="form" action="book_con.php" method="POST">
                <input type="hidden" name="id" id="id" data-id="<?php echo $id; ?>" value="<?php echo $id; ?>">
                <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend" >
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">E-mail Address</label>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" >
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="inputGroupPrepend" >
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Booking Date</label>
                    <input type="date" class="form-control" id="date" name="date" aria-describedby="inputGroupPrepend" >
                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">Booking Time</label>
                    <select class="form-select" id="time" name="time" title="We have only two slot for time or this hourse is fixed">
                        <option selected disabled>Select your time</option>
                        <option class="t1" value="t1" disabled>06:00 AM to 03:00 PM</option>
                        <option class="t2" value="t2" disabled>04:00 PM to 12:00 PM</option>
                    </select>
                </div>

                <div class="col-md-10">
                    <label for="validationCustomUsername" class="form-label">Other Information </label>
                    <textarea type="text" title="if you share any thing about room or other information so type here.." class="form-control" id="desc" name="desc" aria-describedby="inputGroupPrepend" ></textarea>
                </div>
                <div class="col-12">
                <input class="btn btn-info" id="submit" name="submit" type="submit" value="Submit" />
                <div id="error_message" class="ajax_response" style="float:right"></div>
                <div id="success_message" class="ajax_response" style="float:right"></div>
                </div>
            </form>
          </div>
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
    <script>
            $(document).ready(function(){
                var $form = $(this);
                $('#form').validate({
                    rules:{
                        name:{
                            required: true
                        },
                        email:{
                            required: true,
                            email:true
                        },
                        mobile:{
                            required: true,
                            number: true
                        },
                        date:{
                            required: true
                        },
                        time:{
                            required: true
                        }
                    },
                    messages:{
                        name: 'Please enter your full name',
                        email: {
                            required: 'Please enter your email',
                            email: 'Please enter valid email'
                        },
                        mobile: {
                            required: 'Please enter your mobile number',
                            number: 'Mobile number is must be in number'
                        },
                        date: 'Please select your booking date',
                        time: 'Please select your booking date'
                    },
                    submitHandler: function(form){
                        form.submit();
                    }
                    
                });

                $(document).on('change', '#date', function(e){
                
                    e.preventDefault();
                    var room_id = $('#id').data('id');
                    var rb_date = $(this).val();
                    $.ajax({
                        url: 'booking_ajax.php',
                        type: 'GET',
                        data: 'id='+room_id+'&date='+rb_date,
                        // data: {'id': room_id, 'date': rb_date},

                        dataType: 'html',
                        
                        success: function(response) {
                            console.log(response); 
                            if(response == 2){
                                $(".t1").attr('disabled', true);
                                $(".t2").attr('disabled', true);
                                alert('This Room is Already Booked');
                            }else if(response == 't1'){
                                $(".t1").attr('disabled', true);
                                $(".t2").attr('disabled', false);
                            }else if(response == 't2'){
                                $(".t2").attr('disabled', true);
                                $(".t1").attr('disabled', false);
                            }
                            else{
                                $(".t1").attr('disabled', false);
                                $(".t2").attr('disabled', false);
                            }
                        }
                    })
                });

            });
        </script>
    </body>
</html>