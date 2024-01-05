<?php
$type = 'Yan'; 
$read = 'FPKM'; 


include 'toolbar.php';
include 'connect.php'; 

$query = "SHOW COLUMNS FROM Yan_fpkm_scRNA_rmZero_log2"; 
$result = $conn->query($query);

$columns = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

$query = "SELECT * FROM yan_fpkm_scrna_rmzero_log2"; 
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Create the Header
    echo "<table border='1'><tr>";
    foreach ($columns as $column) {
        echo "<th>".htmlspecialchars($column)."</th>";
    }
    echo "</tr>";

    // Output each row data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($columns as $column) {
            echo "<td>".htmlspecialchars($row[$column])."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 Result";
}


$conn->close();
?>

<!-- Default Setting: Yan / FPKM -->
 <script>
// document.addEventListener('DOMContentLoaded', (event) => {
//     // 假設 'yan_fpkm.php' 是 'Yan' 類型的頁面
//     document.querySelector('select[name="type"]').value = 'Yan';
//     document.querySelector('select[name="read"]').value = 'FPKM';
// });
</script>