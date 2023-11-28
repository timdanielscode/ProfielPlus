<?php $this->include("headerOpen"); ?>
 <?php Stylesheet::add([
     
    '/assets/default.css',
    // '/assets/form.css',
    '/assets/navbar.css',
    '/assets/footer.css',
    '/assets/style.css',
    '/assets/hobbyedit.css'
          
 ]); ?>

<?php Script::add([
    '/assets/js/profile/accordion/AccordionItem.js' => true,
    '/assets/js/profile/accordion/AccordionButton.js' => true,
    '/assets/js/profile/accordion/main.js' => true,
    '/assets/js/profile/slider/Slide.js' => true,
    '/assets/js/profile/slider/Slider.js' => true,
    '/assets/js/profile/slider/main.js' => true,
    '/assets/navbar.js' => true,
    '/assets/hobby.js' => true
 ]);
?>

 <?php $this->include("headerClose"); ?>
 <?php $this->include("navbar"); ?>



<?php 
    $db = new Database();
    $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['type'] == "delete") {
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
        if (!empty($_FILES['image']['name'])) {
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
        if (!empty($_FILES['image']['name'])) {
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

<div>
    <form id="hidden-form" method="POST" enctype="multipart/form-data" class="display:none"></form>

    <center>
        <div>
            <div class="description">
                <div>
                    <h1>Hobby's</h1>
                    <button onclick="createItem()">toevoegen</button>
                </div>
                <br>

                <table id="table">
                    <tr>
                        <h>Hobby</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach ($hobbies as $hobby) : ?>
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

            <div    class="description">
                <form id="update-description-form" method="POST" action="/profile/<?php echo $_SESSION['userId'] ?>/update-description">
                    <label for="hobby_description"><h1>General Description:</h1></label><br>
                    <textarea name="hobby_description" rows="12" cols="50" id="$user"><?= $hobbyDescription; ?></textarea><br> 
                    <button type="submit" name="update_hobby_description">Update</button>
                </form>
            </div>
        </div>
    </center>
</div>


<?php
function updateGeneralDescription($request, $pdo)
{
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
