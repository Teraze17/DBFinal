<script>
    document.addEventListener('DOMContentLoaded', (event) => {
  
    var typeSelect = document.querySelector('select[name="type"]');
    if (typeSelect) {
        typeSelect.value = 'Yan';
    }

    
    var readSelect = document.querySelector('select[name="read"]');
    if (readSelect) {
        var Option = Array.from(readSelect.options).find(option => option.value === 'count');
        if (Option) {
            readSelect.value = 'count';
        } else {
            
            var newOption = new Option('count', 'count');
            readSelect.add(newOption);
            readSelect.value = 'count';
        }
    }
});
</script>

<?php

$type = 'Yan'; 
$read = 'count'; 

// include 
include 'toolbar.php';
include 'connect.php'; 

// query
$query = "SHOW COLUMNS FROM Yan_count_scRNA_rmZero_log2"; 
$result = $conn->query($query);

$columns = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

$query = "SELECT * FROM Yan_count_scrna_rmzero_log2"; 
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Create Header
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

<!-- Let the display same as user's choice -->
 <script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('select[name="type"]').value = 'Yan';
    document.querySelector('select[name="read"]').value = 'count';
});
</script>