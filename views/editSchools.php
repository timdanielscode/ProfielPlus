<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/style.css'
    
]); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

    <main>
        <?php var_dump("with: ", $subjectsWithMarks) ?>
        <br>
        <?php var_dump("without: ", $subjectsWithoutMarks) ?>

    <section>
        <table>
            <tr>
                <th>Instituut</th>
                <th>Studie</th>
                <th>Diploma</th>
                <th>Edit/Delete</th>
            </tr>
            
            <!-- by using a foreach loop all the rows will be dynamicly 
            created depending on the amount of rows in the database -->
            <?php

                foreach($schoolsAchieved as $achievedSchool){

                    $instituut = $achievedSchool['school'];
                    $educatie = $achievedSchool['education'];
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

                            <input type="hidden" name="oldeducationSelect" value="<?= $educatie ?>">

                            
                        </td>
                        <td>
                            <select name="diplomaAchieved" id="diplomaAchievedBiasYes">
                                <option value="ja">Ja</option>
                                <option value="nee">Nee</option>
                            </select>

                            <input type="hidden" name="oldDiplomaAchieved" value="ja">

                            
                        </td>
                        
                        <td>
                            <input type="submit" name="deleteEducation" value="Delete">
                            <input type="submit" name="updateEducation" value="Update">
                        </td>
                        
                    </form>
                    </tr>
                    <?php
                }
            
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

                            <input type="hidden" name="oldeducationSelect" value="<?= $educatie ?>">

                            
                        </td>
                        
                        
                        <td>
                            <select name="diplomaAchieved" id="diplomaAchievedBiasNo">
                                <option value="nee">Nee</option>
                                <option value="ja">Ja</option>
                            </select>

                            <input type="hidden" name="oldDiplomaAchieved" value="nee">
                            
                        </td>
                        <td>
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

                        <input type="hidden" name="oldSubject" value="<?= $userSubject['subject'] ?>">

                    </form>
                </tr>
                
                <?php
            }
            
            ?>
            
            ?>


            
        </table>
    </section>
    
    </main>
</body>
</html>