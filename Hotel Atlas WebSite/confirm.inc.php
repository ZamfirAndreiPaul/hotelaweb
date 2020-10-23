<?php

if(isset($_POST['nu']))
{
    require 'dbh.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $depe = $_POST['depe'];
    $panape = $_POST['panape'];
    $room = $_POST['room'];

    $sql = "DELETE FROM reservation WHERE name = '$name' AND email = '$email' AND telefon = '$phone' AND depe = '$depe' AND panape = '$panape' AND room = '$room'";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: contact-us.php?error=".$email);
        exit();
    }
    else {
        mysqli_stmt_execute($stmt);
        header("Location: contact-us.php?confirm=nu");
        exit();
    }
}

if(isset($_POST['da']))
{
    header("Location: contact-us.php?confirm=da");
    exit();
}