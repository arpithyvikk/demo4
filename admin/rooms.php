<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <?php include 'links.php'; ?>

        <title>CHBS | Admin | Rooms</title>
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
                            <h1>Rooms Details</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-10 offset-md-1">
                            <div class="download">&nbsp; <br></div>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ROOM IMAGES</th>
                                        <th>ROOM INFO.</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM rooms";
                                        $result = mysqli_query($con, $sql);

                                        while($data = mysqli_fetch_array($result)){
                                                                              
                                        $old_date = $data['created_at'];
                                        $new_date = date("d-m-Y", strtotime($old_date));
                                    ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><a style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $data['id']; ?>" data-type="viewimg" id="viewimg"><img src="../assets/images/<?php echo $data['img'] ?>" id="img" height="60px" width="80px" alt=""></a></td>
                                        <td><strong><?php echo $data['name']; ?> </strong><br>
                                            <strong>Price : </strong> <?php echo $data['price']; ?>/-<br>
                                            <strong>Details : </strong><?php echo $data['info']; ?>
                                        </td>
                                     
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $data['id']; ?>" data-type="update" id="getUser">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button> &nbsp; 
                                            
                                            <button data-id="<?php echo $data['id']; ?>" id="delete" class="btn btn-sm btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>ROOM IMAGES</th>
                                        <th>ROOM INFO.</th>
                                        <th>ACTION</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CHBS Rooms</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="well profile">
                            <div class="col-sm-12">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div id="modal-loader" style="display: none; text-align: center;">
                                    <!-- ajax loader -->
                                        <img src="ajax-loader.gif">
                                    </div>
                                                        
                                    <!-- mysql data will be load here -->                          
                                    <div id="dynamic-content"></div>
                                </div>             
                            </div>            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-dark" data-bs-dismiss="modal">Close</button>
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
                        name:{
                            required: true,
                        }
                    },
                    messages:{
                        category: 'Please enter room name'
                    },
                    submitHandler: function(form){
                        $.ajax({
                            type: "POST",
                            url: "room_ajax.php",
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

                $(document).on('click', '#viewimg', function(e){
  
                    e.preventDefault();
                    var uid = $(this).data('id'); // get id of clicked row
                    var atype = $(this).data('type'); // get id of clicked row

                    $('#dynamic-content').html(''); // leave this div blank
                    $('#modal-loader').show();      // load ajax loader on button click
                    $.ajax({
                        url: 'update_room_ajax.php',
                        type: 'GET',
                        data: 'id='+uid+'&type='+atype,
                        dataType: 'html'
                    })
                    .done(function(data){
                        console.log(data); 
                        $('#dynamic-content').html(''); // blank before load.
                        $('#dynamic-content').html(data); // load here
                        $('#modal-loader').hide(); // hide loader  
                    })
                    .fail(function(){
                        $('#dynamic-content').html('Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                    });
                });

                $(document).on('click', '#getUser', function(e){
  
                e.preventDefault();
                var uid = $(this).data('id'); // get id of clicked row
                var atype = $(this).data('type'); // get id of clicked row

                $('#dynamic-content').html(''); // leave this div blank
                $('#modal-loader').show();      // load ajax loader on button click
                $.ajax({
                    url: 'update_room_ajax.php',
                    type: 'GET',
                    data: 'id='+uid+'&type='+atype,
                    dataType: 'html'
                })
                .done(function(data){
                    console.log(data); 
                    $('#dynamic-content').html(''); // blank before load.
                    $('#dynamic-content').html(data); // load here
                    $('#modal-loader').hide(); // hide loader  
                })
                .fail(function(){
                    $('#dynamic-content').html('Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });
                });

                $(document.body).on('click', '#form1', function(e){
                // Set your validation settings and initialize the validate plugin on the form.
                $(this).validate({
                    rules:{
                        category:{
                            required: true,
                        }
                    },
                    messages:{
                        name: 'Please enter room name',
                    }
                }); 
                });
                $(document).on('click', '#form1', function(e){
                if (jQuery("#form1").valid()) {
                    jQuery.ajax({
                        type: "POST",
                        url: "room_update_con_ajax.php",
                        data: $(form).serialize(),
                        dataType: "json",
                        encode: true,
                    }).done(function (data) {
                    console.log(data);
                    });
                } else {
                    return false;
                }
                });
                
                $(document).on('click','#delete',function(){
                var element = $(this);
                var tr = $(this).closest('tr');  // **add this
                var id = element.data("id");
                var info = 'id=' + id;
                if(confirm("Are you sure you want to delete this room?")){
                    $.ajax({
                        type: "GET",
                        url: "delete_room_ajax.php",
                        data: info,
                        success: function(data){ 
                            if (data == "YES") {
                                tr.fadeOut(1000, function(){ // **add this
                                    $(this).remove();
                                });
                            } else {
                                alert("can't delete the row")
                            }
                        } 
                    });
                }
                return false;
                });
            });
        </script>
        </body>
    </html>