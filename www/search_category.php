<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Search;
use restaurantreview\Restaurant;
use restaurantreview\Session;

// Instantiate Search class
$search = new Search();
$categories = $search -> getCategories();

$cat_id = $_GET['cat'];
$search_result = $search -> lookUpByCategory( $cat_id );

//print_r( $search_result );
$site_name = "Restaurant Review";
$count = count( $search_result );

// Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");

// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "search_category.html.twig", 
  [
    // Search Class
    // "page_title" => "Search result for $cateName",  
    "result" => $search_result,
    "site_name" => $site_name,
    "total" => $count,

    // nav category pull down menu
    "categories" => $categories,

    // Session after login
    "user_email" => $user_email,
    "user_Id"=> $user_Id,
    "user_image" => $user_image
  ] );
?>