function on(id, title, desc) {
    var modalId = "voucher-edit-" + id; // Create a unique ID for the modal
    console.log(modalId);
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
    document.getElementById("edit-title").value = title;
    document.getElementById("edit-desc").value = desc;
}

function handleVoucherDeletion() {
    console.log('Voucher deleted successfully!');
    location.reload();
}

function deleteVoucher(id, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 204) {
                // Call the callback function after successful deletion
                callback();
            } else {
                console.error("Error deleting voucher. Status:", xhr.status);
            }
        }
    };

    // TODO: Change the URL
    xhr.open("DELETE", "http://localhost:8000/api/voucher/" + id, true);
    xhr.send();
}

function off() {
    var modals = document.getElementsByClassName("voucher-edit");
    for (var i = 0; i < modals.length; i++) {
        modals[i].style.display = "none";
    }
}

function save(id) {
    // Get the updated values from the input fields
    var updatedTitle = document.querySelector("#voucher-edit-" + id + " #edit-title").value;
    var updatedDescString = document.querySelector("#voucher-edit-" + id + " #edit-desc").value;

    // Validate input fields
    if (!updatedTitle || !updatedDescString) {
        alert("Please fill in all fields.");
        return;
    }

    var updatedDesc = parseInt(updatedDescString, 10);
    // Create an object with the updated data
    var updatedData = {
        title: updatedTitle,
        desc: updatedDesc
    };

    // Convert the object to JSON
    var jsonData = JSON.stringify(updatedData);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log('Voucher updated successfully!');
                off(); // Close the modal after saving
                // Assuming you want to refresh the page after updating
                location.reload();
            } else if (xhr.status === 500) {
                alert("Voucher name should be unique.");
            } else {
                console.error("Error updating voucher. Status:", xhr.status);
            }
        }
    };

    // TODO: Change the URL
    xhr.open("PUT", "http://localhost:8000/api/voucher/" + id, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(jsonData);
    console.log(id);
    console.log(jsonData);
}

function generateVoucherCard(id, title, desc) {
    console.log(id);
    console.log(title);
    console.log(desc);
    const card = document.createElement("div");
    card.className = "voucher";
    // Add your modal content here (file upload, input fields, buttons, etc.)
    var voucher = `
        <label class="voucher-title">${title}</label>
        <label class="voucher-desc">Redeem voucher with ${desc} points</label>
        <div class="voucher-btn">
            <button id="voucher-edit" onclick="on('${id}', '${title}', '${desc}')">Edit</button>
            <button id="voucher-delete" onclick="deleteVoucher(${id}, handleVoucherDeletion)">Delete</button>        <div class="voucher-edit" id="voucher-edit-${id}">
            <div class="body-text" id="body-text">
                <div class="voucher-container">
                    <label>Voucher Name</label>
                    <input type="text" value="${title}" id="edit-title">
                </div>
                <div class="voucher-container">
                    <label>Voucher Description</label>
                    <input type="number" value="${desc}" id="edit-desc">
                </div>
            </div>
            <div class="voucher-btn">
                <button id="voucher-save" onclick="save(${id})">Save</button>
                <button id="voucher-cancel" onclick="off()">Cancel</button>
            </div>
        </div>             
    `;
    card.innerHTML = voucher;
    return card;
}

function saveEdit() {
    var updatedTitle = document.querySelector("#add-title").value;
    var updatedDescString = document.querySelector("#add-desc").value;

    // Validate input fields
    if (!updatedTitle || !updatedDescString) {
        alert("Please fill in all fields.");
        return;
    }

    var updatedDesc = parseInt(updatedDescString, 10);
    // Create an object with the updated data
    var updatedData = {
        title: updatedTitle,
        desc: updatedDesc
    };

    // Convert the object to JSON
    var jsonData = JSON.stringify(updatedData);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 201) {
                console.log('Voucher updated successfully!');
                location.reload();
            } else if (xhr.status === 500) {
                alert("Voucher name should be unique.");
            } else {
                console.error("Error updating voucher. Status:", xhr.status);
            }
        }
    };

    // TODO: Change the URL
    xhr.open("POST", "http://localhost:8000/api/voucher", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(jsonData);
    console.log(jsonData);
}

function addNewVoucherCard() {
    const card = document.createElement("div");
    card.className = "body-text";
    // Add your modal content here (file upload, input fields, buttons, etc.)
    var voucher = `
        <div class="body-text" id="body-text">
            <div class="voucher-container">
                <label>Voucher Name</label>
                <input type="text" id="add-title">
            </div>
            <div class="voucher-container">
                <label>Voucher Description</label>
                <input type="number" id="add-desc">
            </div>
        </div>
        <div class="voucher-btn">
            <button type="submit" id="voucher-save" onclick="saveEdit()">Save</button>
            <button id="voucher-cancel" onclick="cancelEdit()">Cancel</button>
        </div>    
    `;
    card.innerHTML = voucher;
    var overlay = document.querySelector(".dialog-overlay");
    overlay.appendChild(card);
    overlay.style.display = "block";
    console.log("kepencet");
}

function cancelEdit() {
    var overlay = document.querySelector(".dialog-overlay");
    overlay.style.display = "none";
    // remove the card from the overlay
    overlay.removeChild(overlay.lastChild);
}

document.addEventListener("DOMContentLoaded", function () {
    function fetchData(callback) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    callback(data);
                } else {
                    console.error("Error fetching data from the server");
                }
            }
        };
        // TODO: Change the URL
        xhr.open("GET", "http://localhost:8000/api/voucher", true);
        xhr.send();
    }

    fetchData(function (data) {
        var voucherList = document.querySelector(".voucher-list");

        data.forEach(function (voucher) {
            var card = generateVoucherCard(voucher.id, voucher.title, voucher.desc);
            console.log(voucher.id)
            console.log(voucher.title);
            console.log(voucher.desc);
            voucherList.appendChild(card);
        });
    });
});

document.getElementById("add-btn").addEventListener("click", addNewVoucherCard);