<?php
/* 
 *  WEB 182 Project: Acme Careers 
 *  employer/index.php
 *  controller file for employers
 */
require('../model/database.php');
require('../model/category_db.php');
require('../model/job_db.php');
require('./../model/resume_db.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_jobs';
}


$categories = get_categories();
$message = "";

// LIST JOBS
if($action == 'list_jobs') {
	// TO DO
	$jobs = get_jobs();
	include 'list_jobs.php';
}

// DELETE JOB
else if ($action == 'delete_job') {
	// TO DO
	$job_id = $_POST['job_id'];
	delete_job($job_id);
	$jobs = get_jobs();
	include 'list_jobs.php';
}

// ADD JOB
else if ($action == 'add_job') {	   
	include 'edit_job.php';
}

//EDIT RECORD
else if ($action == 'edit_job') {
  
   // TO DO
  // GET ALL FIELD VALUES FOR JOB BASED ON JOB ID
	$job_id = $_POST['jobID'];
	$job_title = $_POST['jobTitle'];
	$job_category = $_POST['catID'];	
	$job_type = $_POST['jobType'];
	$job_city = $_POST['city'];
	$job_state = $_POST['state'];
	$job_summary = $_POST['summary'];
	$job_description = $_POST['description'];

  include 'edit_job.php';
}


// VIEW JOB RECORD
else if ($action == 'view_job') {
	
	$job_id = $_GET['job_id']; 
	$job = get_job_by_id($job_id);

	// Get job data
	// TO DO
	$job_category = $job['catID'];
	$job_title = $job['jobTitle'];
	$job_type = $job['jobType'];
	$job_city = $job['city'];
	$job_state = $job['state'];
	$job_summary = $job['summary'];
	$job_description = $job['description'];
	
	//
	include('./view_job.php');	
}

// UPDATE JOB
else if ($action == 'update_job') { 
	
	// Get job data
	// TO DO

	$job_category = $_POST['catID'];	
	$job_title = $_POST['jobTitle'];
	$job_type = $_POST['jobType'];
	$job_city = $_POST['city'];
	$job_state = $_POST['state'];
	$job_summary = $_POST['summary'];
	$job_description = $_POST['description']; 
	//
	
	if (isset($_POST['jobID'])) {
		$job_id = $_POST['jobID'];
		$query = update_job($job_category, $job_title, $job_type, $job_city, $job_state, $job_summary, $job_description, $job_id);
		$message = "Item has been updated.";
	}
	
	else {
		add_job($job_category, $job_title, $job_type, $job_city, $job_state, $job_summary, $job_description);
		$job_id = $db->lastInsertId();
		$message = "The new item has been added.";
	}
include('./view_job.php');	
	
}

//LIST APPLICANTS
 else if ($action == 'list_applicants') {
    
	
    $applicants = get_applicants();
	

    include('./list_applicants.php');
} 

// VIEW RESUME
else if ($action == 'view_resume') {
	
	
	$resume_id = $_GET['resume_id'];

	$resume = get_resume_by_id($resume_id);

	// Get resume data
	// TO DO
	$user_fname = $resume['fname'];
	$user_mname = $resume['mname'];
	$user_lname = $resume['lname'];
	$user_street = $resume['street'];
	$user_city = $resume['city'];
	$user_state = $resume['state'];
	$user_zip = $resume['zip'];
	$user_country = $resume['country'];
	$user_phone = $resume['phone'];
	$user_email = $resume['email'];
	$resume_objectives = $resume['objectives'];
	$resume_keywords = $resume['keywords'];
	$resume_text = $resume['resText'];
	$resume_title = $resume['resTitle'];
	$resUpload = $resume['resUpload'];
	$user_id = $resume['userID'];	
	//
	include('view_resume.php');	
}


?>

