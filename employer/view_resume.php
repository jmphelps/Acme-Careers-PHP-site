<?php

 
include '../view/header.php';

?>
    <script type="text/javascript">

</script>

     
    
    
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
    
    <p>Download file: <a href="../seeker/files/<?php echo "userID_" . $user_id . "_" . $resUpload; ?>"><?php echo $resUpload; ?></a></p>
    
 <hr style="clear:both;" /> 


<?php
include '../view/footer.php'; 
?>