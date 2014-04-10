<?php

define('ROOT', '../');

require_once(ROOT.'include/main.php');

print_header("Create your application.");


$id = htmlentities($_GET['id']);


$projectFolder = ROOT . "uploads/" . $id;

?>

Your are currently managing project with id "<?php echo $id; ?>".  <br><br>

Please choose the main process to launch from the list of files in the zip below:


<form action="<?php echo ROOT; ?>manage/modify.php" method="POST">
<table>
	<tr><td>Filename</td></tr>
<?php
$dir = scandir($projectFolder."/src");


foreach ($dir as $file) {
	echo "<tr><td><input type='radio' name='mainFile' value='".$file."'>".$file."</input></td></tr>";
}

?>

</table>

<input type='submit' name='submit' value='Set launch script!' alt='CONVERT NOW!' class='coolbutton'></input>
</form>

<?php

print_footer();

?>