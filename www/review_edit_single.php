<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Search;
use restaurantreview\Restaurant;
use restaurantreview\Review;
use restaurantreview\Session;

if( $_GET["r"] != NULL && $_GET["rest"] != NULL) {
  $review_id = $_GET['r'];
  $restaurant_id = $_GET['rest'];
} 

// Instantiate Search class
$search = new Search();
$categories = $search -> getCategories();

//print_r( $search_result );
$site_name = "Restaurant Review";
//$count = count( $search_result );

// Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");
$user_firstName = Session::get("user_firstName");
$user_lastName = Session::get("user_lastName");
$user_pw = Session::get("user_lastName");
$user_bday = Session::get("user_bday");
$user_gender = Session::get("user_gender");
$user_userName = Session::get("user_userName");

// Instantiate Restaurant class
$review = new Review();
$reviewsById = $review -> getReviewsByUserId('rest.restaurant_id');
$AllreviewsById = $review -> getAllReviewsByUser($user_Id);
$reviewDetails = $review -> getReviewDetailsByReviewId($review_id);
$reviewsByIdDetail = $review -> getReviewsByUserIdDetail($user_Id, $restaurant_id);

// Get restaurant details by restaurant id
$restaurant = new Restaurant();
$restaurantDetails = $restaurant -> getDetail($review_id);

// Create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "review_edit_single.html.twig", 
  [
    // Search Class
    "page_title" => "Restaurant Review Expert",
    "site_name" => $site_name,
    "user_email" => $user_email,

    // nav category pull down menu
    "categories" => $categories,

    // getReviewsById()
    "reviewsById" => $reviewsById,
    "AllreviewsById" => $AllreviewsById,
    "reviewDetails" => $reviewDetails,
    "reviewsByIdDetail" => $reviewsByIdDetail,

    "reviewId" => $review_id,

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
    
    // Restaurant getDetail()
    "restaurantDetails" => $restaurantDetails,
    "restaurant_id" => $restaurant_id

  ] );
?>