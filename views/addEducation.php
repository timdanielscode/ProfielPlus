<?php $this->include("headerOpen"); ?>
<?php $this->include("headerOpen"); ?>

<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<form method="POST">
        <h1>Voeg een school toe</h1>

        <label for="instituutSelect">Instituut</label>
        <select name="instituutSelect" id="instituutSelect">
            <option value="">selecteer een instituut</option>
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
            <option value="">selecteer een opleiding</option>
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
        <input type="radio" id="yes" name="hasDiploma" value="ja">
        <label for="ja">Ja</label>

        <input type="radio" id="No" name="hasDiploma" value="nee">
        <label for="nee">Nee</label>



        <input type="submit" name="addEducation" id="addEducation" value="submit">

</form>

<form method="POST">
        <h1>Voeg een vak toe</h1>


        <label for="subjectSelect">Vak</label>
        
        <select name="subjectSelect" id="subjectSelect">
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
        <input type="number" name="mark" id="mark" step="0.1" min="0" max="10" placeholder="8.2">
        
        <input type="submit" name="addSubject" id="addSubject" value="submit">

</form>
