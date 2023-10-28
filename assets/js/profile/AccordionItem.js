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
     * @param object html element current clicked element
    */
    reset(currentElement) {

        for(var element of this.getElements()) {

            if(element.classList.contains('display-none') === false && element !== currentElement) {

                element.classList.add('display-none');
            }
        }
    }
}

