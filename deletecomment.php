<?php 
include('inc/connection.php');
if(isset($_POST['comment_id']))
{
    $id = $_POST['comment_id'];
    $sqlcomment = "DELETE FROM comments WHERE id='$id'";
    if($conn->query($sqlcomment))
    {
        header('location: footballarticles.php');
        exit; // يجب عليك استخدام exit بعد توجيه الصفحة لمنع أي تعليمات أخرى من التنفيذ
    }
    else {
        echo "Error deleting comment: " . $conn->error;
    }
}
else {
    echo "Wrong request";
}
?>