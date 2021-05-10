<?php

    session_start();

    $page = isset($_GET['p']) ? $_GET['p'] : '';
    $function = isset($_GET['function']) ? $_GET['function'] : '';
    $session_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

    // $link = mysqli_connect("localhost", "root", "", "CC");

    $link = mysqli_connect("localhost", "root", "", "cc");

    if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }
    
    if ($function == "logout") {
        
        session_unset();
        header("Location: http://localhost/college_connect/");
        exit();
        
    }

    function get_timeago( $time ) {

        $estimate_time = time() - $time;

        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }

        $condition = array(
                    12 * 30 * 24 * 60 * 60  =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }


    function checkpost(){
            
        $link = mysqli_connect("localhost", "root", "", "CC");

        $id_post = "P-". rand(100000,1000000);
        $check_post = "SELECT * FROM post_gn WHERE post_id = '".mysqli_real_escape_string($link, $id_post)."' LIMIT 1";
        $result = mysqli_query($link, $check_post);
        $post = mysqli_fetch_assoc($result);

        if($post){

            checkpost();

        } else{

           return $id_post;

        }

    }

    // Compress image
    function compressImage($source, $destination, $quality) {
    
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

    }
    

?>