<?php $this->include("headerOpen"); ?>
 <?php Stylesheet::add([
     
     '/assets/default.css',
     '/assets/navbar.css',
     '/assets/footer.css',
     '/assets.form.css',
     '/assets/admin.css',
     '/assets/style.css',
     '/assets/hobbyedit.css',
     '/assets/accordion.css',
     '/assets/slider.css'
          
 ]); ?>

<?php script::add([
    '/assets/js/profile/accordion/AccordionItem.js' => true,
    '/assets/js/profile/accordion/AccordionButton.js' => true,
    '/assets/js/profile/accordion/main.js' => true,
    '/assets/js/profile/slider/Slide.js' => true,
    '/assets/js/profile/slider/Slider.js' => true,
    '/assets/js/profile/slider/main.js' => true,
    '/assets/navbar.js'=> true
   
 ]);
?>

 <?php $this->include("headerClose"); ?>
 <?php $this->include("navbar"); ?>



<?php 
    $db = new Database();
    $db->connect();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['type'] == "delete") {
            $sql = "DELETE FROM hobby_user WHERE hobby_id = ? OR image_id = ?";
            $stmt = $db->connection->prepare($sql)->execute([$_POST['id'], $_POST['image_id']]);

            $sql = "DELETE FROM hobbies WHERE id = ?";
            $stmt = $db->connection->prepare($sql)->execute([$_POST['id']]);

            $sql = "DELETE FROM images WHERE id = ?";
            $stmt = $db->connection->prepare($sql)->execute([$_POST['image_id']]);
        } else if ($_POST['type'] == "update") {
            $sql = "UPDATE hobbies SET hobby=? WHERE id = ?";
            $stmt = $db->connection->prepare($sql)->execute([$_POST['name'], $_POST['id']]);

            // If no image was sent
            if(!empty($_FILES['image']['name'])) {
                $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded files
                if (!is_dir($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true); // Create the directory if it doesn't exist
                }
            
                $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
                // Define an array of allowed file extensions
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (in_array($fileType, $allowedExtensions)) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        // File uploaded successfully
                        // You can now insert the file information into the database
                        $filePath = $targetFile;

                        $sql = "UPDATE images SET file_path=? WHERE id=?";
    
                        $stmt = $db->connection->prepare($sql);
                        $stmt->execute([ $filePath, $_POST['image_id']]);
            
                        echo "Image uploaded and inserted into the database successfully.";
                    }
                }
            }
        } else if ($_POST['type'] == "add") {
            if(!empty($_FILES['image']['name'])) {
                $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded files
                if (!is_dir($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true); // Create the directory if it doesn't exist
                }
            
                $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
                // Define an array of allowed file extensions
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                if (in_array($fileType, $allowedExtensions)) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        // File uploaded successfully
                        // You can now insert the file information into the database
                        $filePath = $targetFile;
    
                        $db->connection->beginTransaction(); // Start a transaction
                        $sql = "INSERT INTO hobbies (hobby) VALUES (?)";
                        $stmt = $db->connection->prepare($sql);
                        $stmt->execute([ $_POST['name'] ]);

                        $hobby_id = $db->connection->lastInsertId();
    
                        $sql = "INSERT INTO images (file_path) VALUES (?)";
                        $stmt = $db->connection->prepare($sql);
                        $stmt->execute([ $filePath ]);

                        $image_id = $db->connection->lastInsertId();

                        $sql = "INSERT INTO hobby_user (hobby_id, user_id, image_id) VALUES (?, ?, ?)";
                        $stmt = $db->connection->prepare($sql);
                        $stmt->execute([ $hobby_id, $_SESSION['userId'], $image_id ]);

                        $db->connection->commit();
            
                        echo "Image uploaded and inserted into the database successfully.";
                    }
                }
            } else {
                echo "no picture";
            }
        }
        header("Location: ./edit");
        exit();
    } else {
        $sql = "SELECT h.id AS hobby_id, h.hobby, i.id AS image_id, i.file_path FROM `hobby_user` AS hu ";
        $sql .= "INNER JOIN `hobbies` AS h ON h.id = hu.hobby_id ";
        $sql .= "INNER JOIN `images` AS i ON i.id = hu.image_id ";
        $sql .= "WHERE hu.user_id = ?";
    
        $stmt = $db->connection->prepare($sql);
        $stmt->execute([ $_SESSION['userId'] ]);
    
        $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $sql = "SELECT hobby_description FROM users WHERE id = ? LIMIT 1";
    
        $stmt = $db->connection->prepare($sql);
        $stmt->execute([ $_SESSION['userId'] ]);
    
        $hobbyDescription = $stmt->fetch(PDO::FETCH_ASSOC)['hobby_description'];
    }
?>




<style>
    center div {
        display: flex;
    }

    center div div {
        flex-basis: 35%;
        margin: auto 4%;
        display: block;
    }

    table {
        background-color: #ddd;
    }

    /* table row */
    tr {
        border: 1px solid black;
    }

    /* table header */
    th {
        border: 1px solid black;
    }

    /* table dumbbel */
    td {
        border: 1px solid black;
    }

    /* table dumbbel button */
    td button {

    }

    
</style>

<div>
    <form id="hidden-form" method="POST" enctype="multipart/form-data" class="display:none"></form>

    <center>
        <div>
            <div>
                <div>
                    <h1>Hobby's</h1>
                    <button onclick="createItem()">toevoegen</button>
                </div>
                <br>

                <table id="table">
                    <tr>
                        <th>Hobby</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($hobbies as $hobby): ?>
                        <tr id="<?= $hobby['hobby_id']; ?>">
                            <td><input type="text" name="name" id="<?= $hobby['hobby_id']; ?>-text" value="<?= $hobby["hobby"]; ?>" /></td>

                            <td style="position: relative">
                                <input type="file" onchange="updateImage(`<?= $hobby['hobby_id']; ?>`)" name="image" class="hidden_file_input" id="<?= $hobby['hobby_id']; ?>-image-upload" />
                                <img width=100 height=100 style="background-size: 100px 100px;" id="<?= $hobby['hobby_id']; ?>-image" src='/<?= $hobby["file_path"]; ?>' />
                            </td>

                            <td><button onclick="update('<?= $hobby['hobby_id']; ?>')">update</button></td>

                            <td><button onclick="deleteItem('<?= $hobby['hobby_id']; ?>')">delete</button></td>

                            <input name="id" type="hidden" id="<?= $hobby['hobby_id']; ?>-id" value="<?= $hobby['hobby_id']; ?>" />
                            <input name="image_id" type="hidden" id="<?= $hobby['hobby_id']; ?>-image-id" value="<?= $hobby['image_id']; ?>" />
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div>
                <form id="update-description-form" method="POST" action="/profile/<?php echo $_SESSION['userId'] ?>/update-description">
                    <label for="hobby_description">General Description:</label><br>
                    <textarea name="hobby_description" rows="12" cols="50" id="$user"><?= $hobbyDescription; ?></textarea><br>
                    <button type="submit" name="update_hobby_description">Update</button>
                </form>
            </div>
        </div>
    </center>
</div>

<script>
    let itemAdded = false;

    function deleteItem(hobby_id) {
        const form = document.getElementById("hidden-form");
        form.innerHTML = "";

        const id = document.getElementById(hobby_id + "-id");
        const imageId = document.getElementById(hobby_id + "-image-id");
        
        const input = document.createElement("input");
        input.value = "delete";
        input.type = "hidden";
        input.name = "type";

        form.appendChild(id);
        form.appendChild(input);
        form.appendChild(imageId);

        form.submit();
    }

    function updateImage(hobby_id) {
        const imageInput = document.getElementById(hobby_id + "-image-upload");
        const image = document.getElementById(hobby_id + "-image");
        const file = imageInput.files[0];

        const reader = new FileReader();
        reader.onload = (function (image) { return function (e) { 
            image.src = "";
            image.style.backgroundImage = "url(" + e.target.result + ")"
        }; })(image);
        reader.readAsDataURL(file);
    }

    function update(hobby_id) {
        const form = document.getElementById("hidden-form");
        form.innerHTML = "";

        const id = document.getElementById(hobby_id + "-id");
        const text = document.getElementById(hobby_id + "-text");
        const image = document.getElementById(hobby_id + "-image-upload");
        const imageId = document.getElementById(hobby_id + "-image-id");
        
        const input = document.createElement("input");
        input.value = "update";
        input.type = "hidden";
        input.name = "type";

        form.appendChild(id);
        form.appendChild(text);
        form.appendChild(image);
        form.appendChild(input);
        form.appendChild(imageId);

        form.submit();
    }

    function createItem() {
        if(itemAdded == false) {
            itemAdded = true;
            
            const table = document.getElementById("table");

            const tr = document.createElement("tr");

            const td1 = document.createElement("td");
            td1.innerHTML = "<input type='text' name='name' id='add-text' value='' />"

            const td2 = document.createElement("td");
            td2.style.position = "relative";
            td2.innerHTML = "<input type='file' onchange='updateImage(`add`)' name='image' class='hidden_file_input' id='add-image-upload' />"
            td2.innerHTML += "<img width=100 height=100 style='background-size: 100px 100px;' id='add-image' />"

            const td3 = document.createElement("td");
            td3.innerHTML = "<button onclick='addItem()'>Add</button>"

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);

            table.appendChild(tr);
        }
    }

    function addItem() {
        const form = document.getElementById("hidden-form");
        form.innerHTML = "";
        
        const input = document.createElement("input");
        input.value = "add";
        input.type = "hidden";
        input.name = "type";

        const text = document.getElementById("add-text");
        const image = document.getElementById("add-image-upload");

        form.appendChild(text);
        form.appendChild(image);
        form.appendChild(input);
        
        form.submit();
    }
</script>

<?php
function updateGeneralDescription($request, $pdo) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['update_hobby_description'])) {
            // Retrieve the updated general description from the form
            $newDescription = $_POST['hobby_description'];
    
            // Update the user's general description in the database
            $user_id = $_SESSION['userId'];
    
            $sql = "UPDATE users SET hobby_description = :hobby_description WHERE id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":hobby_description", $newDescription, PDO::PARAM_STR);
            $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Redirect to the user's profile or settings page
            header('Location: /profile/settings'); // Modify the URL as needed
            exit();
        }
    }
}
?>

<?php $this->include("footer"); ?>