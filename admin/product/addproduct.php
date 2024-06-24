<?php
if (isset($_POST['submit'])) {
    include 'Config.php';

    $product_title = $_POST['title'];
    $product_price = $_POST['price'];
    $product_description = $_POST['description'];
    $product_subtitle = $_POST['subtitle'];
    $product_category = $_POST['category'];
    $image_loc = $_FILES['image']['tmp_name'];
    $image_name = uniqid() . "-" . basename($_FILES['image']['name']);
    $image_des = "Uploadimage/" . $image_name;

    if (move_uploaded_file($image_loc, $image_des)) {
        // Corrected SQL query with proper quotes
        $query = "INSERT INTO tblproduct (title, price, description, image, category, subtitle) 
                  VALUES ('$product_title', '$product_price', '$product_description', '$image_des', '$product_category', '$product_subtitle')";

        // Execute the query and check for errors
        if (mysqli_query($con, $query)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>
