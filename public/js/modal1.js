var modal = document.getElementById("modal");
var btn = document.getElementById("add-btn");
var span = document.getElementById("close-btn");

btn.onclick = function() {
  modal.style.display = "flex";
  createModal();
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function createModal() {
  const modal = document.getElementById("modal");
  
  while (modal.firstChild) {
    modal.removeChild(modal.firstChild);
  }
  
  const modalCard = document.createElement("div");
  modalCard.className = "modal-content";
  
  // Add your modal content here (file upload, input fields, buttons, etc.)
  var modalContent = `
    <form action="/api/addMenu.php" method="post" enctype="multipart/form-data">
        <div class="container-img">
            <div class="image-container">
                <div id="menuUpload"></div>
            </div>
            <input class="menuUpload" id="menu-img" type="file" 
              name="menuImg" required="" accept=".jpg,.jpeg,.png" capture>
        </div>
        <label class="title">Name</label>
        <input type="text" class="input-form" id="menu-name" name="menu-name" required>
        <label class="title">Price</label>
        <input type="number" class="input-form" id="price" name="price" required>
        <label class="title">Description</label>
        <textarea class="textbox" id="desc" name="desc"></textarea>
        <div class="modal-btn">
            <input id="save" type="submit" value="Save">
            <a id="cancel">Cancel</a>
        </div>
    </form>                
  `;

  modalCard.innerHTML = modalContent;
  modal.appendChild(modalCard);

  document.getElementById("cancel").addEventListener("click", function() {
    modal.style.display = "none";
  });
  setupImageUpload('#menuUpload', '.menuUpload');
}

function generateModal(id, name, price, desc, path) {
  const modal = document.getElementById("modal");
  
  while (modal.firstChild) {
    modal.removeChild(modal.firstChild);
  }
  
  const modalCard = document.createElement("div");
  modalCard.className = "modal-content";
  
  // Add your modal content here (file upload, input fields, buttons, etc.)
  var modalContent = `
    <form action="/api/addMenu.php" method="post" enctype="multipart/form-data">
      <div class="container-img">
          <div class="image-container">
              <div id="menuUpload">
                <img src="../../../public/assets/img/${path}">
              </div>
          </div>
          <input class="menuUpload" id="menu-img" type="file" 
            name="menuImg" required="" accept=".jpg,.jpeg,.png" capture>
      </div>
      <label class="title">Name</label>
      <input type="text" class="input-form" id="menu-name" name="menu-name" value="${name}" required>
      <label class="title">Price</label>
      <input type="number" class="input-form" id="price" name="price" value="${price}" required>
      <label class="title">Description</label>
      <textarea class="textbox" id="desc" name="desc">${desc}</textarea>
      <div class="modal-btn">
          <input id="save" type="submit" value="Save">
          <a id="cancel">Cancel</a>
      </div>
    </form>                
  `;

  modalCard.innerHTML = modalContent;
  modal.appendChild(modalCard);

  document.getElementById("cancel").addEventListener("click", function() {
    modal.style.display = "none";
  });
  setupImageUpload('#menuUpload', '.menuUpload');
}

document.addEventListener('DOMContentLoaded', function() {
    updateMenuList();

    var id= "";
    var name = "";
    var price = "";
    var desc = "";
    var path = "";
    var resto_id = "";

    var addMenu = document.getElementById("add-btn");
    addMenu.addEventListener("click", function() {
      var command = "add";
      document.getElementById("save").addEventListener("click", function() {
        resto_id = document.getElementById("resto_id")
        name = document.getElementById("menu-name").value;
        price = parseFloat(document.getElementById("price").value).toFixed(2);
        desc = document.getElementById("desc").value;
        var value = document.getElementById("menu-img").value;
        path = value.split('\\').pop().split('/').pop(); 

        updateMenuList(resto_id, command, id, name, price, desc, path);
        modal.style.display = "none";  
      });
    });

    document.body.addEventListener('click', function(event) {

      // Check if the clicked element has the ID "edit-menu"
      if (event.target.id === 'edit-menu') {
        var menu = event.target.parentElement;
        var id = menu.getAttribute("data-id");
        var menuName = menu.querySelector(".menu-name");
        var name = menuName.getAttribute("menu-name");
        var menuDesc = menu.querySelector(".menu-desc");
        var desc = menuDesc.getAttribute("menu-desc");
        var menuPrice = menu.querySelector(".menu-price");
        var price = menuPrice.getAttribute("menu-price");
        var menuImg = menu.querySelector(".menu-img");
        var path = menuImg.getAttribute("menu-path");
        var command = "edit";
        generateModal(id, name, price, desc, path);
        modal.style.display = "flex";

        document.getElementById("save").addEventListener("click", function() {
          var menu = event.target.parentElement;
          var id = menu.getAttribute("data-id");
          var menuName = menu.querySelector(".menu-name");
          var name = menuName.getAttribute("menu-name");
          var menuDesc = menu.querySelector(".menu-desc");
          var desc = menuDesc.getAttribute("menu-desc");
          var menuPrice = menu.querySelector(".menu-price");
          var price = menuPrice.getAttribute("menu-price");
          var menuImg = menu.querySelector(".menu-img");
          var path = menuImg.getAttribute("menu-path");
          var value = document.getElementById("menu-img").value;
          curPath = value.split('\\').pop().split('/').pop(); 
          if (curPath != '') {
            var value = document.getElementById("menu-img").value;
            path = value.split('\\').pop().split('/').pop(); // Get the file name from the file path
          }
          resto_id = document.getElementById("resto_id")
          name = document.getElementById("menu-name").value;
          price = parseFloat(document.getElementById("price").value).toFixed(2);
          desc = document.getElementById("desc").value; 

          updateMenuList(resto_id, command, id, name, price, desc, path);
          modal.style.display = "none";  
        });
      }
      if (event.target.id === 'remove-menu') {
        var menu = event.target.parentElement;
        var id = menu.getAttribute("data-id");
        var menuName = menu.querySelector(".menu-name");
        var name = menuName.getAttribute("menu-name");
        var menuDesc = menu.querySelector(".menu-desc");
        var desc = menuDesc.getAttribute("menu-desc");
        var menuPrice = menu.querySelector(".menu-price");
        var price = menuPrice.getAttribute("menu-price");
        var menuImg = menu.querySelector(".menu-img");
        var path = menuImg.getAttribute("menu-path");
        var command = "remove";
        updateMenuList(resto_id, command, id, name, price, desc, path);
      }
    });

    function updateMenuList(resto_id, command, id, name, price, desc, path) {
      var xhr = new XMLHttpRequest();
      var url = "/api/addMenu.php";
      var params = "resto_id=" + encodeURIComponent(resto_id) + "&command=" + encodeURIComponent(command) + "&id=" + encodeURIComponent(id) + "&name=" + encodeURIComponent(name) + "&price=" + encodeURIComponent(price) + "&desc=" + encodeURIComponent(desc) + "&path=" + encodeURIComponent(path);

      xhr.open("GET", url + "?" + params, true);

      xhr.onload = function () {
          if (xhr.status === 200) {
              var menuList = document.querySelector(".menu-list");
              menuList.innerHTML = xhr.responseText;
          } else {
              console.log("Error fetching sorted restaurants.");
          }
      };

    xhr.send();
  }
});