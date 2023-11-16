function on(title, desc) {
    var modalId = "voucher-edit-" + title.replace(/\s/g, ""); // Create a unique ID for the modal
    console.log(modalId);
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
    document.getElementById("edit-title").value = title;
    document.getElementById("edit-desc").value = desc;
}

function off() {
    var modals = document.getElementsByClassName("voucher-edit");
    for (var i = 0; i < modals.length; i++) {
        modals[i].style.display = "none";
    }
}

function saveEdit() {
    // Add code to save the edited values
    off(); // Close the modal after saving
}
