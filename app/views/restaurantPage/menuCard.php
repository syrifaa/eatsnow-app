<?php
function generateFoodCard($imgPath, $name, $desc, $price) {
    $card = <<<EOT
    <div class="menu">
        <img src=$imgPath alt="menu" class="menu-img">
        <div class="menu-info">
            <div class="menu-name">$name</div>
            <div class="menu-desc">$desc</div>
        </div>
        <div class="menu-price">$price</div>
    </div>
    EOT;
    return $card;
}