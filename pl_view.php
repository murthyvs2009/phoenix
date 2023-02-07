<?php
include('inc/header.php');
?>

<h2 class="PageTitle">Project Links </h2>
<a href="pl_edit.php" class="editBtn"> <button type="button" class="btn btn-secondary">Edit</button></a>
<ul class="list-group viewPageClass">
<?php
      $y=0;
if (($handle = fopen('pl_elements.txt', "r"))) {
while (($data = fgetcsv($handle, 1000, "|")))
{
    $y++;

    $title="";
    $weburl="";
    
    $title  = $data[0];
    $weburl = $data[1];
    
?>
    <li class="list-group-item disabled">
    <a href="<?php echo $weburl; ?>" target="_blank"><?php echo $title; ?></a>
    </li>
<?php
}
}
fclose($handle);
?>
</ul>

    

<?php
include('inc/footer.php');
?>