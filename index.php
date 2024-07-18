<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <header>
        <h1>My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
				<li><a href="#gallery">Gallery</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#resume">Resume</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="adminlogin.html">Admin Login</a></li>
            </ul>
        </nav>
    </header>

    <section id="about">
        <h2>About Me</h2>
        <p>Welcome to my portfolio!</p>
        <p>As an experienced IT professional, I specialize in software development, network security, and data analysis, with proficiency in Java, Python, and SQL. I hold a CCNA certification and have been recognized for my excellence in project management and innovative problem-solving. My commitment to continuous learning, collaborative teamwork, and effective communication underscores my passion for leveraging technology to drive business success.</p>
    </section>

    <!-- Swiper -->
    <section id="gallery">
        <h2>Gallery</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/slider1.jpg" alt="Slide 1"></div>
                <div class="swiper-slide"><img src="img/slider2.png" alt="Slide 2"></div>
                <div class="swiper-slide"><img src="img/slider3.png" alt="Slide 3"></div>
                <div class="swiper-slide"><img src="img/slider4.jpg" alt="Slide 3"></div>
            </div>
            
            <div class="swiper-pagination"></div>
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section id="projects">
        <h2>Projects</h2>
        <?php
           
            $servername = "localhost"; 
            $username = "Danial"; 
            $password = "danial01"; 
            $dbname = "my_portfolio"; 

         
            $conn = new mysqli($servername, $username, $password, $dbname);

           
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           
            $sql = "SELECT * FROM projects";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='project'>";
                    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No projects found.";
            }

            
            $conn->close();
        ?>
    </section>
    
    <section id="resume">
        <h2>My Resume</h2>
        <p>Want to know more? Download my resume to find out</p>
        <a href="resume/resume.pdf" download="resume.pdf">
            <button type="button">Download Resume</button>
        </a>
    </section>

    <section id="contact">
        <h2>Contact</h2>
        <p>Feel free to reach out to me at <a href="mailto:danialmuhd589@gmail.com">danialmuhd589@gmail.com</a>.</p>
        <p>Call me: 011-39349935</p>
    </section>

    <footer>
        <p>&copy; 2024 Muhammad Danial Bin Rosli. All rights reserved.</p>
    </footer>

   
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
           pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>
