<?php 
session_start();
require_once("connection.php");

date_default_timezone_set('Asia/Manila');

if(isset($_POST["submit"])){
    $email = escape_this_string($_POST["email"]);
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        //check email if exist
        $query = "SELECT * FROM emails WHERE email = '$email'";
        $run_query = fetch_record($query);
        if($run_query){
            
            echo "not an email";
            $_SESSION["error_message"] = "Email already exist";
            header("Location: index.php");
        }else {
            //not use for now;
            // $curr_date = date_create();
            // $format_date = date_format( $curr_date,"m/d/y h:i:s a");
            // echo $format_date;
            $query = "INSERT INTO emails(email,created_at) VALUES ('$email', now())";

            $run_query = run_mysql_query($query);
            if($run_query){
                
                // var_dump($run_query);
                echo $run_query;
                unset($_SESSION["error_message"]);
                $_SESSION["email"] = $email;
                header("Location: success.php");
                //success
            }
        }

       
    }else {
        echo "not an email";
        $_SESSION["error_message"] = "Email is not valid";
        header("Location: index.php");
    }





}


?>