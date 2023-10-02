<?php
function generateCard() {
    $card = <<<EOT
    <div class="restaurant">
        <img src="/public/assets/img/rest1.svg" alt="restoran" class="restaurant-img">
        <div class="restaurant-info">
            <div class="restaurant-name">Restaurant Name</div>
            <div class="restaurant-category">Restaurant Category</div>
            <div>
                <img src="/public/assets/vectors/pinpoint.svg" alt="pinpoint">
                <span>Jalan Raya, Cileunyi Wetan, Cileunyi, Bandung Regency, West Java 40622</span>
            </div>
            <div>
                <img src="/public/assets/vectors/clock.svg" alt="clock">
                <span>Restaurant Schedule</span>
            </div>
            <div >
                <img src="/public/assets/vectors/review.svg" alt="review">
                <span>Restaurant Review</span>
            </div>
            <div>
                <img src="/public/assets/vectors/star.svg" alt="rating">
                <span>Restaurant Rating</span>
            </div>
        </div>
    </div>
    EOT;
    echo $card;
}
