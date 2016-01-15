<?php 
include './view/header.php'; 

$states = array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', ' CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'VI', 'WA', 'WV', 'WI', 'WY');

if(!isset($acct_state)) $acct_state = "";
?>

<h2>Edit  Account</h2>

    <?php if ($message != "") echo '<div class="message">' . $message . '</div>'; ?>
    
<form id="account_form" name="account_form" method="post" action=".?action=update_account">
  <p>
    <label for="email"><strong>Email</strong><br /> (this will be your user name): </label>
    <input type="text" class="moveinput" name="email" id="email" value="<?php if (isset($email)) echo $email; ?>" />
  </p>
    <p>
    <label for="password"><strong>Choose a password:</strong></label>
    <input type="password" class="moveinput" name="password" id="password" value="<?php if (isset($password)) echo $password; ?>" />
  </p>
  <hr />
  <p>
    <label for="fname"><strong>First Name</strong>: </label>
    <input type="text" class="moveinput" name="fname" id="fname"  value="<?php if (isset($fname)) echo $fname; ?>" />
 
  </p>
  <p>
    <label for="mname">    <strong>Middle Name (or initial)</strong>:</label>
    <input type="text" class="moveinput" name="mname" id="mname"  value="<?php if (isset($mname)) echo $mname; ?>" />
    </label>
  </p>
  <p>
    <label for="lname"><strong>Last Name</strong>:</label>
    <input type="text" class="moveinput" name="lname" id="lname"  value="<?php if (isset($lname)) echo $lname; ?>" />
  </p>
  
    <p>
    <label for="street"><strong>Street:</strong></label>
    <input type="text" class="moveinput" name="street" id="street"  value="<?php if (isset($street)) echo $street; ?>" />
  </p>
     <p>
    <label for="city"><strong>City:</strong></label>
    <input type="text" class="moveinput" name="city" id="city"  value="<?php if (isset($city)) echo $city; ?>" />
  </p>
  
     <p>
 <label for="state"><strong>State:</strong> </label>
<select class="moveinput" name="state" id="state">
   <?php foreach($states as $state) { 
			 echo '<option value ="' . $state . '" ';
		 	if (isset($user_state) && $user_state == $state) echo 'selected="selected"';
		 	echo '>'. $state . '</option>';
		}
     ?>
   </select>
  </p>
     <p>
    <label for="zip"><strong>ZIP Code:</strong></label>
    <input type="text" class="moveinput" name="zip" id="zip" value="<?php if (isset($zip)) echo $zip; ?>"  />
  </p>
  
       <p>
    <label for="country"><strong>Country:</strong></label>
    <input type="text" class="moveinput" name="country" id="country"  value="<?php if (isset($country)) echo $country; ?>" />
  </p>
   <p>
    <label for="phone"><strong>Phone:</strong></label>
    <input type="text" class="moveinput" name="phone" id="phone"  value="<?php if (isset($phone)) echo $phone; ?>" />
  </p>
  
<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1 ) { ?>
  <fieldset>
    <legend>User Type:</legend>
    <p>
     
      <label>
        <input type="radio" name="typeID" value="3"  <?php if ($_SESSION['user_type'] == 3) echo 'checked="checked"'; ?> />
        Job Seeker</label>
      <br />
      <label>
        <input type="radio" name="typeID" value="2"  <?php if ($_SESSION['user_type'] == 2) echo 'checked="checked"'; ?> />
        Employer</label>
      <br />
      <label>
        <input type="radio" name="typeID" value="1" <?php if ($_SESSION['user_type'] == 1) echo 'checked="checked"'; ?> />
        Administrator</label>
      <br />
    </p>
  </fieldset>
  
  <?php } else {
  		
  			if (isset($type)) {
				echo '<input type="hidden" name="typeID" value="'.$type.'" />'; 
			} else {
				echo '<input type="hidden" name="typeID" value="3" />';
			}
  		}
   ?> 
  
  <hr />
  <div style="text-align: right; width: 70%;">
  <?php if (isset($user_id)) echo '<input type="hidden" name="userID" value="'.$user_id.'" />'; ?>
  <input id="submit" type="submit" value="Submit" />
  </div>
</form>
<p>&nbsp;</p>

<?php include 'view/footer.php'; ?>

