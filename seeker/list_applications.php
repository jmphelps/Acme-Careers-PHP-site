<?php 
include '../view/header.php';

?>

<h2>My Applications</h2>

<br/>
<br />

   		<table cellpadding="2">
        <tr><th>AppID</th><th>Resum&eacute Submitted</th><th>Position Applied For</th></tr>
     		<?php foreach ($applications as $application) :  ?>
           	<tr>
			<td><?php echo $application['appID']; ?></td>
			<td><?php echo $application['resTitle']; ?></td>
			<td><a href="../seeker/?action=view_job&amp;job_id=<?php echo $application['jobID']; ?>">
         	<?php echo $application['jobTitle']; ?> </a></td>
			
			
			
			
			
			</tr>
			<?php endforeach; ?> 
    </table>
    <br />
	<br />
 <?php  

include '../view/footer.php'; 
?>