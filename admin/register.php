<?php

require_once "../config/database.php";

$errors = [];

$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = strtolower(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";


    // =========================
    // VALIDATE NAME
    // =========================

    if ($name === "") {

        $errors[] = "Please enter your name.";

    } elseif (strlen($name) < 2) {

        $errors[] = "Your name must contain at least 2 characters.";

    } elseif (strlen($name) > 100) {

        $errors[] = "Your name is too long.";
    }


    // =========================
    // VALIDATE EMAIL
    // =========================

    if ($email === "") {

        $errors[] = "Please enter your email address.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Please enter a valid email address.";
    }


    // =========================
    // VALIDATE PASSWORD
    // =========================

    if ($password === "") {

        $errors[] = "Please enter a password.";

    } elseif (strlen($password) < 8) {

        $errors[] = "Password must contain at least 8 characters.";
    }


    // =========================
    // CONFIRM PASSWORD
    // =========================

    if ($password !== $confirm_password) {

        $errors[] = "Passwords do not match.";
    }


    // =========================
    // CHECK EXISTING ADMIN
    // =========================

    if (empty($errors)) {

        try {

            $stmt = $pdo->prepare(
                "SELECT id
                 FROM admins
                 WHERE email = :email
                 LIMIT 1"
            );

            $stmt->execute([
                ":email" => $email
            ]);

            $existing_admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existing_admin) {

                $errors[] =
                    "An administrator account with this email already exists.";
            }

        } catch (PDOException $e) {

            error_log($e->getMessage());

            $errors[] =
                "Unable to check the database. Please try again.";
        }
    }


    // =========================
    // CREATE ADMIN ACCOUNT
    // =========================

    if (empty($errors)) {

        try {

            // Securely hash password
            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );


            // Insert administrator
            $stmt = $pdo->prepare(
                "INSERT INTO admins
                (
                    name,
                    email,
                    password
                )
                VALUES
                (
                    :name,
                    :email,
                    :password
                )"
            );


            $stmt->execute([
                ":name" => $name,
                ":email" => $email,
                ":password" => $hashed_password
            ]);


            // Redirect to admin login
            header("Location: login.php?registered=1");
            exit;


        } catch (PDOException $e) {

            error_log($e->getMessage());

            $errors[] =
                "Something went wrong while creating the administrator account.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Admin Registration | DevSolutions</title>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    min-height: 100vh;

    font-family: Arial, sans-serif;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 30px;

    background:
        linear-gradient(
            135deg,
            #eef4ff,
            #dbeafe,
            #f8fbff
        );
}


.register-container {

    width: 100%;

    max-width: 480px;

    background: white;

    padding: 40px;

    border-radius: 20px;

    box-shadow:
        0 20px 50px
        rgba(0, 0, 0, 0.12);
}


.logo {

    text-align: center;

    font-size: 30px;

    font-weight: bold;

    color: #2563eb;

    margin-bottom: 10px;
}


.subtitle {

    text-align: center;

    color: #64748b;

    margin-bottom: 30px;

    line-height: 1.5;
}


.form-group {

    margin-bottom: 20px;
}


.form-group label {

    display: block;

    margin-bottom: 8px;

    font-weight: 600;

    color: #334155;
}


.form-group input {

    width: 100%;

    padding: 14px;

    border: 1px solid #cbd5e1;

    border-radius: 10px;

    font-size: 15px;

    outline: none;

    transition: 0.2s;
}


.form-group input:focus {

    border-color: #2563eb;

    box-shadow:
        0 0 0 3px
        rgba(37, 99, 235, 0.1);
}


.register-btn {

    width: 100%;

    padding: 15px;

    border: none;

    border-radius: 30px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    color: white;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.2s;
}


.register-btn:hover {

    opacity: 0.9;

    transform: translateY(-1px);
}


.error-box {

    background: #fee2e2;

    color: #b91c1c;

    border: 1px solid #fecaca;

    padding: 15px;

    border-radius: 10px;

    margin-bottom: 20px;

    font-size: 14px;
}


.error-box ul {

    padding-left: 20px;
}


.error-box li {

    margin-bottom: 5px;
}


.login-link {

    text-align: center;

    margin-top: 25px;

    color: #64748b;

    font-size: 14px;
}


.login-link a {

    color: #2563eb;

    font-weight: bold;

    text-decoration: none;
}


.login-link a:hover {

    text-decoration: underline;
}


.back-home {

    display: block;

    text-align: center;

    margin-top: 20px;

    color: #64748b;

    text-decoration: none;

    font-size: 13px;
}


.back-home:hover {

    color: #2563eb;
}

</style>

</head>


<body>


<div class="register-container">


    <div class="logo">
        DevSolutions
    </div>


    <p class="subtitle">
        Create an administrator account
    </p>


    <?php if (!empty($errors)): ?>

        <div class="error-box">

            <ul>

                <?php foreach ($errors as $error): ?>

                    <li>
                        <?= htmlspecialchars($error) ?>
                    </li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>


    <form
        method="POST"
        action=""
    >


        <!-- NAME -->

        <div class="form-group">

            <label for="name">
                Full Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your full name"
                value="<?= htmlspecialchars($name) ?>"
                maxlength="100"
                required
            >

        </div>


        <!-- EMAIL -->

        <div class="form-group">

            <label for="email">
                Email Address
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                value="<?= htmlspecialchars($email) ?>"
                maxlength="150"
                required
            >

        </div>


        <!-- PASSWORD -->

        <div class="form-group">

            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Create a password"
                minlength="8"
                required
            >

        </div>


        <!-- CONFIRM PASSWORD -->

        <div class="form-group">

            <label for="confirm_password">
                Confirm Password
            </label>

            <input
                type="password"
                id="confirm_password"
                name="confirm_password"
                placeholder="Confirm your password"
                minlength="8"
                required
            >

        </div>


        <!-- BUTTON -->

        <button
            type="submit"
            class="register-btn"
        >
            Create Admin Account
        </button>


    </form>


    <!-- LOGIN -->

    <div class="login-link">

        Already have an administrator account?

        <a href="login.php">
            Login
        </a>

    </div>


    <!-- BACK TO WEBSITE -->

    <a
        href="../index.php"
        class="back-home"
    >
        ← Back to DevSolutions
    </a>


</div>


</body>

</html>