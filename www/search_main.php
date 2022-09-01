<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Restaurant;
use restaurantreview\Session;
use restaurantreview\Search; 

// Instantiate Restaurant class
$restaurant = new Restaurant();
$items = $restaurant -> getItems();

// Instantiate Search class
$search = new Search();
$categories = $search -> getCategories();

$site_name = "Restaurant Review Expert";

// Session class
$user_email = Session::get("user_email");
$user_Id = Session::get("user_id");
$user_image = Session::get("user_image");

// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(
  "search_main.html.twig", [
    //Restaurant Class
    "restaurants" => $items,
    "site_name" => $site_name,
    
    // nav category pull down menu
    "categories" => $categories,
    
    // Session after login
    "user_email" => $user_email,
    "user_Id"=> $user_Id,
    "user_image" => $user_image
  ] );
?>