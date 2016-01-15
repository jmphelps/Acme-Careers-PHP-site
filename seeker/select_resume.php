<?php 
include '../view/header.php';

?>

<h2>Apply for Job: <?php if(isset($job_title)) echo $job_title; ?></h2>

<?php echo $job_id; ?>

<p>Select the resum&eacute; you wish to use for this application:</p>
	
   		<ul>
     		<?php foreach ($resumes as $resume) :  ?>
           	<li><a href="./?action=submit_resume&amp;resume_id=<?php echo $resume['resID']; ?>&amp;job_id=<?php echo $job_id; ?>">
			<?php echo $resume['resTitle']; ?> </a>
            </li>
			<?php endforeach;

	   ?>
    </ul>
    </form> 
    
    <?php  

include '../view/footer.php'; 
?>