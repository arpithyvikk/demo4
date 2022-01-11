<?php

include('../dbconfig.php');
$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Room name is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    
  
    $name = $_POST['name'];
   
    $sql2 = "INSERT INTO rooms(name) VALUES('$name')";
    $result2 = mysqli_query($con, $sql2);

    if($result2)
    {
        echo "Room Added..";
    }
    else {
        // $data['success'] = false;
        // $data['errors'] = $errors;
        echo "Please try again..";
    }
}
die();
?>