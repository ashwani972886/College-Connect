<?php 
include("header.php");
$acd_pge = isset($_GET['a']) ? $_GET['a'] : '';
?>

<!-- <div class="navigation-menu-section" style="background-color:cadetblue;"> -->
<div class="container"> 

  <div class="col-md-12">
    <a href="?p=news" class="btn btn-primary pull-right" style= "font-size: 20px;"><i class="fas fa-chevron-left"></i> Go Back</a>
    <h1 style="color: black; font-weight: bold;" >ACADEMICS</h1>
    
    <div class="line-divider"></div>
    <br>
  </div>

  <!-- Post New Material Modal
    ================================================= -->

  <?php 

    if($user['role'] == "teacher"){ ?>

      <div class="create-post">
        <div class="row">
          <div class="tools text-center">
            <a  data-toggle="modal" data-target="#exampleModal"><h1 style="font-weight: bold; font-size: 50px;">Post New Material</h1></a>
          </div>                  
        </div>
      </div>
  <?php 
    }
  ?>
  <!-- Post New Material Modal End-->

  <!-- Navbar Starts -->
  
  <div class="col-md-12"  style="background-color: #4397CB; padding: 0px;">
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

  <!--Navbar Ends-->

  
  <!--Selection Mode Starts-->

  <div class="col-md-12">
    <br>
    <?php
              
      if($page == "acad"){
        if($acd_pge == "acd_cal"){
            include("viewsAfterLogin/academic_Views/academics_calendar.php");
        } else if($acd_pge == "dt_sht"){
            include("viewsAfterLogin/academic_Views/date_sheets.php");
        } else if($acd_pge == "tt"){
            include("viewsAfterLogin/academic_Views/time_table.php");
        } else if($acd_pge == "syl"){
            include("viewsAfterLogin/academic_Views/Syllabus.php");
        } else {
            include("viewsAfterLogin/academic_Views/academics_calendar.php");
        }
      }

    ?>

  </div>
</div>
<!--Selection Mode End-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Post New Material!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="acad_type_modal" class="" style="font-size: large;">Document Type:</label>
              <select class="form-control" id="doc_acad" name="doc_acad">
                <option value="doc" selected>Document Type</option>
                <option value="ACAD_CAL">Academic Calendar</option>
                <option value="DS">Date-Sheet</option>
                <option value="TT">Time-Table</option>
                <option value="Syl">Syllabus</option>
              </select>
          </div>

          <div class="form-group" id="doc_acad_vis">
            <div class="mb-3">
              <label for="formFile" class="form-label">Document Title:</label>
              <select class="form-control" id="doc_acad_title_cal" name="doc_acad_title_cal">
                <option value="Academic-Calendar" selected>Academic Calendar</option>
              </select>
              <select class="form-control" id="doc_acad_title_ds" name="doc_acad_title_ds">
                <option value="examination" selected>Examination</option>
                <option value="1stSessional">1st Sessional</option>
                <option value="2ndSessional">2nd Sessional</option>
                <option value="End-Semester">End-Semester</option>
                <option value="Re-appear">Re-appear</option>
              </select>
              <select class="form-control" id="doc_acad_title_tt" name="doc_acad_title_tt">
                <option value="New_TT" selected>New Time-Table</option>
              </select>
              <select class="form-control" id="doc_acad_title_syl" name="doc_acad_title_syl">
                <option value="New_Syl" selected>Syllabus</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Document Attachment:</label>
              <input type="file" name="acad_doc_up" accept=".pdf" class="form-control" id="acad_doc_up" >
              <p style="margin-left: 15px;">(Only pdf files acceptable)</p>
            </div>
          
          </div>

          <div class="form-group" id="course_id">
            <label for="acad_course_modal" class="col-form-label">Course:</label>
            <select class="form-control" id="course_acad" name="course_acad">
              <option value="Courses" selected>Course</option>
              <option value="B.Tech">B.Tech</option>
              <option value="BBA">BBA</option>
            </select>
          </div>
          <div class="form-group" id="branch_id">
            <label for="acad_branch_modal" class="col-form-label">Branch:</label>
            <select class="form-control" id="branch_acad_select1" name="branch_acad_select1" disabled>
              <option value="branch" selected>Branch</option>
              <option value="CSE">Computer Science & Engineering</option>
              <option value="ME">Mechanical Engineering</option>
              <option value="EE">Electrical Engineering</option>
              <option value="ECE">Electronics & Communication Engineering</option>
              <option value="CE">Civil Engineering</option>
            </select>
            <select class="form-control" id="branch_acad_select2" name="branch_acad_select2" disabled>
              <option value="branch"  selected>Branch</option>
              <option value="BBA_General">BBA-I(General)</option>
              <option value="BBA_Industry">BBA-II(Ind.)</option>
            </select>
          </div>
          <div class="form-group" id="sem_id">
            <label for="acad_sem_modal" class="" style="font-size: large;">Semester:</label>
            <select class="form-control" id="sem_acad_1" name="sem_acad_1" disabled>
              <option value="semester" selected>Semester</option>
              <option value="1Sem">First Semester</option>
              <option value="2Sem">Second Semester</option>
              <option value="3Sem">Third Semester</option>
              <option value="4Sem">Fourth Semester</option>
              <option value="5Sem">Fifth Semester</option>
              <option value="6Sem">Sixth Semester</option>
              <option value="7Sem">Seventh Semester</option>
              <option value="8Sem">Eighth Semester</option>
            </select>
            <select class="form-control" id="sem_acad_2" name="sem_acad_2" disabled>
              <option value="semester" selected>Semester</option>
              <option value="1Sem">First Semester</option>
              <option value="2Sem">Second Semester</option>
              <option value="3Sem">Third Semester</option>
              <option value="4Sem">Fourth Semester</option>
              <option value="5Sem">Fifth Semester</option>
              <option value="6Sem">Sixth Semester</option>
            </select>
          </div>
          <div class="form-group" id="sec_id">
              <label for="acad_section_modal" class="" style="font-size: large;">Section:</label>
              <select class="form-control" id="sec_acad" name="sec_acad" disabled>
                <option value="sec" selected>Section</option>
                <option value="Sec_A">A</option>
                <option value="Sec_B">B</option>
              </select>
          </div>
        


          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:30px;">Close</button>
            <button class="btn btn-primary" type="submit" name="publish_update_acad" id="publish_update_acad">Publish/Post</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Upload New Data to Database -->

<?php

  if(isset($_POST['publish_update_acad'])){

    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    $datefile = date("d-m-Y");

    // Store file Category
    $filecategory = $_POST['doc_acad'];

    // Store Course Type
    $coursetype = $_POST['course_acad'];

    // Store Branch Type
    if($_POST['branch_acad_select1'] != ""){

      $branchtype = $_POST['branch_acad_select1'];

    } else {

      $branchtype = $_POST['branch_acad_select2'];

    }

    // Store Semester Type
    if($_POST['sem_acad_1'] != ""){

      $semtype = $_POST['sem_acad_1'];

    } else {

      $semtype = $_POST['sem_acad_2'];

    }

    // Store Section Type
    $sectype = $_POST['sec_acad'];

    // Get file location
    $fileloc = $_FILES['acad_doc_up']['tmp_name'];

    // Get Original File Name
    $filenameorg = $_FILES['acad_doc_up']['name'];

    // Store file name
    if($filecategory == "ACAD_CAL"){

      $filename = $_POST['doc_acad_title_cal']."_".$datefile.".pdf";

    } else if($filecategory == "DS"){

      $filename = $_POST['doc_acad_title_ds']."_".$datefile.".pdf";

    } else if($filecategory == "TT"){

      $filename = $_POST['doc_acad_title_tt']."_".$datefile.".pdf";

    }  else{

      $filename = $_POST['doc_acad_title_syl']."_".$datefile.".pdf";

    }
    

    // File Location store
    $filestore = "acad_uploads/".$filename;
    move_uploaded_file($fileloc, $filestore);

    

    $query = "INSERT INTO acad (`file_category`, `file_name`, `for_course`, `for_branch`, `for_sem`, `for_sec`,`up_time`)
                    VALUES ('".mysqli_real_escape_string($link, $filecategory)."',
                          '".mysqli_real_escape_string($link, $filename)."',
                          '".mysqli_real_escape_string($link, $coursetype)."',
                          '".mysqli_real_escape_string($link, $branchtype)."',
                          '".mysqli_real_escape_string($link, $semtype)."',
                          '".mysqli_real_escape_string($link, $sectype)."',
                          '".mysqli_real_escape_string($link, $date)."')";


    if(mysqli_query($link, $query)){

      echo "<script> alert('Document uploaded successfully'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=acad&a=acd_cal'); </script>";

    } else{
    echo "Invalid file type.";
    }

  }

?>