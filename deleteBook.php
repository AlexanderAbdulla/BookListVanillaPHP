<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM books WHERE book_id = '" . $_GET['id'] . "'";
    echo $sql;
    $result = $conn->query($sql);

    if (!$result) {
        $_SESSION['errorMsg'] = mysqli_error($conn);
    } else {
        $_SESSION['errorMsg'] = "Successfully deleted a book!";
    }

    header('Location: /BookList/');    
?>