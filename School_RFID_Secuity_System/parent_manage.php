<div class="table-responsive-sm" style="max-height: 870px;"> 
  <table class="table">
    <thead class="table-primary">
      <tr>
        <th>Id</th>
        <th>Parent Name</th>
        <th>Parent Email</th>
        <th>Student Name</th>
      </tr>
    </thead>
    <tbody class="table-secondary">
    <?php
      //Connect to database
      require'connectDB.php';

        $sql = "SELECT admin.id,admin.admin_name,admin.admin_email, admin.student_id,students.username FROM admin INNER JOIN students ON students.id = admin.student_id WHERE type = 0";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo '<p class="error">SQL Error</p>';
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
          if (mysqli_num_rows($resultl) > 0){
              while ($row = mysqli_fetch_assoc($resultl)){
      ?>
                  <TR>
                  <TD>
                    <?php  
                        $id = $row['id'];
                    	?>
                    	<form>
                    		<button type="button" class="select_btn" id="<?php echo $id;?>" title="select this ID"><?php echo $id;?></button>
                    	</form>
                    </TD>
                  <TD><?php echo $row['admin_name'];?></TD>
                  <TD><?php echo $row['admin_email'];?></TD>
                  <TD><?php echo $row['username'];?></TD>
                  </TR>
    <?php
            }   
        }
      }
    ?>
    </tbody>
  </table>
</div>