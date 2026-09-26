<?php

require_once "config/database.php";

$success = isset($_GET["success"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software and Solutions</title>
</head>
<body>
    
</body>
</html>

<header>

    <nav class="navbar">

        <div class="logo">
            Software and solutions
        </div>

        <div class="menu-toggle" onclick="toggleMenu()">
            ☰
        </div>

        <div class="nav-links">

            <a href="index.php#home" class="active">
                Home
            </a>

            <a href="index.php#services">
                Services
            </a>

            <a href="index.php#projects">
                Projects
            </a>

            <a href="pricing.php">
                Pricing
            </a>

            <a href="product.php">
                Products
            </a>

            <a href="contact.php">
                Contact
            </a>

        </div>

    </nav>

</header>

<!-- Hero Section -->

<section class="hero" id="home">

    <div class="overlay"></div>

    <div class="hero-content">

        <span class="hero-tag">
            🚀 Trusted Software Development Company
        </span>

        <h1>
            Building Powerful Digital Solutions
            for Your Business
        </h1>

        <p>
            We design professional websites, business systems,
            school management software, inventory systems,
            mobile applications, and custom software that help
            businesses grow faster and work smarter.
        </p>

        <div class="hero-buttons">

            <a href="#contact" class="btn">
                Get Started
            </a>

            <a href="pricing.php" class="btn-outline">
                View Pricing
            </a>

        </div>

    </div>

</section>

<section class="services" id="services">

    <div class="section-title">
        <span>OUR SERVICES</span>
        <h2>Professional Digital Solutions</h2>
        <p>
            We help businesses, schools, and organizations build modern digital
            solutions that improve efficiency and accelerate growth.
        </p>
    </div>

    <div class="service-grid">

        <div class="service-card">
            <div class="icon">🌐</div>
            <h3>Website Design</h3>
            <p>
                Responsive business websites, portfolios, company websites,
                landing pages, and eCommerce solutions.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

        <div class="service-card">
            <div class="icon">💻</div>
            <h3>System Development</h3>
            <p>
                School Management Systems, Hospital Systems, Inventory,
                POS, SACCO, HR, and Business Management Systems.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

        <div class="service-card">
            <div class="icon">📱</div>
            <h3>Mobile Apps</h3>
            <p>
                Android applications built with modern technologies for
                businesses and organizations.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

        <div class="service-card">
            <div class="icon">☁️</div>
            <h3>Cloud Solutions</h3>
            <p>
                Cloud hosting, deployment, backups, security,
                and server management.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

        <div class="service-card">
            <div class="icon">🔒</div>
            <h3>Cyber Security</h3>
            <p>
                Security assessments, vulnerability testing,
                secure authentication, and data protection.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

        <div class="service-card">
            <div class="icon">🛠️</div>
            <h3>Maintenance & Support</h3>
            <p>
                Software updates, bug fixing,
                technical support, and system optimization.
            </p>
            <a href="pricing.php">Learn More →</a>
        </div>

    </div>

</section>

<!--projects-->
<section class="projects" id="projects">

    <div class="section-title">

        <span>OUR PROJECTS</span>

        <h2>Featured Projects</h2>

        <p>
            We build modern, secure, and scalable software solutions for
            businesses, schools, and organizations.
        </p>

    </div>

    <div class="project-grid">

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80" alt="School Management System">

            <div class="project-content">

                <h3>School Management System</h3>

                <p>
                    A complete web-based platform for managing students,
                    teachers, attendance, fees, exams, and reports.
                </p>

                <span class="tech">
                    HTML • CSS • JavaScript • PHP • MySQL
                </span>

            </div>

        </div>

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=900&q=80" alt="Business Website">

            <div class="project-content">

                <h3>Business Website</h3>

                <p>
                    A responsive corporate website with modern UI,
                    SEO optimization, and contact forms.
                </p>

                <span class="tech">
                    HTML • CSS • JavaScript
                </span>

            </div>

        </div>

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80" alt="Inventory System">

            <div class="project-content">

                <h3>Inventory Management System</h3>

                <p>
                    Manage stock, purchases, suppliers,
                    and sales from one secure dashboard.
                </p>

                <span class="tech">
                    PHP • MySQL • Bootstrap
                </span>

            </div>

        </div>

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80" alt="Analytics Dashboard">

            <div class="project-content">

                <h3>Business Dashboard</h3>

                <p>
                    Interactive dashboards with charts,
                    analytics, and business reports.
                </p>

                <span class="tech">
                    JavaScript • Chart.js • PHP
                </span>

            </div>

        </div>

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80" alt="Team Collaboration">

            <div class="project-content">

                <h3>HR Management System</h3>

                <p>
                    Employee records, payroll,
                    leave management, and performance tracking.
                </p>

                <span class="tech">
                    PHP • MySQL • JavaScript
                </span>

            </div>

        </div>

        <div class="project-card">

            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80" alt="Custom Software">

            <div class="project-content">

                <h3>Custom Software Solutions</h3>

                <p>
                    Tailor-made software built to meet unique
                    business requirements and workflows.
                </p>

                <span class="tech">
                    Custom Development
                </span>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     CONTACT SECTION
========================= -->

<section class="contact" id="contact">

    <div class="section-title">

        <span>CONTACT US</span>

        <h2>Let's Build Something Amazing Together</h2>

        <p>
            Have a project in mind? We'd love to hear from you.
            Tell us about your project and our team will get back
            to you as soon as possible.
        </p>

    </div>


    <div class="contact-container">


        <!-- =========================
             CONTACT INFORMATION
        ========================== -->

        <div class="contact-info">

            <h3>Get In Touch</h3>

            <p class="contact-intro">
                Whether you need a website, business system, mobile
                application, or custom software, we're ready to help
                turn your idea into a reliable digital solution.
            </p>


            <!-- Location -->

            <div class="info-box">

                <div class="icon">
                    📍
                </div>

                <div>

                    <h4>Location</h4>

                    <p>
                        Mombasa, Kenya
                    </p>

                </div>

            </div>


            <!-- Phone -->

            <div class="info-box">

                <div class="icon">
                    📞
                </div>

                <div>

                    <h4>Phone</h4>

                    <p>
                        <a href="tel:+254706332477">
                            +254 706 332 477
                        </a>
                    </p>

                    <p>
                        <a href="tel:+254737941251">
                            +254 737 941 251
                        </a>
                    </p>

                </div>

            </div>


            <!-- Email -->

            <div class="info-box">

                <div class="icon">
                    ✉️
                </div>

                <div>

                    <h4>Email</h4>

                    <p>
                        <a href="mailto:info@devsolutions.co.ke">
                            info@devsolutions.co.ke
                        </a>
                    </p>

                </div>

            </div>


            <!-- WhatsApp -->

            <a
                href="https://wa.me/254706332477?text=Hello%20DevSolutions%2C%20I%20would%20like%20to%20discuss%20a%20project."
                class="whatsapp-btn"
                target="_blank"
                rel="noopener noreferrer"
            >

                💬 Chat With Us on WhatsApp

            </a>


            <!-- Working Hours -->

            <div class="info-box">

                <div class="icon">
                    🕒
                </div>

                <div>

                    <h4>Working Hours</h4>

                    <p>
                        Monday - Friday
                    </p>

                    <p>
                        8:00 AM - 6:00 PM
                    </p>

                </div>

            </div>

        </div>



        <!-- =========================
             CONTACT FORM
        ========================== -->

        <div class="contact-form">

            <div class="form-header">

                <h3>Send Us a Message</h3>

                <p>
                    Fill out the form below and we'll get back
                    to you shortly.
                </p>

            </div>


            <?php if (isset($success) && $success): ?>

                <div class="success-message">

                    <strong>✅ Message Sent Successfully!</strong>

                    <p>
                        Thank you for contacting DevSolutions.
                        We have received your message and will
                        get back to you as soon as possible.
                    </p>

                </div>

            <?php endif; ?>


            <form
                action="contact.php"
                method="POST"
                class="contact-form-content"
            >


                <!-- Name + Email -->

                <div class="row">

                    <div class="form-group">

                        <label for="name">
                            Your Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            autocomplete="name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            autocomplete="email"
                            required
                        >

                    </div>

                </div>


                <!-- Subject -->

                <div class="form-group">

                    <label for="subject">
                        Subject
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        placeholder="What can we help you with?"
                        required
                    >

                </div>


                <!-- Message -->

                <div class="form-group">

                    <label for="message">
                        Project Details
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="7"
                        placeholder="Tell us about your project, requirements, budget, timeline, or any questions you have..."
                        required
                    ></textarea>

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="btn"
                >

                    Send Message
                    <span>→</span>

                </button>


            </form>

        </div>

    </div>

</section>



<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <div class="footer-container">


        <!-- =========================
             COMPANY
        ========================== -->

        <div class="footer-box">

            <h2>DevSolutions</h2>

            <p>
                We build professional websites, business systems,
                mobile applications, and custom software solutions
                that help businesses grow and succeed in the digital world.
            </p>

        </div>



        <!-- =========================
             QUICK LINKS
        ========================== -->

        <div class="footer-box">

            <h3>Quick Links</h3>

            <ul>

                <li>
                    <a href="index.php#home">
                        Home
                    </a>
                </li>

                <li>
                    <a href="index.php#services">
                        Services
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



        <!-- =========================
             SERVICES
        ========================== -->

        <div class="footer-box">

            <h3>Our Services</h3>

            <ul>

                <li>
                    Website Design
                </li>

                <li>
                    System Development
                </li>

                <li>
                    Mobile App Development
                </li>

                <li>
                    Cyber Security
                </li>

                <li>
                    Cloud Solutions
                </li>

                <li>
                    Maintenance & Support
                </li>

            </ul>

        </div>



        <!-- =========================
             CONTACT
        ========================== -->

        <div class="footer-box">

            <h3>Contact Us</h3>

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



    <!-- =========================
         SOCIAL MEDIA
    ========================== -->

    <div class="social-links">

        <a
            href="#"
            aria-label="Website"
        >
            🌐
        </a>

        <a
            href="#"
            aria-label="Facebook"
        >
            📘
        </a>

        <a
            href="#"
            aria-label="Instagram"
        >
            📸
        </a>

        <a
            href="#"
            aria-label="LinkedIn"
        >
            💼
        </a>

        <a
            href="#"
            aria-label="GitHub"
        >
            🐙
        </a>

    </div>



    <!-- =========================
         COPYRIGHT
    ========================== -->

    <div class="footer-bottom">

        <p>

            © <?= date("Y") ?> Software and solutions.
            All Rights Reserved.

        </p>

    </div>

</footer>
<style>
    /* Hero */

.hero{

    position:relative;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    text-align:center;

    padding:0 8%;

    background-image:url("https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80");

    background-size:cover;

    background-position:center;

    background-repeat:no-repeat;

}

.overlay{

    position:absolute;

    inset:0;

    background:linear-gradient(
        rgba(15,23,42,.80),
        rgba(15,23,42,.65)
    );

}

/* ==========================
   Navigation Bar
========================== */

.navbar{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);

    width:90%;
    max-width:1200px;

    padding:15px 35px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    background:rgba(255,255,255,.15);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.25);
    border-radius:60px;

    box-shadow:0 15px 35px rgba(0,0,0,.12);

    z-index:1000;

    transition:.35s ease;
}

/* Logo */

.logo{

    font-size:30px;

    font-weight:700;

    color:#2563eb;

    cursor:pointer;

    letter-spacing:1px;

}

/* Navigation Links */

.nav-links{

    display:flex;

    align-items:center;

    gap:10px;

}

.nav-links a{

    color:#070808;

    text-decoration:none;

    font-size:18px;

    font-weight:600;

    padding:12px 22px;

    border-radius:50px;

    transition:.35s;

}

/* Hover */

.nav-links a:hover{

    background:linear-gradient(135deg,#2563eb,#06b6d4);

    color:#fff;

    transform:translateY(-3px);

    box-shadow:0 12px 25px rgba(37,99,235,.30);

}

/* Active Link */

.nav-links a.active{

    background:linear-gradient(135deg,#2563eb,#06b6d4);

    color:white;

    box-shadow:0 12px 25px rgba(37,99,235,.35);

}

/* Mobile Menu Icon */

.menu-toggle{

    display:none;

    font-size:30px;

    cursor:pointer;

    color:#2563eb;

}

/* ==========================
   Mobile Responsive
========================== */

@media(max-width:900px){

.menu-toggle{

    display:block;

}

.nav-links{

    position:absolute;

    top:90px;

    right:0;

    width:250px;

    padding:20px;

    display:none;

    flex-direction:column;

    gap:15px;

    background:rgba(255,255,255,.95);

    backdrop-filter:blur(20px);

    border-radius:20px;

    box-shadow:0 15px 35px rgba(0,0,0,.15);

}

.nav-links.active{

    display:flex;

}

.nav-links a{

    width:100%;

    text-align:center;

}

}

.hero-content{

    position:relative;

    z-index:2;

    max-width:850px;

    color:white;

}

.hero-tag{

    display:inline-block;

    padding:10px 22px;

    border-radius:50px;

    background:rgba(255,255,255,.15);

    backdrop-filter:blur(10px);

    margin-bottom:25px;

    font-size:15px;

    letter-spacing:1px;

}

.hero h1{

    font-size:65px;

    line-height:1.2;

    margin-bottom:25px;

    font-weight:700;

}

.hero p{

    font-size:20px;

    line-height:1.8;

    color:#e2e8f0;

    margin-bottom:40px;

}

.hero-buttons{

    display:flex;

    justify-content:center;

    gap:20px;

    flex-wrap:wrap;

}

.btn{

    padding:16px 40px;

    border-radius:50px;

    background:linear-gradient(135deg,#2563eb,#06b6d4);

    color:white;

    text-decoration:none;

    font-weight:600;

    transition:.35s;

}

.btn:hover{

    transform:translateY(-5px);

    box-shadow:0 20px 40px rgba(37,99,235,.35);

}

.btn-outline{

    padding:16px 40px;

    border-radius:50px;

    border:2px solid white;

    color:white;

    text-decoration:none;

    font-weight:600;

    transition:.35s;

}

.btn-outline:hover{

    background:white;

    color:#2563eb;

}

@media(max-width:768px){

.hero{

    height:auto;

    min-height:100vh;

    padding:120px 20px 80px;

}

.hero h1{

    font-size:42px;

}

.hero p{

    font-size:18px;

}

.hero-buttons{

    flex-direction:column;

}

}

.services{

    padding:100px 8%;

    background:#f8fbff;

}

.section-title{

    text-align:center;

    max-width:700px;

    margin:auto auto 70px;

}

.section-title span{

    color:#2563eb;

    font-weight:600;

    letter-spacing:2px;

}

.section-title h2{

    font-size:48px;

    margin:15px 0;

    color:#0f172a;

}

.section-title p{

    color:#64748b;

    font-size:18px;

    line-height:1.8;

}

.service-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));

    gap:30px;

}

.service-card{

    background:white;

    padding:40px;

    border-radius:20px;

    transition:.35s;

    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.service-card:hover{

    transform:translateY(-12px);

    box-shadow:0 25px 50px rgba(37,99,235,.15);

}

.icon{

    width:70px;

    height:70px;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#06b6d4);

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:32px;

    color:white;

    margin-bottom:25px;

}

.service-card h3{

    margin-bottom:15px;

    font-size:24px;

    color:#0f172a;

}

.service-card p{

    color:#64748b;

    line-height:1.8;

    margin-bottom:25px;

}

.service-card a{

    color:#2563eb;

    font-weight:600;

    text-decoration:none;

}

.service-card a:hover{

    color:#0ea5e9;

}

/* Projects Section */

.projects{

    padding:100px 8%;

    background:#f8fbff;

}

.project-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(340px,1fr));

    gap:35px;

}

.project-card{

    background:white;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0 20px 40px rgba(0,0,0,.08);

    transition:.4s;

}

.project-card:hover{

    transform:translateY(-12px);

    box-shadow:0 30px 60px rgba(37,99,235,.18);

}

.project-card img{

    width:100%;

    height:240px;

    object-fit:cover;

    transition:.5s;

}

.project-card:hover img{

    transform:scale(1.08);

}

.project-content{

    padding:30px;

}

.project-content h3{

    font-size:26px;

    margin-bottom:15px;

    color:#0f172a;

}

.project-content p{

    color:#64748b;

    line-height:1.8;

    margin-bottom:20px;

}

.tech{

    display:inline-block;
    background:#eff6ff;
    color:#2563eb;
    padding:8px 18px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;

}

/* Contact Section */

/* ==========================
   Contact Section
========================== */

.contact {
    padding: 100px 8%;
    background: linear-gradient(
        -45deg,
        #ffffff,
        #eef4ff,
        #dbeafe,
        #f8fbff
    );
    background-size: 400% 400%;
    animation: bgMove 15s ease infinite;
}

/* Background Animation */

@keyframes bgMove {
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


/* ==========================
   WhatsApp Button
========================== */

.whatsapp-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 14px 28px;
    background: #25D366;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    transition: 0.3s;
}

.whatsapp-btn:hover {
    background: #1EBE5D;
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(37, 211, 102, 0.35);
}


/* ==========================
   Contact Container
========================== */

.contact-container {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 50px;
    margin-top: 60px;
}


/* ==========================
   Contact Information
========================== */

.contact-info a {
    display: inline-block;
    background: #eff6ff;
    color: #2563eb;
    padding: 10px 18px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.35s;
}

.contact-info a:hover {
    background: linear-gradient(
        135deg,
        #2563eb,
        #06b6d4
    );
    color: #fff;
    transform: translateY(-3px);
}

.contact-info h3 {
    font-size: 32px;
    margin-bottom: 30px;
    color: #0f172a;
}


/* ==========================
   Contact Info Boxes
========================== */

.info-box {
    display: flex;
    gap: 18px;
    margin-bottom: 30px;
    align-items: flex-start;
}

.info-box .icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(
        135deg,
        #2563eb,
        #06b6d4
    );
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 24px;
    flex-shrink: 0;
}

.info-box h4 {
    margin-bottom: 6px;
    color: #0f172a;
}

.info-box p {
    color: #64748b;
}


/* ==========================
   Contact Form
========================== */

.contact-form {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
}

.contact-form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 16px;
    border: 1px solid #dbeafe;
    border-radius: 12px;
    font-size: 16px;
    outline: none;
    transition: 0.3s;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #2563eb;
    box-shadow: 0 0 10px rgba(37, 99, 235, 0.15);
}

.contact-form textarea {
    resize: vertical;
}


/* ==========================
   Success Message
========================== */

.success-message {
    padding: 15px 20px;
    margin-bottom: 20px;
    background: #dcfce7;
    color: #166534;
    border-radius: 10px;
    font-weight: 600;
}


/* ==========================
   Responsive Contact
========================== */

@media (max-width: 900px) {

    .contact-container {
        grid-template-columns: 1fr;
    }

    .row {
        grid-template-columns: 1fr;
    }

}


/* ==========================
   Footer
========================== */

.footer {
    background: #0f172a;
    color: #e2e8f0;
    padding: 80px 8% 20px;
}

.footer-container {
    display: grid;
    grid-template-columns: repeat(
        auto-fit,
        minmax(250px, 1fr)
    );
    gap: 50px;
}

.footer-box h2,
.footer-box h3 {
    color: white;
    margin-bottom: 20px;
}

.footer-box p {
    line-height: 1.8;
    color: #cbd5e1;
    margin-bottom: 12px;
}

.footer-box ul {
    list-style: none;
    padding: 0;
}

.footer-box ul li {
    margin-bottom: 12px;
    color: #cbd5e1;
}

.footer-box a {
    color: #cbd5e1;
    text-decoration: none;
    transition: 0.3s;
}

.footer-box a:hover {
    color: #38bdf8;
    padding-left: 5px;
}


/* ==========================
   Social Icons
========================== */

.social-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin: 50px 0 25px;
}

.social-links a {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #1e293b;
    color: white;
    border-radius: 50%;
    text-decoration: none;
    font-size: 22px;
    transition: 0.35s;
}

.social-links a:hover {
    background: linear-gradient(
        135deg,
        #2563eb,
        #06b6d4
    );
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
}


/* ==========================
   Footer Bottom
========================== */

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    text-align: center;
    padding-top: 20px;
    color: #94a3b8;
}
</style>
</body>
</html>