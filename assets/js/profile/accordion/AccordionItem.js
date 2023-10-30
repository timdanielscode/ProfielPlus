/* @author Tim Daniëls
 * Accordion functionality
*/

class AccordionItem {

    constructor() {

        this.elements;
        this.setElements();
    }

    /* 
     * Setting elements
    */
    setElements() {

        this.elements = document.querySelectorAll('.accordionItem');
    }

    /* 
     * Getting elements
     * 
     * @return object AccordionItem elements
    */
    getElements() {

        if(this.elements !== null) {

            return this.elements;
        }
    }

    /* 
     * Adding class display-none on elements
     *
     * @param object currentElement html element accordion item current clicked element
     * @param object accordionButton
    */
    reset(currentElement, accordionButton) {

        this.resetActive(accordionButton);

        for(var element of this.getElements()) {

            if(element.classList.contains('display-none') === false && element !== currentElement) {

                element.classList.add('display-none');
            }
        }
    }

    /* 
     * Removing active class on elements
     *
     * @param object accordionButton
    */
    resetActive(accordionButton) {

        for(var element of accordionButton.getElements()) {

            if(element.classList.contains('active') === true) {

                element.classList.remove('active');
            }
        }
    }
}

