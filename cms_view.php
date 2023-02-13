<?php
session_start();
include('inc/header.php');

if(isset($_GET['txtFileName'])){
  $_SESSION['getFileName']=$_GET['txtFileName'];
  
}

?>

<h2 class="PageTitle">CMS:Content Management System </h2>
<?PHP
if(isset($_GET['addPage'])){
unset($_SESSION['getFileName']);
  
}


$buttonVal="";
$buttonVal='<a href="cms_view.php?addPage=TRUE"><img src="inc/img/pageadd.png" style="max-width:25px;"/></a>';
?>

<?php echo pannelLeftSt("Pages",$buttonVal) ; ?>
<?php  echo showFileName();?>
<?php echo pannelLeftEnd(); ?>


<?php echo pannelRightSt(); ?>

<!--VIEW AND EDIT TABS START -->
<?PHP if(isset($_SESSION['getFileName'])){?>
      <h3><?php echo fileNameToString($_SESSION['getFileName']);?></h3>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#view">View</a></li>
        <li><a data-toggle="tab" href="#edit">Edit</a></li>
        <li><a data-toggle="tab" href="#del">Delete</a></li>
      </ul>

      <div class="tab-content">
        <div id="view" class="tab-pane fade in active">
              <?php
              if(isset($_SESSION['getFileName'])){
              $filename='';
              $txtFileName='';
              $txtFileName=$_SESSION['getFileName'];
              $filename = CMSCONTENT.$txtFileName;
             // echo "<pre>";
      

              echo readTextfile($filename);
              //echo "</pre>";
              }
              ?>
        </div>
        <div id="edit" class="tab-pane fade">
              <div class="edit-form">
              <form action="cms_view.php" method="POST">
              <div class="form-group">
              <input type="hidden" class="form-control" name="editFileName" value="<?php echo $_SESSION['getFileName'];?>">
              <textarea id="summernote" name="editContent" style="min-height:200px; width:100%;"><?php echo readTextfile($filename);?></textarea>
              </div>
              <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" name="edit_Page">Edit Page</button>
              </div>        
              </form>
              </div>
    
        </div>
        <div id="del" class="tab-pane fade">
            <div class="panel panel-danger">
              <div class="panel-heading">DELETE FILE WARNING!</div>
              <div class="panel-body">
              <p>
                Are you sure you want to delete this file? <br/>This action is irreversable!
              </p>
                <a class="btn btn-danger" href="cms_view.php?delFile=<?php echo $_SESSION['getFileName'];?>">Yes, Delete the file!</a>
                <a class="btn btn-info" href="cms_view.php">No!!</a>
              </div>
            </div>
        </div>
      </div>


<?PHP }?>   

<!--VIEW AND EDIT TABS END -->


<?php


if(isset($_GET['delFile'])){
  $editFileName=$_GET['delFile'];
  //unlink File
  unlink(CMSCONTENT.$editFileName);
  unset($_SESSION['getFileName']);
  echo js_redirect('cms_view.php');
}






if(isset($_POST['editContent'])){
$fileName="";
$fileContent="";

$editFileName=$_POST['editFileName'];
$fileContent=$_POST['editContent'];

//unlink File
unlink(CMSCONTENT.$editFileName);
CreateFile($editFileName,$fileContent);
echo js_redirect('cms_view.php');

}

if(isset($_GET['addPage'])){
?>
<div class="edit-form" style="max-width:450px; margin:0px auto;">
<center><h3>Add a new page</h3></center>
    <form action="cms_view.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="file_name" placeholder="File Name" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="addPage">Add Page</button>
        </div>        
    </form>
</div>

<?php
  }
  ?>


<?php echo pannelRightEnd(); ?>


<?php




if(!empty($_POST['file_name'])){
$newSlugifiedFileName='';
$newFileName='';
$newFileName=$_POST['file_name'];
$newSlugifiedFileName= addTxt(vsmSlugify($newFileName)); 
CreateFile($newSlugifiedFileName);
echo js_redirect('cms_view.php');
}


/*
echo "Ex.:-convert text ('Maths Test') to TXT file name.<br/>";
echo "The function we are calling is this addTxt(vsmSlugify(".$NormalString."))";
$NormalString="Maths Test";
$convertedToFilename=addTxt(vsmSlugify($NormalString));
echo "The slugified version of ('Maths Test') is :-".$convertedToFilename;

echo "<br/> <br/> <br/>";


echo "Ex.:-Converting text file name back to readable format. We will use fileNameToString(.$convertedToFilename.)";
echo "<br/> <br/> <br/>";

echo fileNameToString($convertedToFilename);

echo "<br/> <br/> <br/>";
echo "create a file with the file name of (math_test.txt)";
//echo CreateFile("math_test.txt");
echo CreateFile("science_test.txt");
echo CreateFile("english_test.txt");
*/

//echo print_r($array_without_dots );

/*
echo '<ul>';
foreach ($array_without_dots as $filename) {

    echo '<li><a href="cms_view.php?txtFileName='.$filename.'">'.fileNameToString($filename).'</a></li>';
  }
echo '</ul>';
*/
?>

<!--
<div class="container" style="clear:none !important;">
  <div class="row">
        
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel Heading</div>
                <div class="panel-body">Panel Content</div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class=" panel-body">Panel Content</div>
            </div>
        </div>

  </div>
</div>
-->

A line has been added.

<?php
include('inc/footer.php');
?>