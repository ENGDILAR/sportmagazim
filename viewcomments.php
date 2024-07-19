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
include('inc/connection.php');
$p_id=$_POST['post_id'];
// استعلام لاسترداد البيانات من قاعدة البيانات
$sql = "SELECT * FROM comments where article_id = '$p_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // طباعة الصور والنصوص
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
else
{

    echo"there is no comments
    ";
}
?>
</body>
</html>
