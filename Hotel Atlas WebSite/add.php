<?php

if(isset($_POST['add_btn']))
{

    require 'dbh.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adaugari = $_POST['adaugari'];
    $room = $_POST['room'];
    $depe = $_POST['depe'];
    $panape = $_POST['panape'];
    $year = date("Y");
    $month = date('m');

    $datediff = strtotime($depe) - strtotime($panape);

    $multiply = 0;

    if($room == "Single")
    {
        $multiply = 350;
    } else if($room == "Double")
    {
        $multiply = 400;
    } else if($room == "Double Twin")
    {
        $multiply = 420;
    } else if($room == "Double Kid")
    {
        $multiply = 470;
    } else if($room == "Triple")
    {
        $multiply = 550;
    } else if($room == "Family")
    {
        $multiply = 800;
    }

    $days = $multiply * abs(round($datediff / (60 * 60 * 24)));


    if(empty($name) || empty($email) || empty($phone) || empty($depe) || empty($panape)){
        header("Location: contact-us.php?error=emptyfields");
        exit();
    } else {

        $sql = "INSERT INTO reservation(name, email, telefon, adaugari, depe, panape, room, year, month) VALUES ('$name','$email','$phone','$adaugari','$depe', '$panape', '$room', '$year', '$month')";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: contact-us.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_execute($stmt);
            session_start();
            $_SESSION['depe'] = $depe;
            $_SESSION['panape'] = $panape;
            $_SESSION['days'] = $days;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['room'] = $room;
            header("Location: contact-us.php?add=succes");
            exit();
        }
    }

}

?>