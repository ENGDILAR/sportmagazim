<?php
session_start();//start a new session
include('inc/connection.php');
if(isset($_POST['username']) && isset($_POST['password'] ))
{
    $username=stripslashes(strtolower($_POST['username']));
  
    $password=stripslashes(strtolower($_POST['password']));

    $username=htmlentities(mysqli_real_escape_string($conn,$_POST['username']));//remove the special symbols lik<> or & to protect html codes
    $password=htmlentities(mysqli_real_escape_string($conn,$_POST['password']));

if(empty($username))
{
 $user_error='<p id="error">please enter user name<p> <br>';
 $err_s=1;

}
if(empty($password))
   {
    $pass_error='<p id="error">please insert the password<p> <br>';
    $err_s=1;
include('login.php');
   }
   else{
    include('login.php');
   }}
   if(!isset($err_s))//if the err dosent exist that min there is not error becase we creatr it when an error appers
   {
$cheak_user="SELECT *  FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$cheak_user);
$row=mysqli_fetch_assoc($result);
if($row['username'] === $username && $row['password'] === $password)//compare the values to see if it equals
{
   $_SESSION['photo']=$row['profile_pcture'];
$_SESSION['username']=$row['username'];
$_SESSION['id']=$row['id'];
header('location: page1.php');
}
   }
?>