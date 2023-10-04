<?php
function generateCard() {
    $card = <<<EOT
    <div class="menu">
        <div class="image">
            <div class="img-container">
                <img id="profileImage" src="../../../public/assets/img/profile-img.png"/>
                <input id="imageUpload" type="file" 
                    name="profile_photo" placeholder="Photo" required="" capture>
                <label id="file-input-label" for="imageUpload">Select a File</label>
            </div>
        </div>
        <div class="menu-form">
            <input type="text" class="input-form" id="name" value="Name" required>
            <input type="text" class="input-form" id="desc" value="Desc" required>
        </div>
        <input type="number" class="input-form" id="price" value="0.00" required>
    </div>
    EOT;
    echo $card;
}