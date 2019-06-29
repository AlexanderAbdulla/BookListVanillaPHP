<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] == false)){
        header('Location: login.php');
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <h1><<< MY BOOKS >>></h1>
    <?php
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    // Look through and create book elements
    if($result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()) {
            echo "<a href='details.php?id=" . $row['book_id'] ."'>" . $row["title"] . "</a><br><br>";
        }
    }
    ?>
    <!-- div to display errors --> 
    <div id="errorDiv"><?php echo $_SESSION['errorMsg']; ?></div> 
    <br>
    <!-- Fom to add books --> 
    <form action ="addBook.php">
        Title: <input type ="text" name ="title"><br>
        Author: <input type ="text" name="author"><br>
        Description: <input type ="text" name="description"><br>    
        <input type="submit">
    </form>
    <form action ="logoutHandler.php">
        <input type="submit" value="Logout">
    </form>
    <?php

?>