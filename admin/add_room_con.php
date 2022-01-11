<?php 
include ('../dbconfig.php');

if (isset($_POST['submit'])){
    
    $product_img = $_FILES["img"]["name"];
    $product_img_temp = $_FILES["img"]["tmp_name"];
    $folder = "../assets/images/".$product_img;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $info = mysqli_real_escape_string($con, $_POST['info']);
    
    // $number = rand(10,100);

    $sql2 = "INSERT INTO rooms(img,name,info,price) VALUES('$product_img','$name','$info','$price')";
    $result2 = mysqli_query($con, $sql2);

    if($result2 && move_uploaded_file($product_img_temp, $folder))
    {
        echo "<script>
        window.location.href = 'add_room.php'
        </script>";
    }
    else {
        echo "<script>
        alert('Room not inserted please try again')
        window.location.href = 'add_room.php'
        </script>";
    }
}
else
{
	echo "<script>
            alert('Redirection error')
            window.location.href = 'add_room.php'
            </script>";
	    exit();
}

?>