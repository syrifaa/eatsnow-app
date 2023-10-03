// let containerImg = document.querySelector('#profileImage');
// let imgUpload = document.querySelector('.imageUpload');

// containerImg.addEventListener('click', function(e) {
//     imgUpload.click();
// });

// function fasterPreview(uploader) {
//     if (uploader.files && uploader.files[0]) {
//         const file = uploader.files[0];
//         const reader = new FileReader();

//         reader.onload = function(e) {
//             containerImg.src = e.target.result;
//         };

//         reader.readAsDataURL(file);
//     }
// }

// imgUpload.addEventListener('change', function() {
//     fasterPreview(this);
// });

function setupImageUpload(imageContainerId, uploadInputClass) {
    let containerImg = document.querySelector(imageContainerId);
    let imgUpload = document.querySelector(uploadInputClass);
  
    containerImg.addEventListener('click', function(e) {
      imgUpload.click();
    });
  
    function fasterPreview(uploader) {
      if (uploader.files && uploader.files[0]) {
        const file = uploader.files[0];
        const reader = new FileReader();
  
        reader.onload = function(e) {
          containerImg.src = e.target.result;
        };
  
        reader.readAsDataURL(file);
      }
    }
  
    imgUpload.addEventListener('change', function() {
      fasterPreview(this);
    });
}  
  