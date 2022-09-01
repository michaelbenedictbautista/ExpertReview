<?php
namespace restaurantreview;

use restaurantreview\Database;
use Exception;

class Search extends Database {
  private $dbconnection;
  
  public function __construct()
  {
    parent::__construct();
    $this -> dbconnection = parent::getConnection();
  }
  
  public function lookUp( $term ) {
    $query = "
    SELECT restaurant_name, restaurant_image, restaurant_details, restaurant_id
    FROM restaurant 
    WHERE restaurant_name LIKE ?";
    $statement = $this -> dbconnection -> prepare( $query );
    $search_term = "%$term%";
    $statement -> bind_param("s", $search_term );
    try {
      if( !$statement -> execute() ) {
        throw new Exception("Error found during query analysis. Try again.");
      }
      else {
        $search_result = array();
        $result = $statement -> get_result();
        while( $row = $result -> fetch_assoc() ) {
          array_push( $search_result, $row );
        }
        return $search_result;
      }
    }
    catch( Exception $exception) {
      echo $exception -> getMessage();
    }
  }

  // Get categories ---------
  public function getCategories() {

    $query = "SELECT cat_id, cat_name FROM restaurant_category";

    try 
    {
    $statement = $this -> dbconnection -> prepare( $query );
      if( !$statement ){
          throw new Exception("Error found during query analysis. Try again.");
      }

      if (!$statement -> execute()){
          throw new Exception ("Execution of query failed. Try again.");
      } 
      else {
        $categories = array();
        $items =  array();
        $result = $statement -> get_result();
        
        while($row = $result ->fetch_assoc()) {
            array_push ($items, $row);
        }
        $categories["total"] =  count($items);
        $categories["items"] =  $items;
        
        return $categories;
      }
      return null;
    }
    catch (Exception $exception)
    {
        echo $exception -> getMessage();
    }
  }

  // Display restaurant refer to category --------------------
  public function lookUpByCategory( $term ) {
    $query = "
    SELECT restaurant_id, restaurant_name, restaurant_image, restaurant_details, cat_id
    FROM restaurant
    WHERE cat_id = ?";
    $statement = $this -> dbconnection -> prepare( $query );
    $statement -> bind_param("s", $term );
    try {
      if( !$statement -> execute() ) {
        throw new Exception("Error found during query analysis. Try again.");
      }
      else {
        $search_result = array();
        $result = $statement -> get_result();
        while( $row = $result -> fetch_assoc() ) {
          array_push( $search_result, $row );
        }
        return $search_result;
      }
    }
    catch( Exception $exception) {
      echo $exception -> getMessage();
    }
  }
}
?>