<?php
    session_start();
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    // Query connection
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    //if the login fails, return to login.php
    if($username === "") {
        $_SESSION['loginErrorMsg'] = "The email field is required!";
        header('Location: login.php');
        die();
    } else if($password === "") {
        $_SESSION['loginErrorMsg'] = "The password field is required!";
        header('Location: login.php');
    } else if(userExists($username, $password, $result)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['loginErrorMsg'] ="";
        header('Location: index.php');
    } else {
        $_SESSION['loginErrorMsg'] = "Your login attempt has failed.";
        header('Location: login.php');
    }
    
    function userExists($username, $password, $result) {
        if($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                //echo $row['email'] . " " . $row['password'] . "<br>";
                if(($row['email'] === $username) && ($row['password'] === $password)) {
                    return true;
                }
            }
        }
        return false;
    }
?>