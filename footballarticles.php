<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Print Article</title>
<link rel='stylesheet' href="css/football.css">
</head>
<body>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  /* Style the navigation bar */
  .navbar {
    background-color: #4267B2; /* Facebook blue color */
    color: white;
    padding: 10px;
  }
  
  .navdiv {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .logo a {
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
  }
  
  ul {
    list-style: none;
    display: flex;
  }
  
  ul li {
    margin-right: 20px;
  }
  
  /* Style the post container */
  .container {
    margin-top: 20px;
  }
  
  .post {
    background-color: #f2f2f2; /* Light gray background */
    padding: 20px;
    margin-bottom: 20px;
  }
  
  #jurnalistphoto {
    width: 50px;
    height: 50px;
    border-radius: 50%; /* Make the journalist's photo round */
    margin-right: 10px;
  }
  
  .post p {
    margin-bottom: 10px;
  }
  
  /* Style the comment form */
  form textarea {
    width: 100%;
    margin-bottom: 10px;
  }
  
  /* Style the buttons */
  .button {
    background-color: #4267B2; /* Facebook blue color */
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
  }
    </style>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a >THE GOAL</a></div>
        <ul>
            <li><a href="page1.php">HOME</a></li>
            <li><a href="#"></a></li>
            <li><a href="profile.php">PROFILE</a></li>
        </ul>
    </div>
</nav>

<button class="button" onclick="window.location.href='creatarticle.php'">post</button>
<?php

include('inc/connection.php');
$sql = "SELECT * FROM article";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
        <div class="container">
            <div class="post">
               
                <img src="<?php echo $row['jurnalist_photo']; ?>"id="jurnalistphoto" alt="User Photo">
                <p><?php echo $row["jurnalest_name"]; ?></p>

            <form action="delete.php" method="POST">
            <input type="hidden" name="post_id" value="<?php echo $row['article_id']; ?>">
            <button class="button">DELETE</button>

            </form>

                <p><?php echo $row["text"]; ?></p>
               
                <img src="<?php echo $row["photo"]; ?>" alt="Article Image">

             
                <form action="comments_post.php" method="POST">
                    <input type="hidden" name="pos_id" value="<?php echo $row['article_id']; ?>">
                    <textarea name="comment"></textarea>
                    <button class="button" type="submit">comment</button>
                </form>

            
                <form action="viewcomments.php" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $row['article_id']; ?>">
                    <button class="button">View Comments</button>
                </form>
            </div>
        </div>
<?php
    }
} else {
    echo "there is no articles yet";
}
?>
</body>
</html>