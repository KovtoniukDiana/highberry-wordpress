
$(document).ready(function() {

    let menuIcon = $('.menu-icon');
    let submenu = $('.submenu');

    menuIcon.click(function(){

        $(this).toggleClass('active');
        
        submenu.toggleClass('active');
    });


    let openArrow = $('.open');

    openArrow.click(function(event){
        event.preventDefault();

        let subitem = $(this).closest('li').find('.subitem');

        subitem.slideToggle(300);
        
    });


    //slider product-item page
    let prev = $('.shadow .prev');
    let next = $('.shadow .next');
    let slideWrapper = $('.slider-wrapper');
    let images = $('.slider-wrapper img');


    let count = 1;
    let width = images.first().width();
    let isAnimating = false;

    const firstClone = images.first().clone();
    const lastClone = images.last().clone();

    slideWrapper.append(firstClone);
    slideWrapper.prepend(lastClone);


    function updateSlideWidth() {
        width = images.first().width();
        slideWrapper.css("transform", `translateX(-${count * width}px)`);
    }

    function rollSlider() {
        if (isAnimating) return;
        isAnimating = true;

        slideWrapper.css({
            "transition": "transform 0.5s ease",
            "transform": `translateX(-${count * width}px)`
        });

        setTimeout(() => {
            isAnimating = false;
            if (count >= images.length + 1) { 
                count = 1;
                slideWrapper.css({ "transition": "none", "transform": `translateX(-${count * width}px)` });
            } else if (count <= 0) { 
                count = images.length;
                slideWrapper.css({ "transition": "none", "transform": `translateX(-${count * width}px)` });
            }
        }, 500); 
    }


    let miniImages = $('.mini-image .white-shadow');
    let currentIndex = 0;

    $(miniImages[currentIndex]).removeClass('active');

    next.click(function() {
        if (isAnimating) return;
        count++;
        rollSlider();

        currentIndex++;

        if (currentIndex >= miniImages.length) {
            currentIndex = 0;
        }

        updateShadows();
    });

    prev.click(function() {
        if (isAnimating) return;
        count--;
        rollSlider();

        currentIndex--; 

        if (currentIndex < 0) {
            currentIndex = miniImages.length - 1;
        }

    updateShadows();
    });

    
    function updateShadows() {
        for (let i = 0; i < miniImages.length; i++) {
            if (i === currentIndex) {
                $(miniImages[i]).removeClass('active');
            } else {
                $(miniImages[i]).addClass('active');
            }
        }
    }


    $(window).resize(updateSlideWidth);
    updateSlideWidth();
});

