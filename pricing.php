<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pricing | Software and solutions</title>

<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
>

<!-- Font Awesome -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>

<style>

/* =========================================================
   GLOBAL
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    background: linear-gradient(
        135deg,
        #eef4ff,
        #dbeafe,
        #f8fbff
    );

    background-size: 300% 300%;

    animation: gradientBG 12s ease infinite;

    min-height: 100vh;

    overflow-x: hidden;

    position: relative;
}


/* =========================================================
   BACKGROUND EFFECTS
========================================================= */

body::before,
body::after {

    content: "";

    position: fixed;

    width: 350px;
    height: 350px;

    border-radius: 50%;

    filter: blur(120px);

    z-index: -1;

    animation: float 10s ease-in-out infinite;
}

body::before {

    background: #3b82f6;

    top: -120px;
    left: -120px;

    opacity: .25;
}

body::after {

    background: #06b6d4;

    bottom: -120px;
    right: -120px;

    opacity: .25;
}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes gradientBG {

    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}


@keyframes float {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(30px);
    }
}


@keyframes shine {

    from {
        background-position: 0%;
    }

    to {
        background-position: 200%;
    }
}


/* =========================================================
   NAVIGATION
========================================================= */

.navbar {

    position: sticky;

    top: 20px;

    width: 90%;

    max-width: 1200px;

    margin: 20px auto;

    padding: 15px 35px;

    display: flex;

    justify-content: space-between;

    align-items: center;

    background: rgba(255, 255, 255, .55);

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(255, 255, 255, .5);

    border-radius: 50px;

    box-shadow: 0 8px 30px rgba(0, 0, 0, .12);

    z-index: 1000;

    transition: .3s ease;
}


/* Logo */

.logo {

    font-size: 28px;

    font-weight: 700;

    color: #2563eb;

    text-decoration: none;

    white-space: nowrap;
}


/* Navigation links */

.nav-links {

    display: flex;

    align-items: center;

    gap: 8px;
}

.nav-links a {

    color: #334155;

    text-decoration: none;

    font-size: 15px;

    font-weight: 500;

    padding: 10px 15px;

    border-radius: 30px;

    transition: .35s ease;
}


.nav-links a:hover {

    background: #2563eb;

    color: white;

    transform: translateY(-3px);
}


.nav-links a.active {

    background: #2563eb;

    color: white;
}


/* =========================================================
   PRICING SECTION
========================================================= */

.pricing {

    width: 100%;

    padding: 80px 8%;
}


/* Heading */

.heading {

    text-align: center;

    margin-bottom: 60px;
}


.heading h1 {

    font-size: 52px;

    font-weight: 700;

    color: #0f172a;

    margin-bottom: 10px;
}


.heading p {

    color: #64748b;

    font-size: 17px;
}


/* =========================================================
   PRICE CONTAINER
========================================================= */

.price-container {

    display: grid;

    grid-template-columns:
        repeat(
            auto-fit,
            minmax(300px, 1fr)
        );

    gap: 30px;

    max-width: 1250px;

    margin: auto;
}


/* =========================================================
   PRICE CARD
========================================================= */

.card {

    position: relative;

    background: rgba(255, 255, 255, .78);

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(255, 255, 255, .5);

    border-radius: 22px;

    overflow: hidden;

    transition: .4s ease;

    box-shadow:
        0 20px 40px rgba(0, 0, 0, .08);
}


.card:hover {

    transform:
        translateY(-12px)
        scale(1.02);

    box-shadow:
        0 30px 60px rgba(37, 99, 235, .18);
}


/* Popular card */

.card.popular {

    border: 3px solid transparent;

    background:
        linear-gradient(
            rgba(255, 255, 255, .95),
            rgba(255, 255, 255, .95)
        ) padding-box,

        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        ) border-box;
}


/* =========================================================
   CARD TOP
========================================================= */

.top {

    padding: 35px;

    text-align: center;
}


.top h2 {

    font-size: 27px;

    margin-bottom: 15px;

    color: #0f172a;
}


/* =========================================================
   PRICE
========================================================= */

.price {

    font-size: 48px;

    font-weight: 700;

    background: linear-gradient(
        90deg,
        #2563eb,
        #3b82f6,
        #06b6d4,
        #0ea5e9
    );

    background-size: 200% auto;

    background-clip: text;

    -webkit-background-clip: text;

    -webkit-text-fill-color: transparent;

    animation: shine 4s linear infinite;
}


.top p {

    color: #64748b;

    margin-top: 5px;
}


/* =========================================================
   FEATURES
========================================================= */

.card ul {

    list-style: none;

    padding: 10px 30px 30px;
}


.card ul li {

    padding: 15px 0;

    border-bottom:
        1px solid rgba(0, 0, 0, .08);

    color: #334155;

    font-size: 15px;
}


.card ul li:last-child {

    border-bottom: none;
}


/* =========================================================
   BUTTON
========================================================= */

.btn {

    display: block;

    width: 85%;

    margin: 10px auto 30px;

    padding: 15px;

    text-align: center;

    text-decoration: none;

    color: white;

    font-weight: 600;

    border-radius: 50px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    transition: .35s ease;

    box-shadow:
        0 15px 30px rgba(
            37,
            99,
            235,
            .25
        );
}


.btn:hover {

    transform: translateY(-3px);

    box-shadow:
        0 0 25px rgba(
            37,
            99,
            235,
            .45
        ),

        0 0 50px rgba(
            6,
            182,
            212,
            .25
        );
}


/* =========================================================
   BEST VALUE TAG
========================================================= */

.tag {

    position: absolute;

    top: 20px;

    right: -42px;

    background: #f97316;

    color: white;

    padding: 8px 50px;

    transform: rotate(45deg);

    font-size: 12px;

    font-weight: 600;

    z-index: 2;
}


/* =========================================================
   FOOTER
========================================================= */

.footer {

    background: #0f172a;

    color: #cbd5e1;

    padding: 80px 8% 25px;

    margin-top: 50px;
}


.footer-container {

    display: grid;

    grid-template-columns:
        repeat(
            auto-fit,
            minmax(230px, 1fr)
        );

    gap: 50px;

    margin-bottom: 50px;
}


.footer-box h2,
.footer-box h3 {

    color: white;

    margin-bottom: 20px;
}


.footer-box h2 {

    color: #38bdf8;

    font-size: 27px;
}


.footer-box p {

    line-height: 1.8;

    margin-bottom: 15px;
}


.footer-box ul {

    list-style: none;

    padding: 0;
}


.footer-box ul li {

    margin-bottom: 12px;
}


.footer-box a {

    color: #cbd5e1;

    text-decoration: none;

    transition: .3s ease;
}


.footer-box a:hover {

    color: #38bdf8;

    padding-left: 5px;
}


/* =========================================================
   SOCIAL LINKS
========================================================= */

.social-links {

    display: flex;

    justify-content: center;

    gap: 15px;

    margin-bottom: 35px;

    flex-wrap: wrap;
}


.social-links a {

    width: 50px;

    height: 50px;

    border-radius: 50%;

    background: #1e293b;

    display: flex;

    justify-content: center;

    align-items: center;

    color: white;

    font-size: 20px;

    transition: .35s ease;

    text-decoration: none;
}


.social-links a:hover {

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
        );

    transform: translateY(-6px);

    box-shadow:
        0 12px 30px
        rgba(37, 99, 235, .35);
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {

    border-top:
        1px solid
        rgba(255, 255, 255, .1);

    padding-top: 25px;

    text-align: center;
}


.footer-bottom p {

    margin: 8px 0;

    color: #94a3b8;
}


/* =========================================================
   RESPONSIVE DESIGN
========================================================= */

@media (max-width: 900px) {

    .navbar {

        border-radius: 25px;

        padding: 15px 20px;

        flex-direction: column;

        gap: 15px;
    }


    .nav-links {

        flex-wrap: wrap;

        justify-content: center;
    }


    .heading h1 {

        font-size: 40px;
    }
}


@media (max-width: 600px) {

    .pricing {

        padding: 50px 5%;
    }


    .heading h1 {

        font-size: 32px;
    }


    .heading p {

        font-size: 14px;
    }


    .price {

        font-size: 40px;
    }


    .top {

        padding: 30px 20px;
    }


    .card ul {

        padding-left: 25px;

        padding-right: 25px;
    }


    .navbar {

        width: 94%;

        top: 10px;

        margin-top: 10px;
    }


    .logo {

        font-size: 24px;
    }


    .nav-links a {

        font-size: 13px;

        padding: 8px 10px;
    }


    .footer {

        padding-left: 6%;

        padding-right: 6%;
    }
}

</style>

</head>


<body>


<!-- =========================================================
     NAVIGATION
========================================================= -->

<nav class="navbar">

    <a href="index.php" class="logo">
        Software and solutions
    </a>


    <div class="nav-links">

        <a href="index.php#home">
            Home
        </a>

        <a href="index.php#services">
            Services
        </a>

        <a href="index.php#projects">
            Projects
        </a>

        <a href="pricing.php" class="active">
            Pricing
        </a>

        <a href="product.php">
            Products
        </a>

        <a href="index.php#contact">
            Contact
        </a>

    </div>

</nav>



<!-- =========================================================
     PRICING
========================================================= -->

<section class="pricing">

    <div class="heading">

        <h1>
            Our Pricing Plans
        </h1>

        <p>
            Choose a package that fits your business needs.
        </p>

    </div>



    <div class="price-container">


        <!-- =================================================
             WEBSITE DESIGN
        ================================================== -->

        <div class="card">

            <div class="top">

                <h2>
                    Website Design
                </h2>

                <div class="price">
                    KSh 10,000
                </div>

                <p>
                    Starting Price
                </p>

            </div>


            <ul>

                <li>
                    ✔ Modern Responsive Design
                </li>

                <li>
                    ✔ Up to 10 Pages
                </li>

                <li>
                    ✔ Mobile Friendly
                </li>

                <li>
                    ✔ Contact Form
                </li>

                <li>
                    ✔ SEO Ready
                </li>

                <li>
                    ✔ 30 Days Free Support
                </li>

            </ul>


            <a
                href="index.php#contact"
                class="btn"
            >
                Request Quote
            </a>

        </div>



        <!-- =================================================
             SYSTEM DEVELOPMENT
        ================================================== -->

        <div class="card popular">

            <div class="tag">
                BEST VALUE
            </div>


            <div class="top">

                <h2>
                    System Development
                </h2>

                <div class="price">
                    KSh 50,000+
                </div>

                <p>
                    Starting Price
                </p>

            </div>


            <ul>

                <li>
                    ✔ School Management Systems
                </li>

                <li>
                    ✔ Inventory Systems
                </li>

                <li>
                    ✔ Hospital Systems
                </li>

                <li>
                    ✔ Business Management Systems
                </li>

                <li>
                    ✔ Database Integration
                </li>

                <li>
                    ✔ User Authentication
                </li>

                <li>
                    ✔ Installation & Configuration
                </li>

                <li>
                    ✔ Training & Support
                </li>

            </ul>


            <a
                href="index.php#contact"
                class="btn"
            >
                Get Started
            </a>

        </div>



        <!-- =================================================
             CUSTOM SOFTWARE
        ================================================== -->

        <div class="card">

            <div class="top">

                <h2>
                    Custom Software
                </h2>

                <div class="price">
                    Custom
                </div>

                <p>
                    Quote Based
                </p>

            </div>


            <ul>

                <li>
                    ✔ Tailor-Made Solutions
                </li>

                <li>
                    ✔ API Integration
                </li>

                <li>
                    ✔ Cloud Deployment
                </li>

                <li>
                    ✔ Mobile & Web Apps
                </li>

                <li>
                    ✔ Maintenance
                </li>

                <li>
                    ✔ Technical Support
                </li>

            </ul>


            <a
                href="index.php#contact"
                class="btn"
            >
                Contact Us
            </a>

        </div>


    </div>

</section>



<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">


    <div class="footer-container">


        <!-- COMPANY -->

        <div class="footer-box">

            <h2>
                Software and solutions
            </h2>

            <p>
                We build innovative websites,
                business systems, mobile applications,
                and custom software solutions that help
                businesses succeed in the digital era.
            </p>

        </div>



        <!-- PRODUCTS -->

        <div class="footer-box">

            <h3>
                Products
            </h3>

            <ul>

                <li>
                    <a href="product.php">
                        School Management System
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        Hospital Management System
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        Inventory System
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        POS System
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        HR & Payroll System
                    </a>
                </li>

            </ul>

        </div>



        <!-- QUICK LINKS -->

        <div class="footer-box">

            <h3>
                Quick Links
            </h3>

            <ul>

                <li>
                    <a href="index.php">
                        Home
                    </a>
                </li>

                <li>
                    <a href="index.php#services">
                        Services
                    </a>
                </li>

                <li>
                    <a href="product.php">
                        Products
                    </a>
                </li>

                <li>
                    <a href="index.php#projects">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="pricing.php">
                        Pricing
                    </a>
                </li>

                <li>
                    <a href="index.php#contact">
                        Contact
                    </a>
                </li>

            </ul>

        </div>



        <!-- CONTACT -->

        <div class="footer-box">

            <h3>
                Contact Us
            </h3>

            <p>
                📍 Mombasa, Kenya
            </p>


            <p>

                📞

                <a
                    href="tel:+254706332477"
                >
                    +254 706 332 477
                </a>

            </p>


            <p>

                ✉️

                <a
                    href="mailto:info@devsolutions.co.ke"
                >
                    info@devsolutions.co.ke
                </a>

            </p>


            <p>

                💬

                <a
                    href="https://wa.me/254706332477"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    WhatsApp
                </a>

            </p>

        </div>


    </div>



    <!-- =====================================================
         SOCIAL MEDIA
    ====================================================== -->

    <div class="social-links">


        <a
            href="#"
            aria-label="Facebook"
        >
            <i class="fab fa-facebook-f"></i>
        </a>


        <a
            href="#"
            aria-label="Instagram"
        >
            <i class="fab fa-instagram"></i>
        </a>


        <a
            href="#"
            aria-label="LinkedIn"
        >
            <i class="fab fa-linkedin-in"></i>
        </a>


        <a
            href="#"
            aria-label="GitHub"
        >
            <i class="fab fa-github"></i>
        </a>


        <a
            href="https://wa.me/254706332477"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="WhatsApp"
        >
            <i class="fab fa-whatsapp"></i>
        </a>


    </div>



    <!-- =====================================================
         COPYRIGHT
    ====================================================== -->

    <div class="footer-bottom">

        <p>

            © <?= date("Y") ?>

            <strong>
                Software and solutions
            </strong>

            . All Rights Reserved.

        </p>


        <p>

            Designed & Developed by

            <strong>
                Software and solutions
            </strong>

        </p>

    </div>


</footer>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

window.addEventListener("scroll", function () {

    const nav = document.querySelector(".navbar");

    if (!nav) {
        return;
    }


    if (window.scrollY > 20) {

        nav.style.boxShadow =
            "0 15px 40px rgba(0,0,0,.15)";

    } else {

        nav.style.boxShadow =
            "0 8px 30px rgba(0,0,0,.12)";
    }

});

</script>


</body>

</html>