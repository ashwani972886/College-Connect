<!-- Edit Work and Education
================================================= -->


<!-- Education Mode!
  ================================================= -->
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-ios-book-outline"></i>My education</h4>
    <div class="line"></div>
  </div>
  <!-- Education Fields -->
  <div class="edit-block">
    <form name="education" id="educ" class="form-inline" method = "POST">
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="education" class="">Education</label>
          <select class="form-control" id="education" name="education">
          <option value="education" disabled selected>Education</option>
          <option>Secondary/Maticulation/10th</option>
          <option>Senior Secondary/Inter/12th</option>
          <option value="Under_Graduate">Under Graduate</option>
          <option>Post Graduate</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="course" class="">Course</label>
          <select class="form-control" id="course" name="course">
          <option value="course" disabled selected>Course</option>
          <option>B.Tech</option>
          <option>BBA(Gen)</option>
          <option>BBA(IND)</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="school">School/College/University Name</label>
          <input id="school" class="form-control input-group-lg" type="text" name="school" title="Enter School" placeholder="School/College/University"/>
        </div>
      </div>
        
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="time-period">Time Period</label>
        </div>
        <div class="form-group col-xs-4">
          <select class="form-control" id="from-time-period" name="from-time-period">
          <option value="from-year" disabled selected>Year</option>
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
        <div class="form-group col-xs-1"><label style="padding-left: 8px; padding-top: 3px; font-size: 15px;">TO</label></div>
        <div class="form-group col-xs-4">
          <select class="form-control" id="to-time-period-edu" name="to-time-period">
          <option value="to-year" disabled selected>Year</option>
          <?php
              $year = date("Y");
              $change = $year-61;
              $change_fwd = $year+6;
              while($change <= $change_fwd){
            ?>
                <option><?php echo $change; ?></option>
            <?php
                $change+=1;
              }
            ?>
          </select>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="save_edu" id="save_edu">Save & Add</button>
    </form>
  </div>
</div>

<!-- Education Database Updation -->
<?php

  if(isset($_POST['save_edu'])){

    if($_POST['from-time-period'] < $_POST['to-time-period']) {

      $id = $user['clg_id'];
    
      $query = "INSERT INTO edu (`clg_id`, `edu_level`, `course`, `inst_name`, `add_year`, `pass_year`)
                VALUES ('".mysqli_real_escape_string($link, $id)."',
                        '".mysqli_real_escape_string($link, $_POST['education'])."',
                        '".mysqli_real_escape_string($link, $_POST['course'])."',
                        '".mysqli_real_escape_string($link, $_POST['school'])."',
                        '".mysqli_real_escape_string($link, $_POST['from-time-period'])."',
                        '".mysqli_real_escape_string($link, $_POST['to-time-period'])."')";

      if(mysqli_query($link, $query)){

        echo "<script> alert('Details updated successfully'); </script>";

        echo "<script> window.location.assign('http://localhost/college_connect/?p=profedt&f=edndwrk'); </script>";

      }    

    } else{

        echo "<script> alert('Enter Valid Year!'); </script>";

        echo "<script> window.location.assign('http://localhost/college_connect/?p=profedt&f=edndwrk'); </script>";
      }
  }

?>

<!-- Work Mode!
  ================================================= -->  
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
    <div class="line"></div>
  </div>
  <!-- Work Fields -->
  <div class="edit-block">
    <form name="work" id="work" class="form-inline" method="POST">
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="company">Company/Organization/Project</label>
          <input id="company" class="form-control input-group-lg" type="text" name="company" title="Enter Company" placeholder="Company name"  />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="designation">Designation</label>
          <input id="designation" class="form-control input-group-lg" type="text" name="designation" title="Enter designation" placeholder="Designation"  />
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="work-experience">Working Period</label>
          <select class="form-control" id="work_experience" name="experience">
          <option value="working-period">Working Period</option>
          <option>Less than 1 Yrs</option>
          <option>1-2 Yrs</option>
          <option>2-3 Yrs</option>
          <option>3-4 Yrs</option>
          <option>4-5 Yrs</option>
          <option>More than 5 Yrs</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="work-city">City/Town</label>
          <input id="work-city" class="form-control input-group-lg" type="text" name="city" title="Enter city" placeholder="Your city"/>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="work-description">Description</label>
          <textarea id="work-description" name="description" class="form-control" placeholder="Describe your job" rows="4" cols="400"></textarea>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="save_work" >Save & Add</button>
    </form>
  </div>
</div>

<!-- Work Database Updation -->
<?php

  if(isset($_POST['save_work'])){

    $id = $user['clg_id'];
    
    $query = "INSERT INTO work (`clg_id`, `org_name`, `designation`, `experience`, `work_locality`, `job_desc`)
              VALUES ('".mysqli_real_escape_string($link, $id)."',
                      '".mysqli_real_escape_string($link, $_POST['company'])."',
                      '".mysqli_real_escape_string($link, $_POST['designation'])."',
                      '".mysqli_real_escape_string($link, $_POST['experience'])."',
                      '".mysqli_real_escape_string($link, $_POST['city'])."',
                      '".mysqli_real_escape_string($link, $_POST['description'])."')";

    if(mysqli_query($link, $query)){

      echo "<script> alert('Details updated successfully'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=profedt&f=edndwrk'); </script>";

    }

  }

?>