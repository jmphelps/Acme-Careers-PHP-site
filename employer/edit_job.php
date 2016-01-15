<?php include '../view/header.php';
/* 
 *  WEB 182 Project: Acme Careers 
 *  employer/edit_job.php
 *  Allows employers to edit job listings
 */

if(!isset($job_category)) $job_category = ""; 
if(!isset($job_type)) $job_type = "";
if(!isset($job_state)) $job_state = "";

$states = array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', ' CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'VI', 'WA', 'WV', 'WI', 'WY');
 
 ?>
 

<h2>Edit Job</h2>
<form id="job_form" name="job_form" method="post" action=".?action=update_job">
<p>
 </p>
<p>
  <label for="jobTitle"><strong>Job title:</strong></label>
  <input type="text"  class="moveinput" name="jobTitle" id="jobTitle" size="40" value="<?php if (isset($job_title)) echo $job_title; ?>" />
</p>
  <label for="catID"><strong>Job category:</strong></label>
  <select  class="moveinput"  name="catID" id="catID">
    <option value="">-- Select Category --</option>
    <?php foreach($categories as $category) { 
			 echo '<option value ="' .$category['catID'] . '" ';
		 	if ($job_category == $category['catID']) echo 'selected="selected"';
		 	echo '>'. $category['catName'] . '</option>';
		}
     ?>
  </select>
 </p>
<p>

  
  <label for="jobType"><strong>Job type:</strong></label>
  <select  class="moveinput" name="jobType" id="jobType">
 	 <option value="">-- Select Type --</option>
     <option value="Full-time" <?php if($job_type == 'Full-time') echo 'selected=\"selected\"'; ?> 
	 >Full-time</option>
     <option value="Part-time" <?php if($job_type == 'Part-time') echo 'selected=\"selected\"'; ?> 
	 > Part-time</option>
     <option value="Short-term temp" <?php if($job_type == 'Short-term temp') echo 'selected=\"selected\"'; ?> 	 
     >Short-term temporary</option>
     <option value="Temp to hire" <?php if($job_type == 'Temp to hire') echo 'selected=\"selected\"'; ?> 
	 >Temporary to hire</option>
  </select>
</p>
 <p>
 <label for="city"><strong>City:</strong> </label>

  <input  class="moveinput" name="city" id="city" 
  value="<?php if (isset($job_city)) echo $job_city; ?>"  />
  </p>
  
   <p>
 <label for="state"><strong>State:</strong> </label>
<select class="moveinput" name="state" id="state">
   <?php foreach($states as $state) { 
			 echo '<option value ="' . $state . '" ';
		 	if ($job_state == $state) echo 'selected="selected"';
		 	echo '>'. $state . '</option>';
		}
     ?>
   </select>
  </p>
  <p>
   <label for="summary"><strong>Summary:</strong> </label>
   <input  class="moveinput" name="summary" id="summary" size="60" 
   value="<?php if (isset($job_summary)) echo $job_summary; ?>" />
  </p>
  <p>
   <label for="description"><strong>Description:</strong> </label> <br />
   <textarea name="description" id="description" rows="20" cols="80" >
   <?php if (isset($job_description)) echo $job_description; ?></textarea>
  </p>
  <hr />
  <div style="text-align: right; width: 70%;">
  <?php if (isset($job_id)) echo '<input type="hidden" name="jobID" value="'.$job_id.'" />'; ?>
  <input id="submit" type="submit" value="Submit" />
  </div>
</form>

<?php include '../view/footer.php'; ?>
