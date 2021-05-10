<?php

    include("functions.php");
    
    if ($_GET['action'] == "login_admin"){

        $query = "SELECT * FROM `admin` WHERE `institution_id` = '".mysqli_real_escape_string($link, $_POST['admin_user'])."' LIMIT 1";
            
        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);
            
            if($row['pass'] == $_POST['admin_password']) {
            // if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                
                echo 1;
                
                $_SESSION['admin'] = $row['id'];
                
            } else {
                echo "Enter correct username/password";
            }

    }

    if ($_GET['action'] == "userDetail"){


        $query = "SELECT * FROM `users` WHERE `clg_id` = '".mysqli_real_escape_string($link, $_POST['clg_id'])."' LIMIT 1";
            
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {

            echo "Not Found";
        }

    }
    
    if ($_GET['action'] == "queriDetail"){

        $query = "SELECT * FROM help WHERE id = '".mysqli_real_escape_string($link, $_POST['id'])."' LIMIT 1";
            
        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);

    }

?>