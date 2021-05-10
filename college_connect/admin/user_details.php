


<!-- Page Heading Start -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class=" icon-gradient bg-mean-fruit fa fa-fw" aria-hidden="true"></i>
            </div>
            <div>
                All Users Detail
                <div class="page-title-subheading">Enter College-ID and click 'Search'.</div>
            </div>
        </div>
        <!--Search by College Id -->
        <div class="page-title-actions">
            <div class="position-relative form-group">
                <form method="dialog">
                    <div style="font-size: 18px; font-weight: bold;">
                        <div class="custom-radio custom-control custom-control-inline">
                            <label for="exampleCustomSelect" class="">College ID:</label>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline">
                            <div class="custom-radio custom-control custom-control-inline">
                                <input placeholder="College-ID" type="text" class="mb-2 form-control" id="input_clg_id" style="margin-bottom: 0px !important; height: 100%;">
                            </div>
                            <div class="custom-radio custom-control custom-control-inline">
                                <button id="search_clg_id" class="btn btn-info" data-target=".bd-example-modal-lg" data-toggle="modal" style="font-size: 20px;">Search!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Page Heading End  -->

<!-- Filters -->

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Search Filters</div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row"> 
                            <div class="col-md-3 mb-4"> 
                                <input type="text" name="roll" class="form-control" style=" border: none; border-bottom: 1px solid blue; outline: none;" placeholder = "Roll Number">
                            </div>
                            <div class="col-md-3 mb-4"> 
                                <input type="text" name="username" class="form-control" style=" border: none; border-bottom: 1px solid blue; outline: none;" placeholder = "Username">
                            </div>
                            <div class="col-md-3 mb-4"> 
                                <input type="text" name="first_name" class="form-control" style=" border: none; border-bottom: 1px solid blue; outline: none;" placeholder = "First Name">
                            </div>
                            <div class="col-md-3 mb-4"> 
                                <input type="text" name="last_name" class="form-control" style=" border: none; border-bottom: 1px solid blue; outline: none;" placeholder = "Last Name">
                            </div>
                        </div>
                        <div class="form-row"> 
                            <div class="col-md-2 mb-3"> 
                                <select type="select" name="course" class="custom-select" style="border: none; border-bottom: 1px solid blue; outline: none;">
                                    <option disabled selected>Course</option>
                                    <option>B.TECH</option>
                                    <option>BBA</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3"> 
                                <select type="select" name="stream" class="custom-select" style="border: none; border-bottom: 1px solid blue; outline: none;">
                                    <option value="stream" disabled selected>Stream</option>
                                    <option value="CSE">CSE</option>
                                    <option value="CE">CE</option>
                                    <option value="ME">ME</option>
                                    <option value="EE">EE</option>
                                    <option value="ECE">ECE</option>
                                    <option value="BBA(GEN)">BBA(GEN)</option>
                                    <option value="BBA(IND)">BBA(IND)</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3"> 
                                <select type="select" name="semester" class="custom-select" style="border: none; border-bottom: 1px solid blue; outline: none;">
                                    <option value="semester" disabled selected>Semester</option>
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
                            <div class="col-md-2 mb-3"> 
                                <select type="select" name="section" class="custom-select" style="border: none; border-bottom: 1px solid blue; outline: none;">
                                    <option value="section" disabled selected>Section</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <select type="select" name="role" class="custom-select" style="border: none; border-bottom: 1px solid blue; outline: none;">
                                    <option disabled selected>Role</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <button class="btn btn-info" type="submit" name="filter_data" style="font-size: 25px; padding: 0px; width: 150px; margin-left: 20px;">Search!</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<!-- Filters End -->

<!-- Show Data -->
<?php
  if(isset($_POST['filter_data']))  {
?>
    <div class="row">
        <div class="col-md-12">
            <h4 style="float: right;"><label style="margin-top: 12px;">Downloas as:</label>
            <a href=""><img src="assets/images/excel.png" style="width: 65px; height: 60px; float: right; margin-left: 20px; margin-right: 80px;" onclick="download_csv()"></a>
            </h4>
        </div>
    </div>
<?php
    $roll = mysqli_real_escape_string($link, $_POST['roll']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $first_name = mysqli_real_escape_string($link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);
    if(isset($_POST['course'])){
        $course = $_POST['course'];
    }
    if(isset($_POST['stream'])){
        $stream = $_POST['stream'];
    }
    if(isset($_POST['semester'])){
        $sem = $_POST['semester'];
    }
    if(isset($_POST['section'])){
        $sec = $_POST['section'];
    }
    if(isset($_POST['role'])){
        $role = $_POST['role'];
    }
    
    
    if($_POST['roll']){
        $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' LIMIT 1";
        if($_POST['username']){
            $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                  `username` = '".$username."'LIMIT 1";
            if($_POST['first_name']){
                $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                      `username` = '".$username."' AND
                                                      `first_name` = '".$first_name."'LIMIT 1";
                if($_POST['last_name']){
                    $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                          `username` = '".$username."' AND 
                                                          `first_name` = '".$first_name."' AND 
                                                          `last_name` = '".$last_name."'LIMIT 1";
                }
            } else if($_POST['last_name']){
                $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                      `username` = '".$username."' AND
                                                      `last_name` = '".$last_name."'LIMIT 1";
            }
        } else if($_POST['first_name']){
            $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                  `first_name` = '".$first_name."'LIMIT 1";
            if($_POST['last_name']){
            $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                  `first_name` = '".$first_name."' AND
                                                  `last_name` = '".$last_name."'LIMIT 1";
        }
        } else if($_POST['last_name']){
            $query = "SELECT * FROM `users` WHERE `roll_no` = '".$roll."' AND
                                                  `last_name` = '".$last_name."'LIMIT 1";
        }
    } else if($_POST['username']) {
        $query = "SELECT * FROM `users` WHERE `username` = '".$username."' LIMIT 1";
        if($_POST['first_name']){
            $query = "SELECT * FROM `users` WHERE `username` = '".$username."' AND 
                                                  `first_name` = '".$first_name."'LIMIT 1";
            if($_POST['last_name']){
                $query = "SELECT * FROM `users` WHERE `username` = '".$username."' AND 
                                                      `first_name` = '".$first_name."' AND 
                                                      `last_name` = '".$last_name."'LIMIT 1";
            }
        } else if($_POST['last_name']){
            $query = "SELECT * FROM `users` WHERE `username` = '".$username."' AND
                                                  `last_name` = '".$last_name."'LIMIT 1";
        }
    } else if($_POST['first_name']) {
        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."'";
        if($_POST['last_name']){
            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                  `last_name` = '".$last_name."'LIMIT 1";
            if(isset($_POST['course'])) {
                if($course == "B.TECH"){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'CSE' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'ME' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'CE' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'EE' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'ECE'";
                    if(isset($_POST['stream'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'CSE' AND 
                                                                `stream` = '$stream' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND 
                                                                `stream` = 'ME' AND 
                                                                `stream` = '$stream'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND 
                                                                `stream` = 'CE'  AND 
                                                                `stream` = '$stream'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND 
                                                                `stream` = 'EE'  AND 
                                                                `stream` = '$stream'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND 
                                                                `stream` = 'ECE' AND 
                                                                `stream` = '$stream'";
                        if(isset($_POST['semester'])){
                            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'CSE' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'ME' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'CE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'EE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'ECE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem'";
                            if(isset($_POST['section'])) {
                                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND 
                                                                    `stream` = 'CSE' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'ME' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' 
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'CE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' 
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'EE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' 
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'ECE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'";
                                if(isset($_POST['role'])){
                                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'CSE' AND 
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec'AND
                                                                        `role` = '$role'
                                                                        OR
                                                                        `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'ME' AND
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec'AND
                                                                        `role` = '$role' 
                                                                        OR
                                                                        `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'CE'  AND
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec' AND
                                                                        `role` = '$role'
                                                                        OR
                                                                        `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'EE'  AND
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec'AND
                                                                        `role` = '$role' 
                                                                        OR
                                                                        `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'ECE'  AND
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec' AND
                                                                        `role` = '$role'";
                                }
                            }
                        }
                    }
                    
                } else {
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'BBA(GEN)' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'BBA(IND)'";
                    if(isset($_POST['stream'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'BBA(GEN)' AND 
                                                                `stream` = '$stream' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND 
                                                                `stream` = 'BBA(IND)' AND 
                                                                `stream` = '$stream'";
                        if(isset($_POST['semester'])){
                            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'BBA(GEN)' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'BBA(IND)' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem'";
                            if(isset($_POST['section'])) {
                                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'BBA(GEN)' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'BBA(IND)' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'";
                                if(isset($_POST['role'])){
                                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'BBA(GEN)' AND 
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec'AND
                                                                        `role` = '$role'
                                                                        OR
                                                                        `first_name` = '".$first_name."' AND 
                                                                        `last_name` = '".$last_name."' AND
                                                                        `stream` = 'BBA(IND)' AND
                                                                        `stream` = '$stream' AND 
                                                                        `sem` = '$sem' AND 
                                                                        `sec` = '$sec'AND
                                                                        `role` = '$role'";
                                }
                            }
                        }
                    }
                }
            } else if(isset($_POST['stream'])){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `last_name` = '".$last_name."' AND 
                                                        `stream` = '$stream'";
                if(isset($_POST['semester'])){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `last_name` = '".$last_name."' AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem'";
                    if(isset($_POST['section'])) {
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'";
                        if(isset($_POST['role'])){
                            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role'";
                        }
                    }
                }
            } else if(isset($_POST['semester'])){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `last_name` = '".$last_name."' AND
                                                    `sem` = '$sem'";
                if(isset($_POST['section'])) {
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `last_name` = '".$last_name."' AND 
                                                        `sem` = '$sem' AND 
                                                        `sec` = '$sec'";
                    if(isset($_POST['role'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `last_name` = '".$last_name."' AND
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'AND
                                                            `role` = '$role'";
                    }
                }
            } else if(isset($_POST['section'])) {
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `last_name` = '".$last_name."' AND 
                                                    `sec` = '$sec'";
                if(isset($_POST['role'])){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `last_name` = '".$last_name."' AND
                                                        `sec` = '$sec'AND
                                                        `role` = '$role'";
                }
            } else if(isset($_POST['role'])){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `last_name` = '".$last_name."' AND
                                                    `role` = '$role'";
            }
        } else if(isset($_POST['course'])) {
            if($course == "B.TECH"){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `stream` = 'CSE' 
                                                        OR
                                                        `first_name` = '".$first_name."' AND 
                                                        `stream` = 'ME' 
                                                        OR
                                                        `first_name` = '".$first_name."' AND 
                                                        `stream` = 'CE' 
                                                        OR
                                                        `first_name` = '".$first_name."' AND 
                                                        `stream` = 'EE' 
                                                        OR
                                                        `first_name` = '".$first_name."' AND 
                                                        `stream` = 'ECE'";
                if(isset($_POST['stream'])){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `stream` = 'CSE' AND 
                                                            `stream` = '$stream' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'ME' AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'CE'  AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'EE'  AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'ECE' AND 
                                                            `stream` = '$stream'";
                    if(isset($_POST['semester'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `stream` = 'CSE' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'ME' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'CE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'EE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'ECE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'";
                        if(isset($_POST['section'])) {
                            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `stream` = 'CSE' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `stream` = 'ME' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `stream` = 'CE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `stream` = 'EE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `stream` = 'ECE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'";
                            if(isset($_POST['role'])){
                                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'CSE' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'ME' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role' 
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'CE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'EE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role' 
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'ECE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' AND
                                                                    `role` = '$role'";
                            }
                        }
                    }
                }
                
            } else {
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `stream` = 'BBA(GEN)' 
                                                        OR
                                                        `first_name` = '".$first_name."' AND 
                                                        `stream` = 'BBA(IND)'";
                if(isset($_POST['stream'])){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `stream` = 'BBA(GEN)' AND 
                                                            `stream` = '$stream' 
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'BBA(IND)' AND 
                                                            `stream` = '$stream'";
                    if(isset($_POST['semester'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `stream` = 'BBA(GEN)' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'
                                                            OR
                                                            `first_name` = '".$first_name."' AND 
                                                            `stream` = 'BBA(IND)' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'";
                        if(isset($_POST['section'])) {
                            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                `stream` = 'BBA(GEN)' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'
                                                                OR
                                                                `first_name` = '".$first_name."' AND 
                                                                `stream` = 'BBA(IND)' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'";
                            if(isset($_POST['role'])){
                                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'BBA(GEN)' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `first_name` = '".$first_name."' AND 
                                                                    `stream` = 'BBA(IND)' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'";
                            }
                        }
                    }
                }
            }
        } else if(isset($_POST['stream'])){
            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `stream` = '$stream'";
            if(isset($_POST['semester'])){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `stream` = '$stream' AND 
                                                    `sem` = '$sem'";
                if(isset($_POST['section'])) {
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem' AND 
                                                        `sec` = '$sec'";
                    if(isset($_POST['role'])){
                        $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'AND
                                                            `role` = '$role'";
                    }
                }
            }
        } else if(isset($_POST['semester'])){
            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                `sem` = '$sem'";
            if(isset($_POST['section'])) {
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `sem` = '$sem' AND 
                                                    `sec` = '$sec'";
                if(isset($_POST['role'])){
                    $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                        `sem` = '$sem' AND 
                                                        `sec` = '$sec'AND
                                                        `role` = '$role'";
                }
            }
        } else if(isset($_POST['section'])) {
            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                `sec` = '$sec'";
            if(isset($_POST['role'])){
                $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                    `sec` = '$sec'AND
                                                    `role` = '$role'";
            }
        } else if(isset($_POST['role'])){
            $query = "SELECT * FROM `users` WHERE `first_name` = '".$first_name."' AND 
                                                `role` = '$role'";
        } 
    } else if($_POST['last_name']) {
        $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."'";
        if(isset($_POST['course'])) {
            if($course == "B.TECH"){
                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                        `stream` = 'CSE' 
                                                        OR
                                                        `last_name` = '".$last_name."' AND 
                                                        `stream` = 'ME' 
                                                        OR
                                                        `last_name` = '".$last_name."' AND 
                                                        `stream` = 'CE' 
                                                        OR
                                                        `last_name` = '".$last_name."' AND 
                                                        `stream` = 'EE' 
                                                        OR
                                                        `last_name` = '".$last_name."' AND
                                                        `stream` = 'ECE'";
                if(isset($_POST['stream'])){
                    $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                            `stream` = 'CSE' AND 
                                                            `stream` = '$stream' 
                                                            OR
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'ME' AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'CE'  AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'EE'  AND 
                                                            `stream` = '$stream'
                                                            OR
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'ECE' AND 
                                                            `stream` = '$stream'";
                    if(isset($_POST['semester'])){
                        $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                            `stream` = 'CSE' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'
                                                            OR
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'ME' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'CE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'EE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' 
                                                            OR
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'ECE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'";
                        if(isset($_POST['section'])) {
                            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND 
                                                                `stream` = 'CSE' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'
                                                                OR
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'ME' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'CE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'EE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' 
                                                                OR
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'ECE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'";
                            if(isset($_POST['role'])){
                                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                                    `stream` = 'CSE' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'ME' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role' 
                                                                    OR
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'CE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'EE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role' 
                                                                    OR
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'ECE'  AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec' AND
                                                                    `role` = '$role'";
                            }
                        }
                    }
                }
                
            } else {
                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                        `stream` = 'BBA(GEN)' 
                                                        OR
                                                        `last_name` = '".$last_name."' AND 
                                                        `stream` = 'BBA(IND)'LIMIT 1";
                if(isset($_POST['stream'])){
                    $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                            `stream` = 'BBA(GEN)' AND 
                                                            `stream` = '$stream' 
                                                            OR
                                                            `last_name` = '".$last_name."' AND 
                                                            `stream` = 'BBA(IND)' AND 
                                                            `stream` = '$stream'";
                    if(isset($_POST['semester'])){
                        $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                            `stream` = 'BBA(GEN)' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'
                                                            OR
                                                            `last_name` = '".$last_name."' AND
                                                            `stream` = 'BBA(IND)' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem'";
                        if(isset($_POST['section'])) {
                            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                                `stream` = 'BBA(GEN)' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'
                                                                OR
                                                                `last_name` = '".$last_name."' AND
                                                                `stream` = 'BBA(IND)' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'";
                            if(isset($_POST['role'])){
                                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                                    `stream` = 'BBA(GEN)' AND 
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'
                                                                    OR
                                                                    `last_name` = '".$last_name."' AND
                                                                    `stream` = 'BBA(IND)' AND
                                                                    `stream` = '$stream' AND 
                                                                    `sem` = '$sem' AND 
                                                                    `sec` = '$sec'AND
                                                                    `role` = '$role'";
                            }
                        }
                    }
                }
            }
        } else if(isset($_POST['stream'])){
            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                    `stream` = '$stream'";
            if(isset($_POST['semester'])){
                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                    `stream` = '$stream' AND 
                                                    `sem` = '$sem'";
                if(isset($_POST['section'])) {
                    $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem' AND 
                                                        `sec` = '$sec'";
                    if(isset($_POST['role'])){
                        $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'AND
                                                            `role` = '$role'";
                    }
                }
            }
        } else if(isset($_POST['semester'])){
            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                `sem` = '$sem'";
            if(isset($_POST['section'])) {
                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                    `sem` = '$sem' AND 
                                                    `sec` = '$sec'";
                if(isset($_POST['role'])){
                    $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                        `sem` = '$sem' AND 
                                                        `sec` = '$sec'AND
                                                        `role` = '$role'";
                }
            }
        } else if(isset($_POST['section'])) {
            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                `sec` = '$sec'";
            if(isset($_POST['role'])){
                $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                    `sec` = '$sec'AND
                                                    `role` = '$role'";
            }
        } else if(isset($_POST['role'])){
            $query = "SELECT * FROM `users` WHERE `last_name` = '".$last_name."' AND
                                                `role` = '$role'";
        }
    } else if(isset($_POST['course'])) {
        if($course == "B.TECH"){
            $query = "SELECT * FROM `users` WHERE `stream` = 'CSE' 
                                                   OR 
                                                   `stream` = 'ME' 
                                                   OR 
                                                   `stream` = 'CE' 
                                                   OR 
                                                   `stream` = 'EE' 
                                                   OR 
                                                   `stream` = 'ECE'";
            if(isset($_POST['stream'])){
                $query = "SELECT * FROM `users` WHERE `stream` = 'CSE' AND `stream` = '$stream' 
                                                        OR 
                                                        `stream` = 'ME' AND `stream` = '$stream'
                                                        OR 
                                                        `stream` = 'CE'  AND `stream` = '$stream'
                                                        OR 
                                                        `stream` = 'EE'  AND `stream` = '$stream'
                                                        OR 
                                                        `stream` = 'ECE' AND `stream` = '$stream'";
                if(isset($_POST['semester'])){
                    $query = "SELECT * FROM `users` WHERE `stream` = 'CSE' AND 
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem'
                                                        OR
                                                        `stream` = 'ME' AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem' 
                                                        OR
                                                        `stream` = 'CE'  AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem' 
                                                        OR
                                                        `stream` = 'EE'  AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem' 
                                                        OR
                                                        `stream` = 'ECE'  AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem'";
                    if(isset($_POST['section'])) {
                        $query = "SELECT * FROM `users` WHERE `stream` = 'CSE' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'
                                                            OR
                                                            `stream` = 'ME' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec' 
                                                            OR
                                                            `stream` = 'CE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec' 
                                                            OR
                                                            `stream` = 'EE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec' 
                                                            OR
                                                            `stream` = 'ECE'  AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'";
                        if(isset($_POST['role'])){
                            $query = "SELECT * FROM `users` WHERE `stream` = 'CSE' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role'
                                                                OR
                                                                `stream` = 'ME' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role' 
                                                                OR
                                                                `stream` = 'CE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' AND
                                                                `role` = '$role'
                                                                OR
                                                                `stream` = 'EE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role' 
                                                                OR
                                                                `stream` = 'ECE'  AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec' AND
                                                                `role` = '$role'";
                        }
                    }
                }
            }
            
        } else {
            $query = "SELECT * FROM `users` WHERE `stream` = 'BBA(GEN)' 
                                                   OR 
                                                   `stream` = 'BBA(IND)'";
            if(isset($_POST['stream'])){
                $query = "SELECT * FROM `users` WHERE `stream` = 'BBA(GEN)' AND `stream` = '$stream' 
                                                        OR 
                                                        `stream` = 'BBA(IND)' AND `stream` = '$stream'";
                if(isset($_POST['semester'])){
                    $query = "SELECT * FROM `users` WHERE `stream` = 'BBA(GEN)' AND 
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem'
                                                        OR
                                                        `stream` = 'BBA(IND)' AND
                                                        `stream` = '$stream' AND 
                                                        `sem` = '$sem'";
                    if(isset($_POST['section'])) {
                        $query = "SELECT * FROM `users` WHERE `stream` = 'BBA(GEN)' AND 
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'
                                                            OR
                                                            `stream` = 'BBA(IND)' AND
                                                            `stream` = '$stream' AND 
                                                            `sem` = '$sem' AND 
                                                            `sec` = '$sec'";
                        if(isset($_POST['role'])){
                            $query = "SELECT * FROM `users` WHERE `stream` = 'BBA(GEN)' AND 
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role'
                                                                OR
                                                                `stream` = 'BBA(IND)' AND
                                                                `stream` = '$stream' AND 
                                                                `sem` = '$sem' AND 
                                                                `sec` = '$sec'AND
                                                                `role` = '$role'";
                        }
                    }
                }
            }
        }
    } else if(isset($_POST['stream'])) {
        
        $query = "SELECT * FROM `users` WHERE `stream` = '$stream'";
        if(isset($_POST['semester'])){
            $query = "SELECT * FROM `users` WHERE `stream` = '$stream' AND `sem` = '$sem'";
            if(isset($_POST['section'])) {
                $query = "SELECT * FROM `users` WHERE `stream` = '$stream' AND `sem` = '$sem' AND `sec` = '$sec'";
                if(isset($_POST['role'])){
                    $query = "SELECT * FROM `users` WHERE `stream` = '$stream' AND `sem` = '$sem' AND `sec` = '$sec' AND `role` = '$role'";
                }
            }
        }
        
    } else if(isset($_POST['semester'])) {
        
        $query = "SELECT * FROM `users` WHERE `sem` = '$sem'";
        if(isset($_POST['section'])) {
            $query = "SELECT * FROM `users` WHERE `sem` = '$sem' AND `sec` = '$sec'";
            if(isset($_POST['role'])){
                $query = "SELECT * FROM `users` WHERE `sem` = '$sem' AND `sec` = '$sec' AND `role` = '$role'";
            }
        }
        
    } else if(isset($_POST['section'])) {
        
        $query = "SELECT * FROM `users` WHERE `sec` = '$sec'";
        if(isset($_POST['role'])){
            $query = "SELECT * FROM `users` WHERE `sec` = '$sec' AND `role` = '$role'";
        }
        
    } else if(isset($_POST['role'])) {
        
        $query = "SELECT * FROM `users` WHERE `role` = '$role'";
        
    } else {
        
        $query = "SELECT * FROM `users` ORDER BY `clg_id`";
    }
    
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result)>0){
?>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>College-ID</th>
                            <th>Name</th>
                            <th class="text-center">Roll Number</th>
                            <th class="text-center">Designation</th>
                            <th>Stream</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                            

                                $count = 0;
                                while( $data = mysqli_fetch_assoc($result) ){
                                    $count++;
                        ?>
                                    <tr>
                                        <td class="text-center text-muted">#<?php echo $count; ?></td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?php echo $data['clg_id']; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $data['first_name']." ".$data['last_name']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                                if($data['role'] == "student" && $data['roll_no'] != ""){

                                                    echo $data['roll_no'];
                                                } else {

                                                    echo "-";
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                                if($data['role'] == "teacher" && $data['designation'] != ""){

                                                    echo $data['designation'];
                                                } else {

                                                    echo "-";
                                                }
                                            ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $data['stream']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $data['sem']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $data['sec']; ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" id="a" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-book-id="<?php echo $data['clg_id']; ?>">Update</button>
                                        </td>
                                    </tr>
                        <?php 
                                }
                            } else {
                        ?>
                                <div class="container" style="align-items: center; text-align: center; vertical-align: middle;  font-size: large;">
                                    <svg height="50px" viewBox="0 0 512 512" width="50px" xmlns="http://www.w3.org/2000/svg"><g fill="#ff0023"><path d="m256 512c-68.113281 0-132.324219-26.703125-180.8125-75.1875-48.484375-48.484375-75.1875-112.699219-75.1875-180.8125s26.703125-132.328125 75.1875-180.8125c48.488281-48.484375 112.699219-75.1875 180.8125-75.1875s132.328125 26.703125 180.8125 75.1875 75.1875 112.699219 75.1875 180.8125-26.703125 132.328125-75.1875 180.8125-112.699219 75.1875-180.8125 75.1875zm0-482c-124.617188 0-226 101.382812-226 226s101.382812 226 226 226 226-101.382812 226-226-101.382812-226-226-226zm0 0"/><path d="m402.667969 375.246094c-3.960938 0-7.78125-1.570313-10.605469-4.394532l-250.914062-250.914062c-3.121094-3.121094-4.710938-7.453125-4.34375-11.851562.367187-4.394532 2.648437-8.40625 6.242187-10.96875 33.148437-23.628907 72.210937-36.117188 112.953125-36.117188 107.523438 0 195 87.476562 195 195 0 40.746094-12.488281 79.804688-36.117188 112.953125-2.5625 3.59375-6.574218 5.875-10.972656 6.242187-.414062.035157-.828125.050782-1.242187.050782zm-227.085938-263.296875 224.472657 224.46875c13.75-24.492188 20.945312-51.96875 20.945312-80.417969 0-90.980469-74.019531-165-165-165-28.449219 0-55.921875 7.195312-80.417969 20.949219zm0 0"/><path d="m256 451c-107.523438 0-195-87.476562-195-195 0-40.746094 12.488281-79.804688 36.117188-112.953125 2.5625-3.59375 6.574218-5.875 10.972656-6.242187 4.386718-.367188 8.730468 1.222656 11.847656 4.34375l250.914062 250.914062c3.121094 3.117188 4.710938 7.453125 4.34375 11.847656-.367187 4.398438-2.648437 8.410156-6.242187 10.972656-33.148437 23.628907-72.210937 36.117188-112.953125 36.117188zm-144.054688-275.417969c-13.75 24.492188-20.945312 51.96875-20.945312 80.417969 0 90.980469 74.019531 165 165 165 28.449219 0 55.921875-7.195312 80.417969-20.949219zm0 0"/></g></svg>

                                    <p>No data found for selected values!</p>
                                </div>
                        <?php 
                            }
                        
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
  }
?>

<!-- Show Data End -->


<?php

if (isset($_POST['change_data'])) {

    $clg_id= $_POST['change_data'];
    $update_roll = "UPDATE `users` SET `roll_no` = '".mysqli_real_escape_string($link, $_POST['roll'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_designation = "UPDATE `users` SET `designation` = '".mysqli_real_escape_string($link, $_POST['designation'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_firstname = "UPDATE `users` SET `first_name` = '".mysqli_real_escape_string($link, $_POST['first_name'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_lastname = "UPDATE `users` SET `last_name` = '".mysqli_real_escape_string($link, $_POST['last_name'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_dob = "UPDATE `users` SET `dob` = '".mysqli_real_escape_string($link, $_POST['dob'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_stream = "UPDATE `users` SET `stream` = '".mysqli_real_escape_string($link, $_POST['stream'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_sem = "UPDATE `users` SET `sem` = '".mysqli_real_escape_string($link, $_POST['sem'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_sec = "UPDATE `users` SET `sec` = '".mysqli_real_escape_string($link, $_POST['sec'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";
    $update_email = "UPDATE `users` SET `alter_email` = '".mysqli_real_escape_string($link, $_POST['alt_email'])."' WHERE `clg_id`= '".$clg_id."' LIMIT 1";

    
    if(mysqli_query($link, $update_roll) &&
         mysqli_query($link, $update_designation) && 
         mysqli_query($link, $update_firstname) && 
         mysqli_query($link, $update_lastname) && 
         mysqli_query($link, $update_dob) &&  
         mysqli_query($link, $update_stream) && 
         mysqli_query($link, $update_sem) && 
         mysqli_query($link, $update_sec) && 
         mysqli_query($link, $update_email)){

        echo "<script> alert('Data Updated Successfully!'); </script>";
        echo "<script> window.location.assign('http://localhost/college_connect/admin/?p=user_detail'); </script>";

    }
}

?>
<!-- To download data into excel file -->
<script>
    var data = [
<?php
$result=mysqli_query($link, $query);
if(mysqli_num_rows($result) > 0){
    $count=0;
    while($da=mysqli_fetch_assoc($result)){
        $count+=1;
        echo "['".$count."',
                '".$da['role']."',
                '".$da['clg_id']."',
                '".$da['roll_no']."',
                '".$da['username']."',
                '".$da['first_name']." ".$da['last_name']."',
                
                '".$da['dob']."',
                '".$da['stream']."',
                '".$da['sem']."',
                '".$da['sec']."',
                '".$da['alter_email']."',
                '".$da['phone']."'],";
    }
}

        
        
?>


    ];
   

function download_csv() {
        var csv = 'S.No., Category, College-ID, Roll Number, Username, Full Name, Date of Birth, Stream, Semester, Section, Alternate E-mail, Contact Number\n';
        data.forEach(function(row) {
                csv += row.join(',');
                csv += "\n";
    });
    
        console.log(csv);
        var hiddenElement = document.createElement('a');
        hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
        hiddenElement.target = '_blank';
        hiddenElement.download = 'Student_Details.csv';
        hiddenElement.click();
    }
</script>