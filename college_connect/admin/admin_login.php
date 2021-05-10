<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Welcome to College-Connect</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="http://localhost/college_connect/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://localhost/college_connect/css/style.css" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Title Logo-->
    <link rel="shortcut icon" type="image/png" href="http://localhost/college_connect/images/logo_cc.png" />
     <!-- Scripts
        ================================================= -->
        <script src="http://localhost/college_connect/js/jquery-3.1.1.min.js"></script>

    <style>
        body {
            margin-bottom: 0px;
            height: 100%;
        }
    </style>

</head>

<body>

    <div id="lp-register" style="background: linear-gradient(to right, #497784 , #435f43); min-height: 100%;">
        <div class="container " style="padding-top: 100px; padding-bottom: 100px;">
            <div class="row">
                <div class="col-sm-5">
                    <div class="intro-texts">
                    <img src="assets/images/logo.png" style="height: 60px; width: 300px;" alt="">
                        <!-- <h1 class="text-white"
                            style="color: #60ccff; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">College
                            Connect</h1> -->
                        <h3 class="text-white">A New Perspective.</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-1">
                    <div class="reg-form-container" style="min-height: 300px; margin-top: 70px;">

                        <!-- Register/Login Tabs-->
                        <div class="reg-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab"
                                        style="margin-top: -10px; font-size: 30px;">Login</a></li>
                            </ul>
                            <!--Tabs End-->
                        </div>

                        <!--Login-->
                        <div class="tab-pane active" id="login">

                            <h1>Admin Login!</h1>

                            <!--Login Form-->
                            <form name="Admin_Login_form" id='Admin_Login_form' method="dialog">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <input id="admin_user" class="form-control input-group-lg" type="text"
                                            name="admin_user" placeholder="Username"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <input id="admin_password" class="form-control input-group-lg" type="password"
                                            name="admin_password" placeholder="Password" />
                                    </div>
                                </div>
                                <button id="AdminloginBtn" class="btn btn-primary">Login</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
            $("#AdminloginBtn").click(function() {       
                
                if($("#admin_user").val() == ""){
                    alert("Please Enter your username ");
                } else if($("#admin_password").val() == ""){
                    alert("Please Enter your password");
                } else {  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=login_admin",
                        data: "admin_user=" + $("#admin_user").val() + "&admin_password=" + $("#admin_password").val(),
                        success: function(result) {
                            
                            if (result  == 1) {
                                window.location.assign("http://localhost/college_connect/admin/");
                            } else {
                                alert(result);
                            }
                        }
                    
                    })
                }

        });
    
        
        </script>

</body>

</html>