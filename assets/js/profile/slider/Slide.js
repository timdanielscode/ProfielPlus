/* @author Tim Daniëls
 * Settings the slide elements
*/
class Slide {

    constructor() {

        this.elements = [];
        this.next;
        this.previous;

        this.setElements();
        this.setNext();
        this.setPrevious();
    }

    /* 
     * Setting slide elements
     *
    */
    setElements() {

        this.elements = document.querySelectorAll('.slide');
    }

    /* 
     * Getting slide element
     *
    */
    getElements() {

        if(this.elements !== null) {

            return this.elements;
        }
    }

    /* 
     * Setting next element
     *
    */
    setNext() {

        this.next = document.querySelector('.next');
    }

    /* 
     * Getting next element
     *
    */
    getNext() {

        if(this.next !== null) {

            return this.next;
        }
    }

    /* 
     * Setting previous element
     *
    */
    setPrevious() {

        this.previous = document.querySelector('.previous');
    }

    /* 
     * Getting previous element
     *
    */
    getPrevious() {

        return this.previous;
    }

}