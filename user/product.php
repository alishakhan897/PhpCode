<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
  
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchProducts();

            document.getElementById('search-button').addEventListener('click', () => {
                const search = document.getElementById('search-input').value;
                fetchProducts(search);
            });

            document.querySelectorAll('.category-icon').forEach(icon => {
                icon.addEventListener('click', (event) => {
                    const categoryid = event.currentTarget.dataset.categoryid;
                    fetchProducts('', categoryid);
                });
            });
        });

        async function fetchProducts(search = '', categoryid = '') {
            const response = await fetch(`fetch_products.php?subTitle=${search}&categoryid=${categoryid}`);
            const products = await response.json();
            const productContainer = document.getElementById('product-container');
            productContainer.innerHTML = '';

            if (products.length > 0) {
                products.forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.className = 'product';
                    productDiv.innerHTML = `
                        <h3>${product.title}</h3>
                        <img src="${product.image_url}" alt="${product.title}">
                        <p>${product.subTitle}</p>
                    `;
                    productContainer.appendChild(productDiv);
                });
            } else {
                productContainer.innerHTML = `
                    <div class="empty">
                        <div class="small-empty-div">
                            <img src="https://res.cloudinary.com/alishakhan987/image/upload/v1710346940/undraw_empty_re_opql_shefvw.svg" alt="No Result">
                            <p class="no-result">No Result Found</p>
                            <button onclick="fetchProducts()">Continue Shopping</button>
                        </div>
                    </div>
                `;
            }
        }
    </script>
</head>
<body>
    <?php
    // Navbar PHP code
    echo '<nav>';
    // Add your navbar HTML here
    echo '</nav>';
    ?>

    <div class="product-main-div">
        <div class="category-div">
            <?php
            // Category options PHP code
            $categoryOptions = [
                ['name' => 'Clothing', 'categoryId' => '1', 'icon' => 'fas fa-tshirt'],
                ['name' => 'Makeup', 'categoryId' => '2', 'icon' => 'fas fa-lipstick'],
                ['name' => 'Perfumes', 'categoryId' => '3', 'icon' => 'fas fa-perfume'],
                ['name' => 'Handbags', 'categoryId' => '4', 'icon' => 'fas fa-shopping-bag'],
                ['name' => 'Watches', 'categoryId' => '5', 'icon' => 'fas fa-watch'],
                ['name' => 'Abaya', 'categoryId' => '6', 'icon' => 'fas fa-cloak'],
                ['name' => 'Footwear', 'categoryId' => '7', 'icon' => 'fas fa-shoe-prints'],
                ['name' => 'Jewellery', 'categoryId' => '8', 'icon' => 'fas fa-gem'],
            ];

            foreach ($categoryOptions as $category) {
                echo "<div class='category-icon' data-categoryid='{$category['categoryId']}'>
                        <i class='{$category['icon']}' style='color: #bf7a7f; font-size: 30px;'></i>
                        <p>{$category['name']}</p>
                      </div>";
            }
            ?>
        </div>

        <div class="product-section">
            <div class="search-div">
                <input id="search-input" type="text" placeholder="Search">
                <button id="search-button"><i class="fas fa-search"></i></button>
            </div>
            <div id="product-container" class="product-ul"></div>
        </div>
    </div>
</body>
</html>
