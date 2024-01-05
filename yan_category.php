
<?php
$type = 'Yan'; 
$read = 'category'; 

include 'toolbar.php';
include 'connect.php'; 


$query = "SHOW COLUMNS FROM Yan_scRNA_category_table"; 
$result = $conn->query($query);

$columns = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

$query = "SELECT * FROM Yan_scRNA_category_table"; 
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


 <script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('select[name="type"]').value = 'Yan';
    document.querySelector('select[name="read"]').value = 'category';
});
</script>