<?php

define('ROOT', './');

require_once(ROOT.'include/main.php');

print_header("PyRocket: Python Packager");

?>
<?php
//Code adapted from http://stackoverflow.com/questions/18070154/get-operating-system-info-with-php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$os = "Unknown OS Platform";
$os_array = array(
	'/windows nt 6.3/i'     =>  'Windows',
	'/windows nt 6.2/i'     =>  'Windows',
	'/windows nt 6.1/i'     =>  'Windows',
	'/windows nt 6.0/i'     =>  'Windows',
	'/windows nt 5.2/i'     =>  'Windows',
	'/windows nt 5.1/i'     =>  'Windows',
	'/windows xp/i'         =>  'Windows',
	'/windows nt 5.0/i'     =>  'Windows',
	'/windows me/i'         =>  'Windows',
	'/win98/i'              =>  'Windows',
	'/win95/i'              =>  'Windows',
	'/win16/i'              =>  'Windows',
	'/macintosh|mac os x/i' =>  'Mac',
	'/mac_powerpc/i'        =>  'Mac',
	'/linux/i'              =>  'Linux',
	'/ubuntu/i'             =>  'Linux'
);
foreach ($os_array as $regex => $value) { 
	if (preg_match($regex, $user_agent)) {
		$os = $value;
	}
}
?>

<h1 class="tagline resp">
	<span class="fa fa-angle-right"></span> Package your Python code at the speed of light
</h1>

<div class="centerDiv">
  <form action="<?php echo ROOT; ?>process.php" class="dropzone dropzoneFormat resp" id="my-awesome-dropzone">
        Drag or click to <span class="upload">Upload</span> 
  </form>
</div>

<form name="codeUploader" action="<?php echo ROOT; ?>finalize.php" method="post" enctype="multipart/form-data" class="resp">
	<p>Select the system you want to package your code for:</p>
	<input type="checkbox" name="os" class="fancyRadio" value="Mac" id="Mac"<?php if ($os == "Mac") echo " checked='checked'";?>><label for="Mac"><span class="fa fa-apple"></span>Mac</label>
	<input type="checkbox" name="os" class="fancyRadio" value="Windows" id="Windows"<?php if ($os == "Windows") echo " checked='checked'";?>><label for="Windows"><span class="fa fa-windows"></span>Windows</label>
	<input type="checkbox" name="os" class="fancyRadio" value="Linux" id="Linux"<?php if ($os == "Linux") echo " checked='checked'";?>><label for="Linux"><span class="fa fa-linux"></span>Linux</label>
	
	<p>Select your python version:</p>
	<input type="radio" name="version" class="fancyRadio" value="2.7" id="2.7"><label for="2.7">2.7</label>
	<input type="radio" name="version" class="fancyRadio" value="3.4" id="3.4"><label for="3.4">3.4</label>
	
	<input type='submit' name='submit' value='Convert it!' alt='CONVERT NOW!' class='coolbutton resp'>
</form>

<?php

print_footer();

?>