<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Account;
use restaurantreview\Search;
use restaurantreview\Session;

$account = new Account();

$result = null;
$user_firstName = null;
$user_lastName = null;
$user_userName = null;
$user_email = null;
$user_pw = null;
$user_bday = null;
$user_gender = null;
$user_formFile = null;
$user_image = null;
$user_id = null;

// Set variable after successful log in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["email"];
    $user_pw = $_POST["password"];
    if (strlen($user_email) > 0 && strlen($user_pw) > 0) {
        $result = $account -> login($user_email, $user_pw);
        if ($result["success"] == true ){
            Session::set("user_email", $user_email);
            Session::set("user_id", $result["id"]);
            Session::set("user_image", $result["image"]);
            Session::set("user_firstName", $result["fName"]);
            Session::set("user_lastName", $result["lName"]);
            Session::set("user_pw", $result["password"]);
            Session::set("user_bday", $result["bday"]);
            Session::set("user_gender", $result["gndr"]);
            Session::set("user_userName", $result["uName"]);

            header('Location: userdashboard.php');

        } else {                  
            $user_email = null;
            $user_id = null;
            $user_pw = null;
            $user_image = null;
            $user_firstName = null;           
            $user_lastName = null;
            $user_pw = null;
            $user_bday = null;          
            $user_gender = null;
            $user_userName = null;          
        }
    }
}

// Instantiate Search class
$search = new Search();
$categories = $search -> getCategories();

$site_name = "Restaurant Review Expert";

// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(

    "signin.html.twig", 
    [
        "page_title" => "User sign in",
        "site_name" => $site_name,
        "categories" => $categories, // nav category pull down menu
       
        // Session after login
        "user_email" => $user_email,
        "user_id" => $user_id,
        "user_pw" => $user_pw,
        "user_image" => $user_image,
        "user_firstName" => $user_firstName,
        "user_lastName" => $user_lastName,
        "user_pw" => $user_pw,
        "user_bday" => $user_bday,
        "user_gender" => $user_gender,
        "user_userName" => $user_userName,
        
        "result" => $result
    ]);

?>