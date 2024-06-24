<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <!-- Form for adding products -->
    <div class="main-add-div">
        <div class="small-add-div">
            <h2>Enter Your Product Details</h2>
            <form id="product-form">
                <label for="image_url">IMAGE URL</label>
                <input type="text" id="image_url" name="image_url">
                <label for="title">TITLE</label>
                <input type="text" id="title" name="title">
                <label for="description">DESCRIPTION</label>
                <textarea id="description" name="description" rows="4" cols="50"></textarea>
                <label for="subTitle">SUB TITLE</label>
                <input type="text" id="subTitle" name="subTitle">
                <label for="rating">Rating</label>
                <input type="text" id="rating" name="rating">
                <label for="categoryid">Category</label>
                <select id="categoryid" name="categoryid">
                    <?php
                    $categoryOptions = [
                        ['name' => 'Clothing', 'categoryId' => '1'],
                        ['name' => 'Makeup', 'categoryId' => '2'],
                        ['name' => 'Perfumes', 'categoryId' => '3'],
                        ['name' => 'Handbags', 'categoryId' => '4'],
                        ['name' => 'Watches', 'categoryId' => '5'],
                        ['name' => 'Abaya', 'categoryId' => '6'],
                        ['name' => 'Footwear', 'categoryId' => '7'],
                        ['name' => 'Jewellery', 'categoryId' => '8'],
                    ];
                    foreach ($categoryOptions as $category) {
                        echo "<option value='{$category['categoryId']}'>{$category['name']}</option>";
                    }
                    ?>
                </select>
                <label for="availability">AVAILABILITY</label>
                <input type="text" id="availability" name="availability">
                <label for="price">PRICE</label>
                <input type="text" id="price" name="price">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Product details section -->
    <div class="styled-main-div">
        <div class="image-detailed">
            <img class="image-height" id="product-image" src="" alt="">
        </div>
        <div class="detailed-container">
            <h1 id="product-title"></h1>
            <p class="rspara" id="product-price"></p>
            <div class="button-div">
                <button class="button-detailed" id="product-rating"></button>
            </div>
            <p class="des" id="product-description"></p>
            <p class="available-para">
                Available: <span style="color: #616e7c;" id="product-availability"></span>
            </p>
            <hr>
            <div class="bs-design">
                <button id="increment" onclick="increment()">+</button>
                <p id="count">1</p>
                <button id="decrement" onclick="decrement()">-</button>
            </div>
            <button id="add-to-cart" type="button">Add to cart</button>
        </div>
    </div>

    <div class="similiar-product-div">
        <h1>Similar Products</h1>
        <div id="similar-products"></div>
    </div>

    <script>
        document.getElementById('product-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('?', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            if (result.success) {
                alert('Success! Your product has been added.');
                event.target.reset();
            } else {
                alert('Oops! Something went wrong. Please try again later.');
            }
        });

        let count = 1;
        function increment() {
            count++;
            document.getElementById('count').innerText = count;
        }
        function decrement() {
            if (count > 1) {
                count--;
                document.getElementById('count').innerText = count;
            }
        }

        document.getElementById('add-to-cart').addEventListener('click', () => {
            alert('Item added to cart successfully!');
        });

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            $image_url = $_POST['image_url'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $subTitle = $_POST['subTitle'];
            $rating = $_POST['rating'];
            $categoryid = $_POST['categoryid'];
            $availability = $_POST['availability'];
            $price = $_POST['price'];

            $host = 'your_host';
            $db = 'your_database';
            $user = 'your_user';
            $pass = 'your_password';

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
                $stmt = $pdo->prepare('INSERT INTO products (image_url, title, description, subTitle, rating, categoryid, availability, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([$image_url, $title, $description, $subTitle, $rating, $categoryid, $availability, $price]);
                echo json_encode(['success' => true]);
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
            exit;
        }

        if (isset($_GET['id'])) {
            $host = 'your_host';
            $db = 'your_database';
            $user = 'your_user';
            $pass = 'your_password';

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
                $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
                $stmt->execute([$_GET['id']]);
                $product = $stmt->fetch();
                $stmt = $pdo->prepare('SELECT * FROM products WHERE categoryid = ? AND id != ? LIMIT 4');
                $stmt->execute([$product['categoryid'], $product['id']]);
                $similarProducts = $stmt->fetchAll();
                ?>
                document.getElementById('product-image').src = "<?= $product['image_url'] ?>";
                document.getElementById('product-title').innerText = "<?= $product['title'] ?>";
                document.getElementById('product-price').innerText = "Rs <?= $product['price'] ?>/-";
                document.getElementById('product-rating').innerText = "<?= $product['rating'] ?>";
                document.getElementById('product-description').innerText = "<?= $product['description'] ?>";
                document.getElementById('product-availability').innerText = "<?= $product['availability'] ?>";

                const similarProductsDiv = document.getElementById('similar-products');
                <?php foreach ($similarProducts as $similar): ?>
                const similarProductDiv = document.createElement('div');
                similarProductDiv.classList.add('image-detailed2');
                const similarProductImg = document.createElement('img');
                similarProductImg.classList.add('image-height2');
                similarProductImg.src = "<?= $similar['image_url'] ?>";
                similarProductImg.onclick = () => location.href = 'product_details.php?id=<?= $similar['id'] ?>';
                similarProductDiv.appendChild(similarProductImg);
                similarProductsDiv.appendChild(similarProductDiv);
                <?php endforeach; ?>
                <?php
            } catch (PDOException $e) {
                echo 'Database error: ' . $e->getMessage();
                exit;
            }
        }
        ?>
    </script>
</body>
</html>
