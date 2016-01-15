<?php 
include '../view/header.php';

?>

<h2>Job listings</h2>

<div class="divButton"><a href=".?action=add_job">Add New Job</a></div>
<br />

   		<table cellpadding="2">
        <tr><th>ID</th><th>Title</th><th>Options</th><th>Resum&eacutes</th></tr>
     		<?php foreach ($jobs as $job) :  ?>
           	<tr><td> <?php echo $job['jobID']; ?></td>
			<td> <a href="../employer/?action=view_job&amp;job_id=<?php echo $job['jobID']; ?>">
         	<?php echo $job['jobTitle']; ?> </a></td>
			<td><form onclick="var result=delete_confirm(); if(result==false) return false;"  action=".?action=delete_job" method="post" id="delete_job_form"><input type="hidden" name="job_id" value="<?php echo $job['jobID']; ?>" /><input type="submit" name="Delete" value="Delete" /> </form> </td>
			<td><a href="../employer/?action=list_applicants">View</a></td>
			
			</tr>
			<?php endforeach;

	   ?>
    </table>
    
    <?php  

include '../view/footer.php'; 
?>

