const slider = document.querySelector(".slider"),
firstImg = slider.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");
let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;
const showHideIcons = () => {
    let scrollWidth = slider.scrollWidth - slider.clientWidth;
    arrowIcons[0].style.display = "block";
    arrowIcons[1].style.display = "block";
}
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth;
        slider.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60);
    });
});
const autoSlide = () => {
    if(slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff);
    let firstImgWidth = firstImg.clientWidth;
    let valDifference = firstImgWidth - positionDiff;
    if(slider.scrollLeft > prevScrollLeft) {
        return slider.scrollLeft += positionDiff > firstImgWidth? valDifference : -positionDiff;
    }
    slider.scrollLeft -= positionDiff > firstImgWidth? valDifference : -positionDiff;
}
const dragStart = (e) => {
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
}
const dragging = (e) => {
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    slider.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}
const dragStop = () => {
    isDragStart = false;
    slider.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}
slider.addEventListener("mousedown", dragStart);
slider.addEventListener("touchstart", dragStart);
document.addEventListener("mousemove", dragging);
slider.addEventListener("touchmove", dragging);
document.addEventListener("mouseup", dragStop);
slider.addEventListener("touchend", dragStop);