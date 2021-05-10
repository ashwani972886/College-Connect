<!-- Store Date of Birth to retrieve from database -->
<?php

    if($user['dob']!=""){

    $date = $user['dob'];

    $date= explode('-', $date);

    $day = $date[0];

    $month = $date[1];

    $year = $date[2];

    

}

?>                      
<!-- Basic Information of Student/Teachers
================================================= -->
<div class="edit-profile-container">
    <div class="block-title">
        <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit Basic Information</h4>
        <div class="line"></div>
    </div>
    <div class="edit-block">
        <form name="basic-info" id="basic-info" class="form-inline" method = "POST">
            <div class="row">

                <?php   if($user['role'] == "teacher"){ ?>

                            <div class="form-group col-xs-6">
                                <label for="teacherId">Teacher ID</label>
                                <input id="teacherId" class="form-control input-group-lg" type="text" name="teacherId" title="Teacher ID" placeholder="Teacher ID" value="<?php echo $user['clg_id'];?>" disabled />
                            </div>
                        

                            <div class="form-group col-xs-6">
                                <label for="desig">Designation</label>
                                <select class="form-control" id="tea_desig" name="tea_desig">
                                    <option selected><?php if($user['designation'] !=""){ echo $user['designation'];};?></option>
                                    <option>Director</option>
                                    <option>Principal</option>
                                    <option>Dean</option>
                                    <option>HOD</option>
                                    <option>Professor</option>
                                    <option>Asst. Professor</option>
                                    <option>Lab Head</option>
                                    <option>Lab Assistant</option>
                                </select>
                            </div>
                <?php   }   else { ?>
                                
                                <div class="form-group col-xs-6">
                                    <label for="collegeRollno">College Roll No.(Will be provided by admin)</label>
                                    <input id="collegeRollno" class="form-control input-group-lg" type="text" name="collegeRollno" title="Enter College Roll No." placeholder="College Roll No." value="<?php echo $user['roll_no'];?>" disabled />
                                </div>

                                <?php 
                                
                                    if($user['stream'] == "CSE" || $user['stream'] == "CE" || $user['stream'] == "EE" || $user['stream'] == "ECE" || $user['stream'] == "ME"){
                                ?>
                                        <div class="form-group col-xs-3">
                                            <label for="sem">Semester</label>
                                            <select class="form-control" id= "sem_basic_1" name="sem_basic">
                                                <option selected><?php if($user['sem'] ==""){echo "Semester";}else{ echo $user['sem'];};?></option>
                                                <option value="1">First Semester</option>
                                                <option value="2">Second Semester</option>
                                                <option value="3">Third Semester</option>
                                                <option value="4">Fourth Semester</option>
                                                <option value="5">Fifth Semester</option>
                                                <option value="6">Sixth Semester</option>
                                                <option value="7">Seventh Semester</option>
                                                <option value="8">Eighth Semester</option>
                                            </select>
                                        </div> 
                                <?php
                                    } else {
                                ?>
                                
                                        <div class="form-group col-xs-3">
                                            <label for="sem">Semester</label>
                                            <select class="form-control" id= "sem_basic_2" name="sem_basic">
                                                <option selected><?php if($user['sem'] ==""){echo "Semester";}else{ echo $user['sem'];};?></option>
                                                <option value="1">First Semester</option>
                                                <option value="2">Second Semester</option>
                                                <option value="3">Third Semester</option>
                                                <option value="4">Fourth Semester</option>
                                                <option value="5">Fifth Semester</option>
                                                <option value="6">Sixth Semester</option>
                                            </select>
                                        </div>
                                <?php

                                    }
                                ?>
                                        <div class="form-group col-xs-3">
                                            <label for="sec">Section</label>
                                            <select class="form-control" id="sec_basic" name="sec_basic">
                                                <option selected><?php if($user['sec'] ==""){echo "Section";}else{ echo $user['sec'];};?></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>
                                        </div>
                                <?php
                            } 
                                ?>
            </div>
            
            <div class="row">
                <div class="form-group col-xs-6">
                    <label for="firstname">First name</label>
                    <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" title="Enter first name" placeholder="First name" value="<?php echo $user['first_name']?>" disabled />
                </div>
                <div class="form-group col-xs-6">
                    <label for="lastname" class="">Last name</label>
                    <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" title="Enter last name" placeholder="Last name" value="<?php echo $user['last_name'] ?>" disabled />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <label for="email">My email</label>
                    <input id="email" class="form-control input-group-lg" type="email" name="my_email" placeholder="My Email" value="<?php echo $user['email'] ?>" disabled />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <label for="altEmail">Alternate Email</label>
                    <input id="alt_email" class="form-control input-group-lg" type="email" name="alt_email" placeholder="Alternate Email" value="<?php echo $user['alter_email'] ?>" disabled />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <label for="phone">Phone number</label>
                    <input id="phone" class="form-control input-group-lg" type="text" name="phone"  placeholder="Phone"  minlength="10" maxlength="10" value="<?php echo $user['phone'] ?>" />
                </div>
            </div>
            <div class="row">
                <p class="custom-label"><strong>Date of Birth</strong></p>
                <div class="form-group col-sm-4 col-xs-6">
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="day" name="day">
                        <option selected><?php if($user['dob'] ==""){echo "Day";}else{ echo "$day";};?></option>
                        <?php
                            $day_chng = 1;
                            while($day_chng <= 31){
                        ?>
                                <option><?php echo $day_chng; ?></option>
                        <?php
                                $day_chng+=1;
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-6">
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" id="month" name="month">
                        <option selected><?php if($user['dob'] ==""){echo "Month";}else{ echo "$month";};?></option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label for="year" class="sr-only"></label>
                    <select class="form-control" id="year" name="year">
                        <option selected><?php if($user['dob'] ==""){echo "Year";}else{ echo "$year";};?></option>
                        <?php
                            $year = date("Y");
                            $change = $year-61;
                            while($change <= $year){
                        ?>
                                <option><?php echo $change; ?></option>
                        <?php
                                $change+=1;
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group gender">
                <span class="custom-label"><strong>Gender: </strong></span>
                <?php
                    if($user['gender'] == "male"){
                ?>
                        <label class="radio-inline">
                            <input type="radio" name="optgender" value="male" checked style="margin-top: 6px;">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optgender" value="female" style="margin-top: 6px;">Female
                        </label>
                <?php
                    } else {
                ?>
                        <label class="radio-inline">
                            <input type="radio" name="optgender" value="male" style="margin-top: 6px;">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optgender" value="female" checked style="margin-top: 6px;">Female
                        </label>
                <?php
                    }
                ?>
            </div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <label for="my-info">About me<p class="text-muted" style="font-size: smaller;">(min. 100 words required)</p></label>
                    <textarea id="my-info" name="about" class="form-control" minlength="100" placeholder="Tell more about yourself!" rows="4" cols="400"><?php echo $user['about']; ?></textarea>
                </div>
            </div>

            <button class="btn btn-primary" type="submit" name="save">Save Changes</button>
        </form>
    </div>

    <?php

        if($user['role'] == "teacher"){ ?>
            <div class="edit-block">
                <form name="basic-info" id="basic-info" class="form-inline" method = "POST">

                    <div class="block-title">
                        <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Additional Information</h4>
                        <div class="line"></div>
                    </div>

                    <div class="form-group col-xs-12"><label for="sub_info" style="font-weight: bold; font-size: 20px;">Give some info about subjects you are Teaching!</label></div>

                    <div class="row">
                        <div class="form-group col-xs-3">
                            <input id="sub" class="form-control input-group-lg" type="text" name="sub" placeholder="Subject Name" />
                        </div>
                        <div class="form-group col-xs-3">
                            <select class="form-control" id="branch_bas" name="branch_bas">
                                <option value="branch" selected>Branch</option>
                                <option value="CSE">Computer Science & Engineering</option>
                                <option value="ME">Mechanical Engineering</option>
                                <option value="EE">Electrical Engineering</option>
                                <option value="ECE">Electronics & Communication Engineering</option>
                                <option value="CE">Civil Engineering</option>
                                <option value="BBA_General">BBA-I(General)</option>
                                <option value="BBA_Industry">BBA-II(Ind.)</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-3">
                            <select class="form-control" id= "sem_bas_hs_1" name="sem_bas_1">
                                <option value="semester" selected>Semester</option>
                                <option value="1">First Semester</option>
                                <option value="2">Second Semester</option>
                                <option value="3">Third Semester</option>
                                <option value="4">Fourth Semester</option>
                                <option value="5">Fifth Semester</option>
                                <option value="6">Sixth Semester</option>
                                <option value="7">Seventh Semester</option>
                                <option value="8">Eighth Semester</option>
                            </select>
                            <select class="form-control" id= "sem_bas_hs_2" name="sem_bas_2">
                                <option value="semester" selected>Semester</option>
                                <option value="1">First Semester</option>
                                <option value="2">Second Semester</option>
                                <option value="3">Third Semester</option>
                                <option value="4">Fourth Semester</option>
                                <option value="5">Fifth Semester</option>
                                <option value="6">Sixth Semester</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-3">
                            <select class="form-control" id="sec_bas" name="sec_bas">
                                <option value="sec" selected>Section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="line-divider"></div>
                                
                    <button class="btn btn-primary" type="submit" id="add_info" name="save_teacher_info">Add Information!</button>
                </form>
            </div>
    
    
            <!-- Display Teaching Subjects -->

            <?php 
            // Retrieving Data from Teachers Database

                $query_teach = "SELECT * FROM teachers WHERE teacher_id = '".mysqli_real_escape_string($link, $user['clg_id'])."'";
                $result_teach = mysqli_query($link, $query_teach);

                if(mysqli_num_rows($result_teach)>0) {

                    $count = 1;
            ?>
                    <div class="edit-block">
                        <table class="table table-bordered border-primary text-center" style="font-size: 20px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">S.No.</th>
                                    <th scope="col" style="text-align: center;">Subject</th>
                                    <th scope="col" style="text-align: center;">Branch</th>
                                    <th scope="col" style="text-align: center;">Semester</th>
                                    <th scope="col" style="text-align: center;">Section</th>
                                    <th></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php 

                                    while($teachers = mysqli_fetch_assoc($result_teach)){
                                        
                                        if($teachers['sem'] == "1"){

                                            $sem_disp = $teachers['sem']."st";
                                        } else if($teachers['sem'] == "2") {

                                            $sem_disp = $teachers['sem']."nd";
                                        } else if($teachers['sem'] == 3){

                                            $sem_disp = $teachers['sem']."rd";
                                        } else {

                                            $sem_disp = $teachers['sem']."th";
                                        }
                                ?>
                                        <tr>
                                            <th scope="col" style="text-align: center; font-weight: bold;"><?php echo $count; ?></th>
                                            <th scope="col" style="text-align: center;"><?php echo $teachers['sub_name']; ?></th>
                                            <th scope="col" style="text-align: center;"><?php echo $teachers['branch']; ?></th>
                                            <th scope="col" style="text-align: center;"><?php echo $sem_disp; ?></th>
                                            <th scope="col" style="text-align: center;"><?php echo $teachers['sec']; ?></th>
                                            <th><?php if($teachers['teacher_id'] == $user['clg_id']){ ?><form method = "POST"><button type="submit" name="delete_sub"  value ="<?php echo $teachers['id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></form><?php } ?></th>
                                        </tr>
                                <?php
                                        $count = $count +1;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
    <?php
                }
        }
    ?>
    
</div>
<!-- End of Student/Teacher Information-->


<!-- Database Updation -->
<?php

    if(isset($_POST['save'])){

        $dob = $_POST['day']."-".$_POST['month']."-".$_POST['year'];


        $update = "UPDATE `users` SET `phone` = '".mysqli_real_escape_string($link, $_POST['phone'])."' WHERE id=".$session_id." LIMIT 1";

        $upabout = "UPDATE `users` SET `about` = '".mysqli_real_escape_string($link, $_POST['about'])."' WHERE id=".$session_id." LIMIT 1";

        $updesig = "UPDATE `users` SET `designation` = '".mysqli_real_escape_string($link, $_POST['tea_desig'])."' WHERE id=".$session_id." LIMIT 1";

        $updob = "UPDATE `users` SET `dob` = '".mysqli_real_escape_string($link, $dob)."' WHERE id=".$session_id." LIMIT 1";
        
        $upgender = "UPDATE `users` SET `gender` = '".mysqli_real_escape_string($link, $_POST['optgender'])."' WHERE id=".$session_id." LIMIT 1";
        
        $upsem = "UPDATE `users` SET `sem` = '".mysqli_real_escape_string($link, $_POST['sem_basic'])."' WHERE id=".$session_id." LIMIT 1";

        $upsec = "UPDATE `users` SET `sec` = '".mysqli_real_escape_string($link, $_POST['sec_basic'])."' WHERE id=".$session_id." LIMIT 1";

        $group_name = $user['stream']."-".$_POST['sem_basic'].$_POST['sec_basic'];

        $upgroup_name = "UPDATE `users` SET `group_name` = '".mysqli_real_escape_string($link, $group_name)."' WHERE id=".$session_id." LIMIT 1";

        if(mysqli_query($link, $update) && mysqli_query($link, $upabout) && mysqli_query($link, $updob) && mysqli_query($link, $upgender) && mysqli_query($link, $updesig) && mysqli_query($link, $upsem) && mysqli_query($link, $upsec) && mysqli_query($link, $upgroup_name)){
            
            echo "<script> alert('Details updated successfully'); </script>";

            echo "<script> window.location.assign('https://college-connect.in/?p=profedt'); </script>";
        }
    }

    if(isset($_POST['save_teacher_info'])){

        
        if($_POST['branch_bas'] == "CSE" || $_POST['branch_bas'] == "ME" || $_POST['branch_bas'] == "EE" || $_POST['branch_bas'] == "ECE" || $_POST['branch_bas'] == "CE"){

            $sem = $_POST['sem_bas_1'];

        } else {

            $sem = $_POST['sem_bas_2'];

        }
        
        if($_POST['sub'] == "" || $_POST['branch_bas'] == "branch" || $sem == "semester" || $_POST['sec_bas'] == "sec"){

            echo "<script> alert('Please fill all of the four field(s)!'); </script>";
        } else{

            $group_name = $_POST['branch_bas']."-".$sem.$_POST['sec_bas'];

            $query1 = "INSERT INTO teachers (`teacher_id`, `sub_name`, `branch`, `sem`, `sec`, `group_name`)
                    VALUES ('".mysqli_real_escape_string($link, $user['clg_id'])."',
                            '".mysqli_real_escape_string($link, $_POST['sub'])."',
                            '".mysqli_real_escape_string($link, $_POST['branch_bas'])."',
                            '".mysqli_real_escape_string($link, $sem)."',
                            '".mysqli_real_escape_string($link, $_POST['sec_bas'])."',
                            '".mysqli_real_escape_string($link, $group_name)."')";

            if(mysqli_query($link, $query1)) {

                echo "<script> alert('Details updated successfully'); </script>";

                echo "<script> window.location.assign('https://college-connect.in/?p=profedt'); </script>";

            }
        }

    }

    if(isset($_POST['delete_sub'])){


        $query_del = "DELETE FROM `teachers` WHERE `id` = '".$_POST['delete_sub']."'" ;

        if(mysqli_query($link,$query_del)){

            echo "<script> alert('Details deleted successfully'); </script>";

            echo "<script> window.location.assign('https://college-connect.in/?p=profedt'); </script>";
            
    
        }
            
    }
            
?>
