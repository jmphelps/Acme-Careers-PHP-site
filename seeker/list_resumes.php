<?php 
include '../view/header.php';

?>

<h2>My Resum&eacute;s</h2>

<div class="divButton"><a href="./index.php?action=add_resume&user_id=<?php echo $user_id; ?>">New Resum&eacute;</a></div>
<br />

   		<table cellpadding="2">
        <tr><th>Title</th><th>Options</th></tr>
     		<?php foreach ($resumes as $resume) :  ?>
           	<tr><td> <a href="./?action=view_resume&amp;resume_id=<?php echo $resume['resID']; ?>">
         	<?php echo $resume['resTitle']; ?> </a></td><td>
            <form onclick="var result=delete_confirm(); if(result==false) return false;"  action=".?action=delete_resume&user_id=<?php echo $user_id; ?>" method="post" 
            id="delete_resume_form"><input type="hidden" name="resume_id" value="<?php echo $resume['resID']; ?>" /><input type="submit" name="Delete" value="Delete" /> </form> </td></tr>
			<?php endforeach;?>
    </table>
    
    <?php  

include '../view/footer.php'; 
?>