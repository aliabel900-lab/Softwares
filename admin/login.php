<?php

session_start();

require_once "../config/database.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = strtolower(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";

    // Validate fields
    if ($email === "" || $password === "") {

        $error = "Please enter your email and password.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email address.";

    } else {

        // Find admin by email
        $stmt = $pdo->prepare(
            "SELECT id, email, password
             FROM admins
             WHERE email = :email
             LIMIT 1"
        );

        $stmt->execute([
            ":email" => $email
        ]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($admin && password_verify($password, $admin["password"])) {

            // Prevent session fixation
            session_regenerate_id(true);

            // Store admin information in session
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_email"] = $admin["email"];

            // Send admin to dashboard
            header("Location: dashboard.php");
            exit;

        } else {

            $error = "Invalid email or password.";
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

    <title>Admin Login | DevSolutions</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {

            font-family: Arial, sans-serif;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #1e3a8a
                );

            padding: 20px;
        }

        .login-container {

            width: 100%;

            max-width: 420px;
        }

        .login-box {

            background: white;

            padding: 40px;

            border-radius: 15px;

            box-shadow:
                0 20px 50px
                rgba(0, 0, 0, 0.2);
        }

        .logo {

            text-align: center;

            margin-bottom: 30px;
        }

        .logo h1 {

            color: #1e3a8a;

            font-size: 28px;

            margin-bottom: 8px;
        }

        .logo p {

            color: #64748b;

            font-size: 14px;
        }

        .form-group {

            margin-bottom: 20px;
        }

        label {

            display: block;

            margin-bottom: 8px;

            font-weight: 600;

            color: #334155;
        }

        input {

            width: 100%;

            padding: 13px 15px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            font-size: 15px;

            outline: none;

            transition: 0.2s;
        }

        input:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.1);
        }

        .login-btn {

            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 8px;

            background: #2563eb;

            color: white;

            font-size: 16px;

            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }

        .login-btn:hover {

            background: #1d4ed8;

            transform: translateY(-1px);
        }

        .error {

            background: #fee2e2;

            color: #b91c1c;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 20px;

            text-align: center;

            font-size: 14px;
        }

        .signup-link {

            text-align: center;

            margin-top: 25px;

            color: #64748b;

            font-size: 14px;
        }

        .signup-link a {

            color: #2563eb;

            text-decoration: none;

            font-weight: 600;
        }

        .signup-link a:hover {

            text-decoration: underline;
        }

        .back-link {

            display: block;

            text-align: center;

            margin-top: 20px;

            color: #64748b;

            text-decoration: none;

            font-size: 14px;
        }

        .back-link:hover {

            color: #2563eb;

            text-decoration: underline;
        }

        @media (max-width: 500px) {

            .login-box {

                padding: 30px 22px;
            }

            .logo h1 {

                font-size: 24px;
            }
        }

    </style>

</head>

<body>

<div class="login-container">

    <div class="login-box">

        <div class="logo">

            <h1>
                Software Solutions
            </h1>

            <p>
                Administrator Login
            </p>

        </div>


        <?php if ($error): ?>

            <div class="error">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>


        <form
            method="POST"
            action=""
        >

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email address"
                    autocomplete="email"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-btn"
            >
                Login to Dashboard
            </button>

        </form>


        <div class="signup-link">

            Don't have an account?

            <a href="../register.php">
                Sign Up
            </a>

        </div>


        <a
            href="../index.php"
            class="back-link"
        >
            ← Back to website
        </a>

    </div>

</div>

</body>

</html>