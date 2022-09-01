<?php

namespace restaurantreview;

use restaurantreview\Database;
use Exception;

class Account extends Database
{
    private $dbconnection;

    public function __construct()
    {
        parent::__construct();
        $this->dbconnection = parent::getConnection();
    }

    public function create($firstName, $lastName, $userName, $email, $password, $bday, $gender, $image)
    {
        $errors = array();
        $response = array();
        // check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["user_email"] = "Invalid email address";
        }
        // check password length
        if (strlen($password) < 8) {
            $errors["user_password"] = "Password must be longer than 8 characters";
        }

        if (count($errors) == 0) {
            // create the account
            $query = "INSERT INTO user (first_name,last_name,user_name,user_email,user_password,birthday,gender,user_image,UpdatedDate) 
            VALUES( ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
            $statement = $this->dbconnection->prepare($query);
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $statement->bind_param("ssssssss", $firstName, $lastName, $userName, $email, $hashed, $bday, $gender, $image);
            // try to execute statement
            try {
                if (!$statement->execute()) {
                    throw new Exception("account cannot be created");
                } else {
                    $response["success"] = true;
                    $response["message"] = "Account has been created!";
                }
            } catch (Exception $exc) {
                $errors["system"] = $exc->getMessage();
                if ($this->dbconnection->errno == "1062") {
                    $errors["account"] = "The email address already exists";
                }
                $response["success"] = false;
                $response["message"] = "Account cannot be created";
                $response["errors"] = $errors;
            }
        } else {
            // return errors to user
            $response["success"] = false;
            $response["message"] = "Account cannot be created";
            $response["errors"] = $errors;
        }

        return $response;
    }

    public function login($email, $password)
    {
        $errors = array();
        $response = array();

        $query = "SELECT user_id, first_name, last_name, user_name, user_email, user_password, birthday, gender, user_image, UpdatedDate FROM user WHERE user_email = ?";

        $statement = $this->dbconnection->prepare($query);
        $statement->bind_param("s", $email);

        try {
            if (!$statement->execute()) {
                throw new Exception("Error executing query");
            } else {
                $result = $statement->get_result();
                if ($result->num_rows == 0) {
                    throw new Exception("Account does not exist");
                } else {
                    $account_data = $result->fetch_assoc();

                    // Check password ---------
                    if (password_verify($password, $account_data["user_password"])) {
                        $response["success"] = true;
                        $response["id"] = $account_data["user_id"];
                        $response["email"] = $account_data["user_email"];
                        $response["image"] = $account_data["user_image"];
                        $response["fName"] = $account_data["first_name"];
                        $response["lName"] = $account_data["last_name"];
                        $response["password"] = $account_data["user_password"];
                        $response["bday"] = $account_data["birthday"];
                        $response["gndr"] = $account_data["gender"];
                        $response["uName"] = $account_data["user_name"];

                        return $response;
                    } else {
                        throw new Exception("Password is incorrect");
                    }
                }
            }
        } catch (Exception $exc) {
            $errors["system"] = $exc->getMessage();
            $response["success"] = false;
            $response["errors"] = $errors;
            return $response;
        }
    }

    // Update account
    // public function updateAccount($user_image, $user_firstName, $user_lastName, $user_userName, $user_email, $user_pw, $user_bday, $user_gender, $user_Id)    
    public function updateAccount($user_image, $user_firstName, $user_lastName, $user_userName, $user_email, $user_pw, $user_bday, $user_gender, $user_Id)
    {

        $errors = array();
        $response = array();

        $hashed = password_hash($user_pw, PASSWORD_DEFAULT);

        // sql
        $query = "
        UPDATE user
            
            SET 
            user_image = '$user_image', 
            first_name = '$user_firstName',
            last_name = '$user_lastName',
            user_name = '$user_userName',
            user_email = '$user_email',
            user_password = '$hashed',
            birthday = '$user_bday',
            gender = '$user_gender'
                 
            WHERE user_id = ?
             ";

        // try to execute statement
        try {
            $statement = $this->dbconnection->prepare($query);

            $statement->bind_param("i", $user_Id);
            if (!$statement->execute()) {
                throw new Exception("Account cannot be update");
            } elseif (
                empty($user_image) || empty($user_firstName) || empty($user_lastName) || empty($user_userName) || empty($user_email) ||
                empty($user_bday) || empty($user_gender)
            ) {
                throw new Exception("Account cannot be update");

                return false;
            } elseif (empty($user_pw)) {
                throw new Exception("Type new password or input your old password ot continue");

                return false;
            } else {
                $response["success"] = true;
                $response["message"] = "Account has been updated!";
            }
        } catch (Exception $exc) {
            $errors["system"] = $exc->getMessage();
            $response["success"] = false;
            $response["message"] = "account cannot be updated";
            $response["errors"] = $errors;
        }
        return $response;
    }

    public function deleteAccount($user_id)
    {
        $errors = array();
        $response = array();

        $query = "
        DELETE from user where user_id = ?";

        try {
            $statement = $this->dbconnection->prepare($query);
            $statement->bind_param("i", $user_id);
            if (!$statement->execute()) {
                throw new Exception("Account cannot be update");
            } else {
                $response["success"] = true;
                $response["message"] = "Account has been updated!";
            }
        } catch (Exception $exc) {
            $errors["system"] = $exc->getMessage();
            $response["success"] = false;
            $response["message"] = "account cannot be updated";
            $response["errors"] = $errors;
        }
        return $response;
    }
}
