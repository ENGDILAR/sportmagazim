<?php
session_start();

include('inc/connection.php');
$jurnalistname=$_SESSION['username'];
$jurnalestID=$_SESSION['id'];
$jurnalistphoto=$_SESSION['photo'];
if(isset($_POST['submit']))
{
    
if(isset($_POST['article_text']))
{
    $article=stripslashes($_POST['article_text']);

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["article_image"]["name"]);
 if (move_uploaded_file($_FILES["article_image"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO article (text, photo,jurnalest_name,journalist_id,jurnalist_photo)
             VALUES ('$article', '$target_file','$jurnalistname','$jurnalestID','$jurnalistphoto')";
            mysqli_query($conn,$sql);
        
            header('location:footballarticles.php');
        
        $conn->close();
    
    }
    else{
        echo 'wrong';
    }




}
else echo "dednot press ";

}
else echo"the is no submit";
?>