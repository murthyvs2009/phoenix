<?php
include('inc/header.php');
?>
<html>
    
        <div class="pwdUpdateForm">
            <form action="update_password.php" method="POST">
            <br/>
            <div class="form-group">
                <input type="password" class="form-control" name="old_password" placeholder="Old Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="new_password" placeholder="New Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="submitUpdatePwd">Update</button>
            </div>        
            </form>
        </div>

<?php
//Declaring Variables
$old_password="";
$new_password="";

if(isset($_POST['submitUpdatePwd'])){
//Do the deeds.
    //1)save the passwords in their respective variables.
        //Setting values into the variables.
            $old_password=$_POST['old_password'];
            $new_password=$_POST['new_password'];
    //2)convert the old password to md5
             $md5OldPwd= md5(trim($old_password));
             //echo $md5OldPwd;
    //3)check if the old password matches the password in the password file.
                $md5NewPwd= md5(trim($new_password));
                $pwdFileName="password.txt";
                $pwdInFile = file_get_contents($pwdFileName);
                if($md5OldPwd==$pwdInFile){
                echo "They are same!";
                unlink($pwdFileName);


                $myfile = fopen($pwdFileName, "w") or die("Unable to open file!");
                $txt = $md5NewPwd;
                fwrite($myfile, $txt);
                fclose($myfile);
                
             }
             else{
                echo "They are not same!";
             }
    //4)if yes then (a)delete the old password file ,(b)create a new file (b)convert the new password into md5 and put it there.

}



?>
    
<?php
include('inc/footer.php');
?>