class Slider {
    
    constructor(sliderContainer) {

        this.$slider = $(sliderContainer);
        this.$imgWrapper = this.$slider.find('.img-wrapper');
        this.$images = this.$slider.find('.slider-img-main');
        this.$prevBtn = this.$slider.find('.prev');
        this.$nextBtn = this.$slider.find('.next');

        this.count = 1; 
        this.width = this.$images.first().width();
        this.isAnimating = false; 

        this.$firstClone = this.$images.first().clone();
        this.$lastClone = this.$images.last().clone();

        this.$imgWrapper.append(this.$firstClone); 
        this.$imgWrapper.prepend(this.$lastClone);

        this.$prevBtn.on("click", () => this.rollSlider(-1));
        this.$nextBtn.on("click", () => this.rollSlider(1));

        $(window).on("resize", () => this.updateWidth());

        this.updateWidth();
        this.show(0);
    }

    rollSlider(direction) {

        if (this.isAnimating) return;
        this.isAnimating = true;

        this.count += direction;

        this.show(this.getRealIndex());


        this.$imgWrapper.css({
            "transition": "transform 0.5s ease",
            "transform": `translateX(-${this.count * this.width}px)`
        });

        setTimeout(() => {
            this.isAnimating = false;

            if (this.count >= this.$images.length + 1) { 
                this.count = 1;
                this.$imgWrapper.css({ "transition": "none", "transform": `translateX(-${this.count * this.width}px)` });
            } else if (this.count <= 0) { 
                this.count = this.$images.length;
                this.$imgWrapper.css({ "transition": "none", "transform": `translateX(-${this.count * this.width}px)` });
            }
        }, 500);
    }

    show(index) {

        this.$titles = this.$slider.find('.name'); 
        this.$littleTitles = this.$slider.find('.little-title .name'); 
        this.$lineEllipce = this.$slider.find('.item');
        this.$littlePhotos = this.$slider.find('.little-photo-container .slider-img');
        this.$greenIcons = this.$slider.find('.icon-text-group');
        this.$info = this.$slider.find('.info');
        
        this.$titles.removeClass('active');
        $(this.$titles[index]).addClass('active');

        this.$littleTitles.removeClass('active');
        $(this.$littleTitles[index]).addClass('active');

        this.$lineEllipce.removeClass('active');
        $(this.$lineEllipce[index]).addClass('active');

        this.$littlePhotos.removeClass('active');
        $(this.$littlePhotos[index]).addClass('active');

        this.$greenIcons.removeClass('active');
        $(this.$greenIcons[index]).addClass('active');

        this.$info.removeClass('active');
        $(this.$info[index]).addClass('active');

        this.$slider.find('.wrapper-under-animation')
        .css({ position: "relative", top: "200px", opacity: 0 }) 
        .animate({ top: "0px", opacity: 1 }, 500); 
    }

    getRealIndex() {

        if (this.count <= 0) return this.$images.length - 1;
        if (this.count >= this.$images.length + 1) return 0;
        return this.count - 1;
    }

    updateWidth() {

        this.width = this.$images.first().width();
        this.$imgWrapper.css("transform", `translateX(-${this.count * this.width}px)`);
    }
}

new Slider('.gorizontal-slider.first-slider');
new Slider('.gorizontal-slider.second-slider');



////grid slider



let iconItems = $('.grid-process .item');
let photoItems = $('.photo-container img');

iconItems.click(function() {

    iconItems.removeClass('active');
    $(this).addClass('active');

    let imageId = $(this).attr("data-img");

    photoItems.each(function() {
        if ($(this).attr('data-img') == imageId) {
            photoItems.removeClass('active');
            $(this).addClass("active");
        }
    });
});





