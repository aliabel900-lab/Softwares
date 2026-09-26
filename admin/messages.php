<?php

session_start();

require_once "../config/database.php";

/*
|--------------------------------------------------------------------------
| Check Admin Login
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| Delete Message
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_message"])) {

    $id = (int)($_POST["message_id"] ?? 0);

    if ($id > 0) {

        try {

            $stmt = $pdo->prepare(
                "DELETE FROM messages WHERE id = :id"
            );

            $stmt->execute([
                ":id" => $id
            ]);

        } catch (PDOException $e) {

            error_log($e->getMessage());
        }
    }

    header("Location: messages.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| Get Messages
|--------------------------------------------------------------------------
*/

$stmt = $pdo->query(
    "SELECT
        id,
        name,
        email,
        subject,
        message,
        created_at
     FROM messages
     ORDER BY created_at DESC"
);

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);


/*
|--------------------------------------------------------------------------
| Message Count
|--------------------------------------------------------------------------
*/

$messageCount = count($messages);


/*
|--------------------------------------------------------------------------
| Admin Name
|--------------------------------------------------------------------------
*/

$adminName = $_SESSION["admin_name"] ?? "Administrator";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Messages | DevSolutions Admin</title>


<!-- Font Awesome -->

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>


<style>

/* =========================================================
   RESET
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    font-family:
        Inter,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Arial,
        sans-serif;

    background: #f8fafc;

    color: #0f172a;

    min-height: 100vh;
}


/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {

    position: fixed;

    left: 0;
    top: 0;

    width: 260px;

    height: 100vh;

    background:
        linear-gradient(
            180deg,
            #0f172a,
            #111827
        );

    padding: 25px 16px;

    z-index: 1000;
}


/* Logo */

.logo {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 0 14px;

    margin-bottom: 35px;
}


.logo-icon {

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    color: white;

    font-size: 18px;
}


.logo-text {

    color: white;

    font-size: 21px;

    font-weight: 700;
}


/* Navigation */

.nav-title {

    color: #64748b;

    font-size: 11px;

    text-transform: uppercase;

    letter-spacing: 1px;

    padding: 0 14px;

    margin-bottom: 10px;
}


.sidebar a {

    display: flex;

    align-items: center;

    gap: 13px;

    color: #cbd5e1;

    text-decoration: none;

    padding: 13px 14px;

    margin-bottom: 5px;

    border-radius: 10px;

    font-size: 14px;

    transition: 0.2s;
}


.sidebar a i {

    width: 20px;

    text-align: center;

    font-size: 15px;
}


.sidebar a:hover {

    background: #1e293b;

    color: white;
}


.sidebar a.active {

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

    color: white;

    box-shadow:
        0 5px 15px
        rgba(37, 99, 235, 0.25);
}


.sidebar-bottom {

    position: absolute;

    left: 16px;
    right: 16px;

    bottom: 20px;
}


.sidebar .logout {

    color: #fca5a5;

    background: rgba(220, 38, 38, 0.08);
}


.sidebar .logout:hover {

    background: #dc2626;

    color: white;
}


/* =========================================================
   MAIN
========================================================= */

.main {

    margin-left: 260px;

    padding: 35px 40px;

    min-height: 100vh;
}


/* =========================================================
   TOP BAR
========================================================= */

.topbar {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 30px;
}


.page-title h1 {

    font-size: 30px;

    font-weight: 700;

    letter-spacing: -0.5px;

    margin-bottom: 6px;
}


.page-title p {

    color: #64748b;

    font-size: 14px;
}


/* Admin profile */

.admin-profile {

    display: flex;

    align-items: center;

    gap: 12px;

    background: white;

    padding: 8px 14px 8px 8px;

    border-radius: 50px;

    border: 1px solid #e2e8f0;
}


.admin-avatar {

    width: 38px;
    height: 38px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    color: white;

    display: flex;

    align-items: center;
    justify-content: center;

    font-weight: bold;
}


.admin-info {

    font-size: 13px;
}


.admin-info small {

    display: block;

    color: #64748b;

    font-size: 11px;

    margin-bottom: 2px;
}


/* =========================================================
   STATS
========================================================= */

.stats {

    display: grid;

    grid-template-columns:
        repeat(auto-fit, minmax(200px, 1fr));

    gap: 20px;

    margin-bottom: 30px;
}


.stat-card {

    background: white;

    border: 1px solid #e2e8f0;

    border-radius: 15px;

    padding: 22px;

    display: flex;

    align-items: center;

    gap: 16px;

    box-shadow:
        0 4px 15px
        rgba(15, 23, 42, 0.04);
}


.stat-icon {

    width: 50px;
    height: 50px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: #eff6ff;

    color: #2563eb;

    font-size: 20px;
}


.stat-info span {

    display: block;

    color: #64748b;

    font-size: 13px;

    margin-bottom: 4px;
}


.stat-info strong {

    font-size: 25px;
}


/* =========================================================
   CONTENT CARD
========================================================= */

.content-card {

    background: white;

    border: 1px solid #e2e8f0;

    border-radius: 16px;

    box-shadow:
        0 4px 20px
        rgba(15, 23, 42, 0.04);

    overflow: hidden;
}


.content-header {

    padding: 22px 25px;

    border-bottom: 1px solid #e2e8f0;

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 20px;
}


.content-header h2 {

    font-size: 18px;
}


.content-header p {

    color: #64748b;

    font-size: 13px;

    margin-top: 4px;
}


/* Search */

.search-box {

    position: relative;

    width: 280px;
}


.search-box i {

    position: absolute;

    left: 13px;

    top: 50%;

    transform: translateY(-50%);

    color: #94a3b8;
}


.search-box input {

    width: 100%;

    padding: 11px 12px 11px 38px;

    border: 1px solid #cbd5e1;

    border-radius: 9px;

    outline: none;

    font-size: 13px;
}


.search-box input:focus {

    border-color: #2563eb;

    box-shadow:
        0 0 0 3px
        rgba(37, 99, 235, 0.1);
}


/* =========================================================
   MESSAGE GRID
========================================================= */

.message-grid {

    display: grid;

    grid-template-columns:
        repeat(auto-fit, minmax(330px, 1fr));

    gap: 20px;

    padding: 25px;
}


/* =========================================================
   MESSAGE CARD
========================================================= */

.message-card {

    border: 1px solid #e2e8f0;

    border-radius: 14px;

    padding: 20px;

    transition:
        transform 0.2s,
        box-shadow 0.2s,
        border-color 0.2s;

    background: #ffffff;
}


.message-card:hover {

    transform: translateY(-3px);

    border-color: #bfdbfe;

    box-shadow:
        0 12px 30px
        rgba(15, 23, 42, 0.08);
}


/* Header */

.message-header {

    display: flex;

    justify-content: space-between;

    align-items: flex-start;

    gap: 15px;

    margin-bottom: 15px;
}


.sender {

    display: flex;

    align-items: center;

    gap: 11px;
}


.sender-avatar {

    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: #eff6ff;

    color: #2563eb;

    display: flex;

    align-items: center;
    justify-content: center;

    font-weight: bold;

    text-transform: uppercase;
}


.sender h3 {

    font-size: 16px;

    margin-bottom: 3px;
}


.sender .email {

    color: #64748b;

    font-size: 12px;
}


/* Date */

.date {

    color: #94a3b8;

    font-size: 11px;

    white-space: nowrap;
}


/* Subject */

.subject {

    background: #f8fafc;

    border-left: 3px solid #2563eb;

    padding: 10px 12px;

    border-radius: 5px;

    margin: 15px 0;

    font-size: 14px;

    font-weight: 600;

    color: #334155;
}


/* Message */

.message-text {

    color: #475569;

    line-height: 1.7;

    font-size: 14px;

    margin-bottom: 20px;

    white-space: pre-wrap;

    word-break: break-word;
}


/* Card footer */

.card-footer {

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding-top: 15px;

    border-top: 1px solid #f1f5f9;
}


.reply-btn {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 9px 13px;

    border-radius: 7px;

    background: #eff6ff;

    color: #2563eb;

    text-decoration: none;

    font-size: 12px;

    font-weight: 600;

    transition: 0.2s;
}


.reply-btn:hover {

    background: #dbeafe;
}


.delete-btn {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 9px 13px;

    border: none;

    border-radius: 7px;

    background: #fef2f2;

    color: #dc2626;

    font-size: 12px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}


.delete-btn:hover {

    background: #fee2e2;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty {

    padding: 70px 30px;

    text-align: center;
}


.empty-icon {

    width: 70px;
    height: 70px;

    margin: 0 auto 20px;

    border-radius: 50%;

    background: #eff6ff;

    color: #2563eb;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 28px;
}


.empty h3 {

    font-size: 20px;

    margin-bottom: 8px;
}


.empty p {

    color: #64748b;

    font-size: 14px;
}


/* =========================================================
   MOBILE MENU BUTTON
========================================================= */

.mobile-menu {

    display: none;

    width: 42px;
    height: 42px;

    border: 1px solid #e2e8f0;

    background: white;

    border-radius: 9px;

    cursor: pointer;

    font-size: 18px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .sidebar {

        transform: translateX(-100%);

        transition: 0.3s;
    }


    .sidebar.open {

        transform: translateX(0);
    }


    .main {

        margin-left: 0;

        padding: 25px;
    }


    .mobile-menu {

        display: block;
    }


    .topbar {

        gap: 15px;
    }


    .search-box {

        width: 220px;
    }

}


@media (max-width: 650px) {

    .main {

        padding: 18px;
    }


    .topbar {

        align-items: flex-start;
    }


    .admin-profile {

        display: none;
    }


    .page-title h1 {

        font-size: 25px;
    }


    .content-header {

        display: block;
    }


    .search-box {

        width: 100%;

        margin-top: 15px;
    }


    .message-grid {

        grid-template-columns: 1fr;

        padding: 15px;
    }


    .stats {

        grid-template-columns: 1fr;
    }

}

</style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar" id="sidebar">


    <div class="logo">

        <div class="logo-icon">

            <i class="fas fa-code"></i>

        </div>

        <div class="logo-text">
            Software solutions
        </div>

    </div>


    <div class="nav-title">
        Main Menu
    </div>


    <a href="dashboard.php">

        <i class="fas fa-chart-line"></i>

        <span>Dashboard</span>

    </a>


    <a href="messages.php" class="active">

        <i class="fas fa-envelope"></i>

        <span>Messages</span>

    </a>


    <a href="projects.php">

        <i class="fas fa-folder-open"></i>

        <span>Projects</span>

    </a>


    <a href="services.php">

        <i class="fas fa-layer-group"></i>

        <span>Services</span>

    </a>


    <div class="nav-title" style="margin-top: 25px;">
        Website
    </div>


    <a href="../index.php" target="_blank">

        <i class="fas fa-globe"></i>

        <span>View Website</span>

    </a>


    <div class="sidebar-bottom">

        <a href="logout.php" class="logout">

            <i class="fas fa-right-from-bracket"></i>

            <span>Logout</span>

        </a>

    </div>


</aside>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <!-- TOP BAR -->

    <div class="topbar">


        <div style="display:flex; align-items:center; gap:15px;">

            <button
                class="mobile-menu"
                onclick="toggleSidebar()"
            >

                <i class="fas fa-bars"></i>

            </button>


            <div class="page-title">

                <h1>
                    Messages
                </h1>

                <p>
                    Manage customer enquiries and messages.
                </p>

            </div>

        </div>


        <div class="admin-profile">

            <div class="admin-avatar">

                <?= strtoupper(
                    substr($adminName, 0, 1)
                ) ?>

            </div>


            <div class="admin-info">

                <small>
                    Logged in as
                </small>

                <strong>
                    <?= htmlspecialchars($adminName) ?>
                </strong>

            </div>

        </div>


    </div>


    <!-- =================================================
         STAT
    ================================================= -->

    <div class="stats">


        <div class="stat-card">

            <div class="stat-icon">

                <i class="fas fa-envelope"></i>

            </div>


            <div class="stat-info">

                <span>
                    Total Messages
                </span>

                <strong>
                    <?= $messageCount ?>
                </strong>

            </div>

        </div>


    </div>


    <!-- =================================================
         MESSAGES
    ================================================= -->

    <div class="content-card">


        <div class="content-header">


            <div>

                <h2>
                    Customer Messages
                </h2>

                <p>
                    Messages submitted through your contact form.
                </p>

            </div>


            <div class="search-box">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search messages..."
                    onkeyup="searchMessages()"
                >

            </div>


        </div>


        <?php if (empty($messages)): ?>


            <!-- EMPTY -->

            <div class="empty">

                <div class="empty-icon">

                    <i class="fas fa-envelope-open"></i>

                </div>


                <h3>
                    No messages yet
                </h3>


                <p>
                    Customer enquiries submitted through
                    your website will appear here.
                </p>

            </div>


        <?php else: ?>


            <div class="message-grid" id="messageGrid">


                <?php foreach ($messages as $msg): ?>


                    <?php

                    $initial = strtoupper(
                        substr(
                            trim($msg["name"]),
                            0,
                            1
                        )
                    );

                    $formattedDate = date(
                        "M d, Y • h:i A",
                        strtotime($msg["created_at"])
                    );

                    ?>


                    <article
                        class="message-card"
                        data-search="
                            <?= htmlspecialchars(
                                strtolower(
                                    $msg["name"] . " " .
                                    $msg["email"] . " " .
                                    $msg["subject"] . " " .
                                    $msg["message"]
                                )
                            ) ?>
                        "
                    >


                        <!-- MESSAGE HEADER -->

                        <div class="message-header">


                            <div class="sender">


                                <div class="sender-avatar">

                                    <?= htmlspecialchars($initial) ?>

                                </div>


                                <div>

                                    <h3>

                                        <?= htmlspecialchars(
                                            $msg["name"]
                                        ) ?>

                                    </h3>


                                    <div class="email">

                                        <?= htmlspecialchars(
                                            $msg["email"]
                                        ) ?>

                                    </div>

                                </div>


                            </div>


                            <span class="date">

                                <?= htmlspecialchars(
                                    $formattedDate
                                ) ?>

                            </span>


                        </div>


                        <!-- SUBJECT -->

                        <div class="subject">

                            <i
                                class="fas fa-tag"
                                style="margin-right:6px;"
                            ></i>

                            <?= htmlspecialchars(
                                $msg["subject"]
                            ) ?>

                        </div>


                        <!-- MESSAGE -->

                        <div class="message-text">

                            <?= nl2br(
                                htmlspecialchars(
                                    $msg["message"]
                                )
                            ) ?>

                        </div>


                        <!-- FOOTER -->

                        <div class="card-footer">


                            <a
                                href="mailto:<?= htmlspecialchars(
                                    $msg["email"]
                                ) ?>"
                                class="reply-btn"
                            >

                                <i class="fas fa-reply"></i>

                                Reply

                            </a>


                            <form
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to permanently delete this message?');"
                            >

                                <input
                                    type="hidden"
                                    name="message_id"
                                    value="<?= (int)$msg["id"] ?>"
                                >


                                <button
                                    type="submit"
                                    name="delete_message"
                                    class="delete-btn"
                                >

                                    <i class="fas fa-trash"></i>

                                    Delete

                                </button>

                            </form>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        <?php endif; ?>


    </div>


</main>


<script>

/*
|--------------------------------------------------------------------------
| Sidebar
|--------------------------------------------------------------------------
*/

function toggleSidebar() {

    document
        .getElementById("sidebar")
        .classList
        .toggle("open");
}


/*
|--------------------------------------------------------------------------
| Search Messages
|--------------------------------------------------------------------------
*/

function searchMessages() {

    const input =
        document
        .getElementById("searchInput")
        .value
        .toLowerCase()
        .trim();


    const cards =
        document
        .querySelectorAll(".message-card");


    cards.forEach(function(card) {

        const text =
            card
            .getAttribute("data-search")
            .toLowerCase();


        if (text.includes(input)) {

            card.style.display = "";

        } else {

            card.style.display = "none";
        }

    });

}

</script>


</body>

</html>