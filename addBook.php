<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    // Validate the book entry
    if(($_GET['title'] == '') || ($_GET['author'] == '')) {
        $_SESSION['errorMsg'] = "You need to fill it all in son...";
        header('Location: /BookList/'); 
        exit();      
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "INSERT INTO books  (book_id, title, author, description) 
    VALUES ('" . uniqid() . "','" . $_GET['title'] . "', '" . $_GET['author'] . "', '" . $_GET['description'] . "')";
    $result = $conn->query($sql);
    //echo $sql;
   // echo $result;
    if (!$result) {
        $_SESSION['errorMsg'] = mysqli_error($conn);
    } else {
        $_SESSION['errorMsg'] = "Successfully added book!";
    }
    header('Location: /BookList/');

?>