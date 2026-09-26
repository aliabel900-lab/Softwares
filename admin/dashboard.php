<?php

session_start();

require_once "../config/database.php";

// =====================================
// PROTECT ADMIN DASHBOARD
// =====================================

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}


// =====================================
// GET LOGGED-IN ADMIN
// =====================================

$admin_id = (int) $_SESSION["admin_id"];

$stmt = $pdo->prepare("
    SELECT id, name, email
    FROM admins
    WHERE id = :id
    LIMIT 1
");

$stmt->execute([
    ":id" => $admin_id
]);

$admin = $stmt->fetch(PDO::FETCH_ASSOC);


// If admin account no longer exists
if (!$admin) {

    session_destroy();

    header("Location: login.php");
    exit;
}


$admin_name = $admin["name"];
$admin_email = $admin["email"];


// =====================================
// STATISTICS
// =====================================

// Messages
$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM messages
");

$message_count = (int) $stmt->fetchColumn();


// Projects
$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM projects
");

$project_count = (int) $stmt->fetchColumn();


// Administrators
$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM admins
");

$admin_count = (int) $stmt->fetchColumn();


// =====================================
// RECENT MESSAGES
// =====================================

$stmt = $pdo->query("
    SELECT
        id,
        name,
        email,
        subject,
        message,
        created_at
    FROM messages
    ORDER BY created_at DESC
    LIMIT 5
");

$recent_messages = $stmt->fetchAll(PDO::FETCH_ASSOC);


// =====================================
// CURRENT DATE
// =====================================

$current_date = date("l, F j, Y");


// =====================================
// INITIALS
// =====================================

$name_parts = explode(" ", trim($admin_name));

$initials = "";

foreach ($name_parts as $part) {

    if ($part !== "") {
        $initials .= strtoupper(substr($part, 0, 1));
    }

    if (strlen($initials) >= 2) {
        break;
    }
}

if ($initials === "") {
    $initials = "A";
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

<title>Dashboard | software and solutions</title>


<style>

/* =====================================
   RESET
===================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


:root {

    --primary: #2563eb;
    --primary-dark: #1d4ed8;

    --dark: #0f172a;
    --dark-2: #1e293b;

    --text: #0f172a;
    --muted: #64748b;

    --border: #e2e8f0;

    --background: #f8fafc;

    --white: #ffffff;

    --success: #16a34a;
    --danger: #dc2626;

}


/* =====================================
   BODY
===================================== */

body {

    font-family:
        Inter,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Arial,
        sans-serif;

    background: var(--background);

    color: var(--text);

    min-height: 100vh;
}


/* =====================================
   SIDEBAR
===================================== */

.sidebar {

    position: fixed;

    left: 0;
    top: 0;

    width: 260px;

    height: 100vh;

    background:
        linear-gradient(
            180deg,
            #0f172a 0%,
            #111827 100%
        );

    color: white;

    padding: 25px 18px;

    z-index: 1000;

    display: flex;

    flex-direction: column;
}


/* Logo */

.logo {

    padding: 0 12px;

    margin-bottom: 35px;

    font-size: 25px;

    font-weight: 800;

    letter-spacing: -0.5px;
}


.logo span {

    color: #60a5fa;
}


/* =====================================
   ADMIN PROFILE
===================================== */

.admin-profile {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 15px;

    background:
        rgba(255, 255, 255, 0.06);

    border:
        1px solid
        rgba(255, 255, 255, 0.08);

    border-radius: 14px;

    margin-bottom: 25px;
}


.avatar {

    width: 44px;

    height: 44px;

    min-width: 44px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 800;

    font-size: 15px;
}


.admin-details {

    min-width: 0;
}


.admin-details strong {

    display: block;

    font-size: 14px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


.admin-details span {

    display: block;

    color: #94a3b8;

    font-size: 12px;

    margin-top: 3px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =====================================
   NAVIGATION
===================================== */

.nav-title {

    color: #64748b;

    font-size: 11px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;

    padding: 0 13px;

    margin-bottom: 10px;
}


.nav {

    display: flex;

    flex-direction: column;

    gap: 5px;
}


.nav a {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 13px 14px;

    border-radius: 10px;

    color: #cbd5e1;

    text-decoration: none;

    font-size: 14px;

    font-weight: 500;

    transition: 0.2s ease;
}


.nav a:hover {

    background:
        rgba(255, 255, 255, 0.07);

    color: white;

    transform: translateX(2px);
}


.nav a.active {

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

    color: white;

    box-shadow:
        0 8px 20px
        rgba(37, 99, 235, 0.25);
}


.nav-icon {

    width: 22px;

    text-align: center;

    font-size: 17px;
}


/* =====================================
   SIDEBAR BOTTOM
===================================== */

.sidebar-bottom {

    margin-top: auto;
}


.website-link {

    display: flex;

    align-items: center;

    gap: 10px;

    color: #cbd5e1;

    text-decoration: none;

    padding: 12px 14px;

    border-radius: 10px;

    margin-bottom: 8px;

    font-size: 14px;
}


.website-link:hover {

    background:
        rgba(255,255,255,0.07);

    color: white;
}


.logout {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    padding: 12px;

    border-radius: 10px;

    background:
        rgba(220, 38, 38, 0.12);

    color: #fca5a5;

    text-decoration: none;

    font-size: 14px;

    font-weight: 600;

    transition: 0.2s;
}


.logout:hover {

    background: #dc2626;

    color: white;
}


/* =====================================
   MAIN
===================================== */

.main {

    margin-left: 260px;

    min-height: 100vh;

    padding: 30px 35px;
}


/* =====================================
   TOPBAR
===================================== */

.topbar {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 30px;
}


.page-title h1 {

    font-size: 30px;

    font-weight: 800;

    letter-spacing: -0.7px;

    margin-bottom: 6px;
}


.page-title p {

    color: var(--muted);

    font-size: 14px;
}


.date-box {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 11px 15px;

    background: white;

    border: 1px solid var(--border);

    border-radius: 10px;

    color: var(--muted);

    font-size: 13px;

    box-shadow:
        0 3px 12px
        rgba(15, 23, 42, 0.04);
}


/* =====================================
   STATISTICS
===================================== */

.stats {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 20px;

    margin-bottom: 28px;
}


.stat-card {

    background: white;

    border: 1px solid var(--border);

    border-radius: 16px;

    padding: 22px;

    position: relative;

    overflow: hidden;

    box-shadow:
        0 4px 18px
        rgba(15, 23, 42, 0.04);

    transition:
        transform 0.2s,
        box-shadow 0.2s;
}


.stat-card:hover {

    transform: translateY(-3px);

    box-shadow:
        0 12px 30px
        rgba(15, 23, 42, 0.08);
}


.stat-top {

    display: flex;

    justify-content: space-between;

    align-items: flex-start;

    margin-bottom: 20px;
}


.stat-title {

    color: var(--muted);

    font-size: 13px;

    font-weight: 600;
}


.stat-icon {

    width: 44px;

    height: 44px;

    border-radius: 12px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;

    background: #eff6ff;
}


.stat-number {

    font-size: 32px;

    font-weight: 800;

    color: var(--text);

    line-height: 1;
}


.stat-footer {

    margin-top: 10px;

    font-size: 12px;

    color: #94a3b8;
}


/* =====================================
   DASHBOARD GRID
===================================== */

.dashboard-grid {

    display: grid;

    grid-template-columns:
        1fr 320px;

    gap: 24px;

    align-items: start;
}


/* =====================================
   SECTION CARD
===================================== */

.section {

    background: white;

    border: 1px solid var(--border);

    border-radius: 16px;

    box-shadow:
        0 4px 18px
        rgba(15, 23, 42, 0.04);

    overflow: hidden;
}


.section-header {

    padding: 22px 24px;

    border-bottom:
        1px solid
        var(--border);

    display: flex;

    justify-content: space-between;

    align-items: center;
}


.section-header h2 {

    font-size: 17px;

    font-weight: 750;
}


.view-all {

    color: var(--primary);

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;
}


.view-all:hover {

    text-decoration: underline;
}


/* =====================================
   MESSAGES
===================================== */

.message {

    padding: 20px 24px;

    border-bottom:
        1px solid
        #f1f5f9;

    transition: 0.2s;
}


.message:last-child {

    border-bottom: none;
}


.message:hover {

    background: #f8fafc;
}


.message-top {

    display: flex;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 7px;
}


.message-name {

    font-weight: 700;

    font-size: 14px;
}


.message-date {

    color: #94a3b8;

    font-size: 12px;

    white-space: nowrap;
}


.message-email {

    color: #94a3b8;

    font-size: 12px;

    margin-bottom: 8px;
}


.message-subject {

    display: inline-block;

    color: var(--primary);

    font-size: 13px;

    font-weight: 700;

    margin-bottom: 7px;
}


.message-text {

    color: var(--muted);

    font-size: 13px;

    line-height: 1.6;

    display: -webkit-box;

    -webkit-line-clamp: 2;

    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =====================================
   EMPTY STATE
===================================== */

.no-messages {

    text-align: center;

    padding: 55px 20px;

    color: var(--muted);
}


.no-message-icon {

    width: 55px;

    height: 55px;

    margin: 0 auto 15px;

    border-radius: 50%;

    background: #f1f5f9;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 23px;
}


.no-messages p {

    font-size: 14px;
}


/* =====================================
   QUICK ACTIONS
===================================== */

.quick-actions {

    padding: 22px;
}


.quick-actions h3 {

    font-size: 16px;

    margin-bottom: 18px;
}


.action {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 14px;

    border:
        1px solid
        var(--border);

    border-radius: 11px;

    text-decoration: none;

    color: var(--text);

    margin-bottom: 10px;

    transition: 0.2s;
}


.action:last-child {

    margin-bottom: 0;
}


.action:hover {

    border-color: #bfdbfe;

    background: #eff6ff;

    transform: translateX(2px);
}


.action-icon {

    width: 38px;

    height: 38px;

    border-radius: 9px;

    background: #eff6ff;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 17px;
}


.action-text strong {

    display: block;

    font-size: 13px;

    margin-bottom: 3px;
}


.action-text span {

    display: block;

    color: var(--muted);

    font-size: 11px;
}


/* =====================================
   INFO CARD
===================================== */

.info-card {

    margin-top: 20px;

    padding: 20px;

    background:
        linear-gradient(
            135deg,
            #eff6ff,
            #f0fdfa
        );

    border: 1px solid #dbeafe;

    border-radius: 14px;
}


.info-card h3 {

    font-size: 15px;

    margin-bottom: 8px;
}


.info-card p {

    color: var(--muted);

    font-size: 12px;

    line-height: 1.6;
}


/* =====================================
   MOBILE MENU BUTTON
===================================== */

.mobile-menu {

    display: none;

    border: none;

    background: white;

    width: 42px;

    height: 42px;

    border-radius: 10px;

    cursor: pointer;

    font-size: 20px;

    box-shadow:
        0 3px 12px
        rgba(0,0,0,0.08);
}


/* =====================================
   RESPONSIVE
===================================== */

@media (max-width: 1100px) {

    .dashboard-grid {

        grid-template-columns: 1fr;
    }

}


@media (max-width: 900px) {

    .sidebar {

        width: 230px;
    }

    .main {

        margin-left: 230px;

        padding: 25px;
    }

    .stats {

        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media (max-width: 700px) {

    .sidebar {

        transform: translateX(-100%);

        transition: 0.3s;
    }

    .sidebar.open {

        transform: translateX(0);
    }

    .main {

        margin-left: 0;

        padding: 20px;
    }

    .mobile-menu {

        display: flex;

        align-items: center;

        justify-content: center;
    }

    .topbar {

        gap: 15px;
    }

    .date-box {

        display: none;
    }

    .stats {

        grid-template-columns: 1fr;
    }

}


@media (max-width: 450px) {

    .main {

        padding: 15px;
    }

    .page-title h1 {

        font-size: 24px;
    }

    .message-top {

        display: block;
    }

    .message-date {

        display: block;

        margin-top: 5px;
    }

}

</style>

</head>


<body>


<!-- =====================================
     SIDEBAR
===================================== -->

<aside class="sidebar" id="sidebar">


    <div class="logo">

        Software <span> Solutions</span>

    </div>


    <!-- ADMIN PROFILE -->

    <div class="admin-profile">

        <div class="avatar">

            <?= htmlspecialchars($initials) ?>

        </div>


        <div class="admin-details">

            <strong>
                <?= htmlspecialchars($admin_name) ?>
            </strong>

            <span>
                Administrator
            </span>

        </div>

    </div>


    <!-- NAVIGATION -->

    <div class="nav-title">
        Management
    </div>


    <nav class="nav">


        <a
            href="dashboard.php"
            class="active"
        >

            <span class="nav-icon">▦</span>

            Dashboard

        </a>


        <a href="messages.php">

            <span class="nav-icon">✉</span>

            Messages

            <?php if ($message_count > 0): ?>

                <span style="
                    margin-left:auto;
                    background:#2563eb;
                    color:white;
                    font-size:10px;
                    padding:3px 7px;
                    border-radius:20px;
                ">
                    <?= $message_count ?>
                </span>

            <?php endif; ?>

        </a>


        <a href="projects.php">

            <span class="nav-icon">▣</span>

            Projects

        </a>

    </nav>


    <!-- SIDEBAR BOTTOM -->

    <div class="sidebar-bottom">


        <a
            href="../index.php"
            class="website-link"
        >

            <span>↗</span>

            View Website

        </a>


        <a
            href="logout.php"
            class="logout"
        >

            <span>⇥</span>

            Logout

        </a>


    </div>


</aside>


<!-- =====================================
     MAIN
===================================== -->

<main class="main">


    <!-- TOPBAR -->

    <header class="topbar">


        <div style="display:flex;align-items:center;gap:15px;">

            <button
                class="mobile-menu"
                id="mobileMenu"
            >
                ☰
            </button>


            <div class="page-title">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Welcome back,
                    <?= htmlspecialchars($admin_name) ?>.
                    Here's what's happening today.
                </p>

            </div>

        </div>


        <div class="date-box">

            <span>◷</span>

            <?= htmlspecialchars($current_date) ?>

        </div>


    </header>


    <!-- =====================================
         STATISTICS
    ===================================== -->

    <section class="stats">


        <!-- MESSAGES -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    TOTAL MESSAGES
                </div>

                <div class="stat-icon">
                    ✉
                </div>

            </div>


            <div class="stat-number">

                <?= $message_count ?>

            </div>


            <div class="stat-footer">

                Customer inquiries received

            </div>

        </div>


        <!-- PROJECTS -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    TOTAL PROJECTS
                </div>

                <div class="stat-icon">
                    ▣
                </div>

            </div>


            <div class="stat-number">

                <?= $project_count ?>

            </div>


            <div class="stat-footer">

                Projects in your portfolio

            </div>

        </div>


        <!-- ADMINS -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-title">
                    ADMINISTRATORS
                </div>

                <div class="stat-icon">
                    ◉
                </div>

            </div>


            <div class="stat-number">

                <?= $admin_count ?>

            </div>


            <div class="stat-footer">

                Active administrator accounts

            </div>

        </div>


    </section>


    <!-- =====================================
         CONTENT GRID
    ===================================== -->

    <div class="dashboard-grid">


        <!-- =====================================
             RECENT MESSAGES
        ===================================== -->

        <section class="section">


            <div class="section-header">

                <h2>
                    Recent Messages
                </h2>


                <a
                    href="messages.php"
                    class="view-all"
                >
                    View all →
                </a>

            </div>


            <?php if (!empty($recent_messages)): ?>


                <?php foreach ($recent_messages as $message): ?>


                    <div class="message">


                        <div class="message-top">

                            <span class="message-name">

                                <?= htmlspecialchars(
                                    $message["name"]
                                ) ?>

                            </span>


                            <span class="message-date">

                                <?= htmlspecialchars(
                                    date(
                                        "M j, Y · g:i A",
                                        strtotime(
                                            $message["created_at"]
                                        )
                                    )
                                ) ?>

                            </span>

                        </div>


                        <div class="message-email">

                            <?= htmlspecialchars(
                                $message["email"]
                            ) ?>

                        </div>


                        <div class="message-subject">

                            <?= htmlspecialchars(
                                $message["subject"]
                            ) ?>

                        </div>


                        <div class="message-text">

                            <?= htmlspecialchars(
                                $message["message"]
                            ) ?>

                        </div>


                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <div class="no-messages">

                    <div class="no-message-icon">
                        ✉
                    </div>

                    <p>
                        No messages have been received yet.
                    </p>

                </div>


            <?php endif; ?>


        </section>


        <!-- =====================================
             RIGHT COLUMN
        ===================================== -->

        <div>


            <!-- QUICK ACTIONS -->

            <section class="section">


                <div class="quick-actions">


                    <h3>
                        Quick Actions
                    </h3>


                    <a
                        href="projects.php"
                        class="action"
                    >

                        <div class="action-icon">
                            +
                        </div>


                        <div class="action-text">

                            <strong>
                                Add Project
                            </strong>

                            <span>
                                Add a new portfolio project
                            </span>

                        </div>

                    </a>


                    <a
                        href="messages.php"
                        class="action"
                    >

                        <div class="action-icon">
                            ✉
                        </div>


                        <div class="action-text">

                            <strong>
                                View Messages
                            </strong>

                            <span>
                                Read customer inquiries
                            </span>

                        </div>

                    </a>


                    <a
                        href="../index.php"
                        class="action"
                    >

                        <div class="action-icon">
                            ↗
                        </div>


                        <div class="action-text">

                            <strong>
                                View Website
                            </strong>

                            <span>
                                Open the public website
                            </span>

                        </div>

                    </a>


                </div>


            </section>


            <!-- ADMIN INFO -->

            <div class="info-card">

                <h3>
                    Admin Account
                </h3>


                <p>

                    Logged in as
                    <strong>
                        <?= htmlspecialchars($admin_email) ?>
                    </strong>.

                </p>

            </div>


        </div>


    </div>


</main>


<script>

const mobileMenu =
    document.getElementById("mobileMenu");

const sidebar =
    document.getElementById("sidebar");


mobileMenu.addEventListener(
    "click",
    function () {

        sidebar.classList.toggle("open");

    }
);

</script>


</body>

</html>