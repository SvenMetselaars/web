var currentCarouselImageID = 0;
var previousCarouselImageID = 0;
const carousel = document.getElementsByClassName("productViewCenterCarousel-image");

function productImageCarousel_Prev()
{
    previousCarouselImageID = currentCarouselImageID
    currentCarouselImageID--;

    if (currentCarouselImageID == -1) currentCarouselImageID = 2;

    carousel[currentCarouselImageID].classList.toggle("productViewCenterCarousel-image--expanded");
    carousel[previousCarouselImageID].classList.toggle("productViewCenterCarousel-image--expanded");
}

function productImageCarousel_Next()
{
    previousCarouselImageID = currentCarouselImageID
    currentCarouselImageID++;

    if (currentCarouselImageID == 3) currentCarouselImageID = 0;

    carousel[currentCarouselImageID].classList.toggle("productViewCenterCarousel-image--expanded");
    carousel[previousCarouselImageID].classList.toggle("productViewCenterCarousel-image--expanded");
}