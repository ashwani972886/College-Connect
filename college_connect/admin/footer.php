                            </div>
                        </div>
                    </div>
                </div>
                <!-- Help Modal -->
                <div class="modal fade " id="queri_detail_modal">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="user_detailLabel">Details</h5>
                                <form method="POST">
                                    <button type="submit" class="btn btn-success" id="resolved" name="resolved" value="">Mark as resolved</button>
                                </form>
                            </div>
                            <div class="modal-body">
                                <p><span style="font-weight: bold; font-size: 18px;">College ID :</span> <span id="queri_detail_clg_id"></span></p>
                                <p><span style="font-weight: bold; font-size: 18px;">Name :</span> <span id="queri_detail_name"></span></p>
                                <p><span style="font-weight: bold; font-size: 18px;">Title :</span> <span id="queri_detail_title"></span></p>
                                <p><span style="font-weight: bold; font-size: 18px;">Description :</span> <span id="queri_detail_desc"></span></p>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" id="b" data-toggle="modal" data-target=".bd-example-modal-lg" data-book-id="" class="btn btn-primary ">Resolve</button>
                                
                            </div>
                        </div>
                    </div>
                </div>

<?php 

if (isset($_POST['resolved'])) {

    $query = "UPDATE `help` SET `status` = '1' WHERE `id`= '".$_POST['resolved']."' LIMIT 1";

    if(mysqli_query($link, $query)){
        echo "<script> alert('Query marked as resolved!'); </script>";
        echo "<script> window.location.assign('http://localhost/college_connect/admin/?p=dash'); </script>";
    }

}

?>

                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="user_detail">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="user_detailLabel">User Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                <form class="" method="POST" enctype="multipart/form-data">
                                    <div id="modal_alert" class="alert alert-danger fade show" role="alert"></div>    
                                    <div class="row" id="modal_data">
                                        <div class="col-md-6">

                                            <div class="position-relative form-group">
                                                <label for="user_category" class="">User Category:</label>
                                                <input name="category" id="category" type="text" class="form-control" disabled>
                                            </div>

                                            <div class="position-relative form-group" id="roll_div">
                                                <label for="roll-no" class="">Roll-Number:</label>
                                                <input name="roll" id="roll" type="text" class="form-control">
                                            </div>
                                            <div class="position-relative form-group" id="designation_div">
                                                <label for="user_designation" class="">Designation:</label>
                                                <input name="designation" id="designation" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_first_name" class="">First Name:</label>
                                                <input name="first_name" id="first_name" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_dob" class="">Date of Birth:</label>
                                                <input name="dob" id="dob" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_stream" class="">Stream:</label>
                                                <input name="stream" id="stream" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_sec" class="">Section:</label>
                                                <input name="sec" id="sec" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_contact_no" class="">Mobile Number:</label>
                                                <input name="phone" id="phone" type="text" class="form-control" disabled>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="college-id" class="">College_ID:</label>
                                                <input name="clg_id" id="clg_id" type="text" class="form-control" disabled>
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_username" class="">Username:</label>
                                                <input name="username" id="username" type="text" class="form-control" disabled>
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_last_name" class="">Last Name:</label>
                                                <input name="last_name" id="last_name" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_gender" class="">Gender:</label>
                                                <input name="gender" id="gender" type="text" class="form-control" disabled>
                                            </div>


                                            <div class="position-relative form-group">
                                                <label for="user_sem" class="">Semester:</label>
                                                <input name="sem" id="sem" type="text" class="form-control">
                                            </div>

                                            <div class="position-relative form-group">
                                                <label for="user_alt_email" class="">Alternate E-mail:</label>
                                                <input name="alt_email" id="alt_email" type="text" class="form-control">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="change_data" id="update_data" class="btn btn-danger">Update</button>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <script type="text/javascript" src="./assets/scripts/main.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {

                        $("#designation_div").hide();

                        $(document).on("click", "#a", function() {

                            $val = $(this).attr("data-book-id");

                            $.ajax({
                                type: "POST",
                                url: "actions.php?action=userDetail",
                                data: "clg_id=" + $val,
                                success: function(result) {
                                    $("#modal_alert").hide();
                                    $user = jQuery.parseJSON(result);

                                    $('#category').val($user.role);
                                    $('#clg_id').val($user.clg_id);
                                    if ($('#category').val($user.role).val() == "student") {
                                        $('#roll').val($user.roll_no);
                                        $("#roll_div").show();
                                        $("#designation_div").hide();
                                    } else {
                                        $('#designation').val($user.designation);
                                        $("#roll_div").hide();
                                        $("#designation_div").show();
                                    }

                                    $('#username').val($user.username);
                                    $('#first_name').val($user.first_name);
                                    $('#last_name').val($user.last_name);
                                    $('#dob').val($user.dob);
                                    $('#gender').val($user.gender);
                                    $('#stream').val($user.stream);
                                    $('#sem').val($user.sem);
                                    $('#sec').val($user.sec);
                                    $('#alt_email').val($user.alter_email);
                                    $('#phone').val($user.phone);
                                    $('#update_data').val($user.clg_id);


                                }

                            })

                        });


                        $(document).on("click", "#b", function() {

                            $val = $(this).attr("data-book-id");

                            $.ajax({
                                type: "POST",
                                url: "actions.php?action=userDetail",
                                data: "clg_id=" + $val,
                                success: function(result) {
                                    $("#modal_alert").hide();
                                    $user = jQuery.parseJSON(result);

                                    $('#category').val($user.role);
                                    $('#clg_id').val($user.clg_id);
                                    if ($('#category').val($user.role).val() == "student") {
                                        $('#roll').val($user.roll_no);
                                        $("#roll_div").show();
                                        $("#designation_div").hide();
                                    } else {
                                        $('#designation').val($user.designation);
                                        $("#roll_div").hide();
                                        $("#designation_div").show();
                                    }

                                    $('#username').val($user.username);
                                    $('#first_name').val($user.first_name);
                                    $('#last_name').val($user.last_name);
                                    $('#dob').val($user.dob);
                                    $('#gender').val($user.gender);
                                    $('#stream').val($user.stream);
                                    $('#sem').val($user.sem);
                                    $('#sec').val($user.sec);
                                    $('#alt_email').val($user.alter_email);
                                    $('#phone').val($user.phone);
                                    $('#update_data').val($user.clg_id);


                                }

                            })

                            });
                    });

                    $("#search_clg_id").click(function() {

                        $("#modal_alert").hide();
                        if($("#input_clg_id").val() == ""){
                            $("#modal_alert").show().html("Enter Valid College-ID!");
                            $("#modal_data").hide();
                        } else {
                            
                            $val = $("#input_clg_id").val();

                            $.ajax({
                            type: "POST",
                            url: "actions.php?action=userDetail",
                            data: "clg_id=" + $val,
                                success: function(result) {

                                    if(result == "Not Found"){

                                        $("#modal_alert").show().html("Enter Valid College-ID!");
                                        $("#modal_data").hide();
                                    } else {
                                        $("#modal_alert").hide();
                                        $("#modal_data").show();
                                        $user = jQuery.parseJSON(result);
                                        $('#category').val($user.role);
                                        $('#clg_id').val($user.clg_id);
                                        if ($('#category').val($user.role).val() == "student") {
                                            $('#roll').val($user.roll_no);
                                            $("#roll_div").show();
                                            $("#designation_div").hide();
                                        } else {
                                            $('#designation').val($user.designation);
                                            $("#roll_div").hide();
                                            $("#designation_div").show();
                                        }

                                        $('#username').val($user.username);
                                        $('#first_name').val($user.first_name);
                                        $('#last_name').val($user.last_name);
                                        $('#dob').val($user.dob);
                                        $('#gender').val($user.gender);
                                        $('#stream').val($user.stream);
                                        $('#sem').val($user.sem);
                                        $('#sec').val($user.sec);
                                        $('#alt_email').val($user.alter_email);
                                        $('#phone').val($user.phone);
                                    }
                                    
                                }

                            })

                        }

                    });
                    $(document).ready(function() {

                        $(document).on("click", "#queri_detail", function() {

                            $val = $(this).attr("data-queri-id");

                            $.ajax({
                                type: "POST",
                                url: "actions.php?action=queriDetail",
                                data: "id=" + $val,
                                success: function(result) {

                                    $user = jQuery.parseJSON(result);

                                    $('#queri_detail_clg_id').html($user.clg_id);
                                    $('#b').attr("data-book-id",$user.clg_id);
                                    $('#queri_detail_name').html($user.name);
                                    $('#queri_detail_title').html($user.title);
                                    $('#queri_detail_desc').html($user.desc);
                                    $('#resolved').val($user.id);
                                    

                                }

                            })

                        });
                    });

                    $("#download").click(function() {          
                        
                        
                            $.ajax({
                                type: "POST",
                                url: "user_details.php?download_data=yes",
                                data: "username=" + $("#download").val(),
                                success: function(result) {
                                    alert(result);
                                    // if (result  == 1) {
                                    //     window.location.assign("http://localhost/college_connect/");
                                    // } else {
                                    //     alert(result);
                                    // }
                                }
                            
                            })
                        

                    });


                </script>


</body>

</html>