<?php
include '../view/header.php';
?>
    <script type="text/javascript">

</script>

    <h1> <?php echo $job_title; ?></h1>  
    
    <?php if ($message != "") echo '<div class="message">' . $message .'</div>'; ?>
    
    
    <p><strong>Category ID:</strong><?php echo $job_category; ?></p>
    <p><strong>Job Type:</strong> <?php echo $job_type; ?></p>
    <p><strong>Location:</strong> <?php echo $job_city .", ". $job_state ?></p>
    <p><strong>Job Summary:</strong> <?php echo $job_summary; ?></p>
    <p><strong>Job Description:</strong><br /> <?php echo nl2br($job_description); ?></p>
          
 <hr />
            <form style="float: left; width: 100px;" action=".?action=edit_job" method="post">
                <input type="hidden" name="action" value="edit_job" />
                <input type="hidden" name="jobID" value="<?php echo $job_id;  ?>" />
                <input type="hidden" name="catID" value="<?php echo $job_category;  ?>" />
                <input type="hidden" name="jobTitle" value="<?php echo $job_title;  ?>" />
                <input type="hidden" name="jobType" value="<?php echo $job_type;  ?>" />
                <input type="hidden" name="city" value="<?php echo $job_city;  ?>" />
                <input type="hidden" name="state" value="<?php echo $job_state;  ?>" />
				<input type="hidden" name="summary" value="<?php echo $job_summary;  ?>" />
				<input type="hidden" name="description" value="<?php echo $job_description;  ?>" />
                <input type="submit" value="Edit Job" />
            </form>
            
            <form style="float: left; width: 100px;" onclick="var result=delete_confirm(); if(result==false) return false;" action=".?action=delete_job" method="post"  id="delete_job_form"><input type="hidden" name="job_id" value="<?php echo $job_id ?>" /><input type="submit" name="Delete" value="Delete" /> </form>
 <br />
 <hr style="clear:both;" /> 


<?php
include '../view/footer.php'; 
?>