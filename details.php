<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM books WHERE book_id = '" . $_GET['id'] . "'";
        
        // echo $sql;
        //echo $sql;
        $result = $conn->query($sql);
        
        $book = $result->fetch_assoc();

        ?> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <h1> Book Details </h1>
        <a href='/BookList/'> < BACK </a>
        <br>
        <?php
        echo '<br>TITLE: ' . $book['title'];
        echo '<br><br>AUTHOR: ' . $book['author'];
        echo '<br><br>DESCRIPTION: ' . $book['description'];       
        ?>
        <br>
        <br>
        <form action="/BookList/deleteBook.php">
            <input type="hidden"  name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" value="Delete">
        </form>