<?php
// enable composer autoloading
require("vendor/autoload.php");

//request classes from autoloader
use restaurantreview\Restaurant;

$restaurant = new Restaurant();
$items = $restaurant -> getItems();

$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render("home.html.twig", ["page_title" => "RestaurantReview", "greeting" => "Welcome to our restaurant review website", "restaurant" => $items ] );
// test
?>
