<?php
    $edit = isset($_GET['f']) ? $_GET['f'] : '';

?>

<div id="page-contents">
    <div class="container">
        <div class="row">
            <div style="margin-top: 10px;" class="col-md-12 static">
                <div class="profile-card">
                    <img style="height: 100px; width: 100px;" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="user" class="profile-photo" />
                    <h4><a href="?p=prof" class="text-white"><?php echo $user['first_name']." ".$user['last_name'] ?></a></h4>
                    <?php
                            if($user['role'] == "teacher"){
                    ?>
                                <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> <?php echo "&nbsp".$user['designation'];?></a>
                    <?php
                            } else {
                    ?>
                                <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> <?php echo "&nbsp".$user['roll_no'];?></a>
                    <?php
                            }
                    ?>
                </div><!--chat block ends-->

                <!--Timeline Menu for Large Screens-->
                
                <!--Timeline Menu for Large Screens-->

                <div style="padding-top: 0px;" id="page-contents">
                    <div class="row">
                        <!--Edit Profile Menu-->
                        <div class="col-md-3">
                            <ul class="edit-menu toggle">
                                <li><i class="icon ion-ios-information-outline"></i><a href="?p=profedt&f=bsic" style= "font-size: 18px; font-weight: bold;">Basic Information</a></li>
                                <li><i class="icon ion-ios-briefcase-outline"></i><a href="?p=profedt&f=edndwrk" style= "font-size: 18px; font-weight: bold;">Education and Work</a></li>
                                <li><i class="icon ion-ios-locked-outline"></i><a href="?p=profedt&f=chngpas" style= "font-size: 18px; font-weight: bold;">Change Password</a></li>
                            </ul>
                        </div>
                        <!--Edit Profile Menu Ends-->

                        <!-- Page Selection Starts -->
                        <div class="col-md-9">

                            <?php
                            
                                if($page == "profedt"){
                                    if($edit == "bsic"){
                                        include("viewsAfterLogin/edit_profie_basic.php");
                                    } else if($edit == "edndwrk"){
                                        include("viewsAfterLogin/edit_profile_work_edu.php");
                                    } else if($edit == "intndskl"){
                                        include("viewsAfterLogin/edit_profie_intrest_skill.php");
                                    } else if($edit == "chngpas"){
                                        include("viewsAfterLogin/edit_profile_password.php");
                                    } else {
                                        include("viewsAfterLogin/edit_profie_basic.php");
                                    }
                                }
                            
                            ?>
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>