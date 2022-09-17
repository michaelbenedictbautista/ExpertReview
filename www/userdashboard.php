<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Account;
use restaurantreview\Search;
use restaurantreview\Session;
use restaurantreview\Review;

$account = new Account();
$search = new Search();

$categories = $search -> getCategories();

$site_name = "Restaurant Review Expert";

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

// Update
// if( $_SERVER["REQUEST_METHOD"] == "POST" && $_GET["uId"] != NULL) {
if( $_SERVER["REQUEST_METHOD"] == "POST" && (isset($user_Id))) {

    Session::unset("user_image", $user_image);
    Session::unset("user_firstName", $user_firstName);
    Session::unset("user_lastName", $user_lastName);
    Session::unset("user_userName", $user_userName);
    Session::unset("user_email", $user_email);
    Session::unset("user_pw", $user_pw);
    Session::unset("user_bday", $user_bday);
    Session::unset("user_gender", $user_gender);  
    //Session::unset("user_id", $user_id);
    
   
    // echo $user_id = $_POST['user_id']; 
    $user_image = $_POST['formFile'];
    $user_firstName = $_POST['firstName'];
    $user_lastName = $_POST['lastName'];
    $user_userName = $_POST['userName'];
    $user_email = $_POST['email'];
    $user_pw = $_POST['password'];
    $user_bday = $_POST['bday'];
    $user_gender = $_POST['gender'];
    $user_Id = $user_Id;

    $result = $account -> updateAccount ($user_image, $user_firstName, $user_lastName, $user_userName, $user_email, $user_pw, $user_bday, $user_gender, $user_Id);

    Session::set("user_image", $user_image);
    Session::set("user_firstName", $user_firstName);
    Session::set("user_lastName", $user_lastName);
    Session::set("user_userName", $user_userName);
    Session::set("user_email", $user_email);
    Session::set("user_pw", $user_pw);
    Session::set("user_bday", $user_bday);
    Session::set("user_gender", $user_gender);
    // Session::set("user_id", $user_id);
    
    echo "<script>
    alert('Account updated successfully!');
    window.location.href='userdashboard.php';
    </script>";
}

// Instantiate Review class
$review = new Review();
$AllreviewsById = $review -> getAllReviewsByUser($user_Id);


// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
    "userdashboard.html.twig", 
    [
        "page_title" => "User dashboard",
        "site_name" => $site_name,
        "categories" => $categories, // nav category pull down menu
        "user_email" => $user_email,

        // getReviewsById()
        "AllreviewsById" => $AllreviewsById,

        // Session after login
        "user_email" => $user_email,
        "user_Id"=> $user_Id,
        "user_image" => $user_image,
        "user_firstName"=> $user_firstName,
        "user_firstName"=> $user_firstName,
        "user_lastName"=> $user_lastName,
        "user_pw" => $user_pw,
        "user_bday" => $user_bday,
        "user_gender" => $user_gender,
        "user_userName" => $user_userName,    
    ]);
?>