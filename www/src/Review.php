<?php

namespace restaurantreview;

use restaurantreview\Database;
use Exception;

class Review extends Database
{

    private $dbconnection;

    // To access restaurant database
    public function __construct()
    {
        // call the contruct method from the parent class which is the Database class.
        parent::__construct();

        // store in dbconnection variable 
        $this->dbconnection =  parent::getConnection();
    }

    public function addReview($user_id, $review_comment, $restaurant_id, $review_star, $review_title)
    {
        if (empty($user_id) || empty($review_comment) || empty($restaurant_id) || empty($review_star) || empty($review_title)) {
            return false;
        }
        // if none is empty
        $query = "
        INSERT INTO user_post ( user_id, review_comment, review_date, restaurant_id, review_star, review_title )
        VALUES ( ?, ?, NOW(), ?, ?, ? )
        ";
        // pass query to database through database connection
        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("query error");
            }
            $statement->bind_param("isiis", $user_id, $review_comment, $restaurant_id, $review_star, $review_title);
            if (!$statement->execute()) {
                throw new Exception("execute error");
            } else {
                return true;
            }
        } catch (Exception $exc) {
            error_log($exc->getMessage());
        }
    }

    // Display restaurant reviews without user account
    // Available at Deatil page of a restaurant
    public function getReviews($restaurant_id)
    {
        $query = "
        SELECT   
            rest.restaurant_id,
            user.first_name, 
            user.last_name,
            user.user_id,
            user.user_image,
            user_post.review_comment,
            user_post.review_date,
            user_post.review_title,
            user_post.restaurant_id,
            user_post.review_star

            FROM restaurant AS rest          
            INNER JOIN user_post
            ON rest.restaurant_id = user_post.restaurant_id
            INNER JOIN user
            ON user_post.user_id = user.user_id
            WHERE rest.restaurant_id = $restaurant_id     
            ";

        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("Error found during query analysis. Try again.");
            }

            if (!$statement->execute()) {
                throw new Exception("Execution of query failed. Try again.");
            } else {
                $reviews = array();
                $items =  array();
                $result = $statement->get_result();
                while ($row = $result->fetch_assoc()) {
                    array_push($items, $row);
                }
                $reviews["total"] =  count($items);
                $reviews["items"] =  $items;
                // $reviews["review_rest_id"] = $items['restaurant_id'];

                return $reviews;
            }
            return null;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    // Display restaurant reviews with user account
    public function getReviewsByUserId($restaurant_id)
    {
        $query = "
        SELECT   
            rest.restaurant_id,
            rest.restaurant_name,
            rest.restaurant_image,
            user.first_name, 
            user.last_name,
            user.user_image,
            user_post.review_comment,
            user_post.user_id,
            user_post.review_date,
            user_post.review_title,
            user_post.review_star,
            user_post.restaurant_id
        
            FROM restaurant AS rest          
            INNER JOIN user_post
            ON rest.restaurant_id = user_post.restaurant_id
            INNER JOIN user
            ON user_post.user_id = user.user_id
            WHERE rest.restaurant_id = ?
            ";

        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("Error found during query analysis. Try again.");
            }

            $statement->bind_param("i", $restaurant_id);
            if (!$statement->execute()) {
                throw new Exception("Execution of query failed. Try again.");
            } else {
                $result = $statement->get_result();
                $detail = $result->fetch_assoc();
                return $detail;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    // Display restaurant reviews with user account
    public function getReviewsByUserIdDetail($user_id, $restaurant_id)
    {
        $query = "
        SELECT   
            rest.restaurant_id,
            rest.restaurant_name,
            rest.restaurant_image,
            user.first_name, 
            user.last_name,
            user.user_image,
            user_post.review_id,
            user_post.review_comment,
            user_post.user_id,
            user_post.review_date,
            user_post.review_title,
            user_post.review_star,
            user_post.restaurant_id
        
            FROM restaurant AS rest          
            INNER JOIN user_post
            ON rest.restaurant_id = user_post.restaurant_id
            INNER JOIN user
            ON user_post.user_id = user.user_id
            WHERE user_post.user_id = ?
            AND user_post.restaurant_id = ?
            ";

        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("Error found during query analysis. Try again.");
            }

            $statement->bind_param("ii", $user_id, $restaurant_id);
            if (!$statement->execute()) {
                throw new Exception("Execution of query failed. Try again.");
            } else {
                $result = $statement->get_result();
                $detail = $result->fetch_assoc();
                return $detail;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    // Display all reviews of user of different restaurants
    // available in userdashboard.php(Link on "Your reviews")
    public function getAllReviewsByUser($user_id)
    {

        $query = "
        SELECT   
            rest.restaurant_id,
            rest.restaurant_name,
            rest.restaurant_image,
            user_post.user_id,
            user.first_name, 
            user.last_name,
            user.user_image,
            user_post.review_id,
            user_post.review_comment,
            user_post.review_date,
            user_post.review_title,
            user_post.review_star,
            user_post.restaurant_id
        
            FROM user_post        
            INNER JOIN restaurant as rest
            ON rest.restaurant_id = user_post.restaurant_id
            INNER JOIN user
            ON user_post.user_id = user.user_id
            WHERE user_post.user_id = $user_id
            ";

        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("Error found during query analysis. Try again.");
            }

            if (!$statement->execute()) {
                throw new Exception("Execution of query failed. Try again.");
            } else {
                $reviews = array();
                $itemsReviews =  array();
                $result = $statement->get_result();
                while ($row = $result->fetch_assoc()) {
                    array_push($itemsReviews, $row);
                }
                $reviews["total"] =  count($itemsReviews);
                $reviews["items"] =  $itemsReviews;

                return $reviews;
            }
            return null;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function getReviewDetailsByReviewId($review_id)
    {

        $errors = array();
        $response = array();

        $query = "
        SELECT 
            review_id, 
            user_id, 
            review_comment, 
            review_date, 
            restaurant_id, 
            review_star, 
            review_title 
            
            FROM user_post 
            WHERE review_id = ?
            ";

        $statement = $this->dbconnection->prepare($query);

        try {
            $statement->bind_param("i", $review_id);
            if (!$statement->execute()) {
                throw new Exception("Error executing query");
            } else {
                $result = $statement->get_result();
                if ($result->num_rows == 0) {
                    throw new Exception("Review does not exist");
                } else {
                    $review_data = $result->fetch_assoc();
                    $response["success"] = true;
                    $response["review_id"] = $review_data["review_id"];
                    $response["user_id"] = $review_data["user_id"];
                    $response["review_comment"] = $review_data["review_comment"];
                    $response["review_date"] = $review_data["review_date"];
                    $response["restaurant_id"] = $review_data["restaurant_id"];
                    $response["review_star"] = $review_data["review_star"];
                    $response["review_title"] = $review_data["review_title"];

                    return $response;
                }
            }
        } catch (Exception $exc) {
            $errors["system"] = $exc->getMessage();
            $response["success"] = false;
            $response["errors"] = $errors;
            return $response;
        }
    }

    // Update review
    public function updateReview($comment, $star, $title, $review_id)
    {

        $errors = array();
        $response = array();

        if (empty($comment) || empty($star) || empty($title) || empty($review_id)) {
            return false;
        }

        // sql
        $query = "
        UPDATE
            user_post

            SET 
            review_comment='$comment', 
            review_date=now(), 
            review_star=$star, 
            review_title='$title' 
            
            WHERE review_id = $review_id";

        // try to execute statement
        try {

            //$statement -> bind_param("sisi", $comment, $star, $title, $review_id);
            $statement = $this->dbconnection->prepare($query);
            if (!$statement->execute()) {
                throw new Exception("review cannot be update");
            } else {
                $response["success"] = true;
                $response["message"] = "review has been updated!";
            }
        } catch (Exception $exc) {
            $errors["system"] = $exc->getMessage();
            $response["success"] = false;
            $response["message"] = "review cannot be updated";
            $response["errors"] = $errors;
        }

        return $response;
    }

    // Average review star for each restaurant
    public function getReviewAverageByRestId($restaurant_id)
    {
        $query = "
        SELECT restaurant_id,
            AVG(review_star) as Review
            FROM
            user_post
            WHERE restaurant_id = ?
            GROUP BY restaurant_id;
            ";

        try {
            $statement = $this->dbconnection->prepare($query);
            if (!$statement) {
                throw new Exception("Error found during query analysis. Try again.");
            }

            $statement->bind_param("i", $restaurant_id);
            if (!$statement->execute()) {
                throw new Exception("Execution of query failed. Try again.");
            } else {
                $result = $statement->get_result();
                $detail = $result->fetch_assoc();
                $detail["restaurant_id"] = $detail["restaurant_id"];

                // $response["id"] = $account_data["user_id"];
                // $restaurants["review_rest_id"] = ["id"];

                return $detail;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
?>