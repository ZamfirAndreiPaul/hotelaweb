<?php

if(isset($_POST['confirm']))
{

    require 'dbh.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adaugari = $_POST['adaugari'];
    $room = $_POST['room'];
    $depe = $_POST['depe'];
    $panape = $_POST['panape'];

    $sql = "INSERT INTO confirmed(name, phone, email, depe, panape, adaugari, room) VALUES ('$name','$phone','$email','$depe', '$panape', '$adaugari', '$room')";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: table.php?error=sqlerror&".$email);
        exit();
    }
    else {
        mysqli_stmt_execute($stmt);
        $sql = "DELETE FROM reservation WHERE email = '$email' AND telefon = '$phone'";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        header("Location: table.php?add=succes");
        exit();
    }
}
?>