<?php $this->include("headerOpen"); ?>

<?php Stylesheet::add([
    '/assets/style.css'
    
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

<?php if(!empty($educationSchools) && $educationSchools !== null) { ?>

    <h3 class="educationTitle">Opleidingen</h3>

    <?php foreach($educationSchools as $data) { ?>

        <div class="education accordionButton"><?php echo $data['education_name']; ?></div>
        <div class="schoolsContainer accordionItem display-none">
            <div class="container">
                <span class="jobTitle"><?php echo $data['school']; ?></span>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php if(!empty($jobExperiences) && $jobExperiences !== null) { ?>

    <h3 class="jobExperienceTitle">Werkervaring</h3>

    <?php foreach($jobExperiences as $jobExperience) { ?>

        <div class="employer accordionButton"><?php echo $jobExperience['employer']; ?></div>
        <div class="jobExperienceContainer accordionItem display-none">
            <div class="container">
                <span class="jobTitle"><?php echo $jobExperience['job_title']; ?></span>
                <div class="dateContainer">
                    <span>Van: </span><?php $dateTime = new DateTime($jobExperience['start_date']); echo $dateTime->format('d-m-Y'); ?>
                    <span>Tot: </span><?php $dateTime = new DateTime($jobExperience['end_date']); echo $dateTime->format('d-m-Y'); ?>
                </div>
            </div>
            <span class="details"><?php echo $jobExperience['details']; ?></span>
        </div>

    <?php } ?>
<?php } ?>

<?php $this->include("footer"); ?>