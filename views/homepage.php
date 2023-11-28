<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/default.css',
    'assets/navbar.css'
    
]); 

Script::add([
    'assets/navbar.js'
]);
?>
<!-- including the head and the navbar, because they were made in an other file -->
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>


<main>
        <div id='text-box'>
            <section class='text'>
                <h2> Text 1 Title</h2>
                <img src="" alt="">
                <p> Text 1 text paragraph</p>
            </section>
            <section class='text'>
                <h2> Text 2 Title</h2>
                <img src="" alt="">
                <p> Text 2 text paragraph</p>
            </section>
            <section class='text'>
                <h2> Text 3 Title</h2>
                <img src="" alt="">
                <p> Text 3 text paragraph</p>
            </section>
            <section class='text'>
                <h2> Text 4 Title</h2>
                <img src="" alt="">
                <p> Text 4 text paragraph</p>
            </section>
            <section class='text'>
                <h2> Text 5 Title</h2>
                <img src="" alt="">
                <p> Text 5 text paragraph</p>
            </section>
        </div>
    </main>    

    <!-- here we include the footer because its made in an other file -->
<?php $this->include("footer"); ?>
