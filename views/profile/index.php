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

<?php if(!empty($jobExperiences) && $jobExperiences !== null) { ?>

    <h3 class="jobExperienceTitle">Werkervaring</h3>

    <?php foreach($jobExperiences as $jobExperience) { ?>

        <div class="employer accordionButton"><?php echo $jobExperience['employer']; ?></div>
        <div class="jobExperienceContainer accordionItem display-none">
            <div class="container">
                <span class="jobTitle"><?php echo $jobExperience['job_title']; ?></span>
                <div class="dateContainer">
                    <?php $dateTime = new DateTime($jobExperience['start_date']); echo $dateTime->format('d-m-Y'); ?>
                    <?php $dateTime = new DateTime($jobExperience['end_date']); echo $dateTime->format('d-m-Y'); ?>
                </div>
            </div>
            <span class="details"><?php echo $jobExperience['details']; ?></span>
        </div>

    <?php } ?>
<?php } ?>

<?php $this->include("footer"); ?>