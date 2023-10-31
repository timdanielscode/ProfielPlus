const profileBtn = document.getElementById("profileBtn");
const profileMenu = document.getElementById("profileMenu");

const editDropdownBtn = document.getElementById("editDropdownBtn");
const editLinkMenu = document.getElementById("editLinkMenu");

// this functions makes the profile options visible or invisible
function toggleProfileMenu() {
    profileMenu.classList.toggle("profileMenu");
    if (!profileMenu.classList.contains("profileMenu") && editLinkMenu.classList.contains("editLinkMenu")) {
        editLinkMenu.classList.toggle("editLinkMenu");
        editDropdownBtn.classList.toggle("selected");
    }

}

// this function makes the edit page links visible or invisible
function toggleEditLinkMenu() {
    editLinkMenu.classList.toggle("editLinkMenu");
    editDropdownBtn.classList.toggle("selected");
}


profileBtn.addEventListener("click", toggleProfileMenu);
editDropdownBtn.addEventListener("click", toggleEditLinkMenu);