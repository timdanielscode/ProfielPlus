<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/style.css'
    
]); ?>
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
    
    </main>
</body>
</html>