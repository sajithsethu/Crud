<?php

session_start();
include 'db-connection.php';
if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $password = $_POST['password'];


    $query = mysqli_query($conn, "SELECT * FROM `registration` WHERE `name`= '$name' And `password`='$password'");

    $result = mysqli_fetch_array($query);

    if ($result) {

        $_SESSION['name'] = $result['name'];
        $_SESSION['password'] = $result['password'];
        $_SESSION['id'] = $result['id'];


        echo $_SESSION['name'];
        echo $_SESSION['password'];
        echo $_SESSION['id'];

        // header("Location:dash.php");

    } else {
        echo "not sucessfull";
    }
} else {
    echo "db error";
}
session_write_close();

?>