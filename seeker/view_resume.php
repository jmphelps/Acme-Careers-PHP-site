<?php

 
include '../view/header.php';

?>
    <script type="text/javascript">

</script>

     
    <?php if ($message != "") echo '<div class="message">' . $message . '</div>'; ?>
    
    <div style="text-align: center;">
    	<h1><?php echo $user_fname . ' ' . $user_mname . ' ' . $user_lname; ?></h1>
        <p><?php echo $user_street . ', ' . $user_city . ', ' . $user_state . ' ' . $user_zip . ' ' . $user_country; ?>
        <br />Phone: <?php echo $user_phone; ?> Email: <?php echo $user_email; ?></p>
     <hr />
     </div>
    <h2>Objectives</h2>
    <p><?php echo $resume_objectives; ?></p>
    
    <h2>Text Resum&eacute;</h2>
    <div><?php echo nl2br($resume_text); ?></div>
    
    <h3>Download Resum&eacute;</h3>
    
    <p>Download file: <a href="files/<?php echo "userID_" . $user_id . "_" . $resUpload; ?>"><?php echo $resUpload; ?></a></p>
    
 <hr style="clear:both;" /> 
 
 
  <form style="float: left; width: 100px;" action=".?action=edit_resume&user_id=<?php echo $user_id; ?>" method="post">
                <input type="hidden" name="action" value="edit_resume" />
				<input type="hidden" name="resID" value="<?php echo $resume_id;?>" />
				<input type="hidden" name="userID" value="<?php echo $user_id;?>" />
				<input type="hidden" name="resTitle" value="<?php echo $resume_title;?>" />
				<input type="hidden" name="keywords" value="<?php echo $resume_keywords;?>" />
                <input type="hidden" name="objectives" value="<?php echo $resume_objectives;?>" />
                <input type="hidden" name="resText" value="<?php echo $resume_text;?>" />
                <input type="submit" value="Edit Resume" />
            </form> 
 

  <form onclick="var result=delete_confirm(); if(result==false) return false;"  action=".?action=delete_resume&user_id=<?php echo $user_id; ?>" method="post" id="delete_resume_form"><input type="hidden" name="resume_id" value="<?php echo $resume_id; ?>" /><input type="submit" name="Delete" value="Delete" /> </form> 

<?php
include '../view/footer.php'; 
?>