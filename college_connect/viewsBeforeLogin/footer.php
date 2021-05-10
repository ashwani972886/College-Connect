        <!-- Scripts
        ================================================= -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.appear.min.js"></script>
        <script src="js/jquery.incremental-counter.js"></script>
        <script src="js/script.js"></script>

        <script>

            $("#verified").hide();
            $("#notVerified").hide();
            $("#validate_username").hide();

            $("#firstname").prop("disabled", true);
            $("#lastname").prop("disabled", true);
            $("#username").prop("disabled", true);
            $("#checkAvaliability").prop("disabled", true);
            $("#password").prop("disabled", true);
            $("#confirmPassword").prop("disabled", true);
            $("#alterEmail").prop("disabled", true);
            $("#gender").prop("disabled", true);
            $("#role").prop("disabled", true);
            $("#stream").prop("disabled", true);
            $("#registerBtn").prop("disabled", true);

            $("#validate_id").click(function() {
                $("#verified").hide();
                $("#notVerified").hide();

                if($("#validateID").val() == ""){
                    alert("Please Enter your college ID");
                } else {  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=validateID",
                        data: "valID=" + $("#validateID").val(),
                        success: function(result) {
                                
                            if (result == 1) {
                                $("#verified").show().html('Now you can register');

                                $("#firstname").prop("disabled", false);
                                $("#lastname").prop("disabled", false);
                                $("#username").prop("disabled", false);
                                $(document).ready(()=>{
                                    $("#role").val('teacher');
                                });
                                $("#checkAvaliability").prop("disabled", false);
                                                    
                            } else if (result == 2) {
                                $("#verified").show().html('Now you can register');

                                $("#firstname").prop("disabled", false);
                                $("#lastname").prop("disabled", false);
                                $("#username").prop("disabled", false);
                                $(document).ready(()=>{
                                    $("#role").val('student');
                                });
                                $("#checkAvaliability").prop("disabled", false);
                                                    
                            } else {
                                    
                                $("#notVerified").show().html('Please enter a valid college ID');
                                    
                                $("#firstname").prop("disabled", true);
                                $("#lastname").prop("disabled", true);
                                $("#username").prop("disabled", true);
                                $("#checkAvaliability").prop("disabled", true);
                                $("#password").prop("disabled", true);
                                $("#confirmPassword").prop("disabled", true);
                                $("#gender").prop("disabled", true);
                                $("#stream").prop("disabled", true);
                                $("#registerBtn").prop("disabled", true);
                            }
                        }
                    
                    })
                }

            });

            $("#checkAvaliability").click(function() {

                if($("#firstname").val() == ""){
                    alert("Please Enter your first name");
                } else if($("#lastname").val() == ""){
                    alert("Please Enter your lastname");
                } else if($("#username").val() == ""){
                    alert("Please Enter your username");
                } else {  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=checkUsername",
                        data: "userName=" + $("#username").val(),
                        success: function(result) {
                            
                            if (result == 1) {
                                alert("This username is already taken");
                            } else {

                                $("#validate_username").show().html('Username is avaliable');

                                $("#password").prop("disabled", false);
                                $("#confirmPassword").prop("disabled", false);
                                $("#alterEmail").prop("disabled", false);
                                $("#gender").prop("disabled", false);
                                $("#stream").prop("disabled", false);
                                $("#registerBtn").prop("disabled", false);
                                
                            }
                        }
                    
                    })
                }

            });

            $("#registerBtn").click(function() {
                $radioValue = $("input[name='gender']:checked").val();
                if($("#password").val() == ""){
                    alert("Please Enter your Password");
                } else if($("#confirmPassword").val() == ""){
                    alert("Please Enter your confirm password");
                } else if($("#stream").val() == "Stream"){
                    alert("Please Enter your username");
                } else if($("#password").val() != $("#confirmPassword").val()){
                    alert("Password do not match!");
                } else if($("#password").val().length < 8){
                    alert("Password must contain atleast 8 characters!");
                } else {  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=register",
                        data: "clg_id=" + $("#validateID").val() + "&firstName=" + $("#firstname").val() + "&lastName=" + $("#lastname").val() + "&userName=" + $("#username").val()
                                + "&password=" + $("#password").val() + "&alterEmail=" + $("#alterEmail").val() + "&gender=" + $radioValue 
                                + "&role=" + $("#role").val() + "&stream=" + $("#stream").val() + "&valID=" + $("#validateID").val(),
                        success: function(result) {
                            
                            if (result  == 1) {
                                window.location.assign("http://localhost/college_connect/");
                            } else {

                                alert(result);
               
                            }
                        }
                    
                    })
                }

            });

            $("#loginBtn").click(function() {          

                if($("#my-email").val() == ""){
                    alert("Please Enter your username ");
                } else if($("#my-password").val() == ""){
                    alert("Please Enter your password");
                } else {  
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=login",
                        data: "username=" + $("#my-email").val() + "&password=" + $("#my-password").val(),
                        success: function(result) {
                            
                            if (result  == 1) {
                                window.location.assign("http://localhost/college_connect/");
                            } else {
                                alert(result);
                            }
                        }
                    
                    })
                }

            });
            
            $("#send_forgot_mail").click(function() { 

                       

                if($("#forgot_usename").val() == ""){
                    alert("Please Enter your username ");
                } else {  
                    //alert($("#forgot_usename").val());
                    $.ajax({
                        type: "POST",
                        url: "actions.php?action=forgot",
                        data: "username=" + $("#forgot_usename").val(),
                        success: function(result) {
                            if (result  == 1) {
                                alert("Invalid username");
                            } else {
                                alert("Reset password link is sent to your mail");
                                window.location.assign("http://localhost/college_connect/");
                            }
                            
                        }
                    
                    })
                }

            });

        </script>
    </body>
</html>