// document.addEventListener('DOMContentLoaded', (event) => {
//     var loadingProgress = document.getElementById('loadingProgress');
//     // If there's a loading progress bar, listen for the end of its animation
//     if (loadingProgress) {
//         loadingProgress.addEventListener('animationend', function() {
//             hideLoadingElements();
//             createAndShowButton();
//         });
//     }
// });


// function displayImages() {
//     var imagesContainer = document.getElementById('imagesContainer');
//     imagesContainer.innerHTML = `
//         <div class="image-wrapper">
//             <h2>Yan Louvain Clustering</h2> <!-- Title for the first image -->
//             <img src="yanLouvain.png" alt="First Image" class="image-size1">
//             <a href="yanLouvain.png" download="yanLouvain.png" class="download-button">
//                 <i class="fas fa-download"></i> Download
//             </a>
//         </div>
//         <div class="image-wrapper">
//             <h2>Yan Rank Gene Analysis</h2> <!-- Title for the second image -->
//             <img src="yanRankGene.png" alt="Second Image" class="image-size2">
//             <a href="yanRankGene.png" download="yanRankGene.png" class="download-button">
//                 <i class="fas fa-download"></i> Download
//             </a>
//         </div>
//     `;
// }

// function hideLoadingElements() {
//     // 获取加载容器的元素
//     var loadingContainer = document.querySelector('.loading-container');
//     if (loadingContainer) {
//         // 隐藏加载容器
//         loadingContainer.classList.add('hidden');
//     }
//     displayImages();
// }

// function createAndShowButton() {
//     // Create the button element
//     var button = document.createElement('button');
//     button.id = 'myButton';
//     button.textContent = '>> Step 2 Real Clustering Analysis';

//     // Append the button to the body or a specific container
//     document.body.appendChild(button);

//     // Optional: Add event listener to the button if needed
//     button.addEventListener('click', function() {
//         window.location.href = 'yan_step2_Analysis.php';
//     });
// }
