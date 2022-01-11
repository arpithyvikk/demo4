<?php
   
 require_once '../dbconfig.php';
 if (isset($_REQUEST['id'])) {
   
    $id = $_GET['id'];

    $sql = "SELECT * FROM rooms WHERE id = '$id'";
    $res = mysqli_query($con,$sql);
    
    while($data = mysqli_fetch_array($res)){
        $id = $data['id'];
        $name = $data['name'];
        $img = $data['img'];
        $price = $data['price'];
        $info = $data['info'];

    }

    // For Update User Details 

    if($_REQUEST['type'] == 'update')
    {
?>
        
        <form class="row g-3 needs-validation" name="form1" id="form1" action="" method="POST">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Room Image</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" name="name" aria-describedby="inputGroupPrepend" >
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Room Price</label>
                                    <input type="number" class="form-control" id="price" value="<?php echo $price; ?>" name="price" aria-describedby="inputGroupPrepend" >
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustomUsername" class="form-label">Room Information</label>
                                    <textarea type="text" class="form-control" id="info" name="info" aria-describedby="inputGroupPrepend" ><?php echo $info; ?></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <input class="btn btn-info" id="submit" name="submit" type="submit" value="Submit" />
                                    <div id="error_message" class="ajax_response" style="float:right"></div>
                                    <div id="success_message" class="ajax_response" style="float:right"></div>
                                </div>
        </form>
  
<?php }  
elseif($_REQUEST['type'] == 'viewimg')
{ ?>
<div class="row">
<div class="col-md-12">
    <img src="../assets/images/<?php echo $img; ?>" alt="" style="margin: 20px 20px 20px 0px; width:100%;">
</div>
</div>
<?php }
else{ echo "REDIRECTION ERROR"; } }?>