
<?php

    $stream_stu = "null";

    if(isset($_POST['search'])){
        if(isset($_POST['stream']) == "" ){
            $stream_stu = "null";
            echo "<script> alert('Select valid stream!');</script>";
        } else {
            $stream_stu = $_POST['stream'];
        }
    }

?>

<!-- Page Heading Start -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                
                <i class="icon-gradient bg-happy-itmeo fa fa-fw" aria-hidden="true"></i>
            </div>
            <div>
                Roll Number Allotment
                <div class="page-title-subheading">Search stream and click 'Generate'.</div>
            </div>
        </div>
        <!-- Generator -->
        <div class="page-title-actions">
            <div class="position-relative form-group">
                <form method="POST">
                
                    <div style="font-size: 18px; font-weight: bold;">
                        <div class="custom-radio custom-control custom-control-inline">
                            <label for="exampleCustomSelect" class="">Stream:</label>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline mb-3">
                            <select type="select" id="exampleCustomSelect" name="stream" class="custom-select" style="width: 150px;">
                                <option value="stream" disabled selected>Stream</option>
                                <option value="BBA(GEN)">BBA(GEN)</option>
                                <option value="BBA(IND)">BBA(IND)</option>
                                <option value="CSE">CSE</option>
                                <option value="CE">CE</option>
                                <option value="ME">ME</option>
                                <option value="EE">EE</option>
                                <option value="ECE">ECE</option>
                            </select>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline">
                            <button name="search" class="btn btn-info" style="font-size: 20px;">Search!</button>
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div>

    </div>
</div>
<!-- Page Heading End  -->

<?php 
    if($stream_stu != "null"){ 
        $role_stu = "student";
                            
        $query = "SELECT * FROM users WHERE role = '".$role_stu."' AND stream = '".$stream_stu."' ORDER BY `first_name`";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0){
?>
            <form method="POST">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="text-center">
                                    <button name="allot" value="<?php echo $stream_stu; ?>" class="mb-2 mr-2 btn btn-success btn-lg btn-block" style="font-size:30px; font-weight: bold;">Generate!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">List of Students</h5>
                            <table class="mb-0 table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>College ID</th>
                                    <th>Student Name</th>
                                    <th>Stream</th>
                                    <th>Roll Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    

                                        $count = 0;
                                        while($stu = mysqli_fetch_assoc($result)){
                                            
                                            $count+=1;
                                            
                                ?>
                                
                                <tr>
                                    <th scope="row">#<?php echo $count; ?></th>
                                    <td><?php echo $stu['clg_id']; ?></td>
                                    <td><?php echo $stu['first_name']." ".$stu['last_name']; ?></td>
                                    <td><?php echo $stu['stream']; ?></td>
                                    <td><?php if($stu['roll_no'] != ""){ echo $stu['roll_no']; } else { ?> <div class="badge badge-warning"> <?php echo "Pending"; } ?></div></td>
                                </tr>

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
        } else {
?>
            <div class="container" style="align-items: center; text-align: center; vertical-align: middle;  font-size: large;">
              <svg height="50px" viewBox="0 0 512 512" width="50px" xmlns="http://www.w3.org/2000/svg"><g fill="#ff0023"><path d="m256 512c-68.113281 0-132.324219-26.703125-180.8125-75.1875-48.484375-48.484375-75.1875-112.699219-75.1875-180.8125s26.703125-132.328125 75.1875-180.8125c48.488281-48.484375 112.699219-75.1875 180.8125-75.1875s132.328125 26.703125 180.8125 75.1875 75.1875 112.699219 75.1875 180.8125-26.703125 132.328125-75.1875 180.8125-112.699219 75.1875-180.8125 75.1875zm0-482c-124.617188 0-226 101.382812-226 226s101.382812 226 226 226 226-101.382812 226-226-101.382812-226-226-226zm0 0"/><path d="m402.667969 375.246094c-3.960938 0-7.78125-1.570313-10.605469-4.394532l-250.914062-250.914062c-3.121094-3.121094-4.710938-7.453125-4.34375-11.851562.367187-4.394532 2.648437-8.40625 6.242187-10.96875 33.148437-23.628907 72.210937-36.117188 112.953125-36.117188 107.523438 0 195 87.476562 195 195 0 40.746094-12.488281 79.804688-36.117188 112.953125-2.5625 3.59375-6.574218 5.875-10.972656 6.242187-.414062.035157-.828125.050782-1.242187.050782zm-227.085938-263.296875 224.472657 224.46875c13.75-24.492188 20.945312-51.96875 20.945312-80.417969 0-90.980469-74.019531-165-165-165-28.449219 0-55.921875 7.195312-80.417969 20.949219zm0 0"/><path d="m256 451c-107.523438 0-195-87.476562-195-195 0-40.746094 12.488281-79.804688 36.117188-112.953125 2.5625-3.59375 6.574218-5.875 10.972656-6.242187 4.386718-.367188 8.730468 1.222656 11.847656 4.34375l250.914062 250.914062c3.121094 3.117188 4.710938 7.453125 4.34375 11.847656-.367187 4.398438-2.648437 8.410156-6.242187 10.972656-33.148437 23.628907-72.210937 36.117188-112.953125 36.117188zm-144.054688-275.417969c-13.75 24.492188-20.945312 51.96875-20.945312 80.417969 0 90.980469 74.019531 165 165 165 28.449219 0 55.921875-7.195312 80.417969-20.949219zm0 0"/></g></svg>

                <p>No data found for selected stream!</p>
            </div>
<?php
        }
    } else {
?>
        <div class="container" style="align-items: center; text-align: center; vertical-align: middle;  font-size: 40px;">
            <i class="fa fa-fw" aria-hidden="true" style="font-size: 50px;"></i>
            <p>Select a stream to show list</p>
        </div>
<?php
    }
?>

<?php 

    if(isset($_POST['allot'])){
        $stream_stu = $_POST['allot'];

        $role_stu = "student";
                            
        $query = "SELECT * FROM users WHERE role = '".$role_stu."' AND stream = '".$stream_stu."' ORDER BY `first_name`";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0){
            $count = 0;
            $roll_no = "";
            $current_year = date("y");
            while($stu = mysqli_fetch_assoc($result)){
                
                $count+=1;
                $roll_no = $stu['stream']."-".$current_year."/".str_pad( $count, 3, "0", STR_PAD_LEFT )."";
                
                $update = "UPDATE `users` SET `roll_no` = '".$roll_no."' WHERE `id` = '".mysqli_real_escape_string($link, $stu['id'])."' LIMIT 1";
            
                $result_update = mysqli_query($link, $update);
            }
            if($result_update){

                echo "<script> alert('Roll Numbers generated Succesfully'); </script>";

                echo "<script> awindow.location.assign('http://localhost/college_connect/admin/?p=alot_roll'); </script>";
            }
                                
        
        }


    }

?>
