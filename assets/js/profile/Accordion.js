/* @author Tim Daniëls
 * Accordion functionality
*/

class Accordion {

    constructor() {

        this.elements = [];
        this.setElements();
    }

    /* 
     * @author Tim Daniëls
     * Setting elements
    */
    setElements() {
        
        this.elements = document.querySelectorAll('.accordionButton');
    }

    /* 
     * @author Tim Daniëls
     * Getting elements
     * 
     * @return object Accordion elements
    */
    getElements() {

        if(this.elements !== null) {

            return this.elements;
        }
    }

    /* 
     * @author Tim Daniëls
     * Setting onclick event toggle display-none on accordion items
    */
    setOnclickEvents() {

        for(var element of this.getElements()) {

            element.addEventListener('click', function() { 

                if(this.nextElementSibling.classList.contains('accordionItem')) {

                    this.nextElementSibling.classList.toggle('display-none');
                }
            });
        }
    }
}