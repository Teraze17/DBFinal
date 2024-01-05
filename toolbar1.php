<?php
include 'connect.php';
?>

<!-- This is your HTML file (e.g., index.html) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Search</title>
</head>
<body>
    <h1> Search </h1>
    <form action="toolbar.php" method="GET">
        <select name="type">
            <title>
            <option value="database">Yan</option>
            <option value="database">Guo</option>
            <option value="database">Kim</option>
            <option value="database">LiNormal</option>
            <!-- Add other options here -->
        </select>
        <select name="read">
            <option value="reads">FPKM</option>
            <option value="reads">TPM</option>
            <option value="reads">counts</option>
            <!-- Add other options here -->
        </select>
        <select name="celltype">
            <option value="celltype">Octo</option>
            <option value="celltype">Bladder</option>
            <option value="celltype">Epithelial</option>
            <!-- Add other options here -->
        </select>
        <input type="text" name="keyword" placeholder="Keyword">
        <input type="submit" value="Search">
    </form>


    <script>
    function redirectBasedOnSelection() {
    var selectedValue = document.getElementById("selectBox").value;
    
    // Jump to different url when choose specific type
    if (selectedValue == "Yan") {
        window.location.href = 'yan_page.php'; // 选择 "Yan" 跳转到这个页面
    } else if (selectedValue == "Guo") {
        window.location.href = 'guo_page.php'; // 选择 "Guo" 跳转到这个页面
    }

}
</script>
</body>
</html>

<?php
// This is your PHP file (e.g., search.php)
// Assuming you're searching in a database, you would connect to your database here

// Get the form values
$type = $_GET['type'] ?? 'You do not search anything';
$read = $_GET['read'] ?? 'You do not choose anything';
$celltype = $_GET['celltype'] ?? 'No Celltype';
$keyword = $_GET['keyword'] ?? '';

// Perform your search
// This would involve creating a SQL query based on the form values and executing it

// For now, let's just print the values
echo "Search Type: " . htmlspecialchars($type) . "<br>";
echo "Focus: " . htmlspecialchars($read) . "<br>";
echo "Keyword: " . htmlspecialchars($keyword) . "<br>";

// Here you would usually fetch the results from the database and display them
$conn->close();
?>
