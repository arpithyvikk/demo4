<?php 
include ('dbconfig.php');

  
            
            $id = $_REQUEST['id'];
            $date = $_REQUEST['date'];
            // $time = $_POST['time'];
        
            // $sql1 = "SELECT * FROM bookings WHERE room_id = '$id' AND rb_date = '$date' AND rb_time = '$time'";
            $sql1 = "SELECT * FROM bookings WHERE room_id = '$id' AND rb_date = '$date'";

            $res1 = mysqli_query($con, $sql1);
            $rows1 = mysqli_num_rows($res1);

            if($rows1 == 1){

                $res = mysqli_fetch_array($res1);
                $time = $res['rb_time'];
                echo $time;
            }
            else if($rows1 == 2){
                
                echo 2;
            }
            else{
                echo 0;
            }

?>