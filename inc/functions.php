<?php
$pwdFileName="";
$getFileContent="";
$pwdFileName="password.txt";
$getFileContent=file_get_contents($pwdFileName);


//CONSTENTS
define("BASEURL", "http://murthy.wiseturtle.in/phoenix/");
define("CMSCONTENT", "content/");





//Converts string to slug 
function vsmSlugify($fName){
    $fName=strtolower($fName);
    $fName=str_replace(" ","_",$fName);
return $fName;
}


//adds .txt to the end of the string.
function addTxt($slugifiedValue){
    $slugifiedValue=$slugifiedValue.".txt";
return $slugifiedValue;
}

//Converts text file naame to readable text/title
function fileNameToString($TFName){
    

    $TFName=str_replace("_"," ",$TFName);
    $TFName=str_replace(".txt"," ",$TFName);
    $TFName =trim($TFName);
    $TFName=ucwords($TFName);
    
return $TFName;
}
function js_redirect($page) {
    $var='';
    $var.='<script type = "text/javascript">';
    $var.='';
    $var.='window.location = "'.$page.'";';
    $var.='';
    $var.='</script>';
    return $var;
    }

//Creates file dynamically 
function CreateFile($file_name,$content=NULL){
    $file = fopen(CMSCONTENT.$file_name, "a");
    if(isset($content)){
    fputs($file, $content);
    }
    fclose($file);

    //return $file;
}

function showFileName(){
    $a = scandir(CMSCONTENT);
    $array_without_dots = array_diff($a, array('.','..'));
    $var='';
    $var.='<ul>';
    foreach ($array_without_dots as $filename) {
    $var.='<li><a href="cms_view.php?txtFileName='.$filename.'">'.fileNameToString($filename).'</a></li>';
    }
    $var.='</ul>';
return $var;
}

function readTextfile($filename){
    $var='';
    $lines = file($filename);
    foreach($lines as $line) {
        $var.=$line;
    }
return $var;
}

function pannelLeftSt($pannel_heading,$rightcontent) {
    $var='';
    $var.='<div class="container" >';
    $var.='<div class="row">';
    $var.='<div class="col-sm-4">';
    $var.='<div class="panel panel-primary">';
    $var.='<div class="panel-heading">'.$pannel_heading.' <div style="float:right;">'.$rightcontent.'</div></div>';
    $var.='<div class="panel-body">';
    return $var;
}

function pannelLeftEnd() {
    $var='';
    $var.='</div>';
    $var.='</div>';
    $var.='</div>';
    return $var;
}

function pannelRightSt() {
    $var='';
    $var.='<div class="col-sm-8">';
    $var.='<div class="panel panel-default">';
    $var.='<div class="panel-body">';
    return $var;
}

function pannelRightEnd() {
    $var='';
    $var.='</div>';
    $var.='</div>';
    $var.='</div>';
    $var.='</div>';
    $var.='</div>';
    return $var;
}


?>