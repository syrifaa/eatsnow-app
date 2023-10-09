function setupImageUpload(imageContainerId, uploadInputClass) {
  const imageContainer = document.querySelector(imageContainerId);
  const uploadInput = document.querySelector(uploadInputClass);

  uploadInput.addEventListener('change', function (event) {
    // Remove any existing content in the image container
    while (imageContainer.firstChild) {
      imageContainer.removeChild(imageContainer.firstChild);
    }

    const file = event.target.files[0];
    const fileReader = new FileReader();
    fileInput = file.name;
    console.log(fileInput);

    if (file.type.match('image')) {
      fileReader.onload = function () {
        const img = document.createElement('img');
        img.src = fileReader.result;
        imageContainer.appendChild(img);
      };
      fileReader.readAsDataURL(file);
    } else {
      fileReader.onload = function () {
        const blob = new Blob([fileReader.result], { type: file.type });
        const url = URL.createObjectURL(blob);
        const video = document.createElement('video');
        const timeupdate = function () {
          if (snapImage()) {
            video.removeEventListener('timeupdate', timeupdate);
            video.pause();
          }
        };
        video.addEventListener('loadeddata', function () {
          if (snapImage()) {
            video.removeEventListener('timeupdate', timeupdate);
          }
        });
        const snapImage = function () {
          const canvas = document.createElement('canvas');
          canvas.width = video.videoWidth;
          canvas.height = video.videoHeight;
          canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
          const image = canvas.toDataURL();
          const success = image.length > 100000;
          if (success) {
            const img = document.createElement('img');
            img.src = image;
            imageContainer.appendChild(img);
            URL.revokeObjectURL(url);
          }
          return success;
        };
        video.addEventListener('timeupdate', timeupdate);
        video.preload = 'metadata';
        video.src = url;
        // Load video in Safari / IE11
        video.muted = true;
        video.playsInline = true;
        video.play();
      };
      fileReader.readAsArrayBuffer(file);
    }
  });
}
