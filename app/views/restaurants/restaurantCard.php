<?php
function generateCard($name, $category, $address, $review, $rating, $rowSchedule, $linkPath) {
    $monday = "Monday";
    $tuesday = "Tuesday";
    $wednesday = "Wednesday";
    $thursday = "Thursday";
    $friday = "Friday";
    $saturday = "Saturday";
    $sunday = "Sunday";

    $result = [
        "Monday" => "",
        "Tuesday" => "",
        "Wednesday" => "",
        "Thursday" => "",
        "Friday" => "",
        "Saturday" => "",
        "Sunday" => ""
    ];

    while ($schedule = mysqli_fetch_array($rowSchedule)) {
        $result[$schedule['day']] = "{$schedule['open_time']} - {$schedule['close_time']}";
    }

    foreach ($result as $key => $value) {
        if ($value == "") {
            $result[$key] = "Closed";
        }
    }

    $card = <<<EOT
    <a href=$linkPath class="restaurant">
        <img src="/public/assets/img/rest1.svg" alt="restoran" class="restaurant-img">
        <div class="restaurant-info">
            <div class="restaurant-name">$name</div>
            <div class="restaurant-category">$category</div>
            <div>
                <img src="/public/assets/vectors/pinpoint.svg" alt="pinpoint">
                <span>$address</span>
            </div>
            <div>
                <img src="/public/assets/vectors/clock.svg" alt="clock">
                <div class="schedule">
                    <span class="schedule-today">Restaurant Schedule</span>
                    <div class="schedule-detail">
                        <table>
                            <tr>
                                <td>Monday</td>
                                <td>$result[$monday]</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>$result[$tuesday]</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>$result[$wednesday]</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>$result[$thursday]</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>$result[$friday]</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>$result[$saturday]</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>$result[$sunday]</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <img src="/public/assets/vectors/star.svg" alt="rating">
                <span>$rating</span>
            </div>
        </div>
    </a>
    EOT;
    echo $card;
}

?>