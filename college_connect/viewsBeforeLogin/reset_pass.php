
<?php

    $query = "SELECT * FROM users WHERE username = '".mysqli_real_escape_string($link, $_GET['u'])."' LIMIT 1";
                
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);

?>

<!-- Landing Page Contents
    ================================================= -->
<div id="lp-register" style="background: linear-gradient(to right, #497784 , #435f43); height: 100%;">
    <div class="container " style="padding-top: 100px; padding-bottom: 100px;">
        <div class="row">
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white"
                        style="color: #60ccff; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">College
                        Connect</h1>
                    <h3 class="text-white">A New Perspective.</h3>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="reg-form-container">

                    <!-- Forgot password Tab -->
                    <div class="reg-options">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Reset Password</a></li>
                        </ul>
                        <!--Tabs End-->
                    </div>

                    <!--Reset Password-->
                    <div class="tab-pane active" id="reset" >
                        <h3>Reset Password</h3>

                        <!--Reset Form-->
                        <form name="reset_form" id='reset_form' method="POST">
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="new-password" class="sr-only">Enter new password:</label>
                                    <input id="new-pass" class="form-control input-group-lg" type="password"
                                        name="new_pass" title="Enter New Password" placeholder="Enter New Password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="repeat-password" class="sr-only">Re-Enter new password:</label>
                                    <input id="repeat-pass" class="form-control input-group-lg" type="password"
                                        name="repeat_pass" title="Re-Enter New Password"
                                        placeholder="Re-Enter New Password" />
                                </div>
                            </div>
                            <button id="resetBtn" name="resetBtn" class="btn btn-primary">Reset!</button>
                        </form>
                        <!-- Reset Form Ends -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

    if(isset($_POST['resetBtn'])){
        
        if($_POST['new_pass'] == ""){
            echo "<script> alert('Please Enter Password'); </script>";
        } else if(!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['new_pass'])){
            echo "<script> alert('Password must contain atleast 8 characters and include at least one upper case letter, one lower case letter, one number, and one special character!'); </script>";
        } else if($_POST['repeat_pass'] == ""){
            echo "<script> alert('Please Re-Enter Password'); </script>";
        } else if($_POST['new_pass'] != $_POST['repeat_pass']){
            echo "<script> alert('Password does not match'); </script>";
        } else {
            
            $query = "UPDATE users SET password = '". md5(md5($row['id']).$_POST['new_pass']) ."' WHERE `username` = '".mysqli_real_escape_string($link, $row['username'])."' LIMIT 1";
        
            if(mysqli_query($link, $query)){
                
                echo "<script> alert('Password reset successfully'); </script>";

                echo "<script> window.location.assign('http://localhost/college_connect/'); </script>";

            } else {
                echo "<script> alert('not working'); </script>";
            }
        }
            
        
    }

?>
