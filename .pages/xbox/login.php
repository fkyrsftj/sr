<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIDENTIAL AND PRIVATE</title>
    <link rel="stylesheet" href="./login_files/all.min.css">
    <link href="./login_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./login_files/tooplate-wave-cafe.css">
    <style>
        /* CSS styles */

        /* Add your custom styles here */
    </style>
</head>
<body>
<div class="tm-container">
    <div class="tm-row">
        <!-- Site Header -->
    </div>
    <footer class="tm-site-footer">
        <form action="login.php" method="POST" id="contact-form">
            <div class="tm-form-group">
                <br><br><br><br><br><br><br><br>
                <input type="password" name="password" class="tm-form-control" placeholder="" required="">
            </div>
            <div class="tm-form-group tm-mb-30">
            </div>
            <div>
                <button type="submit" class="tm-btn-primary tm-align-right">
                    <img width="60%" src="./login_files/better-grade.png">
                </button>
            </div>
        </form>
    </footer>
</div>

<!-- Background video -->
<div class="tm-video-wrapper">
    <i id="" class="fas fa-pause"></i>
    <video autoplay="" muted="" loop="" id="tm-video" style="width: 1500.44px; height: 844px;">
        <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
    </video>
</div>

<script src="./login_files/jquery-3.4.1.min.js.download"></script>
<script>
    $(document).ready(function () {
        // Check the entered password when the form is submitted
        $("#contact-form").submit(function (event) {
            event.preventDefault(); // Prevent the form from submitting

            var password = $("input[name='password']").val(); // Get the entered password

            // Check the password and redirect to the appropriate page
            if (password === "Allmine2") {
                window.location.href = "main.html";
            } else if (password === "Covid-19") {
                window.location.href = "main.html";
            } else {
                alert("Invalid password. Please try again.");
            }
        });
    });
</script>

</body>
</html>
