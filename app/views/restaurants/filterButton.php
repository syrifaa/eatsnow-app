<?php

function echoFilterButton()
{
    $sortButton = <<<EOT
        <div class="dropdown">
            <div class="select">
                <span class="selected">filter</span>
                <div class="caret"></div>
            </div>
            <ul class="menu-filter">
                <li type="none" data-filter="none">none</li>
                <li type="category" data-filter="Indonesian">Indonesian</li>
                <li type="category" data-filter="Western">Western</li>
                <li type="category" data-filter="Italian">Italian</li>
                <li type="category" data-filter="Chinese">Chinese</li>
                <li type="category" data-filter="Japanese">Japanese</li>
                <li type="category" data-filter="Korean">Korean</li>
                <li type="category" data-filter="Thai">Thai</li>
                <li type="category" data-filter="Indian">Indian</li>
                <li type="category" data-filter="Other">Other</li>
                <li type="rating" data-filter="4">Rating >= 4</li>
            </ul>
        </div>
    EOT;
    
    echo $sortButton;
}
?>