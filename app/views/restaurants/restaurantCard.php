<?php
function generateCard($name, $category, $address, $rating, $rowSchedule, $linkPath) {
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    $result = array_fill_keys($days, "Closed");

    while ($schedule = mysqli_fetch_array($rowSchedule)) {
        $result[$schedule['day']] = "{$schedule['open_time']} - {$schedule['close_time']}";
    }

    $scheduleRows = "";
    foreach ($days as $day) {
        $scheduleRows .= "<tr><td>$day</td><td>{$result[$day]}</td></tr>";
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
                            $scheduleRows
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