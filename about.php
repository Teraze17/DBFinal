<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Summary of the Data </title>
    <link rel="stylesheet" href="my_image.css">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=TheDesiredFont:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
    .container {
        margin-left: 20px; /* 或者您想要的任何邊距 */
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    .summary-info {
    margin-top: 20px; /* 為摘要信息增加上邊距 */
}
</style>
</head>
<body>
    <!-- Navbar Start -->
    <?php include 'navbar.php'; ?>
    <!-- Navbar End -->

    <div class="container">
    <h2>Summary of the Data</h2>
    <?php
// 打開 CSV 文件
$handle = fopen("C:\Users\ddes2\Desktop\桌面\DB\資料庫\dataset_stat.csv", "r");

if ($handle !== FALSE) {
    // 初始化行和列的計數器
    $rowCount = 0;
    $columnCount = 0;

    echo "<table border='1'>\n";

    // 讀取第一行作為列標題
    if (($headers = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $columnCount = count($headers);

        echo "<tr>";
        foreach ($headers as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "</tr>\n";
    }

    // 處理數據行
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rowCount++;

        echo "<tr>";
        foreach ($data as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
    }

    echo "</table>\n";

    // 顯示摘要信息
    echo "<div class='summary-info'><strong>Row Count:</strong> " . $rowCount . "</div>\n";
    echo "<div class='summary-info'><strong>Column Count:</strong> " . $columnCount . "</div>\n";
    fclose($handle);
    }
?>


</body>
</html>