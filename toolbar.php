<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Search </title>
    <link rel="stylesheet" href="my_image.css">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=TheDesiredFont:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->

    <h1 class="title-style">
    Search RNA Data to <span class=highlight>Find what You want</span>
    </h1>

    <!-- 將 content-container div 移動到這裡來包裹整個表單和表格 -->
    <div class="content-container">

    <form action="toolbar.php" method="POST">

    <?php
        $type = $_POST['type'] ?? '';
        $read = $_POST['read'] ?? '';
        $celltype = $_POST['celltype'] ?? '';
        $keyword = $_POST['keyword'] ?? ''; 
        // $cmd = shell_exec('python DEG.py');
        // $output  = shell_exec('python DEG.py');
        // echo "<p>$output</p>";

        $servername = "localhost";
        $username = "root"; 
        $password = "898026"; 
        $dbname = "dbfinal"; 


        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        // echo "Connected successfully";

    

    ?>
    
        <!-- toolbar -->
        <p>Type:</p>
        <select name="type" style="width: 200px">
            <!-- <option value="" selected></option> -->
            <option value="Yan" <?php echo ($type == 'Yan') ? 'selected' : ''; ?>>Yan</option>
            <option value="Guo" <?php echo ($type == 'Guo') ? 'selected' : ''; ?>>Guo</option>
            <option value="Kim" <?php echo ($type == 'Kim') ? 'selected' : ''; ?>>Kim</option>
            <option value="LiNormal" <?php echo ($type == 'LiNormal') ? 'selected' : ''; ?>>LiNormal</option>
            <!-- Add other options here -->
        </select>


        <!-- toolbar -->
        <p class="form-element">Read:</p>
        <select name="read" style="width: 200px">
            <!-- <option value="" selected></option> Blank default option -->
            <option value="FPKM">FPKM</option>
            <option value="TPM">TPM</option>
            <option value="count">count</option>
            <option value="category">category</option>
            <!-- Add other options here -->
        </select>


        <!-- toolbar -->
        <p class="form-element">Cell Type:</p>
        <select name="celltype">
            <option value="Octo">Octo</option>
            <option value="Bladder Cell">Bladder Cell</option>
            <option value="Epithelial">Epithelial</option>
            <option value="SSEA4+">SSEA4+</option>
            <!-- Add other options here -->
        </select>

        <!-- text input and submit --> 
        <input type="text" name="keyword" placeholder="Keyword">
        <input type="submit" value="Search">

        <!-- Start Analysis button at the end -->
        <button type="button" id="startAnalysisButton" class="btn btn-start-analysis">Start Analysis</button>
        </form>

        <div id="upload-container">
    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-btn-wrapper">
        Select CSV File to Upload:
        <input type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $raw_keyword = $_POST['keyword'] ?? '';
    $display_keyword = htmlspecialchars($raw_keyword);
    $keyword = "%" . $raw_keyword . "%";
    
    // 根據用戶選擇的搜索類型動態構建 SQL 查詢
    if ($celltype == 'sample_type') {
        // 搜索基於 sample_id
        $query = "(SELECT 'Yan' AS source_table, sample, sample_type FROM Yan_scRNA_category_table WHERE sample_id LIKE ?)
                  UNION
                  (SELECT 'Guo' AS source_table, sample, sample_type FROM Guo_scRNA_category_table WHERE cell_id LIKE ?)
                  UNION
                  (SELECT 'Kim' AS source_table, sample, sample_type FROM Kim_scRNA_category_table WHERE geo_id LIKE ?)
                  UNION
                  (SELECT 'LiNormal' AS source_table, sample, sample_type FROM LiNormal_scRNA_category_table WHERE cell_id LIKE ?)";
    } else {
        // 搜索基於 sample_type
        $query = "(SELECT 'Yan' AS source_table, sample, sample_type FROM Yan_scRNA_category_table WHERE sample_type LIKE ?)
                  UNION
                  (SELECT 'Guo' AS source_table, sample, sample_type FROM Guo_scRNA_category_table WHERE sample_type LIKE ?)
                  UNION
                  (SELECT 'Kim' AS source_table, sample, sample_type FROM Kim_scRNA_category_table WHERE sample_type LIKE ?)
                  UNION
                  (SELECT 'LiNormal' AS source_table, sample, sample_type FROM LiNormal_scRNA_category_table WHERE sample_type LIKE ?)";
    }


    $stmt = $conn->prepare($query);

    // Binding parameters
    $stmt->bind_param('ssss', $keyword, $keyword, $keyword, $keyword);
    // Execute "Searching" Process
    $stmt->execute();
    // Fetch Result
    $result = $stmt->get_result();
    // Display Keywords
    echo "<p>Your search term was: " . $display_keyword . "</p>";
    // Start table
    echo "<table border='1'>";
    echo "<tr><th>Table</th><th>ID</th><th>Data</th></tr>"; 

    // Output Display (as Table)
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['source_table']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sample']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sample_type']) . "</td>";
        echo "</tr>";
    }



  // end the table
  echo "</table>";
    // close it
    $stmt->close();
}



?>
 </div>

        <!-- Include external JavaScript files -->
        <script src="commonFunctions.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- <img src="rankGene.png" alt="graph" class = "my-image"> -->
    <!-- <a href="rankGene.png" download="rankGene.png">Download Image</a> -->

</body>
</html>

