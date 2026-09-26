<?php

require_once "config/database.php";

/*
|--------------------------------------------------------------------------
| Only accept POST requests
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Get form data
|--------------------------------------------------------------------------
*/

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$subject = trim($_POST["subject"] ?? "");
$message = trim($_POST["message"] ?? "");


/*
|--------------------------------------------------------------------------
| Validate required fields
|--------------------------------------------------------------------------
*/

if ($name === "" || $email === "" || $subject === "" || $message === "") {

    header("Location: index.php?error=empty#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Validate name length
|--------------------------------------------------------------------------
*/

if (strlen($name) < 2 || strlen($name) > 100) {

    header("Location: index.php?error=name#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Validate email
|--------------------------------------------------------------------------
*/

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    header("Location: index.php?error=email#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Validate subject length
|--------------------------------------------------------------------------
*/

if (strlen($subject) < 2 || strlen($subject) > 200) {

    header("Location: index.php?error=subject#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Validate message length
|--------------------------------------------------------------------------
*/

if (strlen($message) < 10) {

    header("Location: index.php?error=message#contact");
    exit;
}


/*
|--------------------------------------------------------------------------
| Save message to database
|--------------------------------------------------------------------------
*/

try {

    $sql = "
        INSERT INTO messages
        (
            name,
            email,
            subject,
            message
        )
        VALUES
        (
            :name,
            :email,
            :subject,
            :message
        )
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":name" => $name,
        ":email" => $email,
        ":subject" => $subject,
        ":message" => $message
    ]);


    /*
    |--------------------------------------------------------------------------
    | Redirect after successful submission
    |--------------------------------------------------------------------------
    */

    header("Location: index.php?success=1#contact");
    exit;


} catch (PDOException $e) {

    /*
    |--------------------------------------------------------------------------
    | Database error
    |--------------------------------------------------------------------------
    |
    | Don't display the actual database error to visitors.
    |
    */

    error_log($e->getMessage());

    header("Location: index.php?error=database#contact");
    exit;
}