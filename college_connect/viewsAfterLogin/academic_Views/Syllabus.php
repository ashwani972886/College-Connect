<form style="margin-bottom: 10px;" method="POST">

    <div class="row">
        <div class="form-group col-xs-3">
            <select class="form-control" id="course_syl" name="course_syl">
                <option value="Courses" selected>Course</option>
                <option value="B.Tech">B.Tech</option>
                <option value="BBA">BBA</option>
            </select>
        </div>

        <div class="form-group col-xs-3">
            <select class="form-control" id="branch_syl_select1" name="branch_syl_select1">
                <option value="branch" selected>Branch</option>
                <option value="CSE">Computer Science & Engineering</option>
                <option value="ME">Mechanical Engineering</option>
                <option value="EE">Electrical Engineering</option>
                <option value="ECE">Electronics & Communication Engineering</option>
                <option value="CE">Civil Engineering</option>
            </select>
            <select class="form-control" id="branch_syl_select2" name="branch_syl_select2">
                <option value="branch"  selected>Branch</option>
                <option value="BBA_General">BBA-I(General)</option>
                <option value="BBA_Industry">BBA-II(Ind.)</option>
            </select>
        </div>

        <div class="form-group col-xs-3">
            <select class="form-control" id="sem_syl_1" name="sem_syl_1" disabled>
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
            <select class="form-control" id="sem_syl_2" name="sem_syl_2" disabled>
                <option value="semester" selected>Semester</option>
                <option value="1Sem">First Semester</option>
                <option value="2Sem">Second Semester</option>
                <option value="3Sem">Third Semester</option>
                <option value="4Sem">Fourth Semester</option>
                <option value="5Sem">Fifth Semester</option>
                <option value="6Sem">Sixth Semester</option>
            </select>
        </div>

        <div class="form-group col-xs-3">
            <select class="form-control" id="sec_syl" name="sec_syl" disabled>
                <option value="sec" selected>Section</option>
                <option value="Sec_A">A</option>
                <option value="Sec_B">B</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary pull-right" style="margin-right: 15px; font-size: 20px;" name = "submit_syl">Go!</button>
    </div>

</form>

<div class="line-divider"></div>

<!-- Retrieve Data from Database -->

<div>

    <?php 
    
        if(isset($_POST['submit_syl'])){
            $course = $_POST['course_syl'];
                        
            if($course == "B.Tech"){

                $branch = $_POST['branch_syl_select1'];

            } else {

                $branch = $_POST['branch_syl_select2'];

            }

            if($branch == "CSE" || $branch == "EE" || $branch == "ME" || $branch == "ECE" || $branch == "CE"){

                $sem = $_POST['sem_syl_1'];

            } else {

                $sem = $_POST['sem_syl_2'];

            }

            $sec = $_POST['sec_syl'];
        
            $query = "SELECT * FROM acad ORDER BY id DESC";
            $result = mysqli_query($link,$query);

            if(mysqli_num_rows($result)>0){

                $count =0;

                while($acad = mysqli_fetch_assoc($result)){

                                    
                    if($acad['for_course'] == $course){  
                        if($acad['for_branch'] == $branch){
                            if($acad['for_sem'] == $sem){
                                if($acad['for_sec'] == $sec){
                                    if($acad['file_category'] == "Syl"){ ?>

                                        <div class="alert" style="padding: 2.5px 0px; background-color: cadetblue; border-color: mediumturquoise;">

                                            <a href="acad_uploads/<?php echo $acad['file_name']; ?>" style="color: black; font-size: 20px; font-weight: bold; margin-left: 10px;" target="_blank" ><?php echo $acad['file_name']; ?></a>
                                            <br>

                                        </div> 
    <?php
                                    }
                                }
                            }

                        }

                    }

                }

            }
        }
    ?>

</div>

