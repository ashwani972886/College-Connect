<div id="page-contents">
  <div class="container">
    <div class="row">

      <!-- Newsfeed Common Side Bar Left
      ================================================= -->
      <div class="col-md-3 static">
        <div class="" style="margin-left: -50px; margin-top: 10px;">
          <a href="?p=news"><img style="height: 165px; width: 280px;" src="images/logo_cc.png" alt="user" class="profile-photo" /></a>
        </div><!--profile card ends-->
        <br>
        <ul class="nav-news-feed">
          <li><i class="icon ion-ios-people"></i><div><a href="?p=prof" style= "font-size: 18px; font-weight: bold;">My profile</a></div></li>
          <li><i class="icon ion-ios-people-outline"></i><div><a href="?p=acad" style= "font-size: 18px; font-weight: bold;">Academics</a></div></li>
          <li><i class="icon ion-chatboxes"></i><div><a href="?p=chat&to=null" style= "font-size: 18px; font-weight: bold;">Chatroom</a></div></li>
          <li><i class="icon ion-images"></i><div><a href="?p=genDis" style= "font-size: 18px; font-weight: bold;">General Discussion</a></div></li>
        </ul><!--news-feed links ends-->

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
          <div class="col-md-3 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 style="text-align: center; font-size: 30px; font-weight: bold;" class="grey">IMPORTANT</h4>
              <?php
              
                if($user['stream'] == "CSE"){
              
                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'CSE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
                    $result2 = mysqli_query($link, $query2);
                } else if($user['stream'] == "CE"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'CE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
                    $result2 = mysqli_query($link, $query2);

                } else if($user['stream'] == "ECE"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'ECE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
                    $result2 = mysqli_query($link, $query2);

                } else if($user['stream'] == "ME"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'ME' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
                    $result2 = mysqli_query($link, $query2);

                } else if($user['stream'] == "EE"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'EE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
                    $result2 = mysqli_query($link, $query2);

                } else if($user['stream'] == "BBA(GEN)"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'BBA-I(General)' OR `noti_specify` = 'all_bba' OR `noti_specify` = 'all' ORDER BY id DESC";
              
                    $result2 = mysqli_query($link, $query2);

                } else if($user['stream'] == "BBA(IND)"){

                    $query2 = "SELECT * FROM noti WHERE `noti_specify` = 'BBA-II(Ind.)' OR `noti_specify` = 'all_bba' OR `noti_specify` = 'all' ORDER BY id DESC";
              
                    $result2 = mysqli_query($link, $query2);

            }
                

                if(mysqli_num_rows($result2)>0){

                  while($noti= mysqli_fetch_assoc($result2)){

                    if($noti['imp'] == "yes") { ?>
                      <div class="follow-user">
                        <img src="images/Important-Stamp.png" alt="" class="profile-photo-sm pull-left" />
                        <div>
                          <h3><a href="#<?php echo $noti['id']; ?>"><?php echo $noti['noti_title']; ?></a></h3>          
                        </div>
                      </div>
              <?php
                    }

                  }

                }
              ?>
              
            </div>
          </div>

          <!-- Newsfeed Common Side Bar Right End
          ================================================= -->
          <br>

      </div>

      <!-- Newsfeed Centre Post Content
      ================================================= -->
      <div class="col-md-6">

        <?php 

          if($user['role'] == "teacher"){ ?>

          <!-- Post Create Box
          ================================================= -->
            <div class="create-post">
              <div class="row">

                <div class="tools text-center">
                  <a  data-toggle="modal" data-target="#exampleModal"><h1 style="font-weight: bold; font-size: 50px;">Post A New Update</h1></a>
                </div>
                
              </div>
            </div><!-- Post Create Box End-->
        <?php 
          }

        ?>

        <!-- Post Content
        ================================================= -->
        <?php
            if($user['stream'] == "CSE"){
              
              $query = "SELECT * FROM noti WHERE `noti_specify` = 'CSE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "CE"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'CE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "ECE"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'ECE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "ME"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'ME' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "EE"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'EE' OR `noti_specify` = 'all_btech' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "BBA(GEN)"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'BBA-I(General)' OR `noti_specify` = 'all_bba' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            } else if($user['stream'] == "BBA(IND)"){

              $query = "SELECT * FROM noti WHERE `noti_specify` = 'BBA-II(Ind.)' OR `noti_specify` = 'all_bba' OR `noti_specify` = 'all' ORDER BY id DESC";
              
              $result = mysqli_query($link,$query);

            }
          
          if(mysqli_num_rows($result)>0){

            $count = 0;
            while( $noti = mysqli_fetch_assoc($result) ){
                

              $query1 = "SELECT * FROM users WHERE `clg_id` = '".mysqli_real_escape_string($link, $noti['clg_id'])."'";

              $result1 = mysqli_query($link, $query1);

              $post_noti = mysqli_fetch_assoc($result1);

              $count++;
            
              $time = $noti['post_time'];
              
              $timeago=get_timeago(strtotime($time));
          ?>
          
              <div class="post-content" id="<?php echo $noti['id']; ?>">
                <div class="card" style="border-radius: 10px;">
                  <div class="post-container card-header" style="padding: 5px;">
                    <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail" >
                      <div class="user-info" style="padding-top: 5px;">
                        <p class="text-muted float-right" style="float: right; padding-top: 5px;"><?php   echo $timeago?></p>
                        <a href="?p=prof&u=<?php echo $post_noti['username']; ?>" class="profile-link">
                          <h3 style="margin-top: 5px; font-weight: bold;"><?php echo $post_noti['first_name']." ".$post_noti['last_name']; ?>
                            <p class="text-muted" style="font-size: 10px;"><?php echo $post_noti['designation']; ?></p>
                          </h3>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="card-body">

                            <h4 class="card-title" style="color: black; font-weight: bold;"><?php echo $noti['noti_title']; ?></h4>
                            <p class="card-text"><?php echo $noti['noti_desc']; ?></p>
                            
                            <?php if($noti['attachment'] != ""){ 
                    
                                    $attach = $noti['attachment'];
                        
                                    $attach = explode('.', $attach);
                                
                                    $attach_name = $attach[0];
                                
                                    $attach_ext = $attach[1];
                                    
                                    if($attach_ext == "pdf"){
                            ?>
                                        <a href="noti_uploads/<?php echo $noti['attachment'];  ?>" target="_blank"><?php echo $noti['attachment']; ?></a>
                            <?php
                                    } else {
                            ?>
                                        <a href="noti_uploads/<?php echo $noti['attachment']; ?>" target="_blank"><img src="noti_uploads/<?php echo $noti['attachment']; ?>" style="margin-bottom: 30px;" alt="post-image" class="img-responsive post-image" /></a>
                            <?php 
                                    }
                                } 
                                if($noti['clg_id'] == $user['clg_id']){ ?>
                                  <form method="POST">
                                    <button type="submit" name="delete_noti" value="<?php echo $noti['id']; ?>" class="btn btn-danger" style="float: left;"><i class="far fa-trash-alt"></i></button>
                                  </form>
                          <?php } 
                                  if($noti['noti_url'] != ""){ ?>
                                      <a href="<?php echo $noti['noti_url']; ?>" class="btn btn-primary" style="float: right;"id="url_button">Go somewhere</a>
                            <?php } ?>
                  </div> 

                </div>
              </div>
        <?php }
          } ?>
      </div>

      
    </div>
  </div>
</div>

      

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Post New Update!</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Modal Content -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">

          <!-- For Course Selection -->
          <div class="form-group">
            <label for="audience" class="col-form-label">Audience type:</label>
            <select class="form-control" id="audience" name="audience">
              <option value="for_all" selected>For all(Global Update)</option>
              <option>B.Tech</option>
              <option>BBA</option>
            </select>
          </div>

          <!-- For Branch Selection -->
          <div class="form-group">
            <label for="audience_type" class="col-form-label">Specify your audience:</label>
            <select class="form-control" id="audience_type1" name="audience_type1">
              <option value="all_btech" selected>All</option>
              <option>CSE</option>
              <option>ME</option>
              <option>EE</option>
              <option>ECE</option>
              <option>CE</option>
            </select>
            <select class="form-control" id="audience_type2" name="audience_type2">
              <option value="all_bba"  selected>All</option>
              <option>BBA-I(General)</option>
              <option>BBA-II(Ind.)</option>
            </select>
          </div>

          <!-- For Notification Title -->
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"></label>Title:</label>
            <input type="text" class="form-control" id="noti_title" name="noti_title">
          </div>

          <!-- If Notification is important -->
          <div class="form-group">
            <input type="checkbox" id="imp_up" name="imp_up" value="yes">  Important? (Check only if update is important)
          </div>

          <!-- For Notification Description -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="message-text" name="message-text"></textarea>
          </div>

          <!-- For URL -->
          <div class="form-group">
            <label for="link" class="col-form-label">URL:</label>
            <input type="text" class="form-control" id="refrence-link" name="refrence-link">
          </div>

          <!-- For Attachment -->
          <div class="form-group">
            <div class="input-group mb-3">
              <label for="formFile" class="form-label">Attach picture</label>
              <input type="file" class="form-control" name="noti_pic" accept="image/*" class="form-control" id="customFile" >
            </div>
            <div class="input-group mb-3">
                <label for="formFile" class="form-label">Attach pdf</label>
                <input type="file" name="noti_pdf" accept=".pdf" class="form-control" id="doc" >
            </div>
          </div>

          <!-- Modal Footer containing Buttons -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:30px;">Close</button>
            <button class="btn btn-primary" type="submit" name="publish_update">Publish/Post</button>
          </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal End -->

<?php

  // To Find if notification is available with same name
  function check_noti_pic(){
              
    $link = mysqli_connect("localhost", "root", "", "CC");

    $id_noti_pic = "noti_". rand(1000000,10000000);
    $check_noti_pic = "SELECT `attachment` FROM noti WHERE `attachment` = '".mysqli_real_escape_string($link, $id_noti_pic)."' LIMIT 1";
    $result = mysqli_query($link, $check_noti_pic);
    $noti_pic = mysqli_fetch_assoc($result);

    if($noti_pic){

      check_noti_pic();

    } else{

      return $id_noti_pic;

    }

  }

  //  To Publish Notification
  if(isset($_POST['publish_update'])){

    if($_FILES['noti_pic']['name'] != "" && $_FILES['noti_pdf']['name'] != ""){

      echo "<script> alert('Please select only one attachment at a time!'); </script>";

    }
    
    $id = $user['clg_id'];
    $date = date("Y-m-d H:i:s");
    $datefile = date("d-m-Y");

    // To check if notification is important
    if($_POST['imp_up'] == "yes"){

      $check = "yes";

    } else{

      $check = "no";

    }
    
    // To store audience type
      if($_POST['audience'] == "for_all"){

        $audience_type = "all";

      } else if($_POST['audience'] == "B.Tech"){

        $audience_type = $_POST['audience_type1'];

      } else {

        $audience_type = $_POST['audience_type2'];

      }

    
    if($_POST['noti_title'] == ""){
      echo "<scrip> alert('Please enter title'); </scrip>";
    } else if($_POST['message-text'] == ""){
      echo "<script> alert('Please enter description'); </script>";
    } else {

      if($_FILES['noti_pic']['name'] != ""){

          $id_noti_pic = check_noti_pic();

          // Getting file name
          $filename = $_FILES['noti_pic']['name'];

          // Valid extension
          $valid_ext = array('png','jpeg','jpg');

          // Location
          $location = "noti_uploads/".$filename;

          // New image name. 
          $imageName = $id_noti_pic;

          // file extension
          $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
          $file_extension = strtolower($file_extension);

          $path = "noti_uploads/".$imageName.'.'.$file_extension;
          $notiImgName = $imageName.'.'.$file_extension;


          if(in_array($file_extension,$valid_ext)){  
        
            // Compress Image
            compressImage($_FILES['noti_pic']['tmp_name'], $path, 50);
            

            $query = "INSERT INTO noti (`clg_id`, `imp`, `noti_for`, `noti_specify`, `noti_title`, `noti_desc`, `noti_url`,`attachment`, `post_time`)
                        VALUES ('".mysqli_real_escape_string($link, $id)."',
                              '".mysqli_real_escape_string($link, $check)."',
                              '".mysqli_real_escape_string($link, $_POST['audience'])."',
                              '".mysqli_real_escape_string($link, $audience_type)."',
                              '".mysqli_real_escape_string($link, $_POST['noti_title'])."',
                              '".mysqli_real_escape_string($link, $_POST['message-text'])."',
                              '".mysqli_real_escape_string($link, $_POST['refrence-link'])."',
                              '".mysqli_real_escape_string($link, $notiImgName)."',
                              '".mysqli_real_escape_string($link, $date)."')";


            if(mysqli_query($link, $query)){

              echo "<script> alert('Update publihed successfully'); </script>";

              echo "<script> window.location.assign('http://localhost/college_connect/?p=news'); </script>";

            } 
            

          } else{
              
              echo "Invalid file type.";
          }

      } else if ($_FILES['noti_pdf']['name'] != ""){

        // Get file location
        $fileloc = $_FILES['noti_pdf']['tmp_name'];

        // Get Original File Name
        $filenameorg = $_FILES['noti_pdf']['name'];
        
        // Modified File Name
        $filename = $_POST['noti_title'].".pdf";
        // File Location store
        $filestore = "noti_uploads/".$filename;
        move_uploaded_file($fileloc, $filestore);
        
        $query = "INSERT INTO noti (`clg_id`, `imp`, `noti_for`, `noti_specify`, `noti_title`, `noti_desc`, `noti_url`, `attachment`, `post_time`)
                        VALUES ('".mysqli_real_escape_string($link, $id)."',
                              '".mysqli_real_escape_string($link, $check)."',
                              '".mysqli_real_escape_string($link, $_POST['audience'])."',
                              '".mysqli_real_escape_string($link, $audience_type)."',
                              '".mysqli_real_escape_string($link, $_POST['noti_title'])."',
                              '".mysqli_real_escape_string($link, $_POST['message-text'])."',
                              '".mysqli_real_escape_string($link, $_POST['refrence-link'])."',
                              '".mysqli_real_escape_string($link, $filename)."',
                              '".mysqli_real_escape_string($link, $date)."')";


            if(mysqli_query($link, $query)){

              echo "<script> alert('Update publihed successfully'); </script>";

              echo "<script> window.location.assign('http://localhost/college_connect/?p=news'); </script>";

            } 

      } else {
          
          $query = "INSERT INTO noti (`clg_id`, `imp`, `noti_for`, `noti_specify`, `noti_title`, `noti_desc`, `noti_url`, `post_time`)
                        VALUES ('".mysqli_real_escape_string($link, $id)."',
                              '".mysqli_real_escape_string($link, $check)."',
                              '".mysqli_real_escape_string($link, $_POST['audience'])."',
                              '".mysqli_real_escape_string($link, $audience_type)."',
                              '".mysqli_real_escape_string($link, $_POST['noti_title'])."',
                              '".mysqli_real_escape_string($link, $_POST['message-text'])."',
                              '".mysqli_real_escape_string($link, $_POST['refrence-link'])."',
                              '".mysqli_real_escape_string($link, $date)."')";


            if(mysqli_query($link, $query)){

              echo "<script> alert('Update publihed successfully'); </script>";

              echo "<script> window.location.assign('http://localhost/college_connect/?p=news'); </script>";

            } 
      }

    }

  }

  if(isset($_POST['delete_noti'])){
    
    $query1 = "SELECT `attachment` FROM `noti` WHERE id='".$_POST['delete_noti']."'";
    $result1 = mysqli_query($link, $query1);
    $delete = mysqli_fetch_assoc($result1);
    if($delete['attachment'] != ""){
      unlink("noti_uploads/".$delete['attachment']);
    }
    
    $query = "DELETE FROM `noti` WHERE id='".$_POST['delete_noti']."' ";
    
    if(mysqli_query($link, $query)){

      echo "<script> alert('Your post has deleted'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=news'); </script>";

    } 
  }

?>