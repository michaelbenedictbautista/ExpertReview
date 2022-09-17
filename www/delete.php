<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Account;
use restaurantreview\Session;

$account = new Account();

//Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");
$user_firstName = Session::get("user_firstName");
$user_lastName = Session::get("user_lastName");
$user_pw = Session::get("user_pw");
$user_bday = Session::get("user_bday");
$user_gender = Session::get("user_gender");
$user_userName = Session::get("user_userName");

$result = $account -> deleteAccount($user_Id);

if ($result["success"] == true) {
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
}

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