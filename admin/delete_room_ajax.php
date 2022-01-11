<?php 


include('../dbconfig.php');
$errors = [];
$data = [];

if (empty($_GET['id'])) {
    $errors['id'] = 'Room not found.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    

    $id = $_GET['id'];
    $sql1 = "SELECT img FROM rooms WHERE id = '$id'";
    $result1 = mysqli_query($con, $sql1);
    $data = mysqli_fetch_array($result1);
    $img = $data['img'];
    if($img == ''){
        echo "Image Name";
    }
    else{
        $u = unlink("../assets/images/$img");
        
        if($u){
            $sql2 = "DELETE FROM `rooms` WHERE `rooms`.`id` = '$id'";
            $result2 = mysqli_query($con, $sql2);
            if($result2)
            {
                echo "YES";
            } else {
            echo "NO";
            }
        }
        else{
            echo "Unlink";
        }
        
    }
}

?>