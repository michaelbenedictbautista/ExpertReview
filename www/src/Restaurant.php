<?php
namespace restaurantreview;

use restaurantreview\Database;
use Exception;

class Restaurant extends Database {

    private $dbconnection;

    // To access restaurant database
    public function __construct()
    {
        // call the contruct method from the parent class which is the Database class.
        parent::__construct();

        // store in dbconnection variable 
        $this -> dbconnection =  parent::getConnection();
    }

    // Query commands execution
    public function getItems() {
        $query = "
        SELECT   
            restaurant_id AS id,
            restaurant_address,
            restaurant_phone,
            restaurant_web,
            restaurant_menu,
            restaurant_hours_mon,
            restaurant_hours_tue,
            restaurant_hours_wed,
            restaurant_hours_thu,
            restaurant_hours_fri,
            restaurant_hours_sat,
            restaurant_hours_sun, 
            restaurant_image AS picture,
            restaurant_name,
            restaurant_details,
            cat_name AS category
            FROM restaurant
            INNER JOIN restaurant_category
            ON restaurant.cat_id = restaurant_category.cat_id
            ";

            try 
            {
                $statement = $this -> dbconnection -> prepare( $query );
                if( !$statement ) 
                {
                    throw new Exception("Error found during query analysis. Try again.");
                }

                if (!$statement -> execute())
                {
                    throw new Exception ("Execution of query failed. Try again.");
                }
                else
                {
                    $restaurants = array();
                    $items =  array();
                    $result = $statement -> get_result();
                    while($row = $result ->fetch_assoc())
                    {
                        array_push ($items, $row);
                    }
                    $restaurants["total"] =  count($items);
                    $restaurants["items"] =  $items;
                    //$restaurants["review_rest_id"] = ["id"];

                    return $restaurants;
                    }
                    return null;
            }  
            catch (Exception $exception)
            {
                echo $exception -> getMessage();
            }
    }

    // getDetail() Query commands execution
    public function getDetail($restaurant_id)
    {
        $query = "
        SELECT 
            rest.restaurant_id,
            rest.restaurant_address,
            rest.restaurant_phone,
            rest.restaurant_web,
            rest.restaurant_menu,
            rest.restaurant_hours_mon, 
            rest.restaurant_hours_tue,
            rest.restaurant_hours_wed,
            rest.restaurant_hours_thu,
            rest.restaurant_hours_fri,
            rest.restaurant_hours_sat,
            rest.restaurant_hours_sun, 
            rest.restaurant_image, 
            rest.restaurant_name,
            rest.restaurant_details,
            cat.cat_id,
            cat.cat_name
            

            FROM restaurant AS rest
            INNER JOIN restaurant_category AS cat
            ON rest.cat_id = cat.cat_id
            WHERE rest.restaurant_id = ?
            ";

            try {
                $statement =  $this -> dbconnection -> prepare ($query);
                if (!$statement) {
                    throw new Exception ("Error found during query analysis. Try again.");
            
                }
                
                $statement -> bind_param("i", $restaurant_id);
                if (!$statement -> execute()) {
                    throw new Exception("Execution of query failed. Try again.");

                } else {
                    $result = $statement -> get_result();
                    $detail = $result -> fetch_assoc();
                    return $detail;
                }
            }
            catch (Exception $exception) {
                echo $exception -> getMessage();
                return false;
            }
    }
}
?>