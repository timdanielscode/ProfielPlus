<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/default.css',
    'assets/navbar.css',
    'assets/form.css',
    'assets/footer.css',
    
    
]); ?>
<?php Script::add([
    '/assets/navbar.js'
]); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<main>
<form method="POST">
        <h1>Voeg een educatie toe</h1>

        <label for="instituutSelect">Instituut</label>
        <select name="instituutSelect" id="instituutSelect">
            <option value="<?php if(isset($selectedInstitute)) {echo $selectedInstitute;} else {echo "";} ?>"><?php if(isset($selectedInstitute)) {echo $selectedInstitute;} else{ echo "selecteer een school";}; ?></option>
            <?php
            foreach($institutes as $institute) {
                $school = $institute['school'];
                ?>
                <option value="<?= $school ?>"><?= $school ?></option>
                <?php
            }
            ?>
        </select>

        <label for="educationSelect">Opleiding</label>
        <select name="educationSelect" id="educationSelect">
            <option value="<?php if(isset($selectedEducation)) {echo $selectedEducation;} else {echo "";} ?>"><?php if(isset($selectedEducation)) {echo $selectedEducation;} else{ echo "selecteer een opleiding";}; ?></option>
            <?php
            foreach($educations as $education) {
                $opleiding = $education['education_name'];
                ?>
                <option value="<?= $opleiding ?>"><?= $opleiding ?></option>
                <?php
            }
            ?>
        </select>

        <label for="hasDiploma">Diploma behaald?</label>
        <select name="hasDiploma" id="diplomaAchievedBiasYes">
            <option value="ja">Ja</option>
            <option value="nee">Nee</option>
        </select>
        
        
        <!-- question on how many subject the user is following -->
        <label for="subjectsCount">Hoeveel vakken volg je bij deze opleiding?</label>
        <div class="buttonRow">
            <input type="number" name="subjectsCount" id="subjectsCount" value="<?php if (isset($subjectCount)) {echo $subjectCount;} ?>">
            <input type="submit" name="subjectCountSend" value="submitsubject">
        </div>
        

        <!-- ___________vakken___________ -->
         <?php
        if (isset($subjectCount)) {
            ?>
            <input type="hidden" name="originalSubjectCount" value="<?= $subjectCount ?>">
            <?php
            for ($i = 0; $i < $subjectCount; $i++) {
                ?>
                <br>
                <label for="subjectSelect">Vak</label>
                 
                 <select name="subjectSelect<?= $i ?>" id="subjectSelect">
                     <option value="">Selecteer een vak</option>
                     <?php
                         foreach($subjects as $subject) {
                         $vak = $subject['subject_name'];
                         ?>
                         <option value="<?= $vak ?>"><?= $vak ?></option>
                         <?php
                     }
                     ?>
                 </select>
                 
                 <label for="mark">Cijfer</label>
                 <input type="number" name="mark<?= $i ?>" id="mark" step="0.1" min="0" max="10" placeholder="8.2">
                 
                <?php
            }
            echo '<input type="submit" name="addEducation" class="formBtn submitBtn" id="addEducation" value="submit">';
        }
        
        ?>
        
    </form>


</main>

