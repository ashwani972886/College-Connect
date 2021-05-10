<?php

    include("functions.php");

    

    if($session_admin){

        include("header.php");

        if($page == "dash"){
            
            include("dashboard.php");

        } else if($page == "gen_id"){
            
            include("id_generator.php");

        } else if($page == "alot_roll"){
            
            include("roll_allotment.php");

        } else if($page == "user_detail"){
            
            include("user_details.php");

        } else {
            include("dashboard.php");
        }

        include("footer.php");
    } else {

        include("admin_login.php");
    
    }
    
    



?>