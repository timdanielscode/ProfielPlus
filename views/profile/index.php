<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    '../assets/navbar.css',
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
    '/assets/js/profile/slider/main.js' => true
]); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<div class="profileDetails">
    <span class="userDetails"><?php echo $user['firstName'] . ' ' . $user['lastName']; ?></span>
</div>
<div class="row">
    <div class="col6">
        <div class="educationSchoolDataContainer">
        <?php if(!empty($educationSchools) && $educationSchools !== null) { ?>
            <h3 class="educationTitle">Opleidingen</h3>
            <div class="accordionContainer">
            <?php foreach($educationSchools as $educationSchool) { ?>
                <div class="education accordionButton"><span class="text"><?php echo $educationSchool['education_name']; ?></span></div>
                    <div class="schoolsContainer accordionItem display-none">
                        <span class="title"><?php echo $educationSchool['school']; ?></span>
                        <?php foreach($subjecsMarks as $subjectMark) { ?>
                            <?php if($educationSchool['id'] === $subjectMark['education_id']) { ?>
                                <div class="subjectsContainer">
                                    <span class="subject"><?php echo $subjectMark['subject_name']; ?></span>
                                    <span class="mark"><?php echo $subjectMark['mark']; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <div class="jobExperienceDataContainer">
            <?php if(!empty($jobExperiences) && $jobExperiences !== null) { ?>
                <h3 class="jobExperienceTitle">Werkervaring</h3>
                <div class="accordionContainer">
                <?php foreach($jobExperiences as $jobExperience) { ?>
                    <div class="employer accordionButton"><span class="text"><?php echo $jobExperience['employer']; ?></span></div>
                    <div class="jobExperienceContainer accordionItem display-none">
                        <span class="title"><?php echo $jobExperience['job_title']; ?></span>
                            <div class="dateContainer">
                                <div class="text"><span>Van: </span><?php $dateTime = new DateTime($jobExperience['start_date']); echo $dateTime->format('d-m-Y'); ?></div>
                                <div class="text"><span>Tot: </span><?php $dateTime = new DateTime($jobExperience['end_date']); echo $dateTime->format('d-m-Y'); ?></div>
                            </div>
                        <span class="details"><?php echo $jobExperience['details']; ?></span>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="col6">
        <div class="hobbyDataContainer">
            <?php if(!empty($imageFilePaths) && $imageFilePaths !== null) { ?>
                <div class="slider">
                    <h3>Hobbys</h3>
                    <?php foreach($imageFilePaths as $filePath) { ?>
                        <div class="slide">
                            <img src="/<?php echo $filePath['file_path']; ?>"/>
                        </div>
                    <?php } ?>
                    <span class="previous"><</span>
                    <span class="next">></span>
                </div>
                <?php if(!empty($hobbyDescription) && $hobbyDescription !== null) { ?>
                    <div class="hobbys_description"><?php echo $hobbyDescription[0]['hobby_description']; ?></div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->include("footer"); ?>