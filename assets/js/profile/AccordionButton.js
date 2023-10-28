/* @author Tim Daniëls
 * Accordion functionality
*/

class AccordionButton {

    constructor() {

        this.elements = [];
        this.setElements();
    }

    /* 
     * Setting elements
    */
    setElements() {
        
        this.elements = document.querySelectorAll('.accordionButton');
    }

    /* 
     * Getting elements
     * 
     * @return object AccordionButton elements
    */
    getElements() {

        if(this.elements !== null) {

            return this.elements;
        }
    }

    /* 
     * Setting onclick event toggle display-none on accordion items
    */
    setOnclickEvents(accordionItem) {

        for(var element of this.getElements()) {

            element.addEventListener('click', function() { 

                accordionItem.reset();

                if(this.nextElementSibling.classList.contains('accordionItem') === true) {

                    this.nextElementSibling.classList.toggle('display-none');
                } 
            });
        }
    }
}