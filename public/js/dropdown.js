const customSelect = document.querySelector('.custom-select');
const selectItems = document.querySelector('.select-items');
const selectSelected = document.querySelector('.select-selected');

selectSelected.addEventListener('click', function() {
  selectItems.style.display = selectItems.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function(e) {
  if (e.target !== selectSelected) {
    selectItems.style.display = 'none';
  }
});

const selectItemsDivs = document.querySelectorAll('.select-items div');
selectItemsDivs.forEach(function(item, index) {
  item.addEventListener('click', function() {
    selectSelected.innerHTML = this.innerHTML;
    selectItems.style.display = 'none';
    const select = document.querySelector('select');
    select.value = index;
  });
});