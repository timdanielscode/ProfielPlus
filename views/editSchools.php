<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/default.css',
    'assets/navbar.css',
    'assets/footer.css',
    'assets/form.css',
    'assets/admin.css',
    'assets/editschool.css'
    
]);

Script::add([
    'assets/navbar.js'
]);

?>

<!-- including the head and the navbar, because they were made in an other file -->
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

    <main>
    
    <section>
        <table>
            <tr>
                <th>Instituut</th>
                <th>Studie</th>
                <th>Diploma</th>
                <th>Edit/Delete</th>
            </tr>
            
            <!-- by using a foreach loop all the rows will be dynamically 
            created depending on the amount of rows in the database -->
            <?php
            // the schools where the user achieved its diploma will be displayed at the top of the table
                foreach($schoolsAchieved as $achievedSchool){

                    $instituut = $achievedSchool['school'];
                    $educatie = $achievedSchool['education'];
                    ?>
                    <tr>
                        <!-- each table row will be a form so that the user can update its data in the table -->
                    <form method="POST">
                        <td>
                            <select name="instituutSelect" id="instituutSelect">
                                <option value="<?= $instituut ?>"><?= $instituut ?></option>
                                <?php
                                foreach($institutes as $institute) {
                                    $school = $institute['school'];
                                    ?>
                                    <option value="<?= $school ?>"><?= $school ?></option>
                                    <?php
                                }
                                ?>
                            </select>
<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldInstituutSelect" value="<?= $instituut ?>">
                        </td>

                        <td>
                            <select name="educationSelect" id="educationSelect">
                                <option value="<?= $educatie ?>"><?= $educatie ?></option>
                                <?php
                                foreach($educations as $education) {
                                    $opleiding = $education['education_name'];
                                    ?>
                                    <option value="<?= $opleiding ?>"><?= $opleiding ?></option>
                                    <?php
                                }
                                ?>
                            </select>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldeducationSelect" value="<?= $educatie ?>">

                            
                        </td>
                        <td>
                            <select name="diplomaAchieved" id="diplomaAchievedBiasYes">
                                <option value="ja">Ja</option>
                                <option value="nee">Nee</option>
                            </select>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldDiplomaAchieved" value="ja">

                            
                        </td>
                        
                        <td>
                            <input type="submit" name="deleteEducation" value="Delete">
                            <input type="submit" name="updateEducation" class="formBtn submitBtn" value="Update">
                        </td>
                    </form>
                    </tr>
                    <?php
                }
            
                // all the schools where there is now diploma will be displayed here
                foreach($schoolsNotAchieved as $schoolNotAchieved){

                    $instituut = $schoolNotAchieved['school'];
                    $educatie = $schoolNotAchieved['education'];
                    

                    ?>
                    <tr>
                    <form method="POST">
                        <td>
                            <select name="instituutSelect" id="instituutSelect">
                                <option value="<?= $instituut ?>"><?= $instituut ?></option>
                                <?php
                                foreach($institutes as $institute) {
                                    $school = $institute['school'];
                                    ?>
                                    <option value="<?= $school ?>"><?= $school ?></option>
                                    <?php
                                }
                                ?>
                            </select>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldInstituutSelect" value="<?= $instituut ?>">

                        </td>

                        <td>
                            <select name="educationSelect" id="educationSelect">
                                <option value="<?= $educatie ?>"><?= $educatie ?></option>
                                <?php
                                foreach($educations as $education) {
                                    $opleiding = $education['education_name'];
                                    ?>
                                    <option value="<?= $opleiding ?>"><?= $opleiding ?></option>
                                    <?php
                                }
                                ?>
                            </select>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldeducationSelect" value="<?= $educatie ?>">

                            
                        </td>
                        
                        
                        <td>
                            <select name="diplomaAchieved" id="diplomaAchievedBiasNo">
                                <option value="nee">Nee</option>
                                <option value="ja">Ja</option>
                            </select>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                            <input type="hidden" name="oldDiplomaAchieved" value="nee">
                            
                        </td>
                        <td >
                            <input type="submit" name="deleteEducation" value="Delete">
                            <input type="submit" name="updateEducation" value="Update" >
                        </td>
                    </form>
                    </tr>
                    <?php
                }
            
            ?>
            
        </table>
    </section>
    <section>
        <table>
            <tr>
                <th>Vak</th>
                <th>Cijfer</th>
                <th>Edit/Delete</th>
            </tr>
            <!-- first put the rows with marks in the table -->
            <?php

            foreach ($subjectsWithMarks as $userSubject) {
                ?>

                <tr>
                    <form method="POST">
                        <td>
                            <select name="subjectSelect" id="subjectSelect">
                                <option value="<?= $userSubject['subject'] ?>"><?= $userSubject['subject'] ?></option>
                                <?php 

                                foreach ($subjects as $subject) {
                                    $subjectName = $subject['subject_name'];

                                    echo "<option value='$subjectName'>$subjectName</option>";
                                }
                                
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" value="<?= $userSubject['mark'] ?>" name="mark" id="mark" step="0.1">
                        </td>

                        <td>
                            <input type="submit" name="deleteSubject" value="Delete">
                            <input type="submit" name="updateSubject" value="Update">
                        </td>
                        
<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                        <input type="hidden" name="oldSubject" value="<?= $userSubject['subject'] ?>">

                    </form>
                </tr>
                
                <?php
            }
            

            foreach ($subjectsWithoutMarks as $userSubject) {
                ?>

                <tr>
                    <form method="POST">
                        <td>
                            <select name="subjectSelect" id="subjectSelect">
                                <option value="<?= $userSubject['subject'] ?>"><?= $userSubject['subject'] ?></option>
                                <?php 

                                foreach ($subjects as $subject) {
                                    $subjectName = $subject['subject_name'];

                                    echo "<option value='$subjectName'>$subjectName</option>";
                                }
                                
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" value="<?= $userSubject['mark'] ?>" name="mark" id="mark" placeholder="vul hier uw cijfer in" step="0.1">
                        </td>

                        <td>
                            <input type="submit" name="deleteSubject" value="Delete">
                            <input type="submit" name="updateSubject" value="Update">
                        </td>

<!-- a hidden input is field is added to the form so that we know what row should be updated in the database -->
                        <input type="hidden" name="oldSubject" value="<?= $userSubject['subject'] ?>">

                    </form>
                </tr>
                
                <?php
            }
            
            ?>


            
        </table>
    </section>
    
    </main>

    <!-- here we include the footer because its made in an other file -->
    <?php $this->include("footer");