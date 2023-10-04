<?php
function generateCard() {
    $card = <<<EOT
    <div class="menu">
        <img src="/public/assets/img/rest1.svg" alt="menu" class="menu-img">
        <div class="menu-info">
            <div class="menu-name">Name</div>
            <div class="menu-desc">Desc</div>
        </div>
        <div class="menu-price">Price</div>
    </div>
    EOT;
    echo $card;
}