<?php 
include './../view/header.php';
session_start();
?>

<!-- Search by Category -->

<h2>Select a Job Category:</h2>

<form id="job_search_form" name="job_search_form" method="get" action=".">

<select id="job_category" name="job_category">
	
	<option value="">--Select Category--</option>
	
	<?php foreach ( $categories as $category ) : ?>
	<option value="<?php echo $category['catID']; ?>"><?php echo $category['catName']; ?></option>
	<?php endforeach; ?>
	
</select>

<input type="submit" name="Submit"  />

</form>


<?php $items = get_job_rows($category_id);
		
   if ($items == 0) {
	   echo '<p>No jobs found.</p>';
   }
   else if ($items > 0) {  
		if ($items == 1) {
			echo '<p>1 item found.</p>';
		}
		else {
			echo '<p>'. $items . ' items found';  
		}   ?>
            <h2>Search Results for: <?php echo $category_name ?></h2>
   			<ul>
   				<?php foreach ($jobs as $job) :  ?>
              	<li><a href="?action=view_job&job_id=<?php echo $job['jobID']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">
         	 	<?php echo $job['jobTitle']; ?></a></li>
    		<?php endforeach;
    }
	   ?>
    </ul>
    
<?php  

include './../view/footer.php'; 
?>
