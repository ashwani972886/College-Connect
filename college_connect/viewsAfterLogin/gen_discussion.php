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
      </div>       

      <div class="col-md-7">

        <!-- Post Create Box
        ================================================= -->
        <div class="create-post">
          <div class="row">          
            <div class="tools text-center">
              <a  data-toggle="modal" data-target="#exampleModal"><h2 style="font-weight: bold; font-size: 50px;">Queries & Suggestions</h2></a>
              <!-- <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">Publish</button> -->
            </div>      
          </div>
        </div><!-- Post Create Box End-->

        <!-- Post Content
        ================================================= -->
        <?php
                  
          $query = "SELECT * FROM post_gn ORDER BY id DESC";
          $result = mysqli_query($link,$query);
          if(mysqli_num_rows($result)>0){
            $count = 0;
            while( $post_gen = mysqli_fetch_assoc($result) ){                            
                          
              $query1 = "SELECT * FROM users WHERE `clg_id` = '".mysqli_real_escape_string($link, $post_gen['clg_id'])."'";

              $result1 = mysqli_query($link, $query1);
    
              $post_user = mysqli_fetch_assoc($result1);
                      
              $count++;
                        
              $time = $post_gen['post_time'];
                        
              $timeago=get_timeago(strtotime($time));
          ?>
              <div class="post-content">
              <?php if($post_gen['post_attach'] != ""){ ?>
                <img src="post_uploads/<?php echo $post_gen['post_attach']; ?>" alt="post-image" class="img-responsive post-image" />
              <?php } ?>
                <div class="post-container">
                    <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                      <div class="user-info">
                        <?php if($post_gen['clg_id'] == $user['clg_id']){ ?>
                                  <form method="POST">
                                    <button type="submit" name="delete_post" value="<?php echo $post_gen['id']; ?>" class="btn btn-danger" style="float: right;"><i class="far fa-trash-alt"></i></button>
                                  </form>
                        <?php } ?>
                        <h5><a href="?p=prof&u=<?php echo $post_user['username']; ?>" class="profile-link"><?php echo $post_user['first_name']." ".$post_user['last_name'] ?></a></h5>
                        <p class="text-muted">Published about <?php echo $timeago ?></p>
                      </div>
            
                      <div class="line-divider"></div>
                      <div class="post-text">
                        <h3 style="font-weight: bold; color: #555555;"><?php echo $post_gen['post_query']; ?></h3>
                      </div>
                      <div class="line-divider" style="border: 0.6px solid;"></div>
                      <div class="post-text" style="margin-left: 15px;">
                        <p style="font-size: 18px;"><?php echo $post_gen['post_desc']; ?></p>
                      </div>
                      <div class="line-divider"></div>
          <?php
      
                      $query3 = "SELECT * FROM post_cmnt WHERE `post_id` = '".mysqli_real_escape_string($link, $post_gen['post_id'])."' ORDER BY id DESC";
                      $result3 = mysqli_query($link,$query3);
                      if(mysqli_num_rows($result3)>0){
                        $count = 0;
                        while( $post_cmnt = mysqli_fetch_assoc($result3) ){
                                                                            
                          $query4 = "SELECT * FROM users WHERE `clg_id` = '".mysqli_real_escape_string($link, $post_cmnt['clg_id'])."'";

                          $result4 = mysqli_query($link, $query4);
                  
                          $cmnt_user = mysqli_fetch_assoc($result4);
                                  
                          $count++;
                                  
          ?>
                          <div class="post-comment" style="width: 100%;">
                            <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="" class="profile-photo-sm" />
                            <p style="width: 100%;"><a href="?p=prof&u=<?php echo $cmnt_user['username']; ?>" class="profile-link"><?php echo $cmnt_user['first_name']." ".$cmnt_user['last_name']; ?> </a><br>
                               <?php echo $post_cmnt['cmnt'] ?>
                               <?php if($post_cmnt['clg_id'] == $user['clg_id']){ ?>
                                <form method="POST">
                                  <button type="submit" name="delete_cmnt" value="<?php echo $post_cmnt['id']; ?>" class="btn btn-danger" style="float: right;"><i class="far fa-trash-alt"></i></button>
                                </form>
                              <?php } ?>
                            </p>
                    </div>
          <?php
            }
          }

          ?>
                        
                </div>
                <form method="POST">
                          
                  <div class="post-comment">
                    <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="" class="profile-photo-sm" />
                    <input type="text" class="form-control col-sm-3" style="width:90% !important; float: right;" name="comment" placeholder="Post a comment">
                    <input type="text" class="form-control col-sm-3" style="display: none;"  placeholder="" value="<?php echo $post_gen['post_id']; ?>" name="cmnt_post_id">
                  </div>
                  <button class="btn btn-success" type="submit" style="display: none;" name="comment_post"></button>
                </form>
              </div>
      </div> 
          <?php 
            }
          }
          ?>
    </div>
      
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Post Your Queries/Suggestions!</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"></label>Title:</label>
                <input type="text" class="form-control" id="query_title" name="query_title">
              </div>
              
              <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea class="form-control" id="query-text" name="query_text"></textarea>
              </div>
              
              <div class="form-group">
                <label for="link" class="col-form-label">URL:</label>
                <input type="text" class="form-control" id="query_link" name="query_link">
              </div>

              <div class="form-group">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Add image</label>
                    <input type="file" name="post_pic" accept="image/*" class="form-control" id="customFile" >
                  </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:30px;">Close</button>
                <button class="btn btn-primary" type="submit" name="publish_post">Publish/Post</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

  </div>
</div>

<?php


  if(isset($_POST['publish_post'])){

    $id = $user['clg_id'];
    $date = date("Y-m-d H:i:s");

    if($_POST['query_title'] == ""){
      echo "<script> alert('Please enter title); </script>";
    } else if($_POST['query_text'] == ""){
      echo "<script> alert('Please enter description'); </script>";
    } else {
      
        $check_post = checkpost();

        if($_FILES['post_pic']['name'] != ""){

            $id_post_pic = $check_post;

            // Getting file name
            $filename = $_FILES['post_pic']['name'];
          
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');
          
            // Location
            $location = "post_uploads/".$filename;
          
            $imageName = $id_post_pic; // New image name. 
          
            // file extension
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
          
            $path = "post_uploads/".$imageName.'.'.$file_extension;
            $postImgName = $imageName.'.'.$file_extension;

            if(in_array($file_extension,$valid_ext)){  
                
              // Compress Image
              compressImage($_FILES['post_pic']['tmp_name'], $path, 50);

                  $query = "INSERT INTO post_gn (`clg_id`, `post_id`, `post_query`, `post_desc`, `post_url`, `post_attach`, `post_time`)
                          VALUES ('".mysqli_real_escape_string($link, $id)."',
                                  '".mysqli_real_escape_string($link, $check_post)."',
                                  '".mysqli_real_escape_string($link, $_POST['query_title'])."',
                                  '".mysqli_real_escape_string($link, $_POST['query_text'])."',
                                  '".mysqli_real_escape_string($link, $_POST['query_link'])."',
                                  '".mysqli_real_escape_string($link, $postImgName)."',
                                  '".mysqli_real_escape_string($link, $date)."')";

                  if(mysqli_query($link, $query)){

                    echo "<script> alert('Query publihed successfully'); </script>";

                    echo "<script> window.location.assign('http://localhost/college_connect/?p=genDis'); </script>";

                  } 

            } else{
                      
              echo "Invalid file type.";
            }

        } else {

          $query = "INSERT INTO post_gn (`clg_id`, `post_id`, `post_query`, `post_desc`, `post_url`, `post_time`)
                          VALUES ('".mysqli_real_escape_string($link, $id)."',
                                  '".mysqli_real_escape_string($link, $check_post)."',
                                  '".mysqli_real_escape_string($link, $_POST['query_title'])."',
                                  '".mysqli_real_escape_string($link, $_POST['query_text'])."',
                                  '".mysqli_real_escape_string($link, $_POST['query_link'])."',
                                  '".mysqli_real_escape_string($link, $date)."')";

                  if(mysqli_query($link, $query)){

                    echo "<script> alert('Query publihed successfully'); </script>";

                    echo "<script> window.location.assign('http://localhost/college_connect/?p=genDis'); </script>";

                  }       
        }

    }
  
  }

  if(isset($_POST['comment_post'])){

    $id = $user['clg_id'];
    $post_id = $_POST['cmnt_post_id'];
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO post_cmnt (`clg_id`, `post_id`, `cmnt`, `cmnt_time`)
              VALUES ('".mysqli_real_escape_string($link, $id)."',
                      '".mysqli_real_escape_string($link, $post_id)."',
                      '".mysqli_real_escape_string($link, $_POST['comment'])."',
                      '".mysqli_real_escape_string($link, $date)."')";

    if(mysqli_query($link, $query)){

      echo "<script> alert('Comment successfully'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=genDis'); </script>";

    } 

  }

  if(isset($_POST['delete_post'])){
    $query = "DELETE FROM `post_gn` WHERE id='".$_POST['delete_post']."' ";
    
    if(mysqli_query($link, $query)){

      echo "<script> alert('Your post has deleted'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=genDis'); </script>";

    } 
  }

  if(isset($_POST['delete_cmnt'])){
    $query = "DELETE FROM `post_cmnt` WHERE id='".$_POST['delete_cmnt']."' ";
    
    if(mysqli_query($link, $query)){

      echo "<script> alert('Your comment has deleted'); </script>";

      echo "<script> window.location.assign('http://localhost/college_connect/?p=genDis'); </script>";

    } 
  }

?>