<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/09be3d2535.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="Navitem">
        <div class="ImageDiv">
            <img class="Image"
                src="https://res.cloudinary.com/alishakhan987/image/upload/v1710012345/enhanced-image__18_-removebg-preview_uqvkms.png" />
        </div>
        <div class="Navdiv">
            <ul class="Unorder">
                <li>Home</li>
                <li>Product</li>
                <li>Cart</li>
            </ul>
        </div>
        <div class="LogoutProfileDiv">
            <button class="ButtonStyled">
                Logout
                <div class="Icon">
                    <svg class="Svg" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </button>
            <div>
                <i class="fa-solid fa-user IconStyle" onclick="toggleProfileBox()"></i>

            </div>
            <div>
                <button class="ButtonSmall">
                    <i class="fa-solid fa-right-from-bracket IconStyle"></i>
                </button>
            </div>
        </div>
        <div id="profileBox" class="ProfileSubDiv ">
            <div class="UserProfileDiv">
                <i class="fa-solid fa-user icon-white"></i>
                <h1 class="userheading">usernsme</h1>
            </div>
            <div class="UserProfileDiv">
                <i class="fa-solid fa-envelope icon-white"></i>
                <h1 class="userheading">Email</h1>
            </div>
            <div class="UserProfileDiv">
                <i class="fa-solid fa-user-tie icon-white"></i>
                <h1 class="userheading">Admin Panel</h1>
            </div>
            <div class="UserProfileDiv">
                <i class="fa-solid fa-user-pen icon-white"></i>
                <h1 class="userheading">Edit Profile</h1>
            </div>
        </div>
    </nav>
    <div class="home-container">
        <div class="home-container2">
            <h1>TREND ALERT!!</h1>
            <p>Discover the latest trends that resonate with your personality. Whether it's bold prints, classic
                monochromes, or a fusion of both, find your signature look that speaks volumes
                without saying a word</p>
        </div>
    </div>
    <div class="collection">
        <h1>Our Collection </h1>
        <div class="collection-small-card">
            <?php foreach ($products as $each): ?>
                <div class="card-container" key="<?php echo $each['id']; ?>">
                    <img class="card-image" src="<?php echo $each['imageUrl']; ?>" alt="product">
                    <div class="card-content">
                        <p class="heading"><?php echo htmlspecialchars($each['title']); ?></p>
                        <p class="para"><?php echo htmlspecialchars($each['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="second-collection">
        <div class="second-collection2">
            <div class="make-center">
                <h1>Elegance is the only beauty that never fades</h1>
                <p>Elegance is the timeless essence that transcends the fleeting trends of fashion, embodying a beauty
                    that endures through the ages. It is a quality that speaks to the refinement and sophistication
                    inherent in simplicity. Much like a classic piece of art, elegance is never bound by the constraints
                    of passing fads; instead, it stands as a testament to enduring allure</p>
            </div>
        </div>
    </div>
    <div class="why-choose-us-main">
        <h1 class="why-choose-heading">Why Choose Us?</h1>
        <div class="why-choose-small-container">
            <div class="div1">
                <div class="div1-shopping">
                    <div class="icon-background">
                        <img src="path/to/shopping-bag-icon.png" alt="Shopping Bag Icon" class="icon" />
                    </div>
                    <div class="title-div">
                        <p class="icon-para1">Personalized Shopping Experience</p>
                        <p class="icon-para2">We understand that every fashion journey is unique. Our user-friendly
                            interface and personalized
                            recommendations make your shopping experience seamless, enjoyable, and tailored to your
                            preferences</p>
                    </div>
                </div>
                <div class="div1-shopping">
                    <div class="icon-background">
                        <img src="path/to/collections-icon.png" alt="Collections Icon" class="icon" />
                    </div>
                    <div class="title-div">
                        <p class="icon-para1">Discover exclusive pieces available</p>
                        <p class="icon-para2">Our limited-edition collections are carefully curated to bring you
                            distinctive and one-of-a-kind
                            fashion that sets you apart from the crowd fashion that sets you apart from the crowd.</p>
                    </div>
                </div>
            </div>
            <div class="div2">
                <div class="logo-div">
                    <img src="https://res.cloudinary.com/alishakhan987/image/upload/v1710012345/enhanced-image__18_-removebg-preview_uqvkms.png"
                        alt="logo" class="logo-image" />
                </div>
            </div>
            <div class="div1">
                <div class="div1-shopping">
                    <div class="icon-background">
                        <img src="path/to/tick-icon.png" alt="Tick Icon" class="icon" />
                    </div>
                    <div class="title-div">
                        <p class="icon-para1">Unrivaled Quality</p>
                        <p class="icon-para2">Our commitment to excellence is woven into every fabric we offer.
                            Impeccable craftsmanship and attention to detail ensure
                            that each piece you choose from Glamour Groove is a testament to enduring quality</p>
                    </div>
                </div>
                <div class="div1-shopping">
                    <div class="icon-background">
                        <img src="path/to/trend-icon.png" alt="Trend Icon" class="icon" />
                    </div>
                    <div class="title-div">
                        <p class="icon-para1">Trendsetting Designs</p>
                        <p class="icon-para2">Stay ahead of the curve with our fashion-forward designs.
                            From timeless classics to the latest trends, our curated collections cater to diverse
                            tastes,
                            ensuring you'll find something that resonates with your unique style.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-page-main">
        <div class="landing-page-div">
            <div class="contact-us-div">
                <h1 class="contact-heading">Contact Us</h1>
                <form class="contact-form" onsubmit="return contactFormSubmit(event)">
                    <div class="put-label-form">
                        <label class="label-form" for="Name">Name</label>
                        <input class="input-form" type="text" id="Name" placeholder="Enter Your Name"
                            onchange="nameField(event)" />
                    </div>
                    <div class="put-label-form">
                        <label class="label-form" for="Email">Email</label>
                        <input class="input-form" type="text" id="Email" placeholder="Enter Your Email"
                            onchange="emailField(event)" />
                    </div>
                    <div class="put-label-form">
                        <label class="label-form" for="Description">Description</label>
                        <textarea class="description-div" id="Description" rows="4" cols="50"
                            placeholder="Enter Your Message" onchange="descriptionField(event)"></textarea>
                    </div>
                    <div class="put-label-form">
                        <button class="contact-submit-button" type="submit">Submit</button>
                        <div id="toast-container"></div>
                    </div>
                    <p class="err-text" id="error-message"></p>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-section">
        <div class="footer-small-div">
            <button class="button-footer">
                <span class="span">
                    <a href="https://github.com/alishakhan897" target="_blank" rel="noopener noreferrer">
                        <svg fill="white" height="1.8em" width="30" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.37 0 0 5.37 0 12a12 12 0 008.19 11.44c.6.11.82-.26.82-.58v-2.1c-3.34.73-4.04-1.62-4.04-1.62-.55-1.42-1.34-1.8-1.34-1.8-1.09-.75.08-.74.08-.74 1.2.09 1.83 1.24 1.83 1.24 1.07 1.84 2.82 1.31 3.51 1 .1-.78.42-1.31.76-1.61-2.67-.3-5.47-1.33-5.47-5.92 0-1.31.47-2.39 1.24-3.23-.13-.3-.54-1.51.12-3.15 0 0 1-.32 3.3 1.24a11.5 11.5 0 016 0c2.31-1.56 3.3-1.24 3.3-1.24.66 1.64.25 2.85.12 3.15.77.84 1.24 1.92 1.24 3.23 0 4.6-2.8 5.61-5.47 5.91.43.37.81 1.1.81 2.23v3.29c0 .32.22.7.83.58A12 12 0 0024 12c0-6.63-5.37-12-12-12z" />
                        </svg>
                    </a>
                </span>
                <span class="bg"></span>
            </button>
            <button class="button-footer">
                <span class="span">
                    <a href="https://www.linkedin.com/in/miss-alisha-khan-/" target="_blank" rel="noopener noreferrer">
                        <svg fill="white" height="1.8em" width="30" viewBox="0 0 24 24">
                            <path
                                d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm3.72 4.33c-.854 0-1.52.49-1.772 1.14h-.028v-1.1H10v7.5h4.428V8.94c0-.792.144-1.562 1.076-1.562.91 0 .932.85.932 1.622v4.93H20V8.5c0-2.38-.686-4.17-3.28-4.17zM7.758 9.53V16h-4.43V9.53h4.43zM4.536 4c-1.44 0-2.36.93-2.36 2.15C2.176 7.48 3.08 8.4 4.53 8.4c1.45 0 2.36-.92 2.36-2.25C6.886 4.95 6 4 4.536 4z" />
                        </svg>
                    </a>
                </span>
                <span class="bg"></span>
            </button>
            <button class="button-footer">
                <span class="span">
                    <a href="https://www.linkedin.com/in/miss-alisha-khan-/" target="_blank" rel="noopener noreferrer">
                        <svg fill="white" height="1.8em" width="30" viewBox="0 0 24 24">
                            <path
                                d="M23.994 24v-7.385c0-3.536-1.043-5.949-4.601-5.949-2.126 0-3.421 1.163-3.994 2.234h-.056V9.16H10.11c.056 1.46 0 15.839 0 15.839h5.236v-8.847c0-.472.034-.945.17-1.28.373-.945 1.225-1.925 2.656-1.925 1.875 0 2.63 1.451 2.63 3.577V24H24zM2.38 7.951h5.285V24H2.38V7.951zm2.643-5.973c1.822 0 3.294 1.472 3.294 3.295s-1.472 3.295-3.294 3.295C3.2 8.568 1.727 7.096 1.727 5.273S3.2 1.978 5.023 1.978zm17.62 19.697H17.36v-6.67c0-1.497-.536-2.521-1.877-2.521-1.02 0-1.626.68-1.895 1.34-.098.244-.12.584-.12.924v6.927H7.987V9.53h5.095v1.981c.716-1.108 1.998-2.685 4.857-2.685 3.54 0 6.184 2.31 6.184 7.29V24h-.001z" />
                        </svg>
                    </a>
                </span>
                <span class="bg"></span>
            </button>
        </div>
    </div>
    <div class="last-page">
        <div class="second-last-page">
            <div class="copyright-container">
                CopyRight | <span style="font-size: 1.2em;">©</span>2024 Designed by Alisha Khan
            </div>
        </div>
    </div>
</body>
<script>
    function toggleProfileBox() {
        var profileBox = document.getElementById('profileBox');
        console.log("Current display:", profileBox.style.display); // Debug line
        if (profileBox.style.display === "none" || profileBox.style.display === "") {
            profileBox.style.display = "block";
        } else {
            profileBox.style.display = "none";
        }
        console.log("New display:", profileBox.style.display); // Debug line
    }

    // Ensure it's hidden on page load
    document.addEventListener("DOMContentLoaded", function () {
        var profileBox = document.getElementById('profileBox');
        profileBox.style.display = "none";
    });

    let name = '';
    let email = '';
    let message = '';
    let showErr = false;
    let err = '';

    function contactFormSubmit(event) {
        event.preventDefault();
        if (name === '' || email === '' || message === '') {
            showErr = true;
            err = 'Please fill out all fields';
            document.getElementById('error-message').textContent = err;
        } else {
            showErr = false;
            err = '';
            document.getElementById('error-message').textContent = '';
            // Add form submission logic here, such as sending data to a server
            alert('Form submitted successfully!');
        }
    }

    function nameField(event) {
        name = event.target.value;
    }

    function emailField(event) {
        email = event.target.value;
    }

    function descriptionField(event) {
        message = event.target.value;
    }

</script>

</html>