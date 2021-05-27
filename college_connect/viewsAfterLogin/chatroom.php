<!DOCTYPE html>
<html>
  <head>
    <!-- Swipe core CSS -->
		<link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
  </head>
</html>



<?php

    $to = isset($_GET['to']) ? $_GET['to'] : '';

?>

<div id="page-contents" >
    <div class="container">
        <div class="rows">

        <main>
            <div class="layout">
              
              <!-- Start of Sidebar -->
                <div class="sidebar" id="sidebar" style="padding: 0px;">
                  <div class="container" style="padding: 0px;">
                    <div class="col-md-12" style="padding: 0px;">
                      <div class="tab-content">
                        <!-- Start of Discussions -->
                        <div id="discussions" class="tab-pane  active ">
                          <div class="discussions">
                            <h1 style="font-size: 30px; background-color: greenyellow; padding: 40px 0px 25px 20px; margin-top: 0px; " >CHATS</h1>
                            <button class="btn create" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">create</i></button>
                            <div class="list-group" id="chats" role="tablist">

                              <?php if($user['role'] == "student"){  
                                        if($user['group_name'] != "") {?>
                                              <a href="?p=chat&gp=1&to=<?php echo $user['group_name'] ?>" style="padding-left: 20px;" class="filterDiscussions all unread single active"  id="list-chat-list" data-toggle="" role="tab">
                                                <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                <!-- <div class="status">
                                                  <i class="material-icons online">fiber_manual_record</i>
                                                </div> -->
                                                
                                                <div class="data">
                                                  <h5 style="font-size: 20px;"><?php echo $user['group_name']; ?></h5>
                                                  <!-- <span>Mon</span>
                                                  <p>A new feature has been updated to your account. Check it out...</p> -->
                                                </div>
                                              </a>
                              <?php 
                                        }
                                    } else { 
                                
                                        $query = "SELECT * FROM teachers WHERE `teacher_id` = '".mysqli_real_escape_string($link, $user['clg_id'])."' ";
                                        $result = mysqli_query($link,$query);
                                        if(mysqli_num_rows($result)>0){
                        
                                                
                                          $count = 0;
                                          while( $teacher_group = mysqli_fetch_assoc($result) ){ ?>

                                              <a href="?p=chat&gp=1&to=<?php echo $teacher_group['group_name'] ?>" style="padding-left: 20px;" class="filterDiscussions all unread single active"  id="list-chat-list" data-toggle="" role="tab">
                                                <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                <!-- <div class="status">
                                                  <i class="material-icons online">fiber_manual_record</i>
                                                </div> -->
                                                
                                                <div class="data">
                                                  <h5 style="font-size: 20px;"><?php echo $teacher_group['group_name']; ?></h5>
                                                  <!-- <span>Mon</span>
                                                  <p>A new feature has been updated to your account. Check it out...</p> -->
                                                </div>
                                              </a>


                              <?php
                                          }
                                        } 
                                    } 
                              ?> 

                              <?php
                              
                                  $query = "SELECT * FROM new_chats ";
                                  $result = mysqli_query($link,$query);
                                
                                  
                                  if(mysqli_num_rows($result)>0){
                
                                        
                                        $count = 0;
                                        while( $chat_user = mysqli_fetch_assoc($result) ){

                                          if($chat_user['from_user'] != $user['username'] and $chat_user['to_user'] == $user['username']){
                              
                              ?>
                                              <a href="?p=chat&gp=0&to=<?php echo $chat_user['from_user'] ?>" style="padding-left: 20px;" class="filterDiscussions all unread single active"  id="list-chat-list" data-toggle="" role="tab">
                                                <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                <!-- <div class="status">
                                                  <i class="material-icons online">fiber_manual_record</i>
                                                </div> -->
                                                
                                                <div class="data">
                                                  <h5 style="font-size: 20px;"><?php echo $chat_user['from_name']; ?></h5>
                                                  <!-- <span>Mon</span>
                                                  <p>A new feature has been updated to your account. Check it out...</p> -->
                                                </div>
                                              </a>
                              
                              <?php
                                          } else if($chat_user['from_user'] == $user['username'] and $chat_user['to_user'] != $user['username']){

                              ?>

                                              <a href="?p=chat&gp=0&to=<?php echo $chat_user['to_user'] ?>" style="padding-left: 20px;" class="filterDiscussions all unread single active"  id="list-chat-list" data-toggle="" role="tab">
                                                <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                                <!-- <div class="status">
                                                  <i class="material-icons online">fiber_manual_record</i>
                                                </div> -->
                                                
                                                <div class="data">
                                                  <h5 style="font-size: 20px;"><?php echo $chat_user['to_name']; ?></h5>
                                                  <!-- <span>Mon</span>
                                                  <p>A new feature has been updated to your account. Check it out...</p> -->
                                                </div>
                                              </a>

                              <?php

                                          }
                                      }
                                  }
                              ?>
                              
                            </div>
                          </div>
                        </div>
                        <!-- End of Discussions -->
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Sidebar -->


                <!-- Start of Add Friends -->
                <div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="requests">
                      <div class="title">
                        <h1>New Message</h1>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
                      </div>
                      <div class="content">
                        <form >
                        <div class="alert alert-danger" id="new_chat_alert"></div>
                          <div class="form-group">
                            <label for="user">Username:</label>
                            <input type="text" class="form-control" id="new_username" placeholder="Add recipient..." required>
                            
                          </div>
                          <div class="form-group">
                            <label for="welcome">Message:</label>
                            <textarea class="text-control" id="new_message" placeholder="Send your welcome message..."></textarea>
                          </div>
                          
                        </form>
                        <button id="send_new_message" class="btn button w-100">Send</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End of Add Friends -->


                  <div class="main" >
                    <div class="tab-content" id="nav-tabContent">

                      <?php 
                      
                         if($to == "null"){

                      ?>

                              <!-- Start of Babble -->
                              <div class="babble tab-pane active show" id="list-empty" role="tabpanel" aria-labelledby="list-empty-list" style="border: 1px #F5F5F5 solid;">
                                <!-- Start of Chat -->
                                <div class="chat " id="chat2">
                                  
                                  <div class="content empty ">
                                    <div class="container" style="width: 100%;">
                                      <div class="col-md-12">
                                        <div class="no-messages">
                                          <i class="material-icons md-48">forum</i>
                                          <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                </div>
                                <!-- End of Chat -->
                              </div>
                              <!-- End of Babble -->

                      <?php 
                         } else {

                          $query = "SELECT `first_name`,`last_name` FROM users WHERE `username` = '".mysqli_real_escape_string($link, $to)."' LIMIT 1";

                          $result = mysqli_query($link, $query);
                      
                          $user_to = mysqli_fetch_assoc($result);
                      ?>

                              <!-- Start of Babble -->
                              <div class="babble tab-pane  active show" id="list-chat"  role="tabpanel" aria-labelledby="list-chat-list">
                                <!-- Start of Chat -->
                                <div class="chat" id="chat1">
                                  <div class="top" style="background-color: #a6dbff;">
                                    <div class="container">
                                      <div class="col-md-8">
                                        <div class="inside">
                                          <a href="#"><img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                                          <!-- <div class="status">
                                            <i class="material-icons online">fiber_manual_record</i>
                                          </div> -->
                                          <div class="data">
                                            <h5><a href="#">
                                              <?php 
                                                if($_GET['gp'] == 0){ 
                                                  echo $user_to['first_name']." ".$user_to['last_name']; 
                                                } else { 
                                                  echo $_GET['to'];
                                                } 
                                              ?>
                                            
                                            </a></h5>
                                            <!-- <span>Active now</span> -->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="content" id="content" style="background-color: #e0dfdf;">
                                    <div class="container" style="width: 100%; " >
                                      <div class="col-md-8" >
                                        
                                        <?php
                                      
                                            $query = "SELECT * FROM chats ";
                                            $result = mysqli_query($link,$query);
                                          
                                            
                                            
                                            if(mysqli_num_rows($result)>0){
                          
                                              if($_GET['gp'] == "0"){    

                                               
                                                while( $chats = mysqli_fetch_assoc($result) ){

                                                  

                                                  if(($chats['from_user'] == $user['username'] and $chats['to_user'] == $_GET['to']) or ($chats['from_user'] == $_GET['to'] and $chats['to_user'] == $user['username'])){
                                                      
                                                     $time = date('m-d   H:i', strtotime($chats['time']));

                                                      // Store a string into the variable which
                                                      // need to be Encrypted
                                                      $encrypted_message = $chats['message'];

                                                      // Store the cipher method
                                                      $ciphering = "AES-128-CTR";
                                                      
                                                      // Use OpenSSl Encryption method
                                                      $iv_length = openssl_cipher_iv_length($ciphering);
                                                      $options = 0;
                                                      
                                                      // Non-NULL Initialization Vector for encryption
                                                      $decryption_iv = '1234567891011121';
                                                      
                                                      // Store the encryption key
                                                      $decryption_key = "aK4N8".$chats['from_user'].$chats['to_user']."m7Ahn";

                                                      // Use openssl_decrypt() function to decrypt the data
                                                      $decrypted_message=openssl_decrypt ($encrypted_message, $ciphering, 
                                                      $decryption_key, $options, $decryption_iv);
                                        
                                        ?>

                                                        <?php if($chats['to_user'] == $user['username']){ ?>
                                                        <div class="message">
                                                          <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                          <div class="text-main">
                                                            <div class="text-group">
                                                              <div class="text">
                                                                <p><?php echo $decrypted_message; ?></p>
                                                              </div>
                                                            </div>
                                                            <span><?php echo $time; ?></span>
                                                          </div>
                                                        </div>
                                                        <?php } else if($chats['from_user'] == $user['username']) { ?>

                                                        <div class="message me">
                                                          <div class="text-main">
                                                            <div class="text-group me">
                                                              <div class="text me">
                                                                <p><?php echo $decrypted_message; ?></p>
                                                              </div>
                                                            </div>
                                                            <span><?php echo $time; ?></span>
                                                          </div>
                                                        </div>

                                            <?php           } 
                                                  }
                                                }
                                              } else {
                                                while( $chats = mysqli_fetch_assoc($result) ){

                                                  if($chats['to_user'] == $_GET['to']){
                                                    
                                                    $time = date('m-d   H:i', strtotime($chats['time']));

                                                      // Store a string into the variable which
                                                      // need to be Encrypted
                                                      $encrypted_message = $chats['message'];

                                                      // Store the cipher method
                                                      $ciphering = "AES-128-CTR";
                                                      
                                                      // Use OpenSSl Encryption method
                                                      $iv_length = openssl_cipher_iv_length($ciphering);
                                                      $options = 0;
                                                      
                                                      // Non-NULL Initialization Vector for encryption
                                                      $decryption_iv = '1234567891011121';
                                                      
                                                      // Store the encryption key
                                                      $decryption_key = "aK4N8".$chats['from_user'].$chats['to_user']."m7Ahn";

                                                      // Use openssl_decrypt() function to decrypt the data
                                                      $decrypted_message=openssl_decrypt ($encrypted_message, $ciphering, 
                                                      $decryption_key, $options, $decryption_iv);

                                            ?> 

                                                      <?php if($chats['to_user'] == $_GET['to'] and $chats['from_user'] != $user['username']){ 
                                                          $query1 = "SELECT `first_name`,`last_name` FROM users WHERE `username` = '".mysqli_real_escape_string($link, $chats['from_user'])."' LIMIT 1";

                                                          $result1 = mysqli_query($link, $query1);
                                                      
                                                          $from_user_name = mysqli_fetch_assoc($result1);  
                                                      ?>
                                                        <div class="message">
                                                          <img class="avatar-md" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                          <div class="text-main">
                                                            <div class="text-group">
                                                              <p style="color: blue;"><?php echo $from_user_name['first_name']." ".$from_user_name['last_name']; ?></p>
                                                              <?php if($from_user_name['role'] == "teacher"){
                                                                        echo "<p>".$from_user_name['designation']."</p>";
                                                                    } else {
                                                                        echo "<p>".$from_user_name['roll_no']."</p>";
                                                                    }
                                                              ?>
                                                              <div class="text">
                                                                <p><?php echo $decrypted_message; ?></p>
                                                              </div>
                                                            </div>
                                                            <span><?php echo $time; ?></span>
                                                          </div>
                                                        </div>
                                                      <?php } else if($chats['from_user'] == $user['username']) { ?>

                                                        <div class="message me">
                                                          <div class="text-main">
                                                            <div class="text-group me">
                                                              <div class="text me">
                                                                <p><?php echo $decrypted_message; ?></p>
                                                              </div>
                                                            </div>
                                                            <span><?php echo $time; ?></span>
                                                          </div>
                                                        </div>

                                        <?php 
                                                      }
                                                  }
                                                }
                                              }
                                            }
                                            ?>
                                      </div>
                                          <div class="container">
                                            <div class="col-md-8">
                                              <div class="bottom">
                                                <form class="position-relative" style="width: 100%;">
                                                  <input class="form-control" style="display: inline-block;" placeholder="Start typing for reply..." rows="1" id="message"></input>
                                                  <!-- <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button> -->
                                                  <button  class="btn send" id="send_message"><i class="material-icons">send</i></button>
                                                </form> 
                                            </div>
                                          </div>

                                          <a id="bottomOfDiv"></a>
                                    </div>
                                  </div>
                                </div>
                                <!-- End of Chat -->
                                
                              </div>
                              <!-- End of Babble -->

                        <?php } ?>
                      
                    </div>
                  </div>

            </div>

        </main>

        </div>
    </div>
</div>