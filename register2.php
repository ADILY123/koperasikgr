<?php
session_start();
include "db_conn.php";

function isUsernameTaken($username) {
    global $conn;
    $escapedUsername = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM users WHERE user_name = '$escapedUsername'";
    $result = $conn->query($sql);

    return $result->num_rows > 0;
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: register.php?error=Add Username");
        exit();
    } else if (empty($pass)) {
        header("Location: register.php?error=Password is required");
        exit();
    } else if (isUsernameTaken($uname)) {
        header("Location: register.php?error=Username already exists");
        exit();
    } else {
        // Use prepared statement to insert user into the database
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (user_name, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $uname, $hashed_password);
        
        if ($stmt->execute()) {
            echo "New record created successfully";

            // Play audio (HTML5 audio tag)
            echo '<script>
                  var audio = new Audio("LoginSystem/Login-System-PHP-and-MYSQL-master/GTA San Andreas - Mission passed sound.mp3");
                  audio.play();
               </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Successfully</title>
    <link href="style0.css" rel="stylesheet">
    <style>
    </style>
</head>
<body style="background:url(./DCDDD.jpg)">
    <a href="index.php">Login</a>
</body>
</html>
