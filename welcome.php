<?php
session_start(); //otvorenie session

//zistenie ci je session nastavene
if(isset($_SESSION['username']) ) {
     
    echo 'Welcome '.$_SESSION['username'].'<br>';

    echo 'Click here to <a href = "logout.php" tite = "Logout">logout.';//odkaz na odhlasenie
}
?>

<style>
    body{
        margin-top:20vw;
        background-color: #82C0CC;
        text-align: center;}
    </style>
