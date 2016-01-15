<?php 
/* 
 *  WEB 182 Project: Acme Careers 
 *  view/login.php
 *  Login file
 */
include ('header.php'); 
?>


 <h1>Login</h1>
            <?php if ($message != "") echo '<div class="message">' . $message . '</div>'; ?>
            <br />
             
            <form action="." method="post" id="login_form" >
                <input type="hidden" name="action" value="login"/>
			<div style="padding: 4px;">
                <label>Email:</label>
                <input type="text" name="email" style="position: absolute; left: 170px;" />
          	</div>
			<div style="padding: 4px;">
                <label>Password:</label>
                <input type="password"  name="password" style="position: absolute; left: 170px;" />
            </div>

                <label>&nbsp;</label>
                <input type="submit" value="Login"/>
            </form>
            
 <h2>Don't have an account?</h2>
 	<p><a href="./index.php?action=add_account">Create an account</a></p>
            
            </div><!-- end main -->
        </div><!-- end page -->
        
 <?php include 'footer.php'; ?>
