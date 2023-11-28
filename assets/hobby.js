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