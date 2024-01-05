<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Start Analysis</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="analysis.css"> 
    <link href="https://fonts.googleapis.com/css2?family=TheDesiredFont:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->
    <h1>LiNormal Analysis</h1>
    <div class="analysis-buttons">
        <button type="button" onclick="location.href='yan_step1_Analysis.php';">Step 1 Differential Gene </button>
        <div id="imagesContainer"></div>
        <button type="button" onclick="location.href='yan_step2_Analysis.php';">Step 2 Real Clustering Analysis</button>
        <button type="button" onclick="location.href='yan_step3_Analysis.php';">Step 3 Cluster based on Network</button>
        <button type="button" onclick="location.href='yan_step4_Analysis.php';">Step 4 Sankey Plot</button>
    </div>

</body>
</html>