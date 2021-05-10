    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.min.js"></script>
		<script src="js/jquery.incremental-counter.js"></script>
    <script src="js/script.js"></script>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5ffc75fc0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <script>

      $("#passAlert").hide();

      // Subjects Info
      $(document).ready(function() {
        
        $("#branch_bas").change(function() {

          $("#sem_bas_hs_1").show();
          $("#sem_bas_hs_2").hide();

          if($("#branch_bas").val() == ""){

            $("#sem_bas_hs_1").show();
            $("#sem_bas_hs_2").hide();

          }  else if($("#branch_bas").val() == "CSE" || $("#branch_bas").val() == "ME" || $("#branch_bas").val() == "EE" || $("#branch_bas").val() == "ECE" || $("#branch_bas").val() == "CE"){

              $("#sem_bas_hs_1").show();
              $("#sem_bas_hs_2").hide();
          
          } else {

              $("#sem_bas_hs_1").hide();
              $("#sem_bas_hs_2").show();

          }

        }).change();

      });

      $("#blankfield").hide();

      $(document).ready(function() {

        $("#add_info").click(function() {

            if($("#sub").val() == ""){
              $("#blanfield").html("<p>Subject field can't be empty</p>").show();
            }

        });

      });

      
      // Edu Edit Profile
      $(document).ready(function() {
        // bind change event handler
        $('#education').change(function() {
          // update disabled property
          $("#course").prop('disabled', this.value != "Under_Graduate");
          // trigger change event to set initial value
        }).change();
      }); 
      
      $(document).ready(function() {
        $('#education').change(function() {
          // update disabled property
          if($('#school').val() == ""){
            $('#to-time-period-edu').change(function() {
              // update disabled property
              $("#save_edu").prop('disabled', this.value == "to-year");
              // trigger change event to set initial value
            }).change();
          }
          // trigger change event to set initial value
        }).change();
      });
      // Edu Edit Profile End

      // Newsfeed New Material Post
      $(document).ready(function() {
        // bind change event handler
        $('#audience').change(function() {
          if($('#audience').val() == "For all(Global Update"){

            $("#audience_type2").hide();

          } else if($('#audience').val() == "B.Tech"){
          $("#audience_type1").prop('disabled', this.value != "B.Tech").show();
          $("#audience_type2").hide();

          } else{

            $("#audience_type2").prop('disabled', this.value != "BBA").show();
            $("#audience_type1").hide();
            
          }
        }).change();
      });

      // Update Password
      $("#update-pass").click(function() {

        if($("#old-password").val() == ""){
          $("#passAlert").html("Please Enter your Old Password").show();
        } else if($("#new-password").val() == ""){
          $("#passAlert").html("Please Enter your New Password").show();
        } else if($("#conf-password").val() == ""){
          $("#passAlert").html("Please Enter your Confirm Password").show();
        } else if($("#new-password").val() != $("#conf-password").val()){
          $("#passAlert").html("Password does not matched").show();
        } else if($("#new-password").val().length < 8){
          $("#passAlert").html("Password must contain atleast 8 characters").show();
        } else {
          $("#passAlert").hide();
            $.ajax({
              type: "POST",
              url: "actions.php?action=updatePassword",
              data: "email=" + $("#myEmail").val() + "&oldPassword=" + $("#old-password").val() + "&newPassword=" + $("#new-password").val(),
              success: function(result) {
                  if (result == 1) {

                    alert("Your Password is successfully changed");
                    
                    window.location.assign("http://localhost/college_connect/?p=profedt");
                    
                  } else {
                    
                    $("#passAlert").html(result).show();
                    
                  }
              }
              
            })
        }

      });

    </script>
  


	</body>
</html>
