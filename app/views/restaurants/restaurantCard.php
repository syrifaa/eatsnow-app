<?php
function generateCard($linkPath) {
    $card = <<<EOT
    <a href="$linkPath">
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
                <div class="schedule">
                    <span class="schedule-today">Restaurant Schedule</span>
                        <div class="schedule-detail">
                            <table>
                                <tr>
                                    <td>Monday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>10:00 - 22:00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
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
