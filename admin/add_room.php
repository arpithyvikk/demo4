<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <?php  include "links.php";?>

        <title>CHBS | Admin | Add Room</title>
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
                            <h1>Add Rooms</h1>
                        </div>
                    </div>
                    <div class="row">           
                        <div class="col-sm-12 col-md-8 offset-md-2">
                            <form class="row g-3 needs-validation" name="form" id="form" action="add_room_con.php" enctype="multipart/form-data" method="POST">
                                
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Room Image</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="inputGroupPrepend" >
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Room Price</label>
                                    <input type="number" class="form-control" id="price" name="price" aria-describedby="inputGroupPrepend" >
                                </div>

                                <div class="col-md-10">
                                    <label for="validationCustomUsername" class="form-label">Room Information</label>
                                    <textarea type="text" class="form-control" id="info" name="info" aria-describedby="inputGroupPrepend" ></textarea>
                                </div>
                                
                                <div class="col-12">
                                <input class="btn btn-info" id="submit" name="submit" type="submit" value="Submit" />
                                <div id="error_message" class="ajax_response" style="float:right"></div>
                                <div id="success_message" class="ajax_response" style="float:right"></div>
                                </div>
                            </form>
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
                var $form = $(this);
                $('#form').validate({
                    rules:{
                        img:{
                            required: true,
                        },
                        name:{
                            required: true
                        },
                        price:{
                            required: true,
                            number:true
                        },
                        info:{
                            required: true
                        }
                    },
                    messages:{
                        img: 'Please upload room image',
                        name: 'Please enter room name',
                        price: {
                            required: 'Please enter room price',
                            number: 'Room price is must be in number'
                        },
                        info: 'Please enter some room information'
                    },
                    submitHandler: function(form){
                        form.submit();

                    }
                    
                });

            });
        </script>
        </body>
    </html>