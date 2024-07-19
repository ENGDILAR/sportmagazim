<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print Article</title>
<link rel='stylesheet' href="css/comment.css">
</head>
<body>
<?php
session_start();
include('inc/connection.php');
if(isset($_POST['pos_id']))
{
    if(isset($_POST['comment']))
    {
$post_id = $_POST['pos_id'];
$comment = $_POST['comment'];
$user_id=$_SESSION['id'];
$username=$_SESSION['username'];
$userphto=$_SESSION['photo'];
$sql = "INSERT INTO comments (article_id, text,username,user_id,userphoto) VALUES ('$post_id', '$comment','$username','$user_id','$userphto
')";
if ($conn->query($sql) === TRUE) {

$sql = "SELECT * FROM comments where article_id = '$post_id' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 
           echo '<div class="comments-container">';
               
                echo'<div class="comment">';
                  echo'  <div class="user-info">';
                      echo'  <img src='.$row['userphoto']. ' alt="User Photo">';
                       echo' <p>' .$row['username']. '</p>';
                   echo' </div>';
                   echo' <p class="comment-text">'. $row['text']. '</p>';
               echo' </div>';
           echo' </div>';
     
    }
}
else{
    echo"there is no comments";
}}
}}
?>
</body>
</html>
