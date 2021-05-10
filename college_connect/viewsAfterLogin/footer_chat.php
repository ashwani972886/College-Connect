<script>

        $("#new_chat_alert").hide();


        $("#send_new_message").click(function() {
                $("#new_chat_alert").hide();

                if($("#new_username").val() == ""){
                        $("#new_chat_alert").html("Please enter username").show();
                } else if($("#new_message").val() == ""){
                        $("#new_chat_alert").html("Please fill some message").show();
                } else {
                        $("#new_chat_alert").hide();
                        $.ajax({
                            type: "POST",
                            url: "actions.php?action=sendNewMessage",
                            data: "username=" + $("#new_username").val() + "&message=" + $("#new_message").val(),
                            success: function(result) {

                                if(result == "Invaid Username"){
                                        window.location.assign("http://localhost/college_connect/?p=chat&to=null");
                                } else if(result == 1) {
                                        alert("Message Sent And already connected");
                                        window.location.assign("?p=chat&to=null");
                                } else if(result == 2) {
                                        alert("Message Sent");
                                        window.location.assign("http://localhost/college_connect/?p=chat&to=null");
                                }

                            }
                            
                        });
                }              

        });

        document.getElementById('bottomOfDiv').scrollIntoView(true);

        $("#send_message").click(function() {
                
                if($("#message").val() == ""){
                    
                } else {

                        $.ajax({
                                type: "POST",
                                url: "actions.php?action=sendMessage",
                                data: "message=" + $("#message").val() + "&from_user=" + "<?php echo $user['username'] ?>"
                                        + "&to_user=" + "<?php echo $_GET['to'] ?>",
                                success: function(result) {

                                        if(result == 1){
                                                $("#message").html("");
                                                window.location.assign("http://localhost/college_connect/?p=chat&gp=<?php echo $_GET['gp']; ?>&to=<?php echo $_GET['to']; ?>");
                                        } else {
                                                alert("not working");
                                        }
                                }                            
                        });
                }

        });


</script>

