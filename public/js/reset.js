const removeImages = document.querySelectorAll('.remove-img');
removeImages.forEach(removeImage => {
  removeImage.addEventListener('click', function() {
    const openInput = this.parentElement.previousElementSibling;
    const closeInput = this.parentElement.previousElementSibling.previousElementSibling;    
    openInput.value = '';
    closeInput.value = '';
  });
});