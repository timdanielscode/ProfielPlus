<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    '/assets/default.css',
    '/assets/navbar.css',
    '/assets/style.css',
    '/assets/accordion.css',
    '/assets/slider.css'
]); ?>



<?php Script::add([

    '/assets/js/profile/accordion/AccordionItem.js' => true,
    '/assets/js/profile/accordion/AccordionButton.js' => true,
    '/assets/js/profile/accordion/main.js' => true,
    '/assets/js/profile/slider/Slide.js' => true,
    '/assets/js/profile/slider/Slider.js' => true,
    '/assets/js/profile/slider/main.js' => true,
    '/assets/navbar.js' => true
]); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<main>
<!-- in the first block of the profile page is the first- and lastname from the user being displayed -->
<section class="profileDetails">
    <span class="userDetails"><?php echo $user['firstName'] . ' ' . $user['lastName']; ?></span>
</section>

<div class="row">
    <div class="col6">
        <?php if (!empty($educationSchools) && $educationSchools !== null) { ?>
            <!-- when the user has added schools to his account then they will all be displayed here, 
        if they haven't added schools to their account yet then this section will not exist -->
            <div class="educationSchoolDataContainer">
            <h3 class="educationTitle">Opleidingen</h3>
            <div class="accordionContainer">
            <?php foreach ($educationSchools as $educationSchool) { ?>
                <div class="education accordionButton"><span class="text"><?php echo $educationSchool['education_name']; ?></span></div>
                    <div class="schoolsContainer accordionItem display-none">
                        <span class="title"><?php echo $educationSchool['school']; ?></span>
                        <?php foreach ($subjecsMarks as $subjectMark) { ?>
                            <?php if ($educationSchool['id'] === $subjectMark['education_id'] && $subjectMark['school_id'] === $educationSchool['school_id']) { ?>
                                <div class="subjectsContainer">
                                    <span class="subject"><?php echo $subjectMark['subject_name']; ?></span>
                                    <span class="mark"><?php echo $subjectMark['mark']; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
            <?php } ?>
                </div>
        <?php } ?>
        </div>
            <?php if (!empty($jobExperiences) && $jobExperiences !== null) { ?>
                <!-- only when the user has added jobexperience this section will be created otherwise this section will not exist -->
                <div class="jobExperienceDataContainer">
                <h3 class="jobExperienceTitle">Werkervaring</h3>
                <div class="accordionContainer">
                <?php foreach ($jobExperiences as $jobExperience) { ?>
                    <div class="employer accordionButton"><span class="text"><?php echo $jobExperience['employer']; ?></span></div>
                    <div class="jobExperienceContainer accordionItem display-none">
                        <span class="title"><?php echo $jobExperience['job_title']; ?></span>
                            <div class="dateContainer">
                                <div class="text"><span>Van: </span><?php $dateTime = new DateTime($jobExperience['start_date']);
                                echo $dateTime->format('d-m-Y'); ?></div>
                                <div class="text"><span>Tot: </span><?php $dateTime = new DateTime($jobExperience['end_date']);
                                echo $dateTime->format('d-m-Y'); ?></div>
                            </div>
                        <span class="details"><?php echo $jobExperience['details']; ?></span>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col6">
        <?php if (!empty($imageFilePaths) && $imageFilePaths !== null) { ?>
            <!-- if the user has added hobbies to their account and then they will be displayed in this slider,
        also pictures can be added.  -->
            <div class="hobbyDataContainer">
            <div class="slider">
                <h3>Hobbys</h3>
                <?php foreach ($imageFilePaths as $filePath) { ?>
                    <div class="slide">
                        <img src="/<?php echo $filePath['file_path']; ?>"/>
                    </div>
                <?php } ?>
                <!-- these spans are buttons for the slider, with these buttons you can scroll through the different hobbies and their pictures -->
                <span class="previous"><</span>
                <span class="next">></span>
            </div>
            <?php if (!empty($hobbyDescription) && $hobbyDescription !== null) { ?>
                <div class="hobbys_description"><?php echo $hobbyDescription[0]['hobby_description']; ?></div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>


</main>


<?php $this->include("footer"); ?>
