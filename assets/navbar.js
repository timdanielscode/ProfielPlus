const profileBtn = document.getElementById("profileBtn");
const profileMenu = document.getElementById("profileMenu");

const editDropdownBtn = document.getElementById("editDropdownBtn");
const editLinkMenu = document.getElementById("editLinkMenu");

const addLinkMenu = document.getElementById("addLinkMenu");
const addDropdownBtn = document.getElementById("addDropdownBtn");

// this functions makes the profile options visible or invisible
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


profileBtn.addEventListener("click", toggleProfileMenu);
editDropdownBtn.addEventListener("click", toggleEditLinkMenu);
addDropdownBtn.addEventListener("click", toggleAddLinkMenu);