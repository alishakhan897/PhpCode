<?php
session_start();
include 'path_to/your_database_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        $errors['msg'] = 'All fields are required*';
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $username)) {
        $errors['name'] = 'Name should contain only alphabets*';
    }

    if (!preg_match("/^([a-zA-Z0-9._-]+)@(gmail\.com|[^@]+\.net)$/", $email)) {
        $errors['email'] = 'Invalid email address (e.g., user@gmail.com or user@example.net)';
    }

    if (!preg_match("/(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/", $password)) {
        $errors['password'] = 'Password must contain at least one letter, one number, and one special character.';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "Registration successful. Please verify your email.";
        } else {
            if ($conn->errno == 1062) { // Duplicate entry
                $errors['msg'] = 'Email already exists. Please use a different email address.';
            } else {
                $errors['msg'] = 'An error occurred. Please try again later.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="path_to/toastify.css">
   
</head>
<body>
    <?php if (isset($_SESSION['jwt_token'])): ?>
        <script>
            window.location.href = '/';
        </script>
    <?php endif; ?>

    <div class="main-div">
        <div class="main-container">
            <fieldset>
                <legend>Sign Up for Exclusive Fashion Updates!</legend>
                <div class="form-container">
                    <div class="image-container">
                        <img src="https://res.cloudinary.com/alishakhan987/image/upload/v1709921932/undraw_mobile_content_xvgr_zjmmwr.svg" alt="register">
                    </div>
                    <div class="form-main-div">
                        <form method="post" action="">
                            <div class="small-container2">
                                <label>NAME</label>
                                <input type="text" name="username" value="<?= htmlspecialchars($username ?? '') ?>" placeholder="Enter Your Name">
                                <?php if (isset($errors['name'])): ?>
                                    <p style="color: red;"><?= htmlspecialchars($errors['name']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="small-container2">
                                <label>EMAIL</label>
                                <input type="text" name="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="Enter Your Email">
                                <?php if (isset($errors['email'])): ?>
                                    <p style="color: red;"><?= htmlspecialchars($errors['email']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="small-container2">
                                <label>PASSWORD</label>
                                <div class="small-container3">
                                    <input type="password" name="password" value="<?= htmlspecialchars($password ?? '') ?>" placeholder="Enter Your Password">
                                    <button type="button" onclick="togglePasswordVisibility()">
                                        <i id="eye-icon" class="fa fa-eye-slash"></i>
                                    </button>
                                </div>
                                <?php if (isset($errors['password'])): ?>
                                    <p style="color: red;"><?= htmlspecialchars($errors['password']) ?></p>
                                <?php endif; ?>
                            </div>
                            <button type="submit">Submit</button>
                            <?php if (isset($errors['msg'])): ?>
                                <p style="color: red;"><?= htmlspecialchars($errors['msg']) ?></p>
                            <?php endif; ?>

                            <p>ALREADY HAVE AN ACCOUNT? <a href="/login">Login</a></p>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.querySelector('[name="password"]');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.className = "fa fa-eye";
            } else {
                passwordField.type = "password";
                eyeIcon.className = "fa fa-eye-slash";
            }
        }
    </script>
    <script src="path_to/toastify.js"></script>
    <script>
        <?php if (isset($_SESSION['msg'])): ?>
            Toastify({
                text: "<?= $_SESSION['msg'] ?>",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#4CAF50"
            }).showToast();
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
