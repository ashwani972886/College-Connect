<?php
    $pge = isset($_GET['pge']) ? $_GET['pge'] : '';

?>

<!-- Page Heading Start -->
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-fw icon-gradient bg-malibu-beach" aria-hidden="true"></i>
            </div>
            <div>
                New College ID
                <div class="page-title-subheading">Just select role and click on 'Generate'.</div>
            </div>
        </div>
        <!-- Generator -->
        <div class="page-title-actions">
            <div class="position-relative form-group">
                <form method="POST">
                    <div style="font-size: 18px; font-weight: bold;">
                        <div class="custom-radio custom-control custom-control-inline">
                            <label style="font-size: 22px;">Role:</label>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline">
                            <input type="radio" name="role" value="teacher" id="exampleCustomRadio"
                                class="custom-control-input">
                            <label class="custom-control-label" for="exampleCustomRadio">Teacher</label>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline">
                            <input type="radio" name="role" value="student" id="exampleCustomRadio2"
                                class="custom-control-input">
                            <label class="custom-control-label" for="exampleCustomRadio2">Student</label>
                        </div>
                        <div class="custom-radio custom-control custom-control-inline">
                            <button name="generate" class="btn btn-info" style="font-size: 20px;">Generate!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Page Heading End  -->

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Newly Added ID's</div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>College-ID</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        
                        if($pge == "" || $pge == "1"){
                            $page1=0;
                        } else {
                            $page1 = ($pge*10)-10;
                        }
                        

                        $query = "SELECT * FROM `college_id` ORDER BY id DESC LIMIT $page1,10";
                        $result = mysqli_query($link,$query);

                        if(mysqli_num_rows($result)>0){

                            $count = $page1;
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
                                    <td class="text-center">
                                        <?php 
                                            if($data['role'] == "teacher"){
                                                echo "Teacher";
                                            } else {
                                                echo "Student";
                                            } 
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($data['status'] == "pending"){ ?>
                                            <div class="badge badge-warning"><?php echo $data['status']; ?></div>
                                        <?php } else { ?>
                                            <div class="badge badge-success"><?php echo $data['status']; ?></div>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($data['status'] == "pending"){ ?>
                                                <button type="button" class="btn btn-primary btn-sm" disabled>Details</button>
                                        <?php } else { ?>
                                                <button type="button" id="a" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-book-id="<?php echo $data['clg_id']; ?>">Details</button>
                                        <?php } ?>
                                       
                                    </td>
                                </tr>
                    <?php 
                            }
                        }
                    
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="d-block text-center card-footer">
                <?php
                    $query_1 = "SELECT * FROM `college_id` ORDER BY id DESC ";
                    $result_1 = mysqli_query($link,$query_1);

                    $page_num = mysqli_num_rows($result_1);
                    $page_num = $page_num/10;
                    $page_num = ceil($page_num);
                    
                    for($b = 1; $b <= $page_num; $b++){
                ?>
                    <a href="?p=gen_id&pge=<?php echo $b; ?>"> <div class="ml-auto badge badge-pill badge-success"><?php echo $b; ?></div></a>
                <?php
                    }
                
                ?>
            </div>
        </div>
    </div>
</div>


<?php

    if(isset($_POST['generate'])){
        if(isset($_POST['role']) == ""){
            echo "<script> alert('Select role!'); </script>";
        } else {
            $year = date("y");

            if($_POST['role'] == "teacher"){
                $role = "T";
            } else {
                $role = "S";
            }

            $query = "SELECT `clg_id` FROM `college_id` ORDER BY id DESC LIMIT 1";

            $result = mysqli_query($link, $query);

            $clg_id = mysqli_fetch_assoc($result);

            $last_val = $clg_id['clg_id'];

            $last_val = explode("-", $last_val);

            $new_val = $last_val[3] + 1;

            $new_val = str_pad( $new_val, 4, "0", STR_PAD_LEFT );

            $new_id =  $year."-".$admin['institution_id']."-".$role."-".$new_val;
            $status = "pending";

            $query_insert = "INSERT INTO college_id (`clg_id`, `role`, `status`)
                    VALUES ('".mysqli_real_escape_string($link, $new_id)."',
                    '". mysqli_real_escape_string($link, $_POST['role'])."',
                    '". mysqli_real_escape_string($link, $status)."')";

            if(mysqli_query($link, $query_insert)){
                        
                echo "<script> alert('Id Generated Successfully!'); </script>";

                echo "<script> window.location.assign('http://localhost/college_connect/admin/?p=gen_id'); </script>";

            }  

        }
        
    }

?>
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
        echo "<script> window.location.assign('http://localhost/college_connect/admin/?p=gen_id'); </script>";

    }
}

?>
