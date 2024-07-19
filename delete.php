<?php 
include('inc/connection.php');
if(isset($_POST['post_id']))
{
    
$id=$_POST['post_id'];

$sqlarticle = "DELETE  from article where article_id='$id'";
$sqlcomment = "DELETE  from comments where article_id='$id'";
$conn->query($sqlcomment);
$conn->query($sqlarticle);
header("location: footballarticles.php");
}
else echo"wrog";