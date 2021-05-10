<?php
  $query_check_edu = "SELECT * FROM edu WHERE `clg_id` = '".mysqli_real_escape_string($link, $user['clg_id'])."' ";
  $result_check_edu = mysqli_query($link,$query_check_edu);
  if(mysqli_num_rows($result_check_edu)>0){
    $edu_check = mysqli_fetch_assoc($result_check_edu);
  }

  $query_check_work = "SELECT * FROM work WHERE `clg_id` = '".mysqli_real_escape_string($link, $user['clg_id'])."' ";
  $result_check_work = mysqli_query($link,$query_check_work);
  if(mysqli_num_rows($result_check_edu)>0){
    $work_check = mysqli_fetch_assoc($result_check_work);
  }

?>
<div id="page-contents">
  <div class="container">
    <div class="row">

      <div style="margin-top: 10px;" class="col-md-12 static">
        <div class="profile-card">
            <img style="height: 100px; width: 100px;" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="user" class="profile-photo" />
            <h4><a href="" class="text-white"><?php echo $user['first_name']." ".$user['last_name'] ?></a></h4>
            <a href="?p=profedt" class="btn btn-primary pull-right">Edit Profile</a>
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
        <div class="timeline-cover">
            <div class="col-md-12"  style="background-color: #4397CB; padding: 0px; margin-top: -20px;">
                <ul class="nav nav-tabs list-inline"  onmouseover="this.style.backgroundColor='#4397CB'" onmouseout="this.style.backgroundColor='#4397CB'">
                <li class="nav-item">
                    <a class="nav-link active" href="?p=acad&a=acd_cal" style="color: white; font-size: 21px; font-weight: bold;" onmouseover="this.style.backgroundColor='#3E4095'" onmouseout="this.style.backgroundColor=''">Academic Calendar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="?p=acad&a=dt_sht" role="button" style="color: white; font-size: 21px; font-weight: bold;"  onmouseover="this.style.backgroundColor='#3E4095'" onmouseout="this.style.backgroundColor='' ">Date Sheet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=acad&a=tt" style="color: white; font-size: 21px; font-weight: bold;" onmouseover="this.style.backgroundColor='#3E4095'" onmouseout="this.style.backgroundColor=''">Time Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?p=acad&a=syl" style="color: white; font-size: 21px; font-weight: bold;" onmouseover="this.style.backgroundColor='#3E4095'" onmouseout="this.style.backgroundColor=''">Syllabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://jcboseustymca.co.in/Forms/Student/ResultStudents.aspx" target="_blank" style="color: white; font-size: 21px; font-weight: bold;" onmouseover="this.style.backgroundColor='#3E4095'" onmouseout="this.style.backgroundColor=''">Results</a>
                </li>
                </ul>
            </div>
        </div>
        <!--Timeline Menu for Large Screens-->
    
      </div>

    </div>

    <div id="page-contents" style="margin-top: -30px;">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-12">
          <!-- About
          ================================================= -->
          
          <div class="about-profile">
            <!-- About Content -->
            <?php 
            
                if($user['about'] != "") {
            ?>
                  <div class="about-content-block">
                    <div class="card " style="border-radius: 10px;">
                      <div class="card-header text-center" style="border-top-left-radius: 10px; border-top-right-radius: 10px; font-size: 20px; font-weight: bold; color: white; background: #48AFDC;">
                        About
                      </div>
                      <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p><?php echo $user['about'] ?>.</p>
                        </blockquote>
                      </div>
                    </div>
                  </div>
            <?php
                }

                if(mysqli_num_rows($result_check_edu)>0){
                  if($edu_check['clg_id'] == $user['clg_id']){
               
            ?>
            
                    <!-- Education Content -->
                    <div class="about-content-block">
                      <div class="card " style="border-radius: 10px;">
                        <div class="card-header text-center" style="border-top-left-radius: 10px; border-top-right-radius: 10px; font-size: 20px; font-weight: bold; color: white; background: #48AFDC;">
                          Education
                        </div>
                        <div class="card-body">
                    
                          <?php
                            $query = "SELECT * FROM edu WHERE `clg_id` = '".mysqli_real_escape_string($link, $user['clg_id'])."' ";
                            $result = mysqli_query($link,$query);
                            if(mysqli_num_rows($result)>0){
                                  $count = 0;
                                  while( $edu = mysqli_fetch_assoc($result) ){
                                      $count++;
                          ?>
                                      <div class="col-sm-6">
                                        <div class="card" style="margin: 5px; ">
                                          <div class="card-body" style="height: 100%;">
                                            <h5 class="card-title" style="font-size: 20px;"><?php echo $edu['edu_level']; ?></h5>
                                            <p class="card-text" style="font-size: 14px;">From <b><?php echo $edu['inst_name']; ?> </b> in <b><?php echo $edu['pass_year']; ?></b></p>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    
                        <?php   
                                  }
                            }
                        ?>

                        </div>
                      </div>
                    </div>
            <?php
                  }
                }


                
                if(mysqli_num_rows($result_check_work)>0){

                  if($work_check['clg_id'] == $user['clg_id']){
            ?>
                    <!-- Work Experience Content -->
                    <div class="about-content-block">
                      <div class="card " style="border-radius: 10px;">
                        <div class="card-header text-center" style="border-top-left-radius: 10px; border-top-right-radius: 10px; font-size: 20px; font-weight: bold; color: white; background: #48AFDC;">
                          Work Experience
                        </div>
                        <div class="card-body">
                    
                          <?php
                              $query = "SELECT * FROM work WHERE `clg_id` = '".mysqli_real_escape_string($link, $user['clg_id'])."' ";
                              $result = mysqli_query($link,$query);
                              if(mysqli_num_rows($result)>0){
                                    $count = 0;
                                    while( $work = mysqli_fetch_assoc($result) ){
                                        $count++;
                          ?>
                                      <div class="col-sm-6">
                                        <div class="card" style="margin: 5px; ">
                                          <div class="card-body" style="height: 100%;">
                                            <h3 class="card-title"><?php echo $work['org_name']; ?></h3>
                                            <h6>In <b><?php echo $work['work_locality']; ?></b></h6>
                                            <p class="card-text" style="font-size: 14px;">As a <b><?php echo $work['designation']; ?></b> with a experience of <b><?php echo $work['experience']; ?></b></p>
                                            
                                          </div>
                                        </div>
                                      </div>
                          
            <?php   
                                    }
                              } 
            ?>

                        </div>
                      </div>
                    </div>
            <?php
                  }
                }
            ?>
            

          </div>

          <?php
            if($user['about'] == "" && mysqli_num_rows($result_check_edu)<1 && mysqli_num_rows($result_check_work)<1){
          ?>
            
                  <div class="container" style="align-items: center; text-align: center; vertical-align: middle; margin-top: 150px; font-size: large;">
                    <svg height="50px" viewBox="0 0 512 512" width="50px" xmlns="http://www.w3.org/2000/svg"><g fill="#ff0023"><path d="m256 512c-68.113281 0-132.324219-26.703125-180.8125-75.1875-48.484375-48.484375-75.1875-112.699219-75.1875-180.8125s26.703125-132.328125 75.1875-180.8125c48.488281-48.484375 112.699219-75.1875 180.8125-75.1875s132.328125 26.703125 180.8125 75.1875 75.1875 112.699219 75.1875 180.8125-26.703125 132.328125-75.1875 180.8125-112.699219 75.1875-180.8125 75.1875zm0-482c-124.617188 0-226 101.382812-226 226s101.382812 226 226 226 226-101.382812 226-226-101.382812-226-226-226zm0 0"/><path d="m402.667969 375.246094c-3.960938 0-7.78125-1.570313-10.605469-4.394532l-250.914062-250.914062c-3.121094-3.121094-4.710938-7.453125-4.34375-11.851562.367187-4.394532 2.648437-8.40625 6.242187-10.96875 33.148437-23.628907 72.210937-36.117188 112.953125-36.117188 107.523438 0 195 87.476562 195 195 0 40.746094-12.488281 79.804688-36.117188 112.953125-2.5625 3.59375-6.574218 5.875-10.972656 6.242187-.414062.035157-.828125.050782-1.242187.050782zm-227.085938-263.296875 224.472657 224.46875c13.75-24.492188 20.945312-51.96875 20.945312-80.417969 0-90.980469-74.019531-165-165-165-28.449219 0-55.921875 7.195312-80.417969 20.949219zm0 0"/><path d="m256 451c-107.523438 0-195-87.476562-195-195 0-40.746094 12.488281-79.804688 36.117188-112.953125 2.5625-3.59375 6.574218-5.875 10.972656-6.242187 4.386718-.367188 8.730468 1.222656 11.847656 4.34375l250.914062 250.914062c3.121094 3.117188 4.710938 7.453125 4.34375 11.847656-.367187 4.398438-2.648437 8.410156-6.242187 10.972656-33.148437 23.628907-72.210937 36.117188-112.953125 36.117188zm-144.054688-275.417969c-13.75 24.492188-20.945312 51.96875-20.945312 80.417969 0 90.980469 74.019531 165 165 165 28.449219 0 55.921875-7.195312 80.417969-20.949219zm0 0"/></g></svg>

                    <p>Nothing Found in your profile!</p>
                    <p><a href="?p=profedt">Build your profile now!</a></p>
                  </div>
          <?php
            }
          ?>
        
        </div>
      </div>
    </div>
  </div>
</div>