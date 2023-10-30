/* @author Tim Daniëls
 * Slider functionality
*/
class Slider {

    constructor(slide) {

        this.slide = slide;
        this.element;
        this.activeSlide;
    }

    /* 
     * Getting slides
     *
     * @return object Slide slide elements
    */
    getSlides() {

        return this.slides;
    }

    /* 
     * Adding active class on first slide element
     *
    */
    addActiveSlide() {

        for(var slide of this.slide.getElements()) {

            slide.classList.add('active');

            return;
        }
    }

    /* 
     * Setting activeSlide element
     *
    */
    setActiveSlide() {

        this.activeSlide = document.querySelector('.active');
    }

    /*  
     * Getting activeSlide element 
     *
    */
    getActiveSlide() {

        if(this.activeSlide !== null) {

            return this.activeSlide;
        }
    }

    /* 
     * Setting onclick events on both next and previous elements 
     *
    */
    setOnlickEvents() {

        var slider = this;
        var next = this.slide.getNext();
        var previous = this.slide.getPrevious();

        next.addEventListener('click', function() {
            
            slider.setActiveSlide();
            slider.slideNext(slider.getActiveSlide());
        });

        previous.addEventListener('click', function() {
            
            slider.setActiveSlide();
            slider.slidePrevious(slider.getActiveSlide());
        });
    }

    /* Next slide functionality
     *
     * @param element active slide element
    */
    slideNext(element) {

        element.classList.remove('active');

        if(element.nextElementSibling.classList.contains('slide')) {

            element.nextElementSibling.classList.add('active');
        } else {
            this.slidePrevious(element);
        }
    }

    /* Previous slide functionality
     *
     * @param element active slide element
    */
    slidePrevious(element) {

        element.classList.remove('active');

        if(element.previousElementSibling !== null) {

            element.previousElementSibling.classList.add('active');  
        } else {
            this.slideNext(element);
        }
    }
}