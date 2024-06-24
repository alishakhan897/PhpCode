<?php
// Assuming session is used for managing JWT token
session_start();

if (isset($_SESSION['jwt_token'])) {
    header('Location: /'); // Redirect to the home page if the user is already logged in
    exit();
}

$email = $password = "";
$showErrMsg = $errMsg = "";
$loggedIn = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $errMsg = "Invalid email or password";
        $showErrMsg = true;
    } else {
        $userDetails = json_encode(['email' => $email, 'password' => $password]);
        $url = "http://localhost:3000/login";

        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => $userDetails,
            ],
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            $errMsg = "An unexpected error occurred. Please try again later.";
            $showErrMsg = true;
        } else {
            $data = json_decode($result, true);

            if (isset($data['verified']) && $data['verified']) {
                $_SESSION['jwt_token'] = $data['jwtToken'];
                $loggedIn = true;
                header('Location: /'); // Redirect to the home page
                exit();
            } else {
                $errMsg = isset($data['error_msg']) ? $data['error_msg'] : 'Invalid credentials';
                $showErrMsg = true;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="path_to/toastify.css">
    <link rel="stylesheet" href="path_to/your_css_file.css">
</head>
<body>
    <div class="login-main-container">
        <div class="login-small-container">
            <?php if ($loggedIn): ?>
                <script>
                    Toastify({
                        text: "Login Successful",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "green",
                        stopOnFocus: true
                    }).showToast();
                </script>
            <?php endif; ?>
            <h1 class="login-heading">Login</h1>
            <div class="form-container">
                <div class="image-container">
                    <img class="image" src="https://res.cloudinary.com/alishakhan987/image/upload/v1709971312/undraw_authentication_re_svpt_qieqsa.svg" alt="login">
                </div>
                <div class="form-small-container2">
                    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="input-container">
                            <label class="label">EMAIL</label>
                            <input class="input2" type="text" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>">
                        </div>

                        <div class="input-container">
                            <label class="label">PASSWORD</label>
                            <input class="input2" type="password" name="password" placeholder="Enter your password" value="<?php echo htmlspecialchars($password); ?>">
                        </div>
                        <button class="button2" type="submit">Submit</button>
                        <?php if ($showErrMsg): ?>
                            <p class="error-msg"><?php echo htmlspecialchars($errMsg); ?></p>
                        <?php endif; ?>
                        <p class="paragraph-login">Don't have an account? <a class="sty-link" href="/register">Signup</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="path_to/toastify.js"></script>
</body>
</html>
