<script>
    document.addEventListener('DOMContentLoaded', (event) => {

    var typeSelect = document.querySelector('select[name="type"]');
    if (typeSelect) {
        typeSelect.value = 'Kim';
    }

    var readSelect = document.querySelector('select[name="read"]');
    if (readSelect) {
        var tpmOption = Array.from(readSelect.options).find(option => option.value === 'TPM');
        if (tpmOption) {
            readSelect.value = 'TPM';
        } else {
            var newOption = new Option('TPM', 'TPM');
            readSelect.add(newOption);
            readSelect.value = 'TPM';
        }
    }
});


</script> 


<?php

$type = 'Kim'; 
$read = 'TPM'; 

include 'toolbar.php';
include 'connect.php'; 

$query = "SHOW COLUMNS FROM Kim_tpm_scRNA_rmZero_log2"; 
$result = $conn->query($query);

$columns = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

$query = "SELECT * FROM kim_tpm_scrna_rmzero_log2"; 
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
    var typeSelect = document.querySelector('select[name="type"]');
    var readSelect = document.querySelector('select[name="read"]');
    var typeSelectedValue = typeSelect.value;

    var readSelectedValue = 'TPM'; 
    if (typeSelectedValue === 'Kim') {
        readSelect.value = readSelectedValue;
    }
});

</script>