<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include "links.php"; ?>

        <title>CHBS | Admin | Bookings</title>

    </head>
    <body>
        <?php include "header.php";?>

        <div class="container-fluid main">
            <div class="row">
                <div class="col-md-2 col-sm-12 nav1">
                        <?php include "navbar.php"; ?>
                </div>
                <div class="col-md-10 col-sm-12">
                    <div class="row">
                        <div class="title-head">
                            <h1>Booking Details</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-10 offset-md-1">
                            <div class="download">&nbsp; <br></div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ROOM INFO.</th>
                                        <th>Customer INFO.</th>
                                        <th>DATE & TIME</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                        $sql = "SELECT *, bookings.id as bid, bookings.name as bname FROM bookings LEFT JOIN rooms ON bookings.room_id = rooms.id ORDER BY bookings.id";
                                        $result = mysqli_query($con, $sql);
                                        while($data = mysqli_fetch_array($result)){
                                        
                                    ?>
                                    <tr>
                                       <td><?php echo $data['bid']; ?></td>
                                       <td><strong><?php echo $data['name']; ?> </strong><br>
                                            <strong>Price : </strong> <?php echo $data['price']; ?>/-<br>
                                            <strong>Details : </strong><?php echo $data['info']; ?>
                                        </td>
                                       <td><strong><?php echo $data['bname']; ?> </strong><br>
                                            <?php echo $data['email']; ?>/-<br>
                                            <?php echo $data['mobile']; ?> <br>
                                            <strong>Token : </strong><?php echo $data['uniq_id']; ?>
                                        </td>
                                       <td><strong>Date: </strong><?php echo $data['rb_date']; ?> <br>
                                            <strong>Time: </strong><?php if($data['rb_time'] == 't1'){echo '06:00 AM to 03:00 PM';}else{ echo '04:00 PM to 12:00 PM';}; ?>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>ROOM INFO.</th>
                                        <th>Customer INFO.</th>
                                        <th>DATE & TIME</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
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
        <script>
            $(document).ready(function(){
                $('#example').DataTable();

                var $form = $(this);
                $('#form').validate({
                    rules:{
                        category:{
                            required: true
                        }
                    },
                    messages:{
                        category: 'Please enter product category'                    
                    },
                    submitHandler: function(form){
                        
                        $.ajax({
                            type: "POST",
                            url: "categoryajax.php",
                            data: $(form).serialize(),
                            //dataType: "json",
                            //encode: true,
                            success: function(data){
                                console.log(data);
                                $('#success_message').fadeIn().html(data);
                                setTimeout(function() {
                                    $('#success_message').fadeOut("slow");
                                }, 2000 );
                            }
                        });
                      
                        $("form").trigger("reset");
                        
                    }
                    
                });

            });
        </script>
        </body>
    </html>