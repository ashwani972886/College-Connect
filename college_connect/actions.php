<?php

    include("functions.php");
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if($session_id){
        
        $query = "SELECT * FROM users WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        $user = mysqli_fetch_assoc($result);
    }

    $error = "";

    if ($_GET['action'] == "validateID"){

        $query = "SELECT * FROM college_id WHERE `clg_id` = '".mysqli_real_escape_string($link, $_POST['valID'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);

        if($row['status'] == "pending"){
            if($row['role'] == "teacher"){
                echo 1;
            } else if($row['role'] == "student"){
                echo 2;
            } else {
                echo 3;
            }
        } else {
            echo 3;
        }       

    }

    if ($_GET['action'] == "checkUsername"){

        $query = "SELECT * FROM users WHERE `username` = '".mysqli_real_escape_string($link, $_POST['userName'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);

        if($row['username'] != ""){
            echo 1;
        }        

    }

    if ($_GET['action'] == "register"){

        if(!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password'])) {
            echo 'Password must contain atleast 8 characters and include at least one upper case letter, one lower case letter, one number, and one special character!';
        }else{
            
            $email = $_POST['userName']."@college-connect.in";
            $query = "INSERT INTO users (`clg_id`, `username`, `email`, `first_name`, `last_name`, `password`, `alter_email`, `gender`, `role`, `stream`)
                        VALUES ('".mysqli_real_escape_string($link, $_POST['clg_id'])."',
                        '". mysqli_real_escape_string($link, $_POST['userName'])."',
                        '". mysqli_real_escape_string($link, $email)."',
                        '". mysqli_real_escape_string($link, $_POST['firstName'])."', 
                        '". mysqli_real_escape_string($link, $_POST['lastName'])."',
                        '". mysqli_real_escape_string($link, $_POST['password'])."', 
                        '". mysqli_real_escape_string($link, $_POST['alterEmail'])."',
                        '". mysqli_real_escape_string($link, $_POST['gender'])."',
                        '". mysqli_real_escape_string($link, $_POST['role'])."', 
                        '". mysqli_real_escape_string($link, $_POST['stream'])."')";
                

            if(mysqli_query($link, $query)){
                $_SESSION['id'] = mysqli_insert_id($link);
                        
                $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                
                if(mysqli_query($link, $query)){
                    $active = "active";
                    $query = "UPDATE college_id SET `status` = '".mysqli_real_escape_string($link, $active)."'
                                                    WHERE `clg_id` = '".mysqli_real_escape_string($link, $_POST['valID'])."' LIMIT 1";
                    mysqli_query($link, $query);
                    echo 1;

                }
                
            }
        }      

    }

    if ($_GET['action'] == "login"){

        $query = "SELECT * FROM users WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
            
        $result = mysqli_query($link, $query);
        
        $row = mysqli_fetch_assoc($result);
            
            if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                
                echo 1;
                
                $_SESSION['id'] = $row['id'];
                
            } else {
                echo "Enter correct username/password";
            }

    }
    
    if ($_GET['action'] == "forgot"){

        $query = "SELECT alter_email FROM users WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
            
        $result = mysqli_query($link, $query);
        
        $row = mysqli_fetch_assoc($result);

        if($row['alter_email'] == ""){
            echo 1;

        } else {
            // echo $row['alter_email'];

            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.in';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'admin@college-connect.in';                     //SMTP username
            $mail->Password   = '@dmin@CC16';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('admin@college-connect.in', 'College-Connect');
            $mail->addAddress($row['alter_email']);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Passwod';
            $mail->Body    = '<p style="font-size: 20px;"> Click the below link to reset your password </p> <br> 
                                <a href="http://localhost/college_connect/?p=re&u='.$_POST['username'].'">
                                    <button style="background: #1870fd; border-radius: 5px; padding: 10px; color: #FFF;">Reset Password</button></a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            

        }
        
    }

    if ($_GET['action'] == "updatePassword"){

       
        if(!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['newPassword'])) {
            echo 'Password must contain atleast 8 characters and include at least one upper case letter, one lower case letter, one number, and one special character!';
        } else{
        
            $query = "SELECT * FROM users WHERE `id` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_assoc($result);        

            if ($row['password'] == md5(md5($_SESSION['id']).$_POST['oldPassword'])) {
                        
                $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['newPassword']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                mysqli_query($link, $query);

                echo 1;
                
            } else {
                
                echo "Please Enter Correct Old password";
                
            }
        }

    }

    if ($_GET['action'] == "sendMessage"){

        date_default_timezone_set('Asia/Kolkata');
        
        $date_time = date("Y-m-d H:i:s"); 
        
        // Store a string into the variable which
        // need to be Encrypted
        $simple_string = $_POST['message'];

        // Store the cipher method
        $ciphering = "AES-128-CTR";
        
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
        
        // Store the encryption key
        $encryption_key = "aK4N8".$_POST['from_user'].$_POST['to_user']."m7Ahn";

        // Use openssl_encrypt() function to encrypt the data
        $encrypted_message = openssl_encrypt($simple_string, $ciphering,
        $encryption_key, $options, $encryption_iv);

        $query = "INSERT INTO chats (`from_user`, `to_user`, `message`, `time`)
                    VALUES ('".mysqli_real_escape_string($link, $_POST['from_user'])."',
                    '". mysqli_real_escape_string($link, $_POST['to_user'])."',
                    '". mysqli_real_escape_string($link, $encrypted_message)."',
                    '". mysqli_real_escape_string($link, $date_time)."')";



        if(mysqli_query($link, $query)){
            
            echo 1;

        }    
        
    }

    if ($_GET['action'] == "sendNewMessage"){

        $notFound = 0;

        //echo $_POST['username']." ".$_POST['message'];

        $query = "SELECT * FROM users WHERE `username` = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        $row = mysqli_fetch_assoc($result);

        // Store a string into the variable which
        // need to be Encrypted
        $simple_string = $_POST['message'];

        // Store the cipher method
        $ciphering = "AES-128-CTR";
        
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
        
        // Store the encryption key
        $encryption_key = "aK4N8".$user['username'].$_POST['username']."m7Ahn";

        // Use openssl_encrypt() function to encrypt the data
        $encrypted_message = openssl_encrypt($simple_string, $ciphering,
        $encryption_key, $options, $encryption_iv);

        if($row['username']){
            
            $query = "SELECT * FROM new_chats ";
            $result = mysqli_query($link,$query);
                                          
                                            
            if(mysqli_num_rows($result)>0){

                    
                $count = 0;
                while( $new_chats = mysqli_fetch_assoc($result) ){

                    if(($new_chats['from_user'] == $user['username'] and $new_chats['to_user'] == $_POST['username']) or ($new_chats['from_user'] == $_POST['username'] and $new_chats['to_user'] == $user['username'])){
                    

                        date_default_timezone_set('Asia/Kolkata');
    
                        $date_time = date("Y-m-d H:i:s");        

                        $query = "INSERT INTO chats (`from_user`, `to_user`, `message`, `time`)
                                    VALUES ('".mysqli_real_escape_string($link, $user['username'])."',
                                    '". mysqli_real_escape_string($link, $_POST['username'])."',
                                    '". mysqli_real_escape_string($link, $encrypted_message)."',
                                    '". mysqli_real_escape_string($link, $date_time)."')";



                        if(mysqli_query($link, $query)){
                            
                            echo 1;
                            $notFound = 0;
                            break;
                        }                         
                
                    } else {
                        $notFound = 1;
                    }
                }
            } 

            if($notFound == 1){                    

                date_default_timezone_set('Asia/Kolkata');
    
                $date_time = date("Y-m-d H:i:s"); 

                $from_name = $user['first_name']." ".$user['last_name'];
                $to_name = $row['first_name']." ".$row['last_name'];

                $query_1 = "INSERT INTO new_chats (`from_user`, `to_user`, `from_name`, `to_name` )
                            VALUES ('".mysqli_real_escape_string($link, $user['username'])."',
                            '". mysqli_real_escape_string($link, $_POST['username'])."',
                            '". mysqli_real_escape_string($link, $from_name)."',
                            '". mysqli_real_escape_string($link, $to_name)."')";                    

                $query_2 = "INSERT INTO chats (`from_user`, `to_user`, `message`, `time`)
                            VALUES ('".mysqli_real_escape_string($link, $user['username'])."',
                            '". mysqli_real_escape_string($link, $_POST['username'])."',
                            '". mysqli_real_escape_string($link, $encrypted_message)."',
                            '". mysqli_real_escape_string($link, $date_time)."')";



                if(mysqli_query($link, $query_1) and mysqli_query($link, $query_2)){
                    
                    echo 2;

                }  

            }

        } else {
            echo "Invaid Username";
        }     

    }
    

?>

