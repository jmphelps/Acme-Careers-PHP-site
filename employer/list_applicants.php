<?php 
include '../view/header.php';

?>

<h2>Applicants</h2>

<br/>
<br/>

   	<table cellpadding="2">
        <tr><th>JobID</th><th>Job Listing</th><th>Applicant</th></tr>
     	<?php foreach ($applicants as $applicant) :  ?>	
        <tr><td> <?php echo $applicant['jobID']; ?></td> 
		<td><?php echo $applicant['jobTitle']; ?></td>
		<td><a href="../employer/?action=view_resume&amp;resume_id=<?php echo $applicant['resID']; ?>">
         	<?php echo $applicant['resTitle']; ?> </a></td></tr>
		
	
		<?php endforeach; ?> 
    </table>
    
    <?php  

include '../view/footer.php'; 
?>
