<?php

define('ROOT', '../');

require_once(ROOT.'include/main.php');

print_header("Create your application.");

?>
<label>
<p><h1>
<span class="fa fa-angle-right">Get your code to all platforms... Instantly.</span>
</h1>
</p>
</label>

<script src="dropzone.js"></script>
<div class="centerDiv"   >
  <form action="<?php echo ROOT; ?>/create/process.php"
        class="dropzone"
        id="my-awesome-dropzone">
        <span class="message">Drag or click to </span><span class="upload" style="font-weight:300">Upload</span> 
        <!--<span class="fa fa-cloud-upload"></span> Drag Files to Upload-->
  </form>

</div

<form action="process.php" method="post"

enctype="multipart/form-data">

<!--<label for="file" class="text">Filename:</label>-->
<style>
#fileElem {
  /* Note: display:none on the input won't trigger the click event in WebKit.
    Setting visibility: hidden and height/width:0 works great. */
  visibility: hidden;
  width: 0;
  height: 0;
}
#fileSelect {
  /* style the button any way you want */
}
</style>

<label><p>Select the system you want to package your code for:</p></label>
<form name="codeUploader" action="../manage" method="GET">

  <input type="radio" name="os" value="Mac" id="Mac" ><label for="Mac"><span class="fa fa-apple"></span>Mac</label></input>
  <input type="radio" name="os" value="Windows" id="Windows"><label for="Windows"><span class="fa fa-windows"></span>Windows</label></input>
  <input type="radio" name="os" value="Linux" id="Linux"><label for="Linux"><span class="fa fa-linux"></span>Linux</label></input>
  <label><p>Select your python version:</p></label>
  <input type="radio" name="version" value="2.7" id="2.7"><label for="2.7">2.7</label></input>
  <input type="radio" name="version" value="3.4" id="3.4"><label for="3.4">3.4</label></input>
  <imput type='submit' name='submit' value='CONVERT NOW!' class='coolbutton'>Convert it!</input>

</form>



<?php

print_footer();

?>