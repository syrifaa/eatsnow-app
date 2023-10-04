const leftArrow = document.getElementById('left');
const rightArrow = document.getElementById('right');
const slider = document.querySelector('.slider');

leftArrow.addEventListener('click', () => {
  slider.scrollLeft -= slider.clientWidth;
});

rightArrow.addEventListener('click', () => {
  slider.scrollLeft += slider.clientWidth;
});
