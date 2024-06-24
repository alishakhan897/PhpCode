<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Include any necessary CSS libraries here -->
    <link rel="stylesheet" href="https://unpkg.com/primereact/resources/themes/saga-blue/theme.css" />
    <link rel="stylesheet" href="https://unpkg.com/primereact/resources/primereact.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/primeicons/primeicons.css" />
</head>
<body>
    <nav>
        <!-- Add your navbar HTML here -->
    </nav>

    <?php
    // Handle the uploaded image and save it to the server or database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            // Verify MIME type
            if (in_array($filetype, $allowed)) {
                // Check whether file exists before uploading it
                if (file_exists("upload/" . $filename)) {
                    echo $filename . " already exists.";
                } else {
                    move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $filename);
                    echo "Your file was uploaded successfully.";
                }
            } else {
                echo "Error: There was a problem uploading your file. Please try again.";
            }
        } else {
            echo "Error: " . $_FILES["image"]["error"];
        }
    }
    ?>

    <div id="mainEditImage">
        <form action="edit_profile.php" method="post" enctype="multipart/form-data">
            <label for="fileInput">
                <div id="cameraDiv">
                    <img id="imageDivCamera" src="" alt="Selected" style="display: none;" />
                    <i class="pi pi-camera" style="font-size: 30px; color: white;"></i>
                </div>
            </label>
            
            <input type="file" id="fileInput" name="image" style="display: none;" onchange="handleNewImage(event)">
            
            <button type="button" onclick="handleShowClick()">Show</button>
            
            <div id="dialog" class="p-dialog" style="display: none;">
                <div class="p-dialog-header">
                    <span>Header</span>
                    <button type="button" class="p-dialog-header-icon p-dialog-header-close" onclick="hideDialog()">X</button>
                </div>
                <div class="p-dialog-content">
                    <canvas id="avatarEditorCanvas" width="250" height="250"></canvas>
                    <div>
                        <input type="range" id="scaleRange" min="1" max="2" step="0.01" oninput="handleScaleChange(event)">
                        <input type="range" id="rotateRange" min="0" max="360" step="1" oninput="handleRotateChange(event)">
                    </div>
                    <button type="button" onclick="onClickSave()">Save</button>
                </div>
            </div>
            <button type="submit">Upload</button>
        </form>
    </div>

    <script src="https://unpkg.com/primereact/core/core.min.js"></script>
    <script src="https://unpkg.com/primereact/dialog/dialog.min.js"></script>
    <script src="https://unpkg.com/react-avatar-editor/dist/react-avatar-editor.min.js"></script>
    <script>
        // JavaScript for handling image preview, scaling, rotation, and saving

        function handleNewImage(event) {
            const selectedFile = event.target.files[0];
            const imageURL = URL.createObjectURL(selectedFile);
            document.getElementById('imageDivCamera').src = imageURL;
            document.getElementById('imageDivCamera').style.display = 'block';
            document.getElementById('dialog').style.display = 'block';
        }

        function handleScaleChange(event) {
            const scale = event.target.value;
            const canvas = document.getElementById('avatarEditorCanvas');
            // Implement scale change functionality for canvas
        }

        function handleRotateChange(event) {
            const rotate = event.target.value;
            const canvas = document.getElementById('avatarEditorCanvas');
            // Implement rotate change functionality for canvas
        }

        function onClickSave() {
            const canvas = document.getElementById('avatarEditorCanvas');
            const imageURL = canvas.toDataURL();
            document.getElementById('imageDivCamera').src = imageURL;
            document.getElementById('dialog').style.display = 'none';
        }

        function handleShowClick() {
            document.getElementById('fileInput').click(); // Trigger file selection
        }

        function hideDialog() {
            document.getElementById('dialog').style.display = 'none';
        }
    </script>
</body>
</html>
