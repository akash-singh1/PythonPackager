<?php

define('ROOT', '../');

require_once(ROOT.'include/main.php');

print_header("Create your application.");


$id = htmlentities($_GET['id']);


$projectFolder = ROOT . "uploads/" . $id;

?>

Your are currently managing project with id "<?php echo $id; ?>".  <br><br>

Please choose the main process to launch from the list of files in the zip below:


<table>
	<tr><td>Filename</td></tr>
<?php
$dir = scandir($projectFolder."/src");


foreach ($dir as $file) {
	if (!startsWith($dir, ".")) {
		echo "<tr><td><input type='radio' name='".$file."'>".$file."</input></td></tr>";
	}
	else echo "<tr><td>ERROR</td></tr>";
}

?>

</table>


<?php

print_footer();

?>