<?php
include('inc/header.php');
?>

<!-update your file on submit-->

<?php
if (isset($_POST['content']))
{
$content = $_POST['content'];
$file_name ="elements.txt";
if (!file_exists($file_name))
{
$fil = fopen($file_name, w);
fclose($fil);
}
unlink($file_name);
$file = fopen($file_name, "a");
fputs($file, $content);
fclose($file);
echo '<div class="success">Record Updated</div>';
}
?>

<form action="edit.php" method="post">
<textarea style="width:100%; height:400px;" name="content"><?php
$handle = @fopen("elements.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
       
?>
<?php echo $buffer; ?>
<?php

//echo $buffer."<br>";
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
?></textarea><br />
<input type="submit" value="Update">
   </form>

<?php
include('inc/footer.php');
?>
