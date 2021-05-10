<?php

    session_start();

    $page = isset($_GET['p']) ? $_GET['p'] : '';
    $function = isset($_GET['function']) ? $_GET['function'] : '';
    $session_admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : '';


    $link = mysqli_connect("localhost", "root", "", "cc");

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }
    
    if ($function == "logout_admin") {
        
        session_unset();
        header("Location: http://localhost/college_connect/admin");
        exit();
        
    }
    

?>
<?php
// function asd($array, $id){

// $link = mysqli_connect("localhost", "root", "", "cc");


// // echo $array[3];

// // $array = array($a,$b,$c);
// $asdf = array("roll_no","username","first_name");
// $as = "";
// $abc = "";
// $count = 0;
// while($count <= 2){
//     if($array[$count] != ""){
//         $as = $array[$count];
//         $abc = $asdf[$count];
//         break;
//     } else {
//         $count++;
//     }

// }


// // echo $as." ".$abc;
// $query = "SELECT * FROM `users` WHERE $abc = '".mysqli_real_escape_string($link, $as)."' LIMIT 1";
// mysqli_query($link, $query);

// $result = mysqli_query($link, $query);

// $admin = mysqli_fetch_assoc($result);

//     if($admin != "" && $admin['id'] == $id){
//         echo $id;
//         // echo $admin['id'];
//         $array[$count] = "";
        
//         // $array[3] = $admin['id'];
//         // print_r($array);
//          asd($array, $admin['id']);
//     }

// // echo $count;
//     //asd("","anoop123");


// }

// $val = array("","anoop123","");
// if($val[0] !=""){
//     $query1 = "SELECT id FROM `users` WHERE `roll_no` = '".mysqli_real_escape_string($link, $val[0])."' LIMIT 1"; 
// } else if($val[1] !=""){
//     $query1 = "SELECT id FROM `users` WHERE `username` = '".mysqli_real_escape_string($link, $val[1])."' LIMIT 1"; 
// } else if($val[2] !=""){
//     $query1 = "SELECT id FROM `users` WHERE `first_name` = '".mysqli_real_escape_string($link, $val[2])."' LIMIT 1"; 
// }

// mysqli_query($link, $query1);

// $result1 = mysqli_query($link, $query1);
// $id = mysqli_fetch_assoc($result1);
// // echo $id['id'];
// asd($val, $id['id']);
?>