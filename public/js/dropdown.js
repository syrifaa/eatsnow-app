const selectSelected = document.getElementById('selectedCategory');
const selectItems = document.querySelector('.select-items');
const categoryInput = document.getElementById('category');

// Event listener for clicking the selected category
selectSelected.addEventListener('click', function() {
    selectItems.style.display = selectItems.style.display === 'block' ? 'none' : 'block';
});

// Event listener for clicking on an item
const selectItemsDivs = document.querySelectorAll('.select-items div');
selectItemsDivs.forEach(function(item) {
    item.addEventListener('click', function() {
        selectSelected.innerHTML = this.innerHTML;
        selectItems.style.display = 'none';
        categoryInput.value = this.innerHTML; // Update the input field value
        console.log(categoryInput.value);
    });
});