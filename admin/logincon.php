<?php 

session_start();
if(isset($_SESSION['admin'])){
    echo "<script>
            alert('You are already login..')
            window.location.href = 'index.php'
            </script>";
}
else{
    include ('../dbconfig.php');

    if (isset($_POST['name']) && isset($_POST['password'])) {

        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $name = validate($_POST['name']);
        $password = validate($_POST['password']);

        if (empty($name)) {
            echo "<script>
                alert('Username is required please try again')
                window.location.href = 'login.php'
                </script>";
        }else if(empty($password)){
            echo "<script>
                alert('Password is required please try again')
                window.location.href = 'login.php'
                </script>";
        }else{
            // set cokkies
            
            $sql = "SELECT * FROM admins WHERE name='$name' AND password='$password'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['name'] === $name && $row['password'] === $password) {
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin'] = $row['id'];
                    if(!empty($_POST["remember"])) {
                        setcookie ("admin_name",$_POST["name"],time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("admin_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                    } 
                    else {
                        if(isset($_COOKIE["admin_name"]) && isset($_COOKIE['admin_password'])) {
                            setcookie ("admin_name",time()-3600);
                            setcookie ("admin_password",time()-3600);
                        }
                    }
                    header("Location: index.php");
                    exit();
                }else{
                    echo "<script>
                alert('Incorect username or password')
                window.location.href = 'login.php'
                </script>";
                }
            }else{
                echo "<script>
                alert('Incorect username or password')
                window.location.href = 'login.php'
                </script>";
            }
        }
        
    }else{
        header("Location: login.php");
        exit();
    }
}
?>