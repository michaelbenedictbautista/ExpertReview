<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Session;

// Unset variable after when user log out
$user_email = Session::unset("user_email");
$user_id = Session::unset("user_id");
$user_image = Session::unset("user_image");
$user_firstName = Session::unset("user_firstName");
$user_lastName = Session::unset("user_lastName");
$user_pw = Session::unset("user_pw");
$user_bday = Session::unset("user_bday");
$user_gender = Session::unset("user_gender");
$user_userName = Session::unset("user_userName");

header('Location: /');

// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(

    "home.html.twig", 
    [
        "user_email" => $user_email,
        "user_id" => $user_id,
        "user_image" => $user_image,
        "user_firstName" => $user_firstName,
        "user_lastName" => $user_lastName,
        "user_pw" => $user_pw,
        "user_bday" => $user_bday,
        "user_gender" => $user_gender,
        "user_userName" => $user_userName,
    ]);
?>