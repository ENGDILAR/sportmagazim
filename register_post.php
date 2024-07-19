<?php
// strtolower is a function that convert any char input to lowercase 
include('inc/connection.php');//including the files in the folder inc and run them like run the connection to the database 
if(isset($_POST['submit']))//if the user press submet(register) then 
{
   
    $username= stripcslashes( strtolower($_POST['username']));//the information sended from the line wich have name "username" and remove \ from the input
    $password=stripcslashes( $_POST['password']);
    $email=stripcslashes( $_POST['email']);
    if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year'])) {
      $birthday_day = (int)$_POST['birthday_day'];
      $birthday_month = (int)$_POST['birthday_month'];
      $birthday_year = (int)$_POST['birthday_year'];
  
      $birthday = date('Y-m-d', strtotime($birthday_year . '-' . $birthday_month . '-' . $birthday_day));
  
      // قم بتخزين $birthday في قاعدة البيانات
  }
  
    $username=htmlentities(mysqli_real_escape_string($conn,$_POST['username']));//remove the special symbols lik<> or & to protect html codes
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $email=htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
     //encryption the password befre store it in the databse and describ it when it called
    $md5_pass=md5($password);

    //if they  send data from gender then make variables and store the data inside thise variable
   if(isset($_POST['gender']))
   {
     $gender=($_POST['gender']);
     $gender=htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
     $err_s=0;
     //if the sending value wasnot in the array this to protect the web from inspect to prevent sending any value yhat not in the option
     if(!in_array($gender,['male','fmale']))
     {
        $gender_error='<p id="error">please chosse your gender !<p><br>';
        $err_s=1;
     }
   }

   if(empty($username))
   {
    $use_error='<p id="error">please enter user name<p> <br>';
    $err_s=1;
   
   }
   elseif(strlen($username) < 3)
   {
    $use_error='<p id="error">your username is lee please enter the minimum number of username character<p><br>';
    $err_s=1;
   
   }
   else if(filter_var($username,FILTER_VALIDATE_INT))
   {
    $use_error='<p id="error">please inter a valid name<p><br>';//prevent numbers
    $err_s=1;
 
   }
   if(empty($email))
   {
    $email_error='<p id="error">please enter email<p> <br>';
    $err_s=1;
  
   }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL))//sadf@gami.com this is the exepted form of the mail otherways its gonna be wrong input
{
    $email_error='<p id="error">please enter a valied email<p><br>';
    $err_s=1;

}
 if(empty($gender))
   {
    $gender_error='<p id="error">please chosse a gender<p> <br>';
    $err_s=1;

   }
   if(empty($birthday))
   {
    $birthday_error='<p id="error">please enter a vali birthday<p> <br>';
    $err_s=1;

   }
   if(empty($password))
   {
    $pass_error='<p id="error">please insert the password<p> <br>';
    $err_s=1;
    include('register.php');//icluding
   }
   elseif(strlen($password) < 6)
   {
    $pass_error='<p id="error">PLEASE ENTER 6 LEETERS AT LIST <p> <br>';
    $err_s=1;
    include('register.php');//icluding
   }
   else{
      
      if($err_s == 0 )
      {
         if($gender == 'fmale')
         {
          $profile_pic="images/nopicturF.jpg";
         }
         else
         {
            $profile_pic="images/nopicturM.jpg";
         }
         //a variable to store the sended data from the refister
         $sql="INSERT INTO users(username,birthday,email,gender,password,profile_pcture) 
         VALUES('$username','$birthday','$email','$gender','$password','$profile_pic')";//insert as the following order
         mysqli_query($conn,$sql);//send to database
         header('location: login.php');
   
      }
      else{
      include('register.php');
   
   }
   }

}

?>