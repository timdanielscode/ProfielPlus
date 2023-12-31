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

        this.slide.getElements()[0].classList.add('activeSlide')
    }

    /* 
     * Adding active class on last slide element
     *
    */
    addActiveLastSlide() {

        this.slide.getElements()[this.slide.getElements().length - 1].classList.add('activeSlide')
    }

    /* 
     * Setting activeSlide element
     *
    */
    setActiveSlide() {

        this.activeSlide = document.querySelector('.activeSlide');
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
     * Setting Onclick events on both next and previous elements 
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

        element.classList.remove('activeSlide');

        if(element.nextElementSibling.classList.contains('slide')) {

            element.nextElementSibling.classList.add('activeSlide');
        } else {
            this.addActiveSlide();
        }
    }

    /* Previous slide functionality
     *
     * @param element active slide element
    */
    slidePrevious(element) {

        element.classList.remove('activeSlide');

        if(element.previousElementSibling.classList.contains('slide')) {

            element.previousElementSibling.classList.add('activeSlide');  
        } else {
            this.addActiveLastSlide();
        }
    }
}