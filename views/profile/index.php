<?php $this->include("headerOpen"); ?>

<?php Stylesheet::add([
    '/assets/style.css'
    
]); ?>
<script type="text/javascript" src="/assets/js/profile/AccordionItem.js" defer></script>
<script type="text/javascript" src="/assets/js/profile/AccordionButton.js" defer></script>
<script type="text/javascript" src="/assets/js/profile/main.js" defer></script>

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