<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philippine Flora</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- header section starts  -->

<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="index.php" class="logo">phlora<span></span></a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#floras">Floras</a>
        <a href="#review">Admins</a>
    </nav>

    <div class="icons">
        <?php
            // Start the session
            session_start();
            // Check if user is logged in
            if (isset($_SESSION['register_id'])) {
                // User is logged in, display their name
                echo "<a href='#'>Welcome, " . $_SESSION['name'] ."</a>";
                echo '<a href="logoutaction.php" class="fas fa-sign-out-alt"></a>';
            } else {
                // User is not logged in, display login link
                echo "<a href='finallogin.php'>Login</a>";
            }
        ?>  
    </div>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Philippine Flora</h3>
        <span>native & endemic  flora </span>
        <p>Flowers are the smile of nature, bringing joy and color to our worlds.</p>
        <a href="#floras" class="btn">See more</a>
    </div>
    
</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> About </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="images/phil.mp4" loop autoplay muted></video>
            <h3>Philippine Flora</h3>
        </div>

        <div class="content">
            <h3>What about us?</h3>
            <p>This website is devoted to the native and endemic flora of the Philippines is appropriate to address the aforementioned issues. To make it simpler for users to find further information on a certain flora.</p>
            <p>This website will gather basic information about flora that can be found on reliable websites and list its sources.</p>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->


<!-- prodcuts section starts  -->

<section class="floras" id="floras">

    <h1 class="heading"> Philippine <span>Floras</span> </h1>

    <div class="box-container">

        <div class="box">
        
            <div class="image">
                <a href="abaca.html">
                <img src="images/abaca .png" alt="">
                </a>
                <div class="icons">
            </div>
            </div>
            <div class="content">
                <h3>Abaca</h3>
                <div class="sci"> Musa textilis</div>
            </div>
        </div>

        <div class="box">
        
            <div class="image">
                <a href="acacia.html">
                <img src="images/spa.png" alt="">
                </a>
                <div class="icons">
                </div>
            </div>
            <div class="content">
                <h3>Philippine Acacia</h3>
                <div class="sci"> Acacia Confusa (Small)</div>
            </div>
        </div>

        <div class="box">
        
            <div class="image">
                <a href="samp.html">
                <img src="images/samp.png" alt="">
                </a>
                <div class="icons">
                </div>
            </div>
            <div class="content">
                <h3>Sampaguita</h3>
                <div class="sci">Jasmine Sambac</div>
            </div>
        </div>

        <div class="box">
        
            <div class="image">
                <a href="niyog.html">
                <img src="images/coco.png" alt="">
                </a>
                <div class="icons">
                </div>
            </div>
            <div class="content">
                <h3>Niyog</h3>
                <div class="sci">Cocos Nucifera</div>
            </div>

        </div>

        
        <div class="box">
        
            <div class="image">
                <a href="lily.html">
                <img src="images/lily.png" alt="">
                </a>
                <div class="icons">
                </div>
            </div>
            <div class="content">
                <h3>Philippine Lily</h3>
                <div class="sci">Lilium Philippinense</div>
            </div>
        </div>

        <div class="box">
        
            <div class="image">
                <a href="wal.html">
                <img src="images/wal.png" alt="">
                </a>
                <div class="icons">
                </div>
            </div>
            <div class="content">
                <h3>Waling Waling</h3>
                <div class="sci">Vanda Sanderiana</div>
            </div>
        </div>


        <section class="list" id= "list">
        <div class = "more"><a href="recordsuser.php" class="btn">see more list</a></div>
        </section>

    </div>

</section>

<!-- prodcuts section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <img src="images/free.png" alt="">
        <div class="info">
            <h3>free</h3>
            <span>unlimited use of website</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/gua.png" alt="">
        <div class="info">
            <h3>100% Guarantee</h3>
            <span>legit informations</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/data.png" alt="">
        <div class="info">
            <h3>data privacy</h3>
            <span>secured personal information</span>
        </div>
    </div>
    
   
</section>

<!-- icons section ends -->

<!-- admin section starts  -->

<section class="review" id="review">

<h1 class="heading"> The <span>Developers</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Third-year Polytechnic University of the Philippines student Owen Elexis F. Anicas is enrolled in the BS 
            Information Technology program. despises coding at first, 
            but it quickly changed into a hobby and, along with a fine cup of coffee or tea, a passion.</p>
        <div class="user">
            <img src="images/ow.jpg" alt="">
            <div class="user-info">
                <h3>Owen Elexis Anicas</h3>
                <span>Back-end Developer</span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
        </div>
        <p>Kristine H. Castillo is a 21 year-old, a third year college student who is currently taking Bachelor 
            of Science in Information Technology at Polytechnic University of the Philippines Sta. Mesa. 
            She recently had a business in selling different types of plants called <a href='https://www.facebook.com/blissofgreen'>“Bliss of Green”</a>. <br> </p>
        <div class="user">
            <img src="images/tin.png" alt="">
            <div class="user-info">
                <h3>Kristine Castillo</h3>
                <span>Front-end Developer</span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
        </div>
        <p>Mariah Beah Paula B. Evangelista is a student taking Bachelor of Science in Information Technology 
            at Polytechnic University of the Philippines. A 20-year-old and is a Gemini. 
            Coding for her is a love-hate relationship since it amazes and frustrates her at the same time.</p>
        <div class="user">
            <img src="images/pau.png" alt="">
            <div class="user-info">
                <h3>Paula Evangelista</h3>
                <span>Front-end Developer</span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Anthony O. Olasiman Jr. is currently a student at Polytechnic University of the Philippines Main 
            Campus taking Bachelor of Science in Information Technology.
             He is turning 21 years old this coming 26 of April, he loves cooking and watching anime series and movies.</p>
        <div class="user">
            <img src="images/ant.png" alt="">
            <div class="user-info">
                <h3>Anthony Olasiman</h3>
                <span>Back-end Developer</span>
            </div>
        </div>
    </div>

    

</div>
    
</section> 


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>contents</h3>
            <h4>home</h4>
            <h4>about</h4>
            <h4>products</h4>
            <h4>admin</h4>
        </div>

        <div class="box">
            <h3>extra contents</h3>
            <h4>log in</h4>
            <h4>register</h4>
        </div>

        <div class="box">
            <h3>locations</h3>
            <h4>Philippines</h4>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <h4>(63+)9499684712</h4>
            <h4>(63+)9486144092</h4>
            <h4>phflora@gmail.com</h4>
            <h4>Manila, Philippines</h4>
        </div>

    </div>

    <div class="credit"> created by <span> group 7 </span> | all rights reserved 2023</div>

</section>

<!-- footer section ends -->


















    
</body>
</html>