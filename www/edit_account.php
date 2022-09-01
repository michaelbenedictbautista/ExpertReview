<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Account;
use restaurantreview\Search;
use restaurantreview\Session;
use restaurantreview\Restaurant;
use restaurantreview\Review;

$account = new Account();
$search = new Search();

$categories = $search -> getCategories();

$site_name = "Restaurant Review Expert";

// Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");
$user_firstName = Session::get("user_firstName");
$user_lastName = Session::get("user_lastName");
$user_pw = Session::get("user_pw");
$user_bday = Session::get("user_bday");
$user_gender = Session::get("user_gender");
$user_userName = Session::get("user_userName");

$review = new Review();
$reviewsById = $review -> getReviewsByUserId('rest.restaurant_id');
$AllreviewsById = $review -> getAllReviewsByUser($user_Id);


// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
    "edit_account.html.twig", 
    [
        "page_title" => "User dashboard",
        "site_name" => $site_name,
        "categories" => $categories, // nav category pull down menu
        "user_email" => $user_email,

        // getReviewsById()
        "reviewsById" => $reviewsById,

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