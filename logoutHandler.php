<?php
    session_start();
    //if the login fails, return to login.php

    //if the login succeeds, go to index.php
    $_SESSION['loggedin'] = false;
    header('Location: login.php');
?>