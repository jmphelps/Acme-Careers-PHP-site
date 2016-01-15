<?php
include './../view/header.php';
session_start();
?>

	<?php if ($message != "") echo '<div class="message">' . $message .'</div>'; ?><!--I added-->
	
	<h1> <?php echo $job_title; ?></h1>
    <p><strong>Job Type:</strong> <?php echo $job_type; ?></p>
    <p><strong>Location:</strong> <?php echo $job_city .", ". $job_state ?></p>
    <p><strong>Job Summary:</strong> <?php echo $job_summary; ?></p>
    <p><strong>Job Description:</strong><br /> <?php echo $job_description; ?></p>
	
	<hr />
    <?php if(!isset($submitted) || $submitted !='1') { ?>
    <form style="float: left; width: 100px;" action="." method="get">
                <input type="hidden" name="action" value="apply" />
                <input type="hidden" name="job_id" value="<?php echo $job_id;  ?>" />
                <input type="hidden" name="job_title" value="<?php echo $job_title;  ?>" />
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];  ?>" />
                <input type="submit" value="Apply For This Job" />
            </form>
	<?php } ?>
<br /><br />
          
<?php
include './../view/footer.php'; 
?>