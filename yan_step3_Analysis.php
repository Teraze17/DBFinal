<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading Page</title>
    <link rel="stylesheet" href="loading_yan_s2.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=TheDesiredFont:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->

<div class="loading-container" id="loadingContainer">
        <div class="loading-bar">
            <div class="loading-progress" id="loadingProgress"></div>
        </div>
        <p>LOADING....</p>
    </div>
    <div id="imagesContainer"></div> 
    <script src="loading_yan_s3.js"></script>

</body>
</html>