<?php 
/* 
 *  WEB 182 Project: Acme Careers 
 *  view/employer_menu.php
 *  Employer Menu
 */
 

include ('./view/header.php'); 
require_once('./util/valid_user.php');  // require a valid user
$user_id = $_SESSION['user_id'];

?>

<h1>Main Navigation</h1>

    <?php if (!empty($message)) echo '<div class="message">' . $message . '</div>'; ?>
    
     <ul>
    <li><a href="./index.php?action=edit_account&user_id=<?php $user_id; ?>">Edit My Account</a></li>
    <li><a href="index.php?action=logout">Logout</a></li>
   </ul>

<h2>Employer Menu</h2>
<ul>
  <li><a href="./employer/index.php?action=list_jobs">Job Listings</a></li>
  
</ul>


<?php include './view/footer.php'; ?>

