<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/09be3d2535.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css"> <!-- Correct path to style.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<>
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
                <i class="fa-solid fa-user IconStyle" onclick="toggleProfileBox()"> </i>
            </div>
            <div>
                <button class="ButtonSmall">
                    <i class="fa-solid fa-right-from-bracket IconStyle"></i>
                </button>
            </div>
        </div>
        <div id="profileBox" class="ProfileSubDiv">
            <div class="UserProfileDiv">
                <i class="fa-solid fa-user icon-white"></i>
                <h1 class="userheading">username</h1>
            </div>
            <div class="UserProfileDiv">
                <i class="fa-solid fa-envelope icon-white"></i>
                <h1 class="userheading">Email</h1>
            </div>
           
            <div class="UserProfileDiv">
                <i class="fa-solid fa-user-pen icon-white"></i>
                <h1 class="userheading">Edit Profile</h1>
            </div>
        </div>
    </nav>

    <div class="forsmalldiv">
        <a href="#"><i class="fa-solid fa-house small-icons"></i></a>
        <a href="#"><i class="fa-solid fa-boxes-packing small-icons"></i></a>
        <a href="#"><i class="fa-solid fa-cart-shopping small-icons"></i></a>
    </div>
    <div class="admin-nav">

        <a class="addpostheading" href="product/index.php"> Fill Details In the Given Form</a>

    </div>
    <div class="form-container1">
        <form class="form-container" action="addproduct.php" method="POST" enctype="multipart/form-data">
            <label class="label-content" htmlFor="image">IMAGE URL</label>
            <input type="file" class="input-field" id="image" name="image" />
            <label class="label-content" htmlFor="title">TITLE</label>
            <input type="text" class="input-field" id="title" name="title" />
            <label class="label-content" htmlFor="title">PRICE</label>
            <input type="text" class="input-field" id="title" name="price" />
            <label class="label-content" htmlFor="description">DESCRIPTION</label>
            <textarea type="text" class="input-field" id="description" rows="4" cols="50"
                name="description"> </textarea>
            <label class="label-content" htmlFor="subtitle">SUB TITLE</label>
            <input type="text" class="input-field" id="subtitle" name="subtitle" />
            <label class="label-content" htmlFor="category">CATEGORY</label>
            <select class="input-field" id="category" name="category">
                <option value="1">
                    Clothing
                </option>
                <option value="2">
                    Perfumes
                </option>
                <option value="3">
                    Makeup
                </option>
                <option value="4">
                    Handbags
                </option>
                <option value="5">
                    Watches
                </option>
                <option value="6">
                    Abaya
                </option>
                <option value="7">
                    Footwear
                </option>
                <option value="8">
                    Jewellery
                </option>
            </select>
            <button class="postbutton" name="submit" form-control>
                UPLOAD
            </button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto mt-4"> 
    <table class="table">
        <thead class="table-light">
            <th>Id</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>SubTitle</th>
            <th>Category</th>
            <th>Update</th>
            <th>Delete</th>

        </thead>

        <tbody>
            <?php
            include 'Config.php';
            $Record = mysqli_query($con, 'SELECT * FROM `tblproduct` ');


            while ($row = mysqli_fetch_array($Record)) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                    <td><img src='{$row['image']}' alt='Product Image' width='100px' height:'78px'></td>
                    <td>{$row['subtitle']}</td>
                    <td>{$row['category']}</td>
                    <td><a href='update.php?id={$row['id']}'>Update</a></td>
                    <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                </tr>
                ";
            }
            ?>

        </tbody>
    </table>
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
</script>


</html>