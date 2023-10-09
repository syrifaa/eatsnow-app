<?php
function generateCard($name, $price, $desc, $path) {
    $card = <<<EOT
    // <div class="menu">
    //     <div class="image">
    //         <div class="img-container">
    //             <img id="profileImage" src=$path/>
    //             <input id="imageUpload" type="file" 
    //                 name="profile_photo" placeholder="Photo" required="" capture>
    //             <label id="file-input-label" for="imageUpload">Select a File</label>
    //         </div>
    //     </div>
    //     <div class="menu-form">
    //         <input type="text" class="input-form" id="name" value="$name" required>
    //         <input type="text" class="input-form" id="desc" value="$desc" required>
    //     </div>
    //     <input type="number" class="input-form" id="price" value="$price" required>
    //     <img class="remove-menu" id="remove" src="../../../public/assets/img/remove.png"/>
    // </div>
    <div class="container-img">
        <div class="image-container">
            <div id="menuUpload"></div>
        </div>
        <input class="menuUpload" id="menu-img" type="file" 
            required="" accept=".jpg,.jpeg,.png" capture>
    </div>
    <label class="title">Name</label>
    <input type="text" class="input-form" id="menu-name" name="menu-name" required>
    <label class="title">Price</label>
    <input type="number" class="input-form" id="price" name="price" required>
    <label class="title">Description</label>
    <textarea class="textbox" id="desc" name="desc"></textarea>
    <div class="modal-btn">
        <a id="save">Save</a>
        <a id="cancel">Cancel</a>
    </div> 
    EOT;
    echo $card;
}
?>