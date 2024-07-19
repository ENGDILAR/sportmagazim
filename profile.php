<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php
session_start();
include('inc/connection.php');
$user_id=$_SESSION['id'];
$sql = "SELECT * FROM users where id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='profile'>";
        echo "<img src='" . $row['profile_pcture'] . "' alt='Profile Photo'>";
        echo "<h2>" . $row['username'] . "</h2>";
        echo "<p>Birthday: " . $row['birthday'] . "</p>";
        echo "<p>Gender: " . $row['gender'] . "</p>";

        echo '<form action="logout.php" method="POST">';
        echo '<button class="button" ">LOGuT</button>';
        echo '</form>';
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>