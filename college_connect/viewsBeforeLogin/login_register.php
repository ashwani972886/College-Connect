<!-- Landing Page Contents
    ================================================= -->
<div id="lp-register" style="background: linear-gradient(to right, #497784 , #435f43); min-height: 100%;">
  <div class="container " style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row">
      <div class="col-sm-5">
        <div class="intro-texts">
          <img src="images/logo.png" style="height: 60px; width: 300px;" alt="">
          <h3 class="text-white">A New Perspective.</h3> 
        </div>
      </div>
      <div class="col-sm-6 col-sm-offset-1">
        <div class="reg-form-container"> 
        
          <!-- Register/Login Tabs-->
          <div class="reg-options">
            <ul class="nav nav-tabs">
              <li class=""><a href="#register" data-toggle="tab">Register</a></li>
              <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
            </ul><!--Tabs End-->
          </div>
          
          <!--Registration Form Contents-->
          <div class="tab-content">
            <div class="tab-pane " id="register">
              <h3>Welcome to College-Connect !!!</h3>
              <br>
              <div class="row">
                <form name="registration_form" id='registration_form' class="form-inline" method="dialog">
                  
                  <div class="form-group col-xs-7">
                    <input id="validateID" class="form-control input-group-lg" type="text" name="validateID" placeholder="Enter College_ID"/>
                  </div>
                  <button type="submit" class="btn btn-primary col-xs-4" id="validate_id">Validate</button>
                </form>
              </div>
              <div id="verified" class="alert alert-success" role="alert"></div>
              <div id="notVerified" class="alert alert-danger" role="alert"></div>
              <div style="height: 1px; width: 100%; background-color: #149AC9;"></div>
              
              <!--Register Form-->
              
              <form name="registration_form" id='registration_form' class="form-inline" method="dialog" style="margin-top: 15px;">
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="firstname" class="sr-only">First Name</label>
                    <input id="firstname" class="form-control input-group-lg" type="text" name="firstname" placeholder="First name"/>
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="lastname" class="sr-only">Last Name</label>
                    <input id="lastname" class="form-control input-group-lg" type="text" name="lastname" placeholder="Last name"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-12">
                    <label for="Username" class="sr-only">Username</label>
                    <input id="username" class="form-control input-group-lg" type="text" name="Username" placeholder="Choose your Username"/>
                  </div>
                </div>
                
              <div class="row">
                <div class="form-group col-xs-12">
                  <button type="submit" id="checkAvaliability" class="btn btn-primary col-xs-6">Check Availability</button>
                </div>
              </div>
              </form>
              <div id="validate_username" class="alert alert-success" role="alert"></div>
              <form name="registration_form" id='registration_form' class="form-inline" method="dialog" style="margin-top: 15px;">
                <div class="row">
                  <div class="form-group col-xs-12">
                    <input id="password" class="form-control input-group-lg" type="password" name="password" placeholder="Password"/>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-12">
                    <input id="confirmPassword" class="form-control input-group-lg" type="password" name="confirm_password" placeholder="Confirm Password"/>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-xs-12">
                    <input id="alterEmail" class="form-control input-group-lg" type="email" name="alter_email" placeholder="Alternate Email"/>
                  </div>
                </div>
                <div class="row">
                  <div id="gender" class="form-group gender" style="margin-left: 15px;">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="male" style="margin-top: 6px;">Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="female" style="margin-top: 6px;">Female
                    </label>
                  </div>
                </div>
              
                <div class="row">
                  <div class="form-group col-sm-3 col-xs-6">
                    <select class="form-control" id="role" disabled>
                      <option value="role" disabled selected>Role</option>
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-3 col-xs-6">
                    <select class="form-control" id="stream">
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
                </div>
                <br>
                <button type="submit" id="registerBtn" class="btn btn-primary">Register Now</button>  
              </form><!--Register Now Form Ends-->
              <br><br>
              <p><a href="http://localhost/college_connect/">Already have an account?</a></p>
            </div><!--Registration Form Contents Ends-->
            
            <!--Login-->
            <div class="tab-pane active" id="login">
              <h3>Login</h3>
              
              <!--Login Form-->
              <form name="Login_form" id='Login_form' method="dialog">
                <div class="row">
                  <div class="form-group col-xs-12" style="display: table;">
                    <input type="text" id="my-email" name="Email" class="form-control" placeholder="Username" aria-describedby="basic-addon2" style="border-radius: 30px 0px 0px 30px; border: 1px solid #CCC;">
                    <span class="input-group-addon " id="basic-addon2" style="border-radius: 0px 30px 30px 0px;">@college-connect.in</span>
                    </input>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-xs-12">
                    <input id="my-password" class="form-control input-group-lg" type="password" name="password" placeholder="Password" style="border: 1px solid #CCC;"/>
                  </div>
                </div>
                <p><a href="#"data-toggle="modal" data-target="#forgotModal" >Forgot Password?</a></p>
                <button type="submit" id="loginBtn" class="btn btn-primary">Login Now</button>
              </form><!--Login Form Ends--> 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="forgot_usename" placeholder="Enter your username">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="send_forgot_mail" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>