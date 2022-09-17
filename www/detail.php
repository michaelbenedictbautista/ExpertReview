<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Restaurant;
use restaurantreview\Search;
use restaurantreview\Session;
use restaurantreview\Review;

$review = new Review();

// Get declared value from the review form made by the user
if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
  $user_id = $_POST["user_Id"];
  $review_comment = $_POST["comment"];
  $restaurant_id = $_POST["restaurant_id"];
  $review_star = $_POST["star"];
  $review_title = $_POST["title"];

  // Create the review
  $add = $review -> addReview($user_id, $review_comment, $restaurant_id, $review_star, $review_title );
  if( $add == true ) {
    // tell user review has been posted
  }
  else {
    // tell user review is not created
  }
}

// Global variable
$restaurant_id = $_GET['id'];

$restaurant = new Restaurant();
$detail = $restaurant -> getDetail($restaurant_id);
$restaurant_name = $detail['restaurant_name'];
$site_name = "Restaurant Review Expert";

// Instantiate Search class
$search = new Search();
$categories = $search -> getCategories();

//  Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");


// Instantiate Review class
$reviews = $review -> getReviews($restaurant_id);
$reviewsById = $review -> getReviewsByUserId($restaurant_id);
$reviewsByIdDetail = $review -> getReviewsByUserIdDetail($user_Id, $restaurant_id);

$review_average = $review -> getReviewAverageByRestId($restaurant_id);

// Create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render("detail.html.twig", [
  "page_title" => "$restaurant_name - Restaurant Review Expert",
  "restaurant" => $detail,
  "site_name" => $site_name,
  
  // nav category pull down menu
  "categories" => $categories,

  // getReviews() and getReviewsById()
  "reviews" => $reviews,
  "reviewsById" => $reviewsById,
  "reviewsByIdDetail" => $reviewsByIdDetail,
   "review_average" => $review_average,

  // Session after login
  "user_email" => $user_email,
  "user_Id"=> $user_Id,
  "user_image" => $user_image,
  
  ] );
?>