<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading Page</title>
    <link rel="stylesheet" href="loading.css">
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
    <div class="download-links">
        <h3>Download Files</h3>
        <ul>
            <li><a href="C:/xampp/htdocs/website/ndm_Yan/ccsn_b0.1_p0.01_ndm.txt" download="file1.csv">Download File 1</a></li>
            <li><a href="path_to_your_file/file2.csv" download="file2.csv">Download File 2</a></li>
            <li><a href="path_to_your_file/file3.csv" download="file3.csv">Download File 3</a></li>
            <!-- 添加更多文件的下载链接 -->
        </ul>
    </div>
    <div class="loading-container" id="loadingContainer">
        <div class="loading-bar">
            <div class="loading-progress" id="loadingProgress"></div>
        </div>
        <p>LOADING....</p>
    </div>
    <div id="imagesContainer"></div> 

    <!-- 將您的 JavaScript 代碼放在這裡 -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var loadingProgress = document.getElementById('loadingProgress');
            // If there's a loading progress bar, listen for the end of its animation
            if (loadingProgress) {
                loadingProgress.addEventListener('animationend', function() {
                    hideLoadingElements();
                    createAndShowButton();
                });
            }
        });

        function displayImages() {
    var imagesContainer = document.getElementById('imagesContainer');
    // 確保 imagesContainer 使用 Flexbox 並且圖片並排
    imagesContainer.style.display = 'flex';
    imagesContainer.style.justifyContent = 'center'; // 水平居中
    imagesContainer.style.alignItems = 'center'; // 垂直居中
    imagesContainer.style.flexWrap = 'wrap'; // 如果需要，允許換行

    imagesContainer.innerHTML = `
        <div class="image-wrapper" style="margin-right: 20px;"> <!-- 添加間隔 -->
            <h2>Yan Louvain Clustering</h2> <!-- 第一張圖的標題 -->
            <img src="yanLouvain.png" alt="Yan Louvain Clustering" class="image-size1">
            <a href="yanLouvain.png" download="yanLouvain.png" class="download-button">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
        <div class="image-wrapper" style="margin-right: 20px;"> <!-- 添加間隔 -->
            <h2>Yan Rank Gene Analysis</h2> <!-- 第二張圖的標題 -->
            <img src="yanRankGene.png" alt="Yan Rank Gene Analysis" class="image-size2">
            <a href="yanRankGene.png" download="yanRankGene.png" class="download-button">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
        <div class="image-wrapper"> <!-- 新增的第三張圖 -->
            <h2>Yan Third Image Title</h2> <!-- 第三張圖的標題 -->
            <img src="path_to_third_image.png" alt="Third Image" class="image-size3"> <!-- 替換路徑 -->
            <a href="path_to_third_image.png" download="path_to_third_image.png" class="download-button">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    `;
}



        function hideLoadingElements() {
            var loadingContainer = document.querySelector('.loading-container');
            if (loadingContainer) {
                loadingContainer.classList.add('hidden');
            }
            displayImages();
        }

        function createAndShowButton() {
            var button = document.createElement('button');
            button.id = 'myButton';
            button.textContent = '>> Step 2 Real Clustering Analysis';

            document.body.appendChild(button);

            button.addEventListener('click', function() {
                window.location.href = 'yan_step2_Analysis.php';
            });
        }
    </script>
</body>
</html>
