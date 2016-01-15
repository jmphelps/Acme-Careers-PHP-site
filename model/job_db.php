<?php
function get_jobs() {
      global $db;
    $query = 'SELECT * FROM jobs_posting
              ORDER BY jobID';
    $jobs = $db->query($query);
    return $jobs;
    
}

function get_jobs_by_category($category_id) {
    //To Do
	global $db;
    $query = "SELECT * FROM jobs_posting
              WHERE jobs_posting.catID = '$category_id'
              ORDER BY jobID";
    $jobs = $db->query($query);
    return $jobs;

}

function get_job_rows($category_id) {
	global $db;
	$query = "SELECT * FROM jobs_posting
              WHERE jobs_posting.catID = '$category_id'
              ORDER BY jobID";
    $jobs = $db->query($query);
	$results = $jobs->rowcount();
	return $results;
}

function get_job_by_id($job_id) {
   //To Do
  global $db;
	$query = "SELECT * FROM jobs_posting
		      WHERE  jobID = '$job_id'";	
    $job_id = $db->query($query);
	$job_id = $job_id->fetch();	
	return $job_id;
	
}

function delete_job($job_id) {
    //TO DO
	global $db;
    $query = "DELETE FROM jobs_posting
              WHERE jobID = '$job_id'";
    $db->exec($query);
}
 
function add_job($job_category, $job_title,  $job_type, $job_city, $job_state, $job_summary, $job_description) {
	//TO DO
    global $db;
    $query = "INSERT INTO jobs_posting
                 (catID, jobTitle, jobType, city, state, summary, description)
              VALUES
                 ('$job_category', '$job_title', '$job_type', '$job_city', '$job_state', '$job_summary', '$job_description')";
   
    $db->exec($query);  

  
}


function update_job($job_category, $job_title, $job_type, $job_city, $job_state, $job_summary, $job_description, $job_id) {
	//TO DO
    global $db;
    $query = "UPDATE jobs_posting 
				SET catID = '$job_category', 
					jobTitle = '$job_title', 
					jobType = '$job_type', 
					city = '$job_city', 
					state = '$job_state', 
					summary = '$job_summary', 
					description = '$job_description' 
					
				WHERE jobID = '$job_id'";
			
	$db->exec($query);
	
	
}    

 





?>