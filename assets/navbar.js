const profileBtn = document.getElementById("profileBtn");
const profileMenu = document.getElementById("profileMenu");

const editDropdownBtn = document.getElementById("editDropdownBtn");
const editLinkMenu = document.getElementById("editLinkMenu");

const addLinkMenu = document.getElementById("addLinkMenu");
const addDropdownBtn = document.getElementById("addDropdownBtn");

// this functions makes the profile menu visible or invisible
function toggleProfileMenu() {
    profileMenu.classList.toggle("profileMenu");
    if (!profileMenu.classList.contains("profileMenu") && editLinkMenu.classList.contains("editLinkMenu")) {
        editLinkMenu.classList.toggle("editLinkMenu");
        editDropdownBtn.classList.toggle("selected");
    } else if (!profileMenu.classList.contains("profileMenu") && addLinkMenu.classList.contains("editLinkMenu")) {
        addLinkMenu.classList.toggle("editLinkMenu");
        addDropdownBtn.classList.toggle("selected");
    }

}

// this function makes the edit page links visible or invisible
function toggleEditLinkMenu() {
    editLinkMenu.classList.toggle("editLinkMenu");
    editDropdownBtn.classList.toggle("selected");
    if (addLinkMenu.classList.contains("editLinkMenu")) {
        addLinkMenu.classList.toggle("editLinkMenu");
    }
}

// this function makes the add page links visible or invisible
function toggleAddLinkMenu() {
    addLinkMenu.classList.toggle("editLinkMenu");
    addDropdownBtn.classList.toggle("selected");
    if (editLinkMenu.classList.contains("editLinkMenu")) {
        editLinkMenu.classList.toggle("editLinkMenu");
    }
}

// here we add an event listener to the "profile button" so that when it is clicked, the toggleProfileMenu function is called
profileBtn.addEventListener("click", toggleProfileMenu);
// here we add an event listener to the "edit button" so that when it is clicked, the toggleEditLinkMenu function is called
editDropdownBtn.addEventListener("click", toggleEditLinkMenu);
// here we add an event listener to the "add button" so that when it is clicked, the toggleAddLinkMenu function is called
addDropdownBtn.addEventListener("click", toggleAddLinkMenu);