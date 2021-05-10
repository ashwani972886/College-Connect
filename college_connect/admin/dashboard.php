
<?php

    $pge = isset($_GET['pge']) ? $_GET['pge'] : '';

    $query = "SELECT * FROM users ";

    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result)>0){

        $total_users = 0;
        $teacher_users = 0;
        $student_users = 0;
        while( $users = mysqli_fetch_assoc($result) ){
            $total_users++;
            if($users['role'] == "teacher"){
                $teacher_users++;
            } else {
                $student_users++;
            }
        }
    }
    
?>


        <!-- Dashboard -->
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total users</div>
                            <!-- <div class="widget-subheading">Last year expenses</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $total_users; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Students</div>
                            <!-- <div class="widget-subheading">Total Clients Profit</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $student_users; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Teachers</div>
                            <!-- <div class="widget-subheading">People Interested</div> -->
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?php echo $teacher_users; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-header">Newly Added Users</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>College-ID</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
        
                                
                                
        
                                $query = "SELECT * FROM `users` ORDER BY id DESC LIMIT 5";
                                $result = mysqli_query($link,$query);
        
                                if(mysqli_num_rows($result)>0){
        
                                    $count = 0;
                                    while( $data = mysqli_fetch_assoc($result) ){
                                        $count++;
                            ?>
                                        <tr>
                                            <td class="text-center text-muted">#<?php echo $count; ?></td>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading"><?php echo $data['clg_id']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    if($data['role'] == "teacher"){
                                                        echo "Teacher";
                                                    } else {
                                                        echo "Student";
                                                    } 
                                                ?>
                                            </td>
                                            <td >
                                                <?php echo "<b>".$data['first_name']." ".$data['last_name']."<b>"; ?>                                       
                                            </td>
                                            <td class="text-center">
                                                <button type="button" id="a" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-book-id="<?php echo $data['clg_id']; ?>">Details</button>
                                            </td>
                                        </tr>
                            <?php 
                                    }
                                }
                            
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Notification / Queries
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                
                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Recents</h6>
                                <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">

                                        <?php
        
                                            $query = "SELECT * FROM `help` WHERE `status` = '0' ORDER BY id DESC LIMIT 5";
                                            $result = mysqli_query($link,$query);

                                            if(mysqli_num_rows($result)>0){

                                                while( $queries = mysqli_fetch_assoc($result) ){

                                                    $time = date('m-d  H:i', strtotime($queries['time']));
                                                    
                                        ?>
                                            <a style="text-decoration: none; color: #495057;" id="queri_detail" data-toggle="modal" data-target="#queri_detail_modal" data-queri-id="<?php echo $queries['id']; ?>">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading"><?php echo $queries['name']; ?></div>
                                                                <div class="widget-subheading"><?php echo $queries['title']; ?></div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="text-muted" style="font-size: 14px;">
                                                                    <span><?php echo $time; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </a>

                                        <?php 
                                                }
                                            }
                                        
                                        ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    

