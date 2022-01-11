<?php 
include ('dbconfig.php');

    if(isset($_POST['submit'])){
        if(empty($_REQUEST['id'])){
            echo "<script>
            alert('Room not found please try again')
            window.location.href = 'index.php;
            </script>";
        }
        else{
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $desc = mysqli_real_escape_string($con, $_POST['desc']);
            $date = $_POST['date'];
            $time = $_POST['time'];

            $number = mt_rand();
            // echo $number;
            $result = mysqli_query($con, "SELECT * FROM bookings WHERE uniq_id = '$number'");
            $rows = mysqli_num_rows($result);

            if($rows > 0){
                echo "<script>
                    alert('Something is wrong please try again')
                    window.location.href = 'book.php?id='.$id;
                    </script>";
            }
            else {
                $sql1 = "SELECT * FROM bookings WHERE room_id = '$id' AND rb_date = '$date' AND rb_time = '$time'";
                $res1 = mysqli_query($con, $sql1);
                $rows1 = mysqli_num_rows($res1);
                
                if($rows1 > 0){
                    echo "<script>
                        alert('Room is already booked');
                        window.location.href = 'book.php?id=$id';
                        </script>";
                }
                else{
                    $sql2 = "INSERT INTO bookings(name,email,mobile,room_id,rb_date,rb_time,uniq_id,description) VALUES('$name','$email','$mobile','$id','$date','$time','$number','$desc')";
                    $result2 = mysqli_query($con, $sql2);
                
                    if($result2)
                    {
                        echo "<script>
                        window.location.href = 'booked.php?tokken=$number';
                        </script>";
                    }
                    else {
                        echo "<script>
                        alert('Room not inserted please try again')
                        window.location.href = 'index.php'
                        </script>";
                    }
                }
            }
        }
    }
    else
    {
        echo "<script>
                alert('Redirection error')
                window.location.href = 'index.php'
                </script>";
    }

?>