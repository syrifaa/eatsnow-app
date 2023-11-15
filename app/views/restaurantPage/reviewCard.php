<?php
function generateReviewCard($userimage, $username, $rating, $desc) {
    $card = <<<EOT
    <div class="review">
        <div class="review-info">
            <div class="user-info">
                <img src=$userimage class="user-img">
                <div class="user-name">$username</div>
            </div>
            <div class="rating">$rating</div>
        </div>
        <div class="review-desc">$desc</div>
    </div>
    EOT;
    return $card;
}
?>