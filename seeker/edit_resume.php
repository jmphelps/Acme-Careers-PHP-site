<?php include '../view/header.php';
/* 
 *  WEB 182 Project: Acme Careers 
 *  seeker/edit_resume.php
 *  Allows users to edit their resume
 */

 ?>

<h2>Edit Resum&eacute;</h2>
<form id="resume_form" name="resume_form" method="post" action=".?action=update_resume&user_id=<?php echo $user_id; ?>" enctype="multipart/form-data">

<p>

</p>
<p>NOTE:  The name, address, phone number and other contact information you have specified on your account page will be included in your  resum&eacute;. If you wish to change these, please <a href="../index.php?action=edit_account">edit your account</a>.</p>
<p>
  <label for="resTitle"><strong>Resum&eacute; title:</strong></label>
  <input type="text" name="resTitle" id="resTitle" size="50" value="<?php if (isset($resume_title)) echo $resume_title; ?>"/>
</p>

<p>
  <label for="keywords"><strong>Keywords:</strong></label>
  <input type="text" name="keywords" id="keywords" size="50" value="<?php if (isset($resume_keywords)) echo $resume_keywords; ?>"/>
</p>
 <p>
 
 <label for="objectives"><strong>Objectives</strong> (500 characters max): </label>
 <br />
  <textarea name="objectives" id="objectives" cols="90" rows="5" ><?php if (isset($resume_objectives)) echo $resume_objectives; ?></textarea>
  </p>
  <p>
   <label for="resText"><strong>Text version of your resum&eacute;: </strong><br /> 
     <em>Type or copy the text version of your resum&eacute; here:</em></label>
   <br />
  <textarea name="resText" id="resText" cols="90" rows="20"><?php if (isset($resume_text)) echo $resume_text; ?></textarea>
 
  </p>
<p>Upload a copy of your resum&eacute;:
<!--<input type="hidden" name="action" value="upload" />-->
  <input type="file" class="moveinput"  name="resUpload" />
  </p>
  <hr />
  <div style="text-align: right; width: 70%;">
 <?php if (isset($resume_id)) echo '<input type="hidden" name="resID" value="'.$resume_id.'" />'; ?>
  <input name="submit" type="submit" value="Submit" />
  </div>
</form>

<?php include '../view/footer.php'; ?>
