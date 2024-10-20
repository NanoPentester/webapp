
<?php

    include("database.php");

?>
<?php
    try {
        $username = $_POST['userName'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (userName, user_password) VALUES (:userName, :password)";

        $connect->prepare($sql)->execute([
            ':userName' => $username,
            ':password' => $password,

        ]);

        header("location: loggedin.html");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
