<?php 
/* 
 *  WEB 182 Project: Acme Careers 
 *  view/seeker_menu.php
 *  Seeker Menu
 */
 

include './view/header.php'; 
require_once('./util/valid_user.php');  // require a valid user
$user_id = $_SESSION['user_id'];
?>

<h1>Main Navigation</h1>

      <?php if (!empty($message)) echo '<div class="message">' . $message . '</div>'; ?>
    
    <ul>
    <li><a href="./index.php?action=edit_account&user_id=<?php echo $user_id; ?>">Edit My Account</a></li>
    <li><a href="index.php?action=logout">Logout</a></li>
   </ul>

<h2>Job Seeker Menu</h2>
<ul>
  <li><a href="./seeker/index.php?action=job_search&user_id=<?php echo $user_id; ?>">Job search</a></li>
  <li><a href="./seeker/index.php?action=list_resumes&user_id=<?php echo $user_id; ?>">My resum&eacute;s</a></li>
  <li><a href="./seeker/index.php?action=list_applications&user_id=<?php echo $user_id; ?>">My applications</a></li>
  <li><a href="./seeker/index.php?action=add_resume&user_id=<?php echo $user_id; ?>">Create a resum&eacute;</a></li>
  
</ul>

<?php include './view/footer.php'; ?>

