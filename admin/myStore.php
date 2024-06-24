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
   
  <div class="forsmalldiv"> 
      <Link to="#"> <i class="fa-solid fa-house small-icons" ></i> </Link>
      <Link to="#"> <i class="fa-solid fa-boxes-packing small-icons"></i> </Link>
      <Link to="#"> <i class="fa-solid fa-cart-shopping small-icons"></i> </Link>
  </div>

  <div class="admin-nav">
     <div>
        <a class="addpostheading" href="product/index.php"> Add Post</a> 
     </div>
     <div>
        <h1 class="addpostheading">Users</h1>
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
    document.addEventListener("DOMContentLoaded", function() {
        var profileBox = document.getElementById('profileBox');
        profileBox.style.display = "none";
    });
</script>

</html>