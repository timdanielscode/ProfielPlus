// Variable to track whether an item has been added to the table
let itemAdded = false;

// Function to delete an item
function deleteItem(hobby_id) {
    // Get the hidden form element
    const form = document.getElementById("hidden-form");

    // Clear the form content
    form.innerHTML = "";

    // Get elements by their IDs
    const id = document.getElementById(hobby_id + "-id");
    const imageId = document.getElementById(hobby_id + "-image-id");

    // Create a hidden input element for the 'type' parameter
    const input = document.createElement("input");
    input.value = "delete";
    input.type = "hidden";
    input.name = "type";

    // Append elements to the form
    form.appendChild(id);
    form.appendChild(input);
    form.appendChild(imageId);

    // Submit the form
    form.submit();
}

// Function to update the image preview
function updateImage(hobby_id) {
    // Get the image input and image elements
    const imageInput = document.getElementById(hobby_id + "-image-upload");
    const image = document.getElementById(hobby_id + "-image");
    const file = imageInput.files[0];

    // Use FileReader to read the image file and update the image preview
    const reader = new FileReader();
    reader.onload = (function (image) {
        return function (e) {
            image.src = "";
            image.style.backgroundImage = "url(" + e.target.result + ")";
        };
    })(image);
    reader.readAsDataURL(file);
}

// Function to update an item
function update(hobby_id) {
    // Get the hidden form element
    const form = document.getElementById("hidden-form");

    // Clear the form content
    form.innerHTML = "";

    // Get elements by their IDs
    const id = document.getElementById(hobby_id + "-id");
    const text = document.getElementById(hobby_id + "-text");
    const image = document.getElementById(hobby_id + "-image-upload");
    const imageId = document.getElementById(hobby_id + "-image-id");

    // Create a hidden input element for the 'type' parameter
    const input = document.createElement("input");
    input.value = "update";
    input.type = "hidden";
    input.name = "type";

    // Append elements to the form
    form.appendChild(id);
    form.appendChild(text);
    form.appendChild(image);
    form.appendChild(input);
    form.appendChild(imageId);

    // Submit the form
    form.submit();
}

// Function to create a new item row in the table
function createItem() {
    // Check if an item has already been added
    if (itemAdded == false) {
        itemAdded = true;

        // Get the table element
        const table = document.getElementById("table");

        // Create table row and cells
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        const td2 = document.createElement("td");
        const td3 = document.createElement("td");

        // Set innerHTML and attributes for the cells
        td1.innerHTML = "<input type='text' name='name' id='add-text' value='' />";
        td2.style.position = "relative";
        td2.innerHTML = "<input type='file' onchange='updateImage(`add`)' name='image' class='hidden_file_input' id='add-image-upload' />";
        td2.innerHTML += "<img width=100 height=100 style='background-size: 100px 100px;' id='add-image' />";
        td3.innerHTML = "<button onclick='addItem()'>Add</button>";

        // Append cells to the row and row to the table
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        table.appendChild(tr);
    }
}

// Function to add a new item
function addItem() {
    // Get the hidden form element
    const form = document.getElementById("hidden-form");

    // Clear the form content
    form.innerHTML = "";

    // Create a hidden input element for the 'type' parameter
    const input = document.createElement("input");
    input.value = "add";
    input.type = "hidden";
    input.name = "type";

    // Get text and image elements
    const text = document.getElementById("add-text");
    const image = document.getElementById("add-image-upload");

    // Append elements to the form
    form.appendChild(text);
    form.appendChild(image);
    form.appendChild(input);

    // Submit the form
    form.submit();
}