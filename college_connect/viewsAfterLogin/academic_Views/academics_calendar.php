<!-- Retrieve from Database -->
<div>

    <?php 

        $query = "SELECT * FROM acad ORDER BY id DESC";
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result)>0){

            $count =0;

            while($acad = mysqli_fetch_assoc($result)){
                
                if($acad['file_category'] == "ACAD_CAL"){ ?>

                    <div class="alert" style="padding: 2.5px 0px; background-color: cadetblue; border-color: mediumturquoise;">

                        <a href="acad_uploads/<?php echo $acad['file_name']; ?>" style="color: black; font-size: 20px; font-weight: bold; margin-left: 10px;" target="_blank" ><?php echo $acad['file_name']; ?></a>
                        <br>

                    </div> 
    <?php
                }
            }
        }
    
    ?>

</div>
