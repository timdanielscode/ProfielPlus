const profileBtn = document.getElementById("profileBtn");
const profileMenu = document.getElementById("profileMenu");

// this functions makes the profile options visible or invisible
function toggleProfileMenu() {
    profileMenu.classList.toggle("profileMenu");

    // console.log("hi");

    
}

profileBtn.addEventListener("click", toggleProfileMenu)