<?php
function get_resume() {
    global $db;
    $query = 'SELECT * FROM jobs_resume
				INNER JOIN jobs_user
				ON jobs_resume.userID = jobs_user.userID';
    $resume = $db->query($query);
    return $resume;
}

function get_resume_by_user($user_id) {
    global $db;
    $query = "SELECT * FROM jobs_resume
				INNER JOIN jobs_user
				ON jobs_resume.userID = jobs_user.userID
				WHERE jobs_resume.userID = $user_id";
    $resume = $db->query($query);
    return $resume;
}

function get_resume_by_id($resume_id) {
   //To Do
  global $db;
	$query = "SELECT * FROM jobs_resume
				INNER JOIN jobs_user
				ON jobs_resume.userID = jobs_user.userID
		      WHERE  jobs_resume.resID = '$resume_id'";
		  
   $resume_id = $db->query($query);
	$resume_id = $resume_id->fetch();	
	return $resume_id;
	
}

//TO DO
function delete_resume($resume_id) {
    
	global $db;
    $query = "DELETE FROM jobs_resume
		      WHERE  resID = '$resume_id'";	
    $db->exec($query);

}

function add_resume($user_id, $resume_title, $resume_keywords, $resume_objectives, $resume_text, $resUpload) {
	global $db;
    $query = "INSERT INTO jobs_resume
                 (userID, resTitle, keywords, objectives, resText, resUpload)
              VALUES
                 ('$user_id', '$resume_title', '$resume_keywords', '$resume_objectives', '$resume_text', '$resUpload')";

    $db->exec($query);

}

 function update_resume($resume_title, $resume_keywords, $resume_objectives, $resume_text, $resUpload, $resume_id) {
	//TO DO
    global $db;
    $query = "UPDATE jobs_resume 
				SET resTitle = '$resume_title', 
					keywords = '$resume_keywords', 
					objectives = '$resume_objectives', 
					resText = '$resume_text', 	
					resUpload = '$resUpload'
				WHERE resID = '$resume_id'";
			
	$db->exec($query);
		
} 

 function add_application($job_id, $resume_id) {
	//TO DO
    global $db;
    $query = "INSERT INTO jobs_application 
				(jobID, resID)
				VALUES
                 ('$job_id', '$resume_id')";
	$db->exec($query);  

}

 function get_applications_by_user($user_id){
	global $db;
	$query = "SELECT *
				FROM jobs_application a
				JOIN jobs_resume r ON a.resID = r.resID
				JOIN jobs_posting p ON a.jobID = p.jobID
			  WHERE userID = '$user_id'";
	
$applications = $db->query($query);
	
	return $applications;	
} 

function get_applicants(){
	global $db;
	$query = "SELECT *
				FROM jobs_application a
				JOIN jobs_resume r ON a.resID = r.resID
				JOIN jobs_posting p ON a.jobID = p.jobID";
			  
	
$applicants = $db->query($query);
	
	return $applicants;	
} 

?>
