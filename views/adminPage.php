 <?php 
 
 $this->include("headerOpen");
 Stylesheet::add([
    
    'assets/default.css',
    "assets/navbar.css",
    'assets/form.css',
    // 'assets/admin.css',
  ]);
  
$this->include("headerClose"); 
$this->include("navbar");

?>

<main>

    <form method="POST">
        <h2>verwijder User</h2>
        <select name="userSelect" id="userSelect">
            <option value="">Select a user</option>
            <?php 
                foreach($usernames as $user) {
                    $email = $user['email'];
                    echo "<option value='$email'>$email</option>";
                }
            ?>
        </select>
        <input type="submit" class="deleteBtn formBtn" name="deleteBtn" value="Delete">
    </form>

    <form method="POST">
        <h2>voeg school, opleiding of vak toe</h2>
        
        <label for="addSchool">School toevoegen</label>
        <br>
        <input type="text" name="addSchool" id="addSchool">
        <input type="submit" name="submitNewSchool" id="submitNewSchool" class="formBtn submitBtn" value="submit">
        <br>

        <label for="addEducation">Educatie toevoegen</label>
        <br>
        <input type="text" name="addEducation" id="addEducation">
        <input type="submit" name="submitNewEducation" class="formBtn submitBtn" id="submitNewEducation" value="submit">
        <br>

        <label for="addSubject">Vak toevoegen</label>
        <br>
        <input type="text" name="addSubject" id="addSubject">
        <input type="submit" name="submitNewSubject" class="formBtn submitBtn" id="submitNewSubject" value="submit">
        <br>

    </form>

    <form method="POST">
        <h2>delete een school, opleiding of vak</h2>


        <!-- delete een school -->
        <select name="schoolSelect" id="schoolSelect">
            <option value="">selecteer een school</option>
            <?php
            foreach($schools as $institute) {
                $school = $institute['school'];
                ?>
                <option value="<?= $school ?>"><?= $school ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="deleteSchool"  class="deleteBtn formBtn" value="delete">
        <br>


        <!-- delete een educatie -->
        <select name="educationSelect" id="educationSelect">
            <option value="">selecteer een opleiding</option>
            <?php
            foreach($educations as $educatie) {
                $education = $educatie['education_name'];
                ?>
                <option value="<?= $education ?>"><?= $education ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="deleteEducation" class="deleteBtn formBtn" value="delete">
        <br>



        <!-- delete een Vak -->
        <select name="subjectSelect" id="subjectSelect">
            <option value="">selecteer een Vak</option>
            <?php
            foreach($subjects as $vak) {
                $subject = $vak['subject_name'];
                ?>
                <option value="<?= $subject ?>"><?= $subject ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="deleteSubject"  class="deleteBtn formBtn" value="delete">
        <br>

    </form>

</main>
<?php
$this->include("footer");




