<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Images with Titles</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=TheDesiredFont:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .images-flex-container {
            display: flex; /* Use flexbox layout to arrange items side by side */
            justify-content: center; /* Center the items horizontally */
            align-items: flex-start; /* Align items to the start of the flex container vertically */
            gap: 20px; /* Add some space between the image containers */
        }
        .image-container {
            display: flex; /* Use flexbox layout */
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Align items in the center of the container */
        }
        .image-first {
            width: 900px; /* First image width */
            height: auto; /* Height auto to maintain aspect ratio */
            margin-top: 50px;
        }
        .image-second {
            width: 700px; /* Second image width */
            height: auto; /* Height auto to maintain aspect ratio */
        }
        .image-title {
            text-align: center; /* Center the title text */
            margin-top: 50px;
            margin-bottom: 10px; /* Margin below the title */
        }
        

        
    </style>
</head>
<body>
    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->
    <div class="download-links">
        <h3 style="padding-left: 20px;">Download Files</h3>
        <ul>
            <li><a href="C:/xampp/htdocs/website/ndm_Yan/ccsn_b0.1_p0.01_ndm.txt" download="file1.csv">Download Input: ndm file</a></li>
            <li><a href="C:/xampp/htdocs/website/1224_Yan/Yan_ccsn_coord_label_df_paramSet1224.txt" download="file2.csv">Download Output: coord label</a></li>
            <li><a href="C:/xampp/htdocs/website/1224_Yan/Yan_ccsn_metrics_df_paramSet1224.txt" download="file3.csv">Download Output: ccsn_metrics</a></li>
            <!-- 添加更多文件的下载链接 -->
        </ul>
    </div>

    <div class="images-flex-container">
        <div class="image-container">
            <h2 class="image-title">Cell Type Annotation</h2>
            <img src="1224_Yan/Yan_ccsn_scatter_true_paramSet1224.png" alt="First Image" class="image-first">
        </div>
        <div class="image-container">
            <h2 class="image-title">Louvain Clustering</h2>
            <img src="yanLouvain.png" alt="Second Image" class="image-second">
        </div>
    </div>
</body>
</html>
