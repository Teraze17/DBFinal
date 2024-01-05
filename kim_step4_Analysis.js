document.addEventListener('DOMContentLoaded', (event) => {
    var loadingProgress = document.getElementById('loadingProgress');
    // If there's a loading progress bar, listen for the end of its animation
    if (loadingProgress) {
        loadingProgress.addEventListener('animationend', function() {
            hideLoadingElements();
            createAndShowButton();
            createAndShowBackButton()
        });
    }
});


function displayImages() {
    var imagesContainer = document.getElementById('imagesContainer');
    imagesContainer.innerHTML = `
        <div class="image-wrapper">
            <h2>Sankey Plot</h2> <!-- Title for the first image -->
            <img src="1224_Kim/Kim_ccsn_paramSet1224_sankeyPlot.png" alt="First Image" class="image-size1">
            <a href="1224_Kim/Kim_ccsn_paramSet1224_sankeyPlot.png" download="Kim_ccsn_paramSet1224_sankeyPlot.png" class="download-button">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    `;
}

function hideLoadingElements() {
    // 获取加载容器的元素
    var loadingContainer = document.querySelector('.loading-container');
    if (loadingContainer) {
        // 隐藏加载容器
        loadingContainer.classList.add('hidden');
    }
    displayImages();
}

function createAndShowButton() {
    // Create the button element
    var button = document.createElement('button');
    button.id = 'myButton';
    button.textContent = 'Back to Kim Analysis';

    // Append the button to the body or a specific container
    document.body.appendChild(button);

    // Optional: Add event listener to the button if needed
    button.addEventListener('click', function() {
        window.location.href = 'kim_analysis.php';
    });
}

function createAndShowBackButton() {
    // Create the back button element
    var backButton = document.createElement('button');
    backButton.id = 'myBackButton';
    backButton.textContent = 'Go Back to Pre-Step';

    // Append the back button to the body or a specific container
    document.body.appendChild(backButton);

    // Add event listener to the back button to go back to the previous page
    backButton.addEventListener('click', function() {
        window.location.href = 'kim_step3_Analysis.php';
    });
}