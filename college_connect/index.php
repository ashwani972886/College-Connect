<?php

    include("functions.php");

    if($session_id){

        include("viewsAfterLogin/header.php");

        if ($page == 'prof') {
        
        include("viewsAfterLogin/profile.php");
        
        } else if ($page == 'chat') {
                        
            include("viewsAfterLogin/chatroom.php");
        
        } else if ($page == 'genDis') {
                        
            include("viewsAfterLogin/gen_discussion.php");
        
        } else if ($page == 'profedt') {
                        
            include("viewsAfterLogin/edit_profile.php");
        
        } else if ($page == 'acad') {
                        
            include("viewsAfterLogin/academics.php");
        
        } else if ($page == 'news') {
                        
            include("viewsAfterLogin/newsfeed.php");
        
        } else {
            include("viewsAfterLogin/newsfeed.php");
        }

        
        include("viewsAfterLogin/footer.php");
        include("viewsAfterLogin/footer_acad.php");
        include("viewsAfterLogin/footer_chat.php");
        
    } else {

        include("viewsBeforeLogin/header.php");

        if($page == "re"){
            include("viewsBeforeLogin/reset_pass.php");
        } else {
            include("viewsBeforeLogin/login_register.php");
        }

        include("viewsBeforeLogin/footer.php");

    }

?>