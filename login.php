<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="css/style.css">
    <title>loging</title>
</head>
<body>
<div class="main">
    <h1>LOG IN </h1><br>
    <h2>WELCOM</h2>
    <br><br>
    <form action="login_post.php" method="POST">

<?php
if(isset($user_error))
{
    echo $user_error;
}
?>
    <input type="text" name="username" id ="" placeholder="Email "><br>

    <?php
if(isset($pass_error))
{
    echo $pass_error;
}
?>
    <input type="password" name="password" id="" placeholder="password"><br>
    <input type="submit" name="submit" id="submit" value="log in"><br>
    </form>
    <h3>or </h3><br>
    <a id="register" href="Register.php"> REGISTER </a>
</div>
</body>
</html>