<?php $this->include("headerOpen"); ?>

<?php Stylesheet::add([

    '/assets/style.css',
    '/assets/accordion.css'
]); ?>

<?php Script::add([

    '/assets/js/profile/AccordionItem.js' => true,
    '/assets/js/profile/AccordionButton.js' => true,
    '/assets/js/profile/main.js' => true
]); ?>

<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<div class="profileDetails">
    <span class="userDetails"><?php echo $user['firstName'] . ' ' . $user['lastName']; ?></span>
</div>

<div class="row">
    <div class="col6">
        <div class="container">
        <?php if(!empty($educationSchools) && $educationSchools !== null) { ?>
            <h3 class="educationTitle">Opleidingen</h3>
            <div class="accordionContainer">
            <?php foreach($educationSchools as $educationSchool) { ?>
                <div class="education accordionButton"><span class="text"><?php echo $educationSchool['education_name']; ?></span></div>
                    <div class="schoolsContainer accordionItem display-none">
                        <span class="jobTitle"><?php echo $educationSchool['school']; ?></span>
                    </div>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
        <div class="container">
            <?php if(!empty($jobExperiences) && $jobExperiences !== null) { ?>
                <h3 class="jobExperienceTitle">Werkervaring</h3>
                <div class="accordionContainer">
                <?php foreach($jobExperiences as $jobExperience) { ?>
                    <div class="employer accordionButton"><span class="text"><?php echo $jobExperience['employer']; ?></span></div>
                    <div class="jobExperienceContainer accordionItem display-none">
                        <span class="jobTitle"><?php echo $jobExperience['job_title']; ?></span>
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
        <div class="hobbyContainer">

        </div>
    </div>
</div>

<?php $this->include("footer"); ?>