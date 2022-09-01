<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Search;
use restaurantreview\Restaurant;
use restaurantreview\Review;
use restaurantreview\Session;

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


// Update
if( $_SERVER["REQUEST_METHOD"] == "POST" && $_GET["rId"] != NULL) {
  $review_id = $_POST['review_id'];
  // echo $user_id = $_POST['user_id'];
  $star = $_POST['star'];
  $title = $_POST['title'];
  $comment = $_POST['comment'];

  $review -> updateReview($comment, $star, $title, $review_id);
  echo "<script>
  alert('Review updated successfully!');
  window.location.href='review_edit.php';
  </script>";
}

$reviewsByIdDetail = $review -> getAllReviewsByUser ($user_Id, 'rest.restaurant_id');



// Create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "review_edit.html.twig", 
  [
    // Search Class
    "page_title" => "Restaurant Review Expert",
    "site_name" => $site_name,
    "user_email" => $user_email,
    //"restaurant" => $detail,
   
    // nav category pull down menu
    "categories" => $categories,

    // getReviewsById()
   "reviewsById" => $reviewsById,
   "reviewsByIdDetail" => $reviewsByIdDetail,
   //"AllreviewsById" => $allReviewsById,


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
        "AllreviewsById" => $AllreviewsById,
  ] );
?>