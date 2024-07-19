<?php

include('inc/connection.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Article</title>
<link rel='stylesheet' href="css/inser.css">
</head>
<body>
<div class="container">
    <h2>Insert Article</h2>
    <form action="article_post.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="article_text" placeholder="Enter your article here" required><br>
        <input type="file" name="article_image" accept="image/*" required><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</div>
</body>
</html>


<?php



















/*
$querey="SELECT * FROM users ";
$data=mysqli_query($conn,$querey);//contain in an array
while($result=mysqli_fetch_array($data))
{
    
    print_r($result[0].' '.$result[1]) ;
    echo '<br>';
}
*/
?>
