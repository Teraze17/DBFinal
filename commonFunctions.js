function redirectBasedOnSelection() {
    var typeValue = document.querySelector('[name="type"]').value;
    var readValue = document.querySelector('[name="read"]').value;
    
    // Based on different choice jump to different page
    var base_url = 'http://localhost/website/'; 
    var redirectMap = {
        "Yan": {
            "FPKM": base_url + 'yan_fpkm.php',
            "count": base_url + 'yan_count.php',
            "category": base_url + 'yan_category.php'
        },
        "Guo": {
            "FPKM": base_url + 'guo_fpkm.php',
            "category": base_url + 'guo_category.php'
        },
        "Kim": {
            "FPKM": base_url + 'kim_fpkm.php',
            "TPM": base_url + 'kim_tpm.php',
            "count": base_url + 'kim_count.php',
            "category": base_url + 'kim_category.php'
        },
        "LiNormal": {
            "count": base_url + 'linormal_count.php',
            "category": base_url + 'linormal_category.php'
        }
    };

    // Check if the selected type and read values have a corresponding URL
    if(redirectMap[typeValue] && redirectMap[typeValue][readValue]) {
        console.log('Redirecting to:', redirectMap[typeValue][readValue]);
        window.location.href = redirectMap[typeValue][readValue];
    }
    else {
        console.log('No matching URL found for type:', typeValue, 'and read:', readValue);
    }
}

// function startAnalysis() {
//     // Add other command
//     // alert('Analysis started!');

//     // Jump to startAnalysis.php page
//     window.location.href = 'startAnalysis.php';
// }

function startAnalysis() {
    var typeSelect = document.querySelector('[name="type"]');
    var typeValue = typeSelect.value;
    var baseUrl = 'http://localhost/website/'; // 或者您的基本 URL
    var analysisPageMap = {
        "Yan": baseUrl + 'yan_analysis.php',
        "Guo": baseUrl + 'guo_analysis.php',
        "Kim": baseUrl + 'kim_analysis.php',
        "LiNormal": baseUrl + 'linormal_analysis.php'
    };

    // 檢查是否存在對應 type 的分析頁面
    if (analysisPageMap[typeValue]) {
        window.location.href = analysisPageMap[typeValue];
    } else {
        alert('Please select a valid type for analysis.');
    }
}



function updateReadOptions() {
    console.log('updateReadOptions is called'); 
    var typeSelect = document.querySelector('select[name="type"]');
    var readSelect = document.querySelector('select[name="read"]');
    // var celltypeSelect = document.querySelector('select[name="celltype"]');
    var typeSelectedValue = typeSelect.value;

    var readSelectedValue = document.querySelector('select[name="read"]').value;
    console.log('Selected type:', typeSelectedValue); // Should be inside the function
    console.log('Selected read:', readSelectedValue);
    // console.log('Selected celltype:', celltypeSelect);


    var readOptions = {
        "Yan": ["FPKM", "count", "category"],
        "Guo": ["FPKM", "category"],
        "Kim": ["FPKM", "TPM", "count", "category"],
        "LiNormal": ["count", "category"]
    };

    
    var optionsToShow = readOptions[typeSelectedValue] || [];
    console.log('Options to show before adding:', optionsToShow);

    
    readSelect.innerHTML = ''; 
    optionsToShow.forEach(function(readValue) {
        console.log('Adding option:', readValue); 
        var option = new Option(readValue, readValue);
        readSelect.add(option);
    });
    console.log('Options added:', readSelect.innerHTML); 


}

document.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOMContentLoaded event triggered');
    // renew Read choice
    updateReadOptions();

    // combine EventListener when your choice
    document.querySelector('[name="type"]').addEventListener('change', updateReadOptions);
    document.querySelector('[name="type"]').addEventListener('change', redirectBasedOnSelection);
    document.querySelector('[name="read"]').addEventListener('change', redirectBasedOnSelection);

     // combine “Start Analysis” button
     document.getElementById('startAnalysisButton').addEventListener('click', startAnalysis);
});