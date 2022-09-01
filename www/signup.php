<?php
// enable composer autoloading
require("vendor/autoload.php");

use restaurantreview\Session;

use restaurantreview\Search;
$search = new Search();
$categories = $search -> getCategories();

use restaurantreview\Account;
$account = new Account();

$result = null;
$user_firstName = null;
$user_lastName = null;
$user_userName = null;
$user_email = null;
$user_pw = null;
$user_bday = null;
$user_gender = null;
$user_formFile = null;

if( $_SERVER["REQUEST_METHOD"] == "POST") {
    $user_firstName = $_POST["firstName"];
    $user_lastName = $_POST["lastName"];
    $user_userName = $_POST["userName"];
    $user_email = $_POST["email"];
    $user_pw = $_POST["password"];
    $user_bday = $_POST["bday"];
    $user_gender = $_POST["gender"];

    // Declare the values for update a thumbnail ----------
    $file = $_FILES['formFile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Check the update a thumbnail or not ------
    if (!empty($fileName)) {
        // Find "." and separate into the array ---------
        $fileExt = explode('.', $fileName);
        // Find the last element in the array -> make it lower case ---------
        $fileActualExt = strtolower(end($fileExt));
        // make array to accept file type ---------
        $fileAllowed = array('jpg', 'jpeg', 'png');
        // Check the condition ---------
        if (in_array($fileActualExt, $fileAllowed)) {
            // Check the error ---------
            if ($fileError === 0) {
                // Change the file name as "fileName + . + Uniqid" ---------
                $fileNameNew = uniqid('', true).".".$fileName;

                // Where the file will into the folder ---------
                $fileDistination = 'user_images/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDistination);

                // Insert the data
                $result = $account -> create($user_firstName, $user_lastName,$user_userName, $user_email, $user_pw, $user_bday, $user_gender, $fileNameNew);
               
                header('Location: userdashboard.php');
            }
        }
    }
    else {
        $result = $account -> create($user_firstName, $user_lastName,$user_userName, $user_email, $user_pw, $user_bday, $user_gender, $fileName);
    }
}

// Set variable after successful log in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["email"];
    $user_pw = $_POST["password"];
    if (strlen($user_email) > 0 && strlen($user_pw) > 0) {
        $result = $account -> login($user_email, $user_pw);
        if ($result["success"] == true ){
            Session::set("user_email", $user_email);
            Session::set("user_id", $result["id"]);
            Session::set("user_image", $result["image"]);
            Session::set("user_firstName", $result["fName"]);
            Session::set("user_lastName", $result["lName"]);
            Session::set("user_pw", $result["password"]);
            Session::set("user_bday", $result["bday"]);
            Session::set("user_gender", $result["gndr"]);
            Session::set("user_userName", $result["uName"]);
            
            header('Location: userdashboard.php');     
        } else {                  
            $user_email = null;
            $user_id = null;
            $user_image = null;
            $user_firstName = null;
            $user_lastName = null;
            $user_pw = null;   
            $user_bday = null;   
            $user_gender = null;   
            $user_userName = null;         
        }
    }
}

$site_name = "Restaurant Review Expert";

// create twig environment
$loader = new \Twig\Loader\FilesystemLoader("templates");
$twig = new Twig\Environment( $loader, [ "cache" => false ] );

echo $twig -> render(

    "signup.html.twig", 
    [
        "page_title" => "User sign up",
        "site_name" => $site_name,
        "categories" => $categories, // nav category pull down menu
        "result" => $result,
        "user_firstName" => $user_firstName,
        "user_lastName" => $user_lastName,
        "user_userName" => $user_userName,
        "user_email" => $user_email,
        "user_pw" => $user_pw,
        "user_bday" => $user_bday,
        "user_gender" => $user_gender,
        "user_formFile" => $user_formFile,

        "result" => $result
    ]);
?>